<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <?php include 'partials/topbar.php'; ?>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <?php include 'partials/navbar.php'; ?> 
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="index.php">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Checkout</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input class="form-control" type="text" placeholder="John">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Last Name</label>
                            <input class="form-control" type="text" placeholder="Doe">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" placeholder="example@email.com">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" type="text" placeholder="+123 456 789">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 1</label>
                            <input class="form-control" type="text" placeholder="123 Street">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 2</label>
                            <input class="form-control" type="text" placeholder="123 Street">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Country</label>
                            <select class="custom-select">
                                <option selected>United States</option>
                                <option>Afghanistan</option>
                                <option>Albania</option>
                                <option>Algeria</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input class="form-control" type="text" placeholder="New York">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>State</label>
                            <input class="form-control" type="text" placeholder="New York">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>ZIP Code</label>
                            <input class="form-control" type="text" placeholder="123">
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="newaccount">
                                <label class="custom-control-label" for="newaccount">Create an account</label>
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="shipto">
                                <label class="custom-control-label" for="shipto"  data-toggle="collapse" data-target="#shipping-address">Ship to different address</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="collapse mb-4" id="shipping-address">
                    <h4 class="font-weight-semi-bold mb-4">Shipping Address</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input class="form-control" type="text" placeholder="John">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Last Name</label>
                            <input class="form-control" type="text" placeholder="Doe">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" placeholder="example@email.com">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" type="text" placeholder="+123 456 789">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 1</label>
                            <input class="form-control" type="text" placeholder="123 Street">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 2</label>
                            <input class="form-control" type="text" placeholder="123 Street">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Country</label>
                            <select class="custom-select">
                                <option selected>United States</option>
                                <option>Afghanistan</option>
                                <option>Albania</option>
                                <option>Algeria</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input class="form-control" type="text" placeholder="New York">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>State</label>
                            <input class="form-control" type="text" placeholder="New York">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>ZIP Code</label>
                            <input class="form-control" type="text" placeholder="123">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">Products</h5>
                        <div class="d-flex justify-content-between">
                            <p>Colorful Stylish Shirt 1</p>
                            <p>$150</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Colorful Stylish Shirt 2</p>
                            <p>$150</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Colorful Stylish Shirt 3</p>
                            <p>$150</p>
                        </div>
                        <hr class="mt-0">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">$150</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">$160</h5>
                        </div>
                    </div>
                </div>
                <div class="card border-secondary mb-5">
    <div class="card border-secondary mb-5">
    <div class="card-header bg-secondary border-0">
        <h4 class="font-weight-semi-bold m-0">Payment</h4>
    </div>
    <div class="card-body p-0">
        
        <div class="accordion" id="paymentAccordion">
            
            <div class="card-category-payment border-bottom-0">
                <div class="card-header-payment p-3" id="headingEwallet" data-toggle="collapse" data-target="#collapseEwallet" aria-expanded="true" aria-controls="collapseEwallet" role="button">
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
                    <div class="custom-control custom-radio d-inline-block w-100">
                        <input type="radio" class="custom-control-input payment-radio" name="payment" id="cod" value="cod">
                        <label class="custom-control-label font-weight-semi-bold" for="cod">COD (Cash On Delivery)</label>
                    </div>
                </div>
                <div id="collapseCod" class="collapse" aria-labelledby="headingCod" data-parent="#paymentAccordion">
                    </div>
            </div>
        </div>
    </div>
    </div>
            <form id="paymentForm" action="payment_instruction.php" method="GET">
                <input type="hidden" name="method" id="selectedMethod">
                <input type="hidden" name="bank" id="selectedBank">
                <input type="hidden" name="ewallet" id="selectedEwallet">

                <div class="card-footer border-secondary bg-transparent">
                    <button type="submit" id="orderNowBtn" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">
                        Order Now
                    </button>
                </div>
            </form>
            </div>
    </div>
</div>
</div>

            <!-- CSS styling biar jaraknya rapih -->
            <style>
                .custom-control.payment-option {
                    margin-bottom: 0.45rem !important; /* jarak antar radio */
                }

                .card-body .form-group {
                    margin-bottom: 0.4rem !important; /* jarak antar grup */
                }

                /* Opsional: biar semua label payment keliatan sejajar */
                .custom-control-label {
                    font-size: 1.1rem;
                    color: #555;
                }
            </style>

            </div>
        </div>
    </div>
    <!-- Checkout End -->


    <!-- Footer Start -->
    <?php include 'partials/footer.php'; ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

<script>
    $(document).ready(function() {
        // 1. Pilih radio button kategori saat header di-klik
        $('.card-header-payment').on('click', function(e) {
            // Cek apakah yang di-klik adalah radio button itu sendiri
            if (!$(e.target).is('input[type="radio"]') && !$(e.target).is('label.custom-control-label')) {
                // Cari radio button yang bersangkutan
                const $radio = $(this).find('input.payment-radio');
                
                // Ceklis radio button kategori ini
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
            // hanya jika collapse ini memiliki sub-opsi
            if ($targetCollapse.find('input[type="radio"]').length > 0) {
                 $targetCollapse.find('input[type="radio"]:first').prop('checked', true);
            }
        });

        // 3. Pastikan radio button utama (kategori) terpilih saat sub-opsi dipilih
        $('#paymentAccordion input[name$="_option"]').on('change', function() {
            // Cari radio button kategori di atasnya dan ceklis
            $(this).closest('.collapse').prev('.card-header-payment')
                   .find('input.payment-radio').prop('checked', true);
        });
        
        // Inisialisasi: Tutup semua collapse saat halaman dimuat
        $('#paymentAccordion .collapse').collapse('hide');
    });
</script>
</script>

</body>
</html>

</body>

</html>