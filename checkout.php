<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Effort Outdoor - Checkout</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Effort Outdoor Ecommerce" name="keywords">
    <meta content="Modern checkout for Effort Outdoor" name="description">

    <!-- Favicon -->
    <link href="img/logo.jpg" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        body {
            background: #fff;
            font-family: 'Poppins', sans-serif;
        }
        .checkout-container {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            overflow: hidden;
            margin: 30px 0;
        }
        .order-total-card {
            background: linear-gradient(135deg, #bbd197 0%, #a8c085 100%);
            color: white;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
        .order-total-card .card-header {
            background: rgba(255,255,255,0.1);
            border: none;
            border-radius: 15px 15px 0 0;
        }
        .order-total-card .card-body {
            background: rgba(255,255,255,0.05);
        }
        .order-total-card .card-footer {
            background: rgba(255,255,255,0.1);
            border-radius: 0 0 15px 15px;
            border: none;
        }
        .billing-card {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .billing-card .card-header {
            background: linear-gradient(135deg, #bbd197 0%, #a8c085 100%);
            color: white;
            border: none;
            border-radius: 15px 15px 0 0;
        }
        .shipping-card {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .shipping-card .card-header {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            border: none;
            border-radius: 15px 15px 0 0;
        }
        .payment-card {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .payment-card .card-header {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            color: white;
            border: none;
            border-radius: 15px 15px 0 0;
        }
        .card-header-payment {
            cursor: pointer;
            border-bottom: 1px solid #dee2e6;
            padding: 1rem;
            border-radius: 10px;
            background: #fff;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
        }
        .card-header-payment:hover {
            background-color: #f8f9fa;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transform: translateY(-2px);
        }
        .card-header-payment .method-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: #fff;
            font-size: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }
        .card-category-payment + .card-category-payment { margin-top: 10px; }
        .payment-method-card.selected {
            box-shadow: 0 8px 25px rgba(79,172,254,0.15);
            border-radius: 12px;
            border: 2px solid #4facfe;
        }
        .payment-summary {
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            border: 1px solid #90caf9;
            padding: 20px;
            border-radius: 12px;
            margin: 20px 0;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .payment-summary .small { font-size: 0.9rem; color: #424242; }
        .btn-order-now {
            background: #bbd197;
            border: none;
            border-radius: 25px;
            padding: 15px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(187,209,151,0.3);
        }
        .btn-order-now:hover {
            background: #a8c085;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(168,192,133,0.4);
        }
        .form-control {
            border-radius: 10px;
            border: 1px solid #ddd;
            padding: 10px 15px;
            transition: border-color 0.3s ease;
        }
        .form-control:focus {
            border-color: #4facfe;
            box-shadow: 0 0 0 0.2rem rgba(79,172,254,0.25);
        }
        .custom-select {
            border-radius: 10px;
            border: 1px solid #ddd;
            padding: 7px 15px;
        }
        .custom-control-label {
            font-size: 1rem;
            color: #555;
            cursor: pointer;
        }
        .collapse-icon {
            transition: transform 0.3s ease;
        }
        .card-category-payment .collapse.show ~ .card-header-payment .collapse-icon {
            transform: rotate(180deg);
        }
    </style>
</head>

<body>
    <?php include 'partials/topbar.php'; ?>
    <?php include 'partials/navbar.php'; ?>
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">

            <div class="col-lg-8">

                <div class="card border-0 mb-5" style="background: linear-gradient(135deg, #bbd197 0%, #a8c085 100%); color: white; border-radius: 20px; box-shadow: 0 10px 40px rgba(187,209,151,0.3);">
                    <div class="card-header border-0" style="background: rgba(255,255,255,0.1); border-radius: 20px 20px 0 0;">
                        <h4 class="font-weight-semi-bold m-0"><i class="fas fa-receipt mr-2"></i>Order Total</h4>
                    </div>
                    <div class="card-body" style="background: rgba(255,255,255,0.05);">
                        <h5 class="font-weight-medium mb-3">Products</h5>
                        <div class="d-flex justify-content-between">
                            <p>Colorful Stylish Shirt 1</p>
                            <p>Rp 150.000</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Colorful Stylish Shirt 2</p>
                            <p>Rp 150.000</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Colorful Stylish Shirt 3</p>
                            <p>Rp 150.000</p>
                        </div>
                        <hr class="mt-0" style="border-color: rgba(255,255,255,0.3);">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">Rp 450.000</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">Rp 20.000</h6>
                        </div>
                    </div>
                    <div class="card-footer border-0" style="background: rgba(255,255,255,0.1); border-radius: 0 0 20px 20px;">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">Rp 490.000</h5>
                        </div>
                    </div>
                </div>

                <div class="card border-0 mb-4" style="background: #fff; border-radius: 15px; box-shadow: 0 4px 20px rgba(0,0,0,0.1);">
                    <div class="card-header bg-secondary border-0" style="border-radius: 15px 15px 0 0;">
                        <h4 class="font-weight-semi-bold m-0"><i class="fas fa-map-marker-alt mr-2"></i>Billing Address</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="font-weight-medium">Pilih Alamat</label>
                            <select class="custom-select" id="billingAddressDropdown">
                                <option value="default" selected>Alamat Default (John Doe, 123 Street, New York, US)</option>
                                <option value="address1">Alamat 1 (Jane Smith, 456 Avenue, Los Angeles, US)</option>
                                <option value="address2">Alamat 2 (Office, 789 Road, Chicago, US)</option>
                                <option value="new">Pilih Alamat Lain / Tambahkan Alamat Baru</option>
                            </select>
                        </div>

                        <div id="newAddressForm" style="display: none;">
                            <hr style="border-color: rgba(0,0,0,0.1);">
                            <h6 class="font-weight-medium mb-3">Tambahkan Alamat Baru</h6>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label>First Name</label>
                                    <input class="form-control" type="text" placeholder="John">
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>Last Name</label>
                                    <input class="form-control" type="text" placeholder="Doe">
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>E-mail</label>
                                    <input class="form-control" type="text" placeholder="example@email.com">
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>Mobile No</label>
                                    <input class="form-control" type="text" placeholder="+123 456 789">
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>Address Line 1</label>
                                    <input class="form-control" type="text" placeholder="123 Street">
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>Address Line 2</label>
                                    <input class="form-control" type="text" placeholder="Apartment, Studio, or Floor">
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>Country</label>
                                    <select class="custom-select">
                                        <option selected>United States</option>
                                        <option>Indonesia</option>
                                        <option>Malaysia</option>
                                    </select>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>City</label>
                                    <input class="form-control" type="text" placeholder="New York">
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>State</label>
                                    <input class="form-control" type="text" placeholder="NY">
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>ZIP Code</label>
                                    <input class="form-control" type="text" placeholder="10001">
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="saveAddress">
                                        <label class="custom-control-label" for="saveAddress">Simpan alamat ini</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr style="border-color: rgba(0,0,0,0.1);">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="newaccount">
                                    <label class="custom-control-label" for="newaccount">Create an account</label>
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="shipto">
                                    <label class="custom-control-label" for="shipto" data-toggle="collapse" data-target="#shipping-address">Ship to different address</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="collapse mb-4" id="shipping-address">
                    <div class="card border-0" style="background: #fff; border-radius: 15px; box-shadow: 0 4px 20px rgba(0,0,0,0.1);">
                        <div class="card-header bg-secondary border-0" style="border-radius: 15px 15px 0 0;">
                            <h4 class="font-weight-semi-bold m-0"><i class="fas fa-truck mr-2"></i>Shipping Address</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 form-group"><label>First Name</label><input class="form-control" type="text" placeholder="John"></div>
                                <div class="col-md-6 form-group"><label>Last Name</label><input class="form-control" type="text" placeholder="Doe"></div>
                                <div class="col-md-6 form-group"><label>E-mail</label><input class="form-control" type="text" placeholder="example@email.com"></div>
                                <div class="col-md-6 form-group"><label>Mobile No</label><input class="form-control" type="text" placeholder="+123 456 789"></div>
                                <div class="col-md-6 form-group"><label>Address Line 1</label><input class="form-control" type="text" placeholder="456 Avenue"></div>
                                <div class="col-md-6 form-group"><label>Address Line 2</label><input class="form-control" type="text" placeholder="Apartment, Studio, or Floor"></div>
                                <div class="col-md-6 form-group">
                                    <label>Country</label>
                                    <select class="custom-select"><option selected>United States</option></select>
                                </div>
                                <div class="col-md-6 form-group"><label>City</label><input class="form-control" type="text" placeholder="Los Angeles"></div>
                                <div class="col-md-6 form-group"><label>State</label><input class="form-control" type="text" placeholder="CA"></div>
                                <div class="col-md-6 form-group"><label>ZIP Code</label><input class="form-control" type="text" placeholder="90001"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Payment</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="accordion" id="paymentAccordion">

                            <div class="card-category-payment border-bottom-0">
                                <div class="card-header-payment p-3" id="headingEwallet" data-toggle="collapse" data-target="#collapseEwallet" aria-expanded="true" aria-controls="collapseEwallet" role="button">
                                    <div class="method-icon" style="background: linear-gradient(135deg, #00d2d3 0%, #54a0ff 100%);">
                                        <i class="fas fa-wallet"></i>
                                    </div>
                                    <div class="custom-control custom-radio d-inline-block w-100">
                                        <input type="radio" class="custom-control-input payment-radio" name="payment" id="ewallet" value="ewallet">
                                        <label class="custom-control-label font-weight-semi-bold" for="ewallet">E-Wallet (Dompet Digital)</label>
                                        <i class="fas fa-chevron-down float-right collapse-icon"></i>
                                    </div>
                                </div>
                                <div id="collapseEwallet" class="collapse" aria-labelledby="headingEwallet" data-parent="#paymentAccordion">
                                    <div class="card-body-payment px-4 pb-3 pt-0 ml-4">
                                        <h6 class="font-weight-medium mb-2">Pilih E-Wallet:</h6>
                                        <div class="custom-control custom-radio mb-2">
                                            <input type="radio" class="custom-control-input" name="ewallet_option" id="gopay" value="GoPay">
                                            <label class="custom-control-label" for="gopay">GoPay</label>
                                        </div>
                                        <div class="custom-control custom-radio mb-2">
                                            <input type="radio" class="custom-control-input" name="ewallet_option" id="ovo" value="OVO">
                                            <label class="custom-control-label" for="ovo">OVO</label>
                                        </div>
                                        <div class="custom-control custom-radio mb-2">
                                            <input type="radio" class="custom-control-input" name="ewallet_option" id="dana" value="DANA">
                                            <label class="custom-control-label" for="dana">DANA</label>
                                        </div>
                                        <div class="custom-control custom-radio mb-2">
                                            <input type="radio" class="custom-control-input" name="ewallet_option" id="shopeepay" value="ShopeePay">
                                            <label class="custom-control-label" for="shopeepay">ShopeePay</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-category-payment border-bottom-0 border-top">
                                <div class="card-header-payment p-3" id="headingMbanking" data-toggle="collapse" data-target="#collapseMbanking" aria-expanded="false" aria-controls="collapseMbanking" role="button">
                                    <div class="method-icon" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                                        <i class="fas fa-university"></i>
                                    </div>
                                    <div class="custom-control custom-radio d-inline-block w-100">
                                        <input type="radio" class="custom-control-input payment-radio" name="payment" id="mbanking" value="mbanking">
                                        <label class="custom-control-label font-weight-semi-bold" for="mbanking">M-Banking (Transfer Bank)</label>
                                        <i class="fas fa-chevron-down float-right collapse-icon"></i>
                                    </div>
                                </div>
                                <div id="collapseMbanking" class="collapse" aria-labelledby="headingMbanking" data-parent="#paymentAccordion">
                                    <div class="card-body-payment px-4 pb-3 pt-0 ml-4">
                                        <h6 class="font-weight-medium mb-2">Pilih Bank:</h6>
                                        <div class="custom-control custom-radio mb-2">
                                            <input type="radio" class="custom-control-input" name="mbanking_option" id="bca" value="BCA">
                                            <label class="custom-control-label" for="bca">BCA</label>
                                        </div>
                                        <div class="custom-control custom-radio mb-2">
                                            <input type="radio" class="custom-control-input" name="mbanking_option" id="mandiri" value="Mandiri">
                                            <label class="custom-control-label" for="mandiri">Mandiri</label>
                                        </div>
                                        <div class="custom-control custom-radio mb-2">
                                            <input type="radio" class="custom-control-input" name="mbanking_option" id="bni" value="BNI">
                                            <label class="custom-control-label" for="bni">BNI</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-category-payment border-bottom-0 border-top">
                                <div class="card-header-payment p-3" id="headingQris" data-toggle="collapse" data-target="#collapseQris" aria-expanded="false" aria-controls="collapseQris" role="button">
                                    <div class="method-icon" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                                        <i class="fas fa-qrcode"></i>
                                    </div>
                                    <div class="custom-control custom-radio d-inline-block w-100">
                                        <input type="radio" class="custom-control-input payment-radio" name="payment" id="qris" value="qris">
                                        <label class="custom-control-label font-weight-semi-bold" for="qris">QRIS (Semua Pembayaran QR)</label>
                                        <i class="fas fa-chevron-down float-right collapse-icon"></i>
                                    </div>
                                </div>
                                <div id="collapseQris" class="collapse" aria-labelledby="headingQris" data-parent="#paymentAccordion">
                                    <div class="card-body-payment px-4 pb-3 pt-0 ml-4">
                                        <h6 class="font-weight-medium mb-2">Metode Pembayaran:</h6>
                                        <div class="custom-control custom-radio mb-2">
                                            <input type="radio" class="custom-control-input" name="qris_option" id="qris-payment" value="QRIS">
                                            <label class="custom-control-label" for="qris-payment">Bayar dengan QRIS</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-category-payment border-top">
                                <div class="card-header-payment p-3" id="headingCod" data-toggle="collapse" data-target="#collapseCod" aria-expanded="false" aria-controls="collapseCod" role="button">
                                    <div class="method-icon" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                                        <i class="fas fa-hand-holding-usd"></i>
                                    </div>
                                    <div class="custom-control custom-radio d-inline-block w-100">
                                        <input type="radio" class="custom-control-input payment-radio" name="payment" id="cod" value="cod">
                                        <label class="custom-control-label font-weight-semi-bold" for="cod">COD (Cash On Delivery)</label>
                                        <i class="fas fa-chevron-down float-right collapse-icon"></i>
                                    </div>
                                </div>
                                <div id="collapseCod" class="collapse" aria-labelledby="headingCod" data-parent="#paymentAccordion">
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payment Summary (shows current choice and amount) -->
                <div id="paymentSummary" class="payment-summary text-center small">
                    <div><strong id="psMethod">Belum memilih metode</strong></div>
                    <div id="psDetail" class="mt-1">Pilih opsi pembayaran untuk melihat instruksi.</div>
                    <div class="mt-2"><small>Nominal: <span id="psAmount">$160</span></small></div>
                </div>

                <form id="paymentForm" action="payment_instruction.php" method="GET">
                    <input type="hidden" name="method" id="selectedMethod">
                        <input type="hidden" name="bank" id="selectedBank">
                        <input type="hidden" name="ewallet" id="selectedEwallet">
                        <input type="hidden" name="qrcode" id="selectedQrcode">
                        <input type="hidden" name="amount" id="selectedAmount">
                    <div class="card-footer border-secondary bg-transparent">
                        <button type="submit" id="orderNowBtn" class="btn-order-now btn btn-lg btn-block font-weight-bold my-3 py-3">
                            <i class="fas fa-shopping-cart mr-2"></i>Order Now
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include 'partials/footer.php'; ?>
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
    <script>
        $(document).ready(function() {
            // --- Logika Payment Accordion (Sesuai Kode Anda) ---

            // 1. Pilih radio button kategori saat header di-klik
            $('.card-header-payment').on('click', function(e) {
                if (!$(e.target).is('input[type="radio"]') && !$(e.target).is('label.custom-control-label') && !$(e.target).is('.collapse-icon')) {
                    const $radio = $(this).find('input.payment-radio');
                    $radio.prop('checked', true).trigger('change');
                }
            });

            // 2. Event saat sebuah collapse dibuka (show.bs.collapse)
            $('#paymentAccordion').on('show.bs.collapse', function(e) {
                const $targetCollapse = $(e.target);

                // Uncheck semua radio button sub-opsi di collapse yang sedang ditutup
                $('#paymentAccordion .collapse.show').each(function() {
                    if (this !== e.target) {
                        $(this).find('input[type="radio"]').prop('checked', false);
                    }
                });

                // Atur radio button sub-opsi pertama menjadi terpilih secara default
                if ($targetCollapse.find('input[type="radio"]').length > 0) {
                    $targetCollapse.find('input[type="radio"]:first').prop('checked', true);
                }
            });

            // 3. Pastikan radio button utama (kategori) terpilih saat sub-opsi dipilih
            $('#paymentAccordion input[name$="_option"]').on('change', function() {
                $(this).closest('.collapse').prev('.card-header-payment')
                    .find('input.payment-radio').prop('checked', true);
            });

            // Inisialisasi: Tutup semua collapse saat halaman dimuat
            $('#paymentAccordion .collapse').collapse('hide');

            // --- Logika Billing Address (untuk mengisi kekosongan) ---
            const $newAddressForm = $('#newAddressForm');

            // Logika untuk menampilkan/menyembunyikan form alamat penagihan baru
            $('#billingAddressDropdown').on('change', function() {
                if ($(this).val() === 'new') {
                    // Tampilkan form alamat baru jika opsi 'new' dipilih
                    $newAddressForm.slideDown();
                } else {
                    // Sembunyikan form alamat jika alamat tersimpan dipilih
                    $newAddressForm.slideUp();
                }
            }).trigger('change'); // Trigger saat load untuk memastikan status awal

            // --- Payment selection behavior ---

            // initialize selected values
            $('#selectedMethod').val('');
            $('#selectedBank').val('');
            $('#selectedEwallet').val('');
            $('#selectedQrcode').val('');

            // set order amount from summary (if available) so it can be passed to payment_instruction
            try {
                const totalText = $('.col-lg-8 .card-footer .font-weight-bold').last().text().trim();
                if (totalText) $('#selectedAmount').val(totalText);
            } catch (err) { /* ignore */ }

            // when main payment radio changes: set method and for qris set default qrcode path
            function updateSummaryAndHighlight() {
                const method = ($('#selectedMethod').val() || $('input.payment-radio:checked').val() || '').trim();
                const bank = ($('#selectedBank').val() || $('input[name="mbanking_option"]:checked').val() || '').trim();
                const ewallet = ($('#selectedEwallet').val() || $('input[name="ewallet_option"]:checked').val() || '').trim();
                const qrcode = ($('#selectedQrcode').val() || '').trim();
                const amount = ($('#selectedAmount').val() || $('.col-lg-8 .card-footer .font-weight-bold').last().text().trim() || '$0').trim();

                // friendly method text
                let methodText = 'Belum memilih metode';
                let detailText = '';
                if (method === 'mbanking') {
                    methodText = 'Transfer Bank';
                    detailText = bank ? bank : 'Pilih bank (BCA/Mandiri/BNI)';
                } else if (method === 'ewallet') {
                    methodText = 'E-Wallet';
                    detailText = ewallet ? ewallet : 'Pilih e-wallet (GoPay/OVO/DANA/ShopeePay)';
                } else if (method === 'qris') {
                    methodText = 'QRIS';
                    detailText = 'Bayar dengan scan QR';
                } else if (method === 'cod') {
                    methodText = 'Cash on Delivery';
                    detailText = 'Bayar ke kurir saat terima pesanan';
                }

                $('#psMethod').text(methodText);
                $('#psDetail').text(detailText);
                $('#psAmount').text(amount);

                // highlight selected card
                $('#paymentAccordion .card-category-payment').removeClass('selected');
                const checkedMain = $('input.payment-radio:checked');
                if (checkedMain.length) {
                    checkedMain.closest('.card-category-payment').addClass('selected');
                }
            }

            $('input.payment-radio').on('change', function() {
                const method = $(this).val();
                $('#selectedMethod').val(method);
                if (method === 'qris') {
                    $('#selectedQrcode').val('img/qris.png');
                } else {
                    // clear qrcode for other methods
                    $('#selectedQrcode').val('');
                }
                updateSummaryAndHighlight();
            });

            // sub-option handlers
            $('input[name="ewallet_option"]').on('change', function() {
                const val = $(this).val();
                $('#selectedEwallet').val(val);
                $('#selectedMethod').val('ewallet');
                $('#ewallet').prop('checked', true);
                updateSummaryAndHighlight();
            });

            $('input[name="mbanking_option"]').on('change', function() {
                const val = $(this).val();
                $('#selectedBank').val(val);
                $('#selectedMethod').val('mbanking');
                $('#mbanking').prop('checked', true);
                updateSummaryAndHighlight();
            });

            $('input[name="qris_option"]').on('change', function() {
                $('#selectedMethod').val('qris');
                $('#selectedQrcode').val('img/qris.png');
                updateSummaryAndHighlight();
            });

            // when clicking header ensure main radio is selected
            $('.card-header-payment').on('click', function() {
                const $r = $(this).find('input.payment-radio');
                if ($r.length) {
                    $r.prop('checked', true).trigger('change');
                }
            });

            // validate before submit and ensure hidden fields are set
            $('#paymentForm').on('submit', function(e) {
                const method = ($('#selectedMethod').val() || $('input.payment-radio:checked').val() || '').trim();
                const bank = ($('#selectedBank').val() || $('input[name="mbanking_option"]:checked').val() || '').trim();
                const ewallet = ($('#selectedEwallet').val() || $('input[name="ewallet_option"]:checked').val() || '').trim();

                if (!method) {
                    alert('Pilih metode pembayaran terlebih dahulu');
                    e.preventDefault();
                    return false;
                }

                if (method === 'mbanking' && !bank) {
                    alert('Silakan pilih bank untuk transfer (BCA/Mandiri/BNI)');
                    e.preventDefault();
                    return false;
                }

                if (method === 'ewallet' && !ewallet) {
                    alert('Silakan pilih e-wallet (GoPay/OVO/DANA/ShopeePay)');
                    e.preventDefault();
                    return false;
                }

                // set hidden inputs (redundant guard)
                $('#selectedMethod').val(method);
                $('#selectedBank').val(bank);
                $('#selectedEwallet').val(ewallet);

                // ensure amount is set (read again as fallback)
                try {
                    const totalText = $('.col-lg-8 .card-footer .font-weight-bold').last().text().trim();
                    if (totalText && !$('#selectedAmount').val()) $('#selectedAmount').val(totalText);
                } catch (err) {}

                // allow submit to payment_instruction.php which can handle the params
            });

            // run initial summary update
            updateSummaryAndHighlight();
        });
    </script>

</body>

</html>