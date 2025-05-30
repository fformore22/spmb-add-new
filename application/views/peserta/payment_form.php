<?php
// Payment configuration
$base_fee = 500000; // Rp 500,000 base registration fee
$major_fees = [
    'IPA' => 100000,
    'IPS' => 80000,
    'BAHASA' => 75000,
    'AGAMA' => 60000,
    // Add other majors as needed
];

$school_discounts = [
    'INTERNAL' => 0.20, // 20% discount for internal schools
    'MOU' => 0.10,      // 10% discount for schools with MOU
    // Add other school types as needed
];

// Get registration data
$registration_number = isset($peserta->no_pendaftaran) ? $peserta->no_pendaftaran : '(Belum terdaftar)';
$selected_major = isset($peserta->jurusan) ? $peserta->jurusan : '';
$school_origin = isset($peserta->asal_sekolah) ? $peserta->asal_sekolah : '';
$school_type = isset($peserta->kategori_sekolah) ? $peserta->kategori_sekolah : 'REGULAR';

// Calculate recommended payment
$major_fee = isset($major_fees[$selected_major]) ? $major_fees[$selected_major] : 0;
$discount = isset($school_discounts[$school_type]) ? $school_discounts[$school_type] : 0;
$total_fee = $base_fee + $major_fee;
$discounted_amount = $total_fee * $discount;
$recommended_payment = $total_fee - $discounted_amount;
?>

<style>
/* Payment System Styling */
.payment-calculator {
    background-color: #f9f9f9;
    border-radius: 8px;
    padding: 20px;
    margin-bottom: 20px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
}

.payment-calculator .table {
    margin-bottom: 0;
}

.payment-calculator .success {
    background-color: #eafaf1;
    font-size: 16px;
}

.payment-methods {
    margin-bottom: 20px;
}

.payment-method {
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 15px 10px;
    text-align: center;
    transition: all 0.3s ease;
    cursor: pointer;
    margin-bottom: 15px;
    background-color: #fff;
}

.payment-method:hover {
    border-color: #4361ee;
    box-shadow: 0 2px 8px rgba(67, 97, 238, 0.15);
}

.payment-method.active {
    border-color: #4361ee;
    background-color: #edf2ff;
}

.payment-method input[type="radio"] {
    position: absolute;
    opacity: 0;
}

.method-icon {
    font-size: 24px;
    color: #4361ee;
    margin-bottom: 8px;
}

.method-name {
    font-weight: 500;
    font-size: 14px;
}

.payment-form {
    background-color: #fff;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
}

.payment-details {
    transition: all 0.3s ease;
}

.payment-details.hidden {
    display: none;
}

.payment-confirmation {
    text-align: center;
    margin-top: 20px;
}

.bank-accounts {
    background-color: #f9f9f9;
    border-left: 4px solid #4361ee;
    padding: 15px;
    margin-top: 20px;
    border-radius: 0 8px 8px 0;
}

/* Animated check icon for successful payment */
@keyframes checkmark {
    0% {
        transform: scale(0);
        opacity: 0;
    }
    50% {
        transform: scale(1.2);
    }
    100% {
        transform: scale(1);
        opacity: 1;
    }
}

.payment-success .success-icon {
    animation: checkmark 0.5s ease-in-out forwards;
    color: #2ecc71;
    font-size: 60px;
    display: block;
    margin: 20px auto;
}

/* Status labels */
.payment-status {
    display: inline-block;
    padding: 6px 12px;
    border-radius: 4px;
    font-weight: 500;
    font-size: 12px;
}

.status-pending {
    background-color: #fff3cd;
    color: #856404;
}

.status-verified {
    background-color: #d4edda;
    color: #155724;
}

.status-rejected {
    background-color: #f8d7da;
    color: #721c24;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .payment-form, .payment-calculator {
        padding: 15px;
    }
}
</style>

