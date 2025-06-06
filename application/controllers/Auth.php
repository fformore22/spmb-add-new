<?php defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
/**
 * Class Auth
 * @property Ion_auth|Ion_auth_model $ion_auth        The ION Auth spark
 * @property CI_Form_validation      $form_validation The form validation library
 */
class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth', 'form_validation'));
		$this->load->helper(array('url', 'language'));
		$this->load->model('Pengaturan_model'); 
		$this->load->model('Pengumuman_model');
		$this->load->model('Tahunpelajaran_model');
		$this->load->model('Peserta_model');
		$this->load->model('Mail_model');

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');

	    require APPPATH.'libraries/phpmailer/src/Exception.php';
	    require APPPATH.'libraries/phpmailer/src/PHPMailer.php';
	    require APPPATH.'libraries/phpmailer/src/SMTP.php';  		
		
	}

	/**
	 * Redirect if needed, otherwise display the user list
	 */
	public function index()
	{
		if (!$this->ion_auth->logged_in())
		{
			redirect('login', 'refresh');
		}
		else
		{
			redirect('dashboard');
		}
	}

	/**
	 * Registrasi
	 */
	public function registrasi()
	{
		$aktif=$this->Tahunpelajaran_model->get_tahun_aktif();
		if ($aktif) {		
			$this->load->view('auth/registrasi');
		} else {
			$this->session->set_flashdata('aktif', 'PPDB belum diaktifkan');
		    redirect("login", 'refresh');			
		}			
	}

	public function proses_registrasi()
	{
		date_default_timezone_set('Asia/Jakarta');
		$tgl_ppdb = $this->Tahunpelajaran_model->get_tahun_aktif();
	        $tanggal_mulai = date('d F Y 08:00:00',strtotime($tgl_ppdb->tanggal_mulai_pendaftaran));
	        $tanggal_selesai = date('d F Y 12:00:00',strtotime($tgl_ppdb->tanggal_selesai_pendaftaran));  
	        $tanggal_sekarang = date('d F Y H:i:s');
	        $mulai = new DateTime($tanggal_mulai);
	        $selesai = new DateTime($tanggal_selesai);
	        $today = new DateTime($tanggal_sekarang);	

		if ($today < $mulai) {
			$this->session->set_flashdata('register', 'Pendaftaran belum dibuka');
	    	redirect("login", 'refresh');
		} else if ($today > $selesai) {
			$this->session->set_flashdata('register', 'Pendaftaran sudah ditutup');
	    	redirect("login", 'refresh');			
		} else {
			$tables = $this->config->item('tables', 'ion_auth');
			$identity_column = $this->config->item('identity', 'ion_auth');
			$this->data['identity_column'] = $identity_column;

			// validate form input
			$this->form_validation->set_rules('full_name', $this->lang->line('create_user_validation_fname_label1'), 'trim|required');
			$this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'trim|required|numeric');

			if ($identity_column !== 'email') {
				$this->form_validation->set_rules('identity', $this->lang->line('create_user_validation_username_label1'), 'trim|required|numeric|exact_length[10]|is_unique[' . $tables['users'] . '.' . $identity_column . ']');
			} else {					
				$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|required|valid_email|is_unique[' . $tables['users'] . '.email]');			
			}
		
			$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
			$this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

			if ($this->form_validation->run() === FALSE) {		
				$this->load->view('auth/registrasi');
			} else {
				if ($identity_column !== 'email') {
				$email = strtolower($this->input->post('identity')."@gmail.com"); // email sementara menggunakan identity username
				$identity = ($identity_column === 'email') ? $email : $this->input->post('identity');	
				$foto = $this->input->post('identity');
				} else {
				$identity = $this->input->post('email');	
				$email = strtolower($this->input->post('email')); // email manual	
				$foto = $this->input->post('username');			
				}
									
				$password = $this->input->post('password');
				$image =$foto.'.jpg';

				$additional_data=[
					'full_name'=>$this->input->post('full_name'),
					// 'company' => $this->input->post('company'),
					'phone' => $this->input->post('phone'),				
					'image'=>$image,
				];

				$insert=$this->ion_auth->registrasi($identity, $password, $email, $additional_data);

				if($insert)	{
					$this->session->set_flashdata('success','Silahkan login, segera isi formulir');
					// kirim pesan WA ........................................................
				    $phone=$this->input->post('phone');
				    $msg="Selamat akun berhasil disimpan, silahkan segera login dan lengkapi formulir pendaftaran anda. Username : ".$identity.", Kata Sandi : ".$password;
				    $this->Peserta_model->kirimpesan($phone,$msg);
					// .......................................................................	

				    // kirim akun ke email .....................................................
					if ($identity_column == 'email') {    
					 	$data['mailer'] = $this->Mail_model->get_by_id_1();

						// PHPMailer object
						$response = false;
						$mail = new PHPMailer();

						// Server settings
						$mail->isSMTP();
						$mail->Host     = $data['mailer']->host;
						$mail->SMTPAuth = true;
						$mail->Username = $data['mailer']->username; // user email anda
						$mail->Password = $data['mailer']->password; // diisi dengan App Password yang sudah di generate dari akun gmail
						$mail->SMTPSecure = $data['mailer']->smtpsecure;
						$mail->Port     = $data['mailer']->port;

						// Recipients
						$mail->setFrom($data['mailer']->username, 'admin ppdb');
						$mail->addReplyTo($data['mailer']->username, '');			// user email anda
						$mail->addAddress($this->input->post('email'));             // email tujuan pengiriman email
						// $mail->addCC('cc@example.com');
						// $mail->addBCC('bcc@example.com');

						// Content
						$mail->isHTML(true);
						$mail->Subject = 'akun ppdb'; //subject email
						$mailContent = "<p>Hallo <b>".$this->input->post('full_name')."</b>, berikut ini adalah informasi akun Anda:</p>
						<table>
						<tr>
							<td>Nama</td>
							<td>:</td>
							<td>".$this->input->post('full_name')."</td>
						</tr>
						<tr>
							<td>Username</td>
							<td>:</td>
							<td>".$this->input->post('email')."</td>
						</tr>
						<tr>
							<td>Kata sandi</td>
							<td>:</td>
							<td>".$this->input->post('password')."</td>
						</tr>
						</table>
						<p>Terimakasih <b>".$this->input->post('full_name')."</b> telah membuat akun.</p>"; // isi email
						$mail->Body = $mailContent;

						// Send email
						if(!$mail->send()) {
							// $this->session->set_flashdata('message', 'Gagal terkirim ke email, silahkan login');
							$this->session->set_flashdata('success','Silahkan login, segera isi formulir');
						} else {
							$this->session->set_flashdata('success', 'Akun berhasil terkirim ke email, silahkan login');
						}
					}	
					// .......................................................................
					redirect("login", 'refresh');	
				} else {
					redirect("registrasi", 'refresh');
				}			
			}
		}
	}

	//upload image
	public function uploadimage()
	{

		if (!$this->ion_auth->logged_in())
		{
			redirect('login', 'refresh');
		}

	    $config['upload_path']          = './assets/uploads/image/user/';
	    $config['allowed_types']        = 'jpg';
	    $config['file_name']            = $this->input->post('username');
	    $config['overwrite']			= true;
	    $config['max_size']             = 100; // 1MB
	    // $config['max_width']            = 1024;
	    // $config['max_height']           = 768;

	    $this->load->library('upload', $config);

	    if ($this->upload->do_upload('image')) {
	        $this->upload->data("file_name");
	        $this->session->set_flashdata('message', 'Upload Image Berhasil');
	        redirect(site_url('profile'));
	    }
	    
	    $this->input->post('images');
		$this->session->set_flashdata('message', 'Upload Image Gagal');
	    redirect(site_url('profile'));
	}

	/**
	 * Edit profile
	 */
	public function edit_profile()
	{
	
		if (!$this->ion_auth->logged_in())
		{
			redirect('login', 'refresh');
		}	

		// validate form input
		$this->form_validation->set_rules('full_name', $this->lang->line('edit_user_validation_fname_label'), 'trim|required');
		$this->form_validation->set_rules('company', $this->lang->line('edit_user_validation_company_label'), 'trim');
		$this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'trim|numeric');
		$this->form_validation->set_rules('email', $this->lang->line('edit_user_validation_email_label'), 'trim|valid_email');

		if (isset($_POST) && !empty($_POST))
		{
			
			// update the password if it was posted
			if ($this->input->post('password'))
			{
				$this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
				$this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');
			}

			if ($this->form_validation->run() === true) {
				$data = array(
					'full_name' => $this->input->post('full_name'),
					'company' => $this->input->post('company'),
					'phone' => $this->input->post('phone'),
					'email' => $this->input->post('email'),
				);

				// update the password if it was posted
				if ($this->input->post('password'))
				{
					$data['password'] = $this->input->post('password');
				}

				// check to see if we are updating the user
				if ($this->ion_auth->update($this->input->post('id', TRUE), $data))
				{
					// redirect them back to the admin page if admin, or to the base url if non admin
					$this->session->set_flashdata('message', $this->ion_auth->messages());
					helper_log("edit", "Update Profile");		
					redirect(site_url('profile'));
				}
				else
				{
					// redirect them back to the admin page if admin, or to the base url if non admin
					$this->session->set_flashdata('message', $this->ion_auth->errors());
					redirect(site_url('profile'));
				}
			} else {
				$this->session->set_flashdata('message', 'Gagal Diperbaharui');
				redirect(site_url('profile'));	
			}
		}
	}	


	/**
	 * Log the user in
	 */
	public function login()
	{
		$this->data['title'] = $this->lang->line('login_heading');

		// validate form input
		$this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
		$this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');

		if ($this->form_validation->run() === TRUE)
		{
			// check to see if the user is logging in
			// check for "remember me"
			$remember = (bool)$this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
			{
				//if the login is successful
				//redirect them back to the home page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				helper_log("login", "Login");
				redirect('/', 'refresh');
			}
			else
			{
				// if the login was un-successful
				// redirect them back to the login page
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('login', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{
			// the user is not logging in so display the login page
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['identity'] = array('name' => 'identity',
				'id' => 'identity',
				'type' => 'text',
				'value' => $this->form_validation->set_value('identity'),
			);
			$this->data['password'] = array('name' => 'password',
				'id' => 'password',
				'type' => 'password',
			);

			$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'login', $this->data);
		}
	}

	/**
	 * Log the user out
	 */
	public function logout()
	{
		$this->data['title'] = "Logout";

		$this->session->userdata('identity');
		helper_log("logout", "Logout");			

		// log the user out
		$logout = $this->ion_auth->logout();
		$this->session->set_flashdata('logout','Pengguna berhasil logout'); 			
		redirect("login", 'refresh');
	}

	/**
	 * Change password
	 */
	public function change_password()
	{
		$this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label'), 'required');
		$this->form_validation->set_rules('new', $this->lang->line('change_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
		$this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');

		if (!$this->ion_auth->logged_in())
		{
			redirect('login', 'refresh');
		}

		$user = $this->ion_auth->user()->row();

		if ($this->form_validation->run() === FALSE)
		{
			// display the form
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
			$this->data['old_password'] = array(
				'name' => 'old',
				'id' => 'old',
				'type' => 'password',
			);
			$this->data['new_password'] = array(
				'name' => 'new',
				'id' => 'new',
				'type' => 'password',
				'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
			);
			$this->data['new_password_confirm'] = array(
				'name' => 'new_confirm',
				'id' => 'new_confirm',
				'type' => 'password',
				'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
			);
			$this->data['user_id'] = array(
				'name' => 'user_id',
				'id' => 'user_id',
				'type' => 'hidden',
				'value' => $user->id,
			);

			// render
			$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'change_password', $this->data);
		}
		else
		{
			$identity = $this->session->userdata('identity');

			$change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

			if ($change)
			{
				//if the password was successfully changed
				$this->session->set_flashdata('message', $this->ion_auth->messages());					
				$this->logout();
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('auth/change_password', 'refresh');
			}
		}
	}

	/**
	 * Forgot password
	 */
	public function forgot_password()
	{
		// setting validation rules by checking whether identity is username or email
		if ($this->config->item('identity', 'ion_auth') != 'email')
		{
			$this->form_validation->set_rules('identity', $this->lang->line('forgot_password_identity_label'), 'required');
		}
		else
		{
			$this->form_validation->set_rules('identity', $this->lang->line('forgot_password_validation_email_label'), 'required|valid_email');
		}


		if ($this->form_validation->run() === FALSE)
		{
			$this->data['type'] = $this->config->item('identity', 'ion_auth');
			// setup the input
			$this->data['identity'] = array('name' => 'identity',
				'id' => 'identity',
			);

			if ($this->config->item('identity', 'ion_auth') != 'email')
			{
				$this->data['identity_label'] = $this->lang->line('forgot_password_identity_label');
			}
			else
			{
				$this->data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
			}

			// set any errors and display the form
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'forgot_password', $this->data);
		}
		else
		{
			$identity_column = $this->config->item('identity', 'ion_auth');
			$identity = $this->ion_auth->where($identity_column, $this->input->post('identity'))->users()->row();

			if (empty($identity))
			{

				if ($this->config->item('identity', 'ion_auth') != 'email')
				{
					$this->ion_auth->set_error('forgot_password_identity_not_found');
				}
				else
				{
					$this->ion_auth->set_error('forgot_password_email_not_found');
				}

				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect("auth/forgot_password", 'refresh');
			}

			// run the forgotten password method to email an activation code to the user
			$forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

			if ($forgotten)
			{
				// if there were no errors
				//$this->session->set_flashdata('message', $this->ion_auth->messages());
				$this->session->set_flashdata('successreset','Email untuk Set Ulang Kata Sandi Telah Dikirim'); 
				redirect("login", 'refresh'); //we should display a confirmation page here instead of the login page
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect("auth/forgot_password", 'refresh');
			}
		}
	}

	/**
	 * Reset password - final step for forgotten password
	 *
	 * @param string|null $code The reset code
	 */
	public function reset_password($code = NULL)
	{
		if (!$code)
		{
			show_404();
		}

		$user = $this->ion_auth->forgotten_password_check($code);

		if ($user)
		{
			// if the code is valid then display the password reset form

			$this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
			$this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');

			if ($this->form_validation->run() === FALSE)
			{
				// display the form

				// set the flash data error message if there is one
				$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
				$this->data['new_password'] = array(
					'name' => 'new',
					'id' => 'new',
					'type' => 'password',
					'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
				);
				$this->data['new_password_confirm'] = array(
					'name' => 'new_confirm',
					'id' => 'new_confirm',
					'type' => 'password',
					'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
				);
				$this->data['user_id'] = array(
					'name' => 'user_id',
					'id' => 'user_id',
					'type' => 'hidden',
					'value' => $user->id,
				);
				$this->data['csrf'] = $this->_get_csrf_nonce();
				$this->data['code'] = $code;

				// render
				$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'reset_password', $this->data);
			}
			else
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id'))
				{

					// something fishy might be up
					$this->ion_auth->clear_forgotten_password_code($code);

					show_error($this->lang->line('error_csrf'));

				}
				else
				{
					// finally change the password
					$identity = $user->{$this->config->item('identity', 'ion_auth')};

					$change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

					if ($change)
					{
						// if the password was successfully changed
						$this->session->set_flashdata('message', $this->ion_auth->messages());
						redirect("login", 'refresh');
					}
					else
					{
						$this->session->set_flashdata('message', $this->ion_auth->errors());
						redirect('auth/reset_password/' . $code, 'refresh');
					}
				}
			}
		}
		else
		{
			// if the code is invalid then send them back to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("auth/forgot_password", 'refresh');
		}
	}

	/**
	 * Activate the user
	 *
	 * @param int         $id   The user ID
	 * @param string|bool $code The activation code
	 */
	public function activate($id, $code = FALSE)
	{
		if ($code !== FALSE)
		{
			$activation = $this->ion_auth->activate($id, $code);
		}
		else if ($this->ion_auth->is_admin())
		{
			$activation = $this->ion_auth->activate($id);
		}

		if ($activation)
		{
			// redirect them to the auth page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			if($code !== FALSE){
				redirect("auth", 'refresh');
			}else{
				redirect("users", 'refresh');

			}
		}
		else
		{
			// redirect them to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("auth/forgot_password", 'refresh');
		}
	}

	/**
	 * Deactivate the user
	 *
	 * @param int|string|null $id The user ID
	 */
	public function deactivate($id = NULL)
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			// redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');
		}

		$id = (int)$id;

		$this->load->library('form_validation');
		$this->form_validation->set_rules('confirm', $this->lang->line('deactivate_validation_confirm_label'), 'required');
		$this->form_validation->set_rules('id', $this->lang->line('deactivate_validation_user_id_label'), 'required|alpha_numeric');

		if ($this->form_validation->run() === FALSE)
		{
			// insert csrf check
			$this->data['csrf'] = $this->_get_csrf_nonce();
			$this->data['user'] = $this->ion_auth->user($id)->row();
			$this->data['title'] = 'User';
	        $this->data['subtitle'] = '';
	        $this->data['crumb'] = [
	            'User' => '',
	        ];

        $this->data['page'] = 'auth/deactivate_user';
        $this->load->view('template/backend', $this->data);
			//$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'deactivate_user', $this->data);
		}
		else
		{
			// do we really want to deactivate?
			if ($this->input->post('confirm') == 'yes')
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
				{
					return show_error($this->lang->line('error_csrf'));
				}

				// do we have the right userlevel?
				if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin())
				{
					$this->ion_auth->deactivate($id);
					$this->session->set_flashdata('message', $this->ion_auth->messages());

				}
			}

			// redirect them back to the auth page
			redirect('users', 'refresh');
		}
	}

	/**
	 * Create a new user
	 */
	public function create_user()
	{
		$this->data['title'] = $this->lang->line('create_user_heading');

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}

		$tables = $this->config->item('tables', 'ion_auth');
		$identity_column = $this->config->item('identity', 'ion_auth');
		$this->data['identity_column'] = $identity_column;

		// validate form input
		$this->form_validation->set_rules('full_name', $this->lang->line('create_user_validation_fname_label'), 'trim|required');
		$this->form_validation->set_rules('company', $this->lang->line('create_user_validation_company_label'), 'trim');		
		$this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'trim|numeric');

		if ($identity_column !== 'email')
		{
			$this->form_validation->set_rules('identity', $this->lang->line('create_user_validation_username_label'), 'trim|required|is_unique[' . $tables['users'] . '.' . $identity_column . ']');				
		}
		else
		{
			$this->form_validation->set_rules('username', $this->lang->line('create_user_validation_username_label'), 'trim|required|is_unique[' . $tables['users'] . '.username]');							
		}

		$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|required|valid_email|is_unique[' . $tables['users'] . '.email]');	


		$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

		if ($this->form_validation->run() === TRUE)
		{
			if ($identity_column !== 'email') {
			$identity = ($identity_column === 'email') ? $email : $this->input->post('identity');
			$email = strtolower($this->input->post('email')); // email manual				
			$foto = $this->input->post('identity');
			} else {
			$identity = $this->input->post('username');	
			$email = strtolower($this->input->post('email')); // email manual	
			$foto = $this->input->post('username');			
			}

			$password = $this->input->post('password');
			$image =$foto.'.jpg';			

			$additional_data = array(
				'full_name' => $this->input->post('full_name'),
				'company' => $this->input->post('company'),
				'phone' => $this->input->post('phone'),
				'image' => $image,
			);
		}
		if ($this->form_validation->run() === TRUE && $this->ion_auth->register($identity, $password, $email, $additional_data))
		{
			// check to see if we are creating the user
			// redirect them back to the admin page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			helper_log("add", "Menambah Pengguna ".$additional_data['full_name']);		
			redirect("user", 'refresh');
		}
		else
		{
			// display the create user form
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['full_name'] = array(
				'name' => 'full_name',
				'id' => 'full_name',
				'type' => 'text',
				'value' => $this->form_validation->set_value('full_name'),
				'class' => 'form-control'
			);
			$this->data['foto'] = array(
				'name' => 'foto',
				'id' => 'foto',
				'type' => 'file',
				'value' => $this->form_validation->set_value('foto'),
				'class' => 'form-control'
			);
			$this->data['identity'] = array(
				'name' => 'identity',
				'id' => 'identity',
				'type' => 'text',
				'value' => $this->form_validation->set_value('identity'),
				'class' => 'form-control'
			);
			$this->data['username'] = array(
				'name' => 'username',
				'id' => 'username',
				'type' => 'text',
				'value' => $this->form_validation->set_value('username'),
				'class' => 'form-control'
			);			
			$this->data['email'] = array(
				'name' => 'email',
				'id' => 'email',
				'type' => 'text',
				'value' => $this->form_validation->set_value('email'),
				'class' => 'form-control'
			);
			$this->data['company'] = array(
				'name' => 'company',
				'id' => 'company',
				'type' => 'text',
				'value' => $this->form_validation->set_value('company'),
				'class' => 'form-control'
			);
			$this->data['phone'] = array(
				'name' => 'phone',
				'id' => 'phone',
				'type' => 'text',
				'value' => $this->form_validation->set_value('phone'),
				'class' => 'form-control'
			);
			$this->data['password'] = array(
				'name' => 'password',
				'id' => 'password',
				'type' => 'password',
				'value' => $this->form_validation->set_value('password'),
				'class' => 'form-control'
			);
			$this->data['password_confirm'] = array(
				'name' => 'password_confirm',
				'id' => 'password_confirm',
				'type' => 'password',
				'value' => $this->form_validation->set_value('password_confirm'),
				'class' => 'form-control'
			);
			$this->data['title'] = 'User';
	        $this->data['subtitle'] = '';
	        $this->data['crumb'] = [
	            'User' => '',
	        ];

        $this->data['page'] = 'auth/create_user';
        $this->load->view('template/backend', $this->data);
			//$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'create_user', $this->data);
		}
	}
	/**
	* Redirect a user checking if is admin
	*/
	public function redirectUser(){
		if ($this->ion_auth->is_admin()){
			redirect('users', 'refresh');
		}
		redirect('/', 'refresh');
	}

	/**
	 * Edit a user
	 *
	 * @param int|string $id
	 */
	public function edit_user($id)
	{
		$this->data['title'] = $this->lang->line('edit_user_heading');

		if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id)))
		{
			redirect('auth', 'refresh');
		}

		$user = $this->ion_auth->user($id)->row();
		$groups = $this->ion_auth->groups()->result_array();
		$currentGroups = $this->ion_auth->get_users_groups($id)->result();

		// validate form input
		$this->form_validation->set_rules('full_name', $this->lang->line('edit_user_validation_fname_label'), 'trim|required');
		$this->form_validation->set_rules('company', $this->lang->line('edit_user_validation_company_label'), 'trim');
		$this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'trim|numeric');
		$this->form_validation->set_rules('email', $this->lang->line('edit_user_validation_email_label'), 'trim|valid_email');
		

		if (isset($_POST) && !empty($_POST))
		{
			
			// update the password if it was posted
			if ($this->input->post('password'))
			{
				$this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
				$this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');
			}

			if ($this->form_validation->run() === TRUE)
			{
				$data = array(
					'full_name' => $this->input->post('full_name'),
					'company' => $this->input->post('company'),
					'phone' => $this->input->post('phone'),
					'email' => $this->input->post('email'),
				);

				// update the password if it was posted
				if ($this->input->post('password'))
				{
					$data['password'] = $this->input->post('password');
				}

				// Only allow updating groups if user is admin
				if ($this->ion_auth->is_admin())
				{
					// Update the groups user belongs to
					$groupData = $this->input->post('groups');

					if (isset($groupData) && !empty($groupData))
					{

						$this->ion_auth->remove_from_group('', $id);

						foreach ($groupData as $grp)
						{
							$this->ion_auth->add_to_group($grp, $id);
						}

					}
				}

				// check to see if we are updating the user
				if ($this->ion_auth->update($user->id, $data))
				{
					// redirect them back to the admin page if admin, or to the base url if non admin
					$this->session->set_flashdata('message', $this->ion_auth->messages());
					helper_log("edit", "Update Pengguna ".$data['full_name']);		
					$this->redirectUser();

				}
				else
				{
					// redirect them back to the admin page if admin, or to the base url if non admin
					$this->session->set_flashdata('message', $this->ion_auth->errors());
					$this->redirectUser();

				}

			}
		}

		// display the edit user form
		$this->data['csrf'] = $this->_get_csrf_nonce();

		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		// pass the user to the view
		$this->data['user'] = $user;
		$this->data['groups'] = $groups;
		$this->data['currentGroups'] = $currentGroups;

		$this->data['full_name'] = array(
			'name'  => 'full_name',
			'id'    => 'full_name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('full_name', $user->full_name),
			'class' => 'form-control'
			
		);
		$this->data['company'] = array(
			'name'  => 'company',
			'id'    => 'company',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('company', $user->company),
			'class' => 'form-control'
		);
		$this->data['phone'] = array(
			'name'  => 'phone',
			'id'    => 'phone',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('phone', $user->phone),
			'class' => 'form-control'
		);
		$this->data['email'] = array(
			'name'  => 'email',
			'id'    => 'email',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('email', $user->email),
			'class' => 'form-control'
		);		
		$this->data['password'] = array(
			'name' => 'password',
			'id'   => 'password',
			'type' => 'password',
			'class' => 'form-control'
		);
		$this->data['password_confirm'] = array(
			'name' => 'password_confirm',
			'id'   => 'password_confirm',
			'type' => 'password',
			'class' => 'form-control'
		);
		$this->data['title'] = 'User';
	        $this->data['subtitle'] = '';
	        $this->data['crumb'] = [
	            'User' => '',
	        ];

        $this->data['page'] = 'auth/edit_user';
        $this->load->view('template/backend', $this->data);
		//$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'edit_user', $this->data);
	}

	/**
	 * Create a new group
	 */
	public function create_group()
	{
		$this->data['title'] = $this->lang->line('create_group_title');

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}

		// validate form input
		$this->form_validation->set_rules('group_name', $this->lang->line('create_group_validation_name_label'), 'trim|required|alpha_dash');

		if ($this->form_validation->run() === TRUE)
		{
			$new_group_id = $this->ion_auth->create_group($this->input->post('group_name'), $this->input->post('description'));
			if ($new_group_id)
			{
				// check to see if we are creating the group
				// redirect them back to the admin page
				$this->session->set_flashdata('message', $this->ion_auth->messages());			
				redirect("auth", 'refresh');
			}
		}
		else
		{
			// display the create group form
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['group_name'] = array(
				'name'  => 'group_name',
				'id'    => 'group_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('group_name'),
			);
			$this->data['description'] = array(
				'name'  => 'description',
				'id'    => 'description',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('description'),
			);

			$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'create_group', $this->data);
		}
	}

	/**
	 * Edit a group
	 *
	 * @param int|string $id
	 */
	public function edit_group($id)
	{
		// bail if no group id given
		if (!$id || empty($id))
		{
			redirect('auth', 'refresh');
		}

		$this->data['title'] = $this->lang->line('edit_group_title');

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}

		$group = $this->ion_auth->group($id)->row();

		// validate form input
		$this->form_validation->set_rules('group_name', $this->lang->line('edit_group_validation_name_label'), 'required|alpha_dash');

		if (isset($_POST) && !empty($_POST))
		{
			if ($this->form_validation->run() === TRUE)
			{
				$group_update = $this->ion_auth->update_group($id, $_POST['group_name'], $_POST['group_description']);

				if ($group_update)
				{
					$this->session->set_flashdata('message', $this->lang->line('edit_group_saved'));
				}
				else
				{
					$this->session->set_flashdata('message', $this->ion_auth->errors());
				}
				redirect("auth", 'refresh');
			}
		}

		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		// pass the user to the view
		$this->data['group'] = $group;

		$readonly = $this->config->item('admin_group', 'ion_auth') === $group->name ? 'readonly' : '';

		$this->data['group_name'] = array(
			'name'    => 'group_name',
			'id'      => 'group_name',
			'type'    => 'text',
			'value'   => $this->form_validation->set_value('group_name', $group->name),
			$readonly => $readonly,
		);
		$this->data['group_description'] = array(
			'name'  => 'group_description',
			'id'    => 'group_description',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('group_description', $group->description),
		);

		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'edit_group', $this->data);
	}

	/**
	 * @return array A CSRF key-value pair
	 */
	public function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}

	/**
	 * @return bool Whether the posted CSRF token matches
	 */
	public function _valid_csrf_nonce(){
		$csrfkey = $this->input->post($this->session->flashdata('csrfkey'));
		if ($csrfkey && $csrfkey === $this->session->flashdata('csrfvalue')){
			return TRUE;
		}
			return FALSE;
	}

	/**
	 * @param string     $view
	 * @param array|null $data
	 * @param bool       $returnhtml
	 *
	 * @return mixed
	 */
	public function _render_page($view, $data = NULL, $returnhtml = FALSE)//I think this makes more sense
	{

		$this->viewdata = (empty($data)) ? $this->data : $data;

		$view_html = $this->load->view($view, $this->viewdata, $returnhtml);

		// This will return html on 3rd argument being true
		if ($returnhtml)
		{
			return $view_html;
		}
	}
}