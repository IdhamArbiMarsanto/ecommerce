<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - Checkout</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <link href="img/favicon.ico" rel="icon">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">

    <style>
            /* (QR preview moved to payment_instruction.php) */
        .custom-control.payment-option {
            margin-bottom: 0.45rem !important;
        }

        .card-body .form-group {
            margin-bottom: 0.4rem !important;
        }

        .custom-control-label {
            font-size: 1.1rem;
            color: #555;
        }

        /* Styling tambahan untuk header payment agar terlihat seperti tombol */
        .card-header-payment {
            cursor: pointer;
            border-bottom: 1px solid #dee2e6;
            padding: 1rem;
            border-radius: 8px;
            background: #fff;
            transition: box-shadow .15s ease, transform .08s ease;
            display: flex;
            align-items: center;
        }

        .card-header-payment:hover {
            background-color: #f8f9fa;
            box-shadow: 0 2px 10px rgba(0,0,0,0.03);
            transform: translateY(-1px);
        }

        .card-header-payment .method-icon {
            width: 42px;
            height: 42px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            color: #fff;
            font-size: 18px;
        }

        .card-category-payment + .card-category-payment { margin-top: 8px; }

        .payment-method-card { padding: 0.5rem; }
        .payment-method-card.selected { box-shadow: 0 6px 18px rgba(47,122,62,0.08); border-radius: 10px; }

        .payment-summary {
            background: #f7f9fb;
            border: 1px solid #e6eef4;
            padding: 12px 16px;
            border-radius: 8px;
            margin: 12px 0;
        }

        .payment-summary .small { font-size: .9rem; color: #666; }

        .card-category-payment:last-child .card-header-payment {
            border-bottom: none;
        }
    </style>
</head>

<body>
    <?php include 'partials/topbar.php'; ?>
    <?php include 'partials/navbar.php'; ?>
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">

            <div class="col-lg-8">

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

                <div class="mb-4">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label>Pilih Alamat</label>
                            <select class="custom-select" id="billingAddressDropdown">
                                <option value="default" selected>Alamat Default (John Doe, 123 Street, New York, US)</option>
                                <option value="address1">Alamat 1 (Jane Smith, 456 Avenue, Los Angeles, US)</option>
                                <option value="address2">Alamat 2 (Office, 789 Road, Chicago, US)</option>
                                <option value="new">Pilih Alamat Lain / Tambahkan Alamat Baru</option>
                            </select>
                        </div>

                        <div class="row w-100 mx-0 mt-3" id="newAddressForm" style="display: none;">
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
                                <input class="form-control" type="text" placeholder="Apartment, Studio, or Floor">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Country</label>
                                <select class="custom-select">
                                    <option selected>United States</option>
                                    <option>Indonesia</option>
                                    <option>Malaysia</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>City</label>
                                <input class="form-control" type="text" placeholder="New York">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>State</label>
                                <input class="form-control" type="text" placeholder="NY">
                            </div>
                            <div class="col-md-6 form-group">
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

                        <div class="col-md-12 form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="newaccount">
                                <label class="custom-control-label" for="newaccount">Create an account</label>
                            </div>
                        </div>

                        <div class="col-md-12 form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="shipto">
                                <label class="custom-control-label" for="shipto" data-toggle="collapse" data-target="#shipping-address">Ship to different address</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="collapse mb-4" id="shipping-address">
                    <h4 class="font-weight-semi-bold mb-4">Shipping Address</h4>
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

            <div class="col-lg-4">
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
                        <button type="submit" id="orderNowBtn" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">
                            Order Now
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