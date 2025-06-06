<!doctype html>
<html>
    <head>
        <title>Data User</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Users List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
				<th>IP Address</th>
				<th>Username</th>
				<th>Password</th>
				<th>Salt</th>
				<th>Email</th>
				<th>Activation Code</th>
				<th>Forgotten Password Code</th>
				<th>Forgotten Password Time</th>
				<th>Remember Code</th>
				<th>Created On</th>
				<th>Last Login</th>
				<th>Active</th>
				<th>Full Name</th>
				<th>Company</th>
				<th>Phone</th>
			</tr>
			<?php
            foreach ($users_data as $users)
            { ?>
            <tr>
		      	<td><?php echo ++$start ?></td>
		      	<td><?php echo $users->ip_address ?></td>
		      	<td><?php echo $users->username ?></td>
		      	<td><?php echo $users->password ?></td>
		      	<td><?php echo $users->salt ?></td>
		      	<td><?php echo $users->email ?></td>
		      	<td><?php echo $users->activation_code ?></td>
		      	<td><?php echo $users->forgotten_password_code ?></td>
		      	<td><?php echo $users->forgotten_password_time ?></td>
		      	<td><?php echo $users->remember_code ?></td>
		      	<td><?php echo $users->created_on ?></td>
		      	<td><?php echo $users->last_login ?></td>
		      	<td><?php echo $users->active ?></td>
		      	<td><?php echo $users->full_name ?></td>
		      	<td><?php echo $users->company ?></td>
		      	<td><?php echo $users->phone ?></td>	
            </tr>
            <?php } ?>
        </table>
    </body>
</html>