<div class="box box-primary">
    <div class="box-header bg-primary">
        <h3 class="box-title">Informasi Pembayaran</h3>
    </div>
    <div class="box-body">
        <!-- Registration Summary -->
        <div class="callout callout-info">
            <h4><i class="fa fa-info-circle"></i> Informasi Pendaftaran</h4>
            <div class="row">
                <div class="col-md-4">
                    <p><strong>Nomor Pendaftaran:</strong><br><?php echo $registration_number; ?></p>
                </div>
                <div class="col-md-4">
                    <p><strong>Jurusan:</strong><br><?php echo $selected_major; ?></p>
                </div>
                <div class="col-md-4">
                    <p><strong>Asal Sekolah:</strong><br><?php echo $school_origin; ?></p>
                </div>
            </div>
        </div>

        <!-- Payment Details -->
        <div class="row">
            <div class="col-md-8">
                <div class="payment-calculator">
                    <table class="table">
                        <tr>
                            <td>Biaya Registrasi Dasar</td>
                            <td class="text-right">Rp <?php echo number_format($base_fee, 0, ',', '.'); ?></td>
                        </tr>
                        <tr>
                            <td>Biaya Tambahan Jurusan <?php echo $selected_major; ?></td>
                            <td class="text-right">Rp <?php echo number_format($major_fee, 0, ',', '.'); ?></td>
                        </tr>
                        <?php if ($discount > 0): ?>
                        <tr>
                            <td>Diskon Asal Sekolah (<?php echo $school_type; ?>)</td>
                            <td class="text-right">- Rp <?php echo number_format($discounted_amount, 0, ',', '.'); ?></td>
                        </tr>
                        <?php endif; ?>
                        <tr class="success">
                            <td><strong>Total Pembayaran</strong></td>
                            <td class="text-right"><strong>Rp <?php echo number_format($recommended_payment, 0, ',', '.'); ?></strong></td>
                        </tr>
                    </table>
                </div>

                <div class="payment-methods">
                    <h4>Metode Pembayaran</h4>
                    <div class="row">
                        <div class="col-xs-4">
                            <div class="payment-method" data-method="transfer">
                                <input type="radio" name="payment_method" id="method_transfer" value="transfer" checked>
                                <label for="method_transfer">
                                    <div class="method-icon"><i class="fa fa-university"></i></div>
                                    <div class="method-name">Transfer Bank</div>
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="payment-method" data-method="cash">
                                <input type="radio" name="payment_method" id="method_cash" value="cash">
                                <label for="method_cash">
                                    <div class="method-icon"><i class="fa fa-money"></i></div>
                                    <div class="method-name">Tunai</div>
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="payment-method" data-method="online">
                                <input type="radio" name="payment_method" id="method_online" value="online">
                                <label for="method_online">
                                    <div class="method-icon"><i class="fa fa-credit-card"></i></div>
                                    <div class="method-name">Online</div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="payment-form">
                    <div class="form-group">
                        <label for="payment_amount">Jumlah Pembayaran <span style="color:red;">*</span></label>
                        <div class="input-group">
                            <span class="input-group-addon">Rp</span>
                            <input type="number" class="form-control" id="payment_amount" name="payment_amount" 
                                   placeholder="Masukkan jumlah pembayaran" value="<?php echo $recommended_payment; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="payment_date">Tanggal Pembayaran <span style="color:red;">*</span></label>
                        <input type="date" class="form-control" id="payment_date" name="payment_date" 
                               value="<?php echo date('Y-m-d'); ?>">
                    </div>

                    <div class="form-group payment-details transfer-details">
                        <label for="bank_name">Nama Bank <span style="color:red;">*</span></label>
                        <input type="text" class="form-control" id="bank_name" name="bank_name" 
                               placeholder="Contoh: BCA, Mandiri, BRI">
                    </div>

                    <div class="form-group payment-details transfer-details">
                        <label for="account_number">Nomor Rekening <span style="color:red;">*</span></label>
                        <input type="text" class="form-control" id="account_number" name="account_number" 
                               placeholder="Nomor rekening pengirim">
                    </div>

                    <div class="form-group payment-details transfer-details">
                        <label for="account_name">Nama Pemilik Rekening <span style="color:red;">*</span></label>
                        <input type="text" class="form-control" id="account_name" name="account_name" 
                               placeholder="Nama pemilik rekening">
                    </div>
                    
                    <div class="form-group">
                        <label for="payment_notes">Keterangan Pembayaran</label>
                        <textarea class="form-control" id="payment_notes" name="payment_notes" rows="3" 
                                  placeholder="Tambahkan catatan pembayaran jika perlu"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="payment_proof">Bukti Pembayaran <span style="color:red;">*</span></label>
                        <input type="file" id="payment_proof" name="payment_proof" accept="image/*" class="form-control">
                        <p class="help-block">Upload bukti transfer/pembayaran (JPG, PNG)</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-xs-12">
                <hr>
                <div class="payment-confirmation">
                    <button type="button" class="btn btn-primary btn-lg" id="submit_payment">
                        <i class="fa fa-check-circle"></i> Konfirmasi Pembayaran
                    </button>
                    <button type="button" class="btn btn-default" id="save_draft">
                        <i class="fa fa-save"></i> Simpan Draft
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Payment method selection
    $('.payment-method').on('click', function() {
        // Update active state
        $('.payment-method').removeClass('active');
        $(this).addClass('active');
        
        // Select the radio
        $(this).find('input[type="radio"]').prop('checked', true);
        
        // Show/hide relevant payment details based on selected method
        var method = $(this).data('method');
        $('.payment-details').addClass('hidden');
        $('.' + method + '-details').removeClass('hidden');
    });
    
    // Initialize - select first payment method
    $('.payment-method:first').click();
    
    // Payment amount validation
    $('#payment_amount').on('input', function() {
        var amount = $(this).val();
        var recommendedAmount = <?php echo $recommended_payment; ?>;
        
        if (amount < recommendedAmount) {
            // Show warning for less than recommended amount
            if (!$('#payment_warning').length) {
                $(this).after('<div id="payment_warning" class="text-warning" style="margin-top: 5px;"><small><i class="fa fa-exclamation-triangle"></i> Jumlah kurang dari yang direkomendasikan</small></div>');
            }
        } else {
            // Remove warning if amount is sufficient
            $('#payment_warning').remove();
        }
    });
    
    // Form validation before submit
    $('#submit_payment').click(function() {
        var isValid = true;
        var errorFields = [];
        
        // Check required fields
        $('input[required], select[required]').each(function() {
            if (!$(this).val()) {
                isValid = false;
                errorFields.push($(this).attr('id'));
                $(this).addClass('is-invalid');
            } else {
                $(this).removeClass('is-invalid');
            }
        });
        
        // Additional validation for payment method specific fields
        var method = $('input[name="payment_method"]:checked').val();
        
        if (method === 'transfer') {
            if (!$('#bank_name').val() || !$('#account_number').val() || !$('#account_name').val()) {
                isValid = false;
                $('#bank_name, #account_number, #account_name').each(function() {
                    if (!$(this).val()) {
                        $(this).addClass('is-invalid');
                    }
                });
            }
        }
        
        if (!$('#payment_proof').val()) {
            isValid = false;
            $('#payment_proof').addClass('is-invalid');
        }
        
        if (isValid) {
            // Show success message (in a real app, this would submit the form via AJAX)
            submitPaymentForm();
        } else {
            // Show error message
            Swal.fire({
                title: 'Form Belum Lengkap',
                text: 'Harap isi semua kolom yang wajib diisi.',
                icon: 'error',
                confirmButtonColor: '#4361ee'
            });
        }
    });
    
    // Function to handle form submission
    function submitPaymentForm() {
        // In a real application, you would submit the form via AJAX here
        // For demo purposes, show a success message
        
        Swal.fire({
            title: 'Pembayaran Berhasil!',
            html: '<div class="payment-success"><i class="fa fa-check-circle success-icon"></i>' +
                  '<p>Pembayaran Anda telah diterima dan akan segera diverifikasi.</p>' +
                  '<p>Nomor Referensi: <strong>PAY-' + Math.floor(Math.random() * 1000000) + '</strong></p></div>',
            icon: 'success',
            showConfirmButton: true,
            confirmButtonColor: '#4361ee',
            confirmButtonText: 'Lihat Status Pembayaran'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect to payment status page (in real app)
                // window.location.href = 'payment_status.php?id=' + paymentId;
            }
        });
    }
    
    // Save draft functionality
    $('#save_draft').click(function() {
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Draft pembayaran tersimpan',
            showConfirmButton: false,
            timer: 1500
        });
    });
});
</script>