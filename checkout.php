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
                <div class="card-body" style="background: rgba(255,255,255,0.05);" id="orderTotalProducts">
                    <h5 class="font-weight-medium mb-3">Products</h5>
                    <!-- Products will be loaded here dynamically -->
                </div>
                <div class="card-footer border-0" style="background: rgba(255,255,255,0.1); border-radius: 0 0 20px 20px;" id="orderTotalFooter">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold" id="orderTotalAmount">Rp 0</h5>
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
                            <!-- Payment methods will be rendered here dynamically -->
                        </div>
                    </div>
                </div>

                <!-- Payment Summary (shows current choice and amount) -->
                <div id="paymentSummary" class="payment-summary text-center small">
                    <div><strong id="psMethod">Belum memilih metode</strong></div>
                    <div id="psDetail" class="mt-1">Pilih opsi pembayaran untuk melihat instruksi.</div>
                    <div class="mt-2"><small>Nominal: <span id="psAmount">Rp 0</span></small></div>
                </div>

                <form id="paymentForm" action="payment_instruction.php" method="GET">
                    <input type="hidden" name="method" id="selectedMethod">
                    <input type="hidden" name="bank" id="selectedBank">
                    <input type="hidden" name="ewallet" id="selectedEwallet">
                    <input type="hidden" name="qrcode" id="selectedQrcode">
                    <input type="hidden" name="amount" id="selectedAmount">
                    <input type="hidden" name="payment_method_id" id="selectedPaymentMethodId">
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
        const API_BASE = '../backend/api';
        const URL_INIT = API_BASE + '/checkout_init.php';
        const URL_CALC = API_BASE + '/checkout_calculate.php';
        const URL_SUBMIT = API_BASE + '/checkout_submit.php';

        // --- Helpers ---
        function showAlert(msg) { alert(msg); }
        function toRp(n){ return 'Rp ' + Number(n||0).toLocaleString('id-ID'); }
        // Convert arbitrary text to safe DOM id (no spaces)
        function toSafeId(str){ return String(str || '').replace(/[^a-zA-Z0-9_-]/g, '_'); }

        // --- Group payment methods by 'jenis' ---
        function groupByJenis(paymentMethods) {
            return paymentMethods.reduce((acc, pm) => {
                (acc[pm.jenis] = acc[pm.jenis] || []).push(pm);
                return acc;
            }, {});
        }

        // --- Create method icon HTML for each jenis ---
        function getJenisIcon(jenis) {
            switch(jenis) {
                case 'E-Wallet':
                    return '<i class="fas fa-wallet"></i>';
                case 'Transfer Bank':
                    return '<i class="fas fa-university"></i>';
                case 'QRIS':
                    return '<i class="fas fa-qrcode"></i>';
                case 'COD':
                    return '<i class="fas fa-hand-holding-usd"></i>';
                default:
                    return '<i class="fas fa-credit-card"></i>';
            }
        }

        // --- Create bg gradient for each jenis ---
        function getJenisGradient(jenis) {
            switch(jenis) {
                case 'E-Wallet':
                    return 'linear-gradient(135deg, #00d2d3 0%, #54a0ff 100%)';
                case 'Transfer Bank':
                    return 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)';
                case 'QRIS':
                    return 'linear-gradient(135deg, #f093fb 0%, #f5576c 100%)';
                case 'COD':
                    return 'linear-gradient(135deg, #43e97b 0%, #38f9d7 100%)';
                default:
                    return 'linear-gradient(135deg, #6c757d 0%, #343a40 100%)';
            }
        }

        function mapJenisToCode(jenis) {
            switch(jenis) {
                case "E-Wallet": return "ewallet";
                case "Transfer Bank": return "mbanking";
                case "QRIS": return "qris";
                case "COD": return "cod";
                default: return jenis.toLowerCase().replace(/\s+/g, "");
            }
        }


        function mapJenisToGroupName(jenis) {
            const map = {
                "E-Wallet": "ewallet_option",
                "Transfer Bank": "bank_option",
                "QRIS": "qris_option",
                "COD": "cod_option"
            };
            return map[jenis] || jenis.toLowerCase().replace(/\s+/g, '') + "_option";
        }


        // --- Render payment methods dynamically ---
        function renderPaymentMethods(paymentMethods) {
            const grouped = groupByJenis(paymentMethods);
            const container = $('#paymentAccordion');
            container.empty();

            let idx = 0;
            for (const jenis in grouped) {
                idx++;
                const safeJenis = toSafeId(jenis);
                const groupId = 'collapse_' + safeJenis;
                const headingId = 'heading_' + safeJenis;
                const radioId = 'radio_' + safeJenis;
                const methods = grouped[jenis];

                const card = $(`
                    <div class="card-category-payment border-top${idx === 1 ? '' : ''}">
                        <div class="card-header-payment p-3" id="${headingId}" data-toggle="collapse" data-target="#${groupId}" aria-expanded="${idx === 1}" aria-controls="${groupId}" role="button">
                            <div class="method-icon" style="background: ${getJenisGradient(jenis)};">
                                ${getJenisIcon(jenis)}
                            </div>
                            <div class="custom-control custom-radio d-inline-block w-100">
                                <input type="radio" class="custom-control-input payment-radio" name="payment" id="${radioId}" value="${mapJenisToCode(jenis)}">
                                <label class="custom-control-label font-weight-semi-bold" for="${radioId}">${jenis.toUpperCase()}</label>
                                <i class="fas fa-chevron-down float-right collapse-icon"></i>
                            </div>
                        </div>
                        <div id="${groupId}" class="collapse${idx === 1 ? ' show' : ''}" aria-labelledby="${headingId}" data-parent="#paymentAccordion">
                            <div class="card-body-payment px-4 pb-3 pt-0 ml-4">
                                <h6 class="font-weight-medium mb-2">
                                    Pilih ${
                                        jenis === 'E-Wallet' ? 'E-Wallet' :
                                        jenis === 'Transfer Bank' ? 'Bank' :
                                        jenis === 'QRIS' ? 'Metode Pembayaran' :
                                        jenis === 'COD' ? 'Metode Pembayaran' : ''
                                    }:
                                </h6>
                            </div>
                        </div>
                    </div>
                `);

                // Add options radios for each payment method in group
                const bodyDiv = card.find('.card-body-payment');
                methods.forEach(pm => {
                    const inputId = `${toSafeId(jenis)}_${pm.id_metode}`;
                    const labelText = pm.nama_metode;

                    // Create radio input for option
                    const groupName = mapJenisToGroupName(jenis);

                const option = $(`
                    <div class="custom-control custom-radio mb-2">
                        <input type="radio" class="custom-control-input" 
                            name="${groupName}" 
                            id="${inputId}" 
                            value="${labelText}"
                            data-method-id="${pm.id_metode}">
                        <label class="custom-control-label" for="${inputId}">${labelText}</label>
                    </div>
                `);

                    bodyDiv.append(option);
                });

                container.append(card);
            }
        }

        // --- Load initial checkout data ---
        function loadCheckoutData() {
            const savedVoucher = sessionStorage.getItem('voucher') || '';

            $.ajax({
                url: URL_INIT,
                method: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({ voucher: savedVoucher }),
                dataType: 'json',

                success: function(res) {
                    if (!res || !res.success) {
                        showAlert('Gagal memuat data checkout: ' + (res?.message || 'unknown'));
                        return;
                    }
                    // try multiple shapes
                    const data = res.data ?? res;
                    const cartSummary = data.cartSummary ?? data.summary ?? data.cartSummary ?? res.cartSummary ?? res.summary;
                    const addresses = data.addresses ?? res.addresses ?? [];
                    const paymentMethods = data.payment_methods ?? [];

                    if (cartSummary) renderOrderSummary(cartSummary);
                    if (Array.isArray(addresses) && addresses.length) populateAddresses(addresses);
                    if (paymentMethods.length) renderPaymentMethods(paymentMethods);
                },
                error: function(xhr, status, err) {
                    showAlert('Gagal memuat data checkout: ' + err);
                }
            });
        }

        // --- Render helpers (no CSS change) ---
        function renderOrderSummary(data) {
            if (!data) return;
            const cardBody = $('#orderTotalProducts');
            const cardFooter = $('#orderTotalFooter');

            cardBody.empty();
            cardFooter.empty();

            cardBody.append('<h5 class="font-weight-medium mb-3">Products</h5>');
            (data.items || []).forEach(function(prod) {
                const lineTotal = Number(prod.harga || prod.price || 0) * Number(prod.quantity || 1);
                const row = $('<div class="d-flex justify-content-between"></div>');
                row.append($('<p class="mb-1"></p>').text(`${prod.nama} x${prod.quantity}`));
                row.append($('<p class="mb-1"></p>').text(toRp(lineTotal)));
                cardBody.append(row);
            });

            cardBody.append('<hr class="mt-2" style="border-color: rgba(255,255,255,0.3);">');

            const subtotal = Number(data.subtotal || 0);
            const shipping = Number(data.shipping || 0);
            const discount = Number(data.discount || 0);
            const total = Number(data.total || 0);

            const subtotalRow = $('<div class="d-flex justify-content-between"></div>');
            subtotalRow.append($('<h6 class="font-weight-medium">Subtotal</h6>'));
            subtotalRow.append($('<h6 class="font-weight-medium"></h6>').text(toRp(subtotal)));
            cardBody.append(subtotalRow);

            const shippingRow = $('<div class="d-flex justify-content-between"></div>');
            shippingRow.append($('<h6 class="font-weight-medium">Shipping</h6>'));
            shippingRow.append($('<h6 class="font-weight-medium"></h6>').text(toRp(shipping)));
            cardBody.append(shippingRow);

            const discountRow = $('<div class="d-flex justify-content-between"></div>');
            discountRow.append($('<h6 class="font-weight-medium">Discount</h6>'));
            discountRow.append($('<h6 class="font-weight-medium"></h6>').text(`-${toRp(discount)}`));
            cardBody.append(discountRow);

            const totalRow = $('<div class="d-flex justify-content-between mt-2"></div>');
            totalRow.append($('<h5 class="font-weight-bold">Total</h5>'));
            totalRow.append($('<h5 class="font-weight-bold" id="orderTotalAmount"></h5>').text(toRp(total)));
            cardFooter.append(totalRow);

            $('#selectedAmount').val(total);
            $('#psAmount').text(toRp(total));
        }

        function populateAddresses(addresses) {
            const dropdown = $('#billingAddressDropdown');
            dropdown.empty();
            addresses.forEach(a => {
                // use a.id and format label from actual API shape
                const label = `${a.nama_penerima} - ${a.jalan}, RT/RW ${a.rt_rw}, ${a.kelurahan}, ${a.kecamatan}`;
                dropdown.append($('<option>').val(a.id).text(label));
            });
            dropdown.append($('<option>').val('new').text('Pilih Alamat Lain / Tambahkan Alamat Baru'));
            dropdown.trigger('change');
        }

        // --- Gather form data for calculate/submit ---
        function gatherFormData() {
            const sel = $('#billingAddressDropdown').val();
            let billing = {};
            let address_id = null;
            if (sel === 'new') {
                // map newAddressForm inputs (same order as markup)
                const $inputs = $('#newAddressForm').find('input, select');
                billing = {
                    type: 'new',
                    first_name: $inputs.eq(0).val() || '',
                    last_name: $inputs.eq(1).val() || '',
                    email: $inputs.eq(2).val() || '',
                    mobile: $inputs.eq(3).val() || '',
                    address1: $inputs.eq(4).val() || '',
                    address2: $inputs.eq(5).val() || '',
                    country: $inputs.eq(6).val() || '',
                    city: $inputs.eq(7).val() || '',
                    state: $inputs.eq(8).val() || '',
                    zip: $inputs.eq(9).val() || ''
                };
            } else {
                billing = { type: 'saved', id: sel };
                address_id = sel; // set address_id for backend
            }

            let shipping = null;
            if ($('#shipto').is(':checked')) {
                const $s = $('#shipping-address').find('input, select');
                shipping = {
                    first_name: $s.eq(0).val() || '',
                    last_name: $s.eq(1).val() || '',
                    email: $s.eq(2).val() || '',
                    mobile: $s.eq(3).val() || '',
                    address1: $s.eq(4).val() || '',
                    address2: $s.eq(5).val() || '',
                    country: $s.eq(6).val() || '',
                    city: $s.eq(7).val() || '',
                    state: $s.eq(8).val() || '',
                    zip: $s.eq(9).val() || ''
                };
            }

            const payment = {
                method: $('#selectedMethod').val() || '',
                bank: $('#selectedBank').val(),
                ewallet: $('#selectedEwallet').val(),
                qrcode: $('#selectedQrcode').val(),
                amount: Number($('#selectedAmount').val() || 0)
            };

            // voucher if available (some frontends might not have it)
            const voucher = $('input[name="voucher"]').val() || '';

            return { address_id, billing, shipping, payment, voucher };
        }

        // --- Recalculate totals (POST JSON) ---
        function recalcTotals() {
            const payload = gatherFormData();
            payload.voucher = sessionStorage.getItem('voucher') || '';

            $.ajax({
                url: URL_CALC,
                method: 'POST',
                data: JSON.stringify(payload),

                contentType: 'application/json',
                dataType: 'json',
                success: function(res) {
                    if (!res || !res.success) {
                        showAlert('Gagal menghitung total: ' + (res?.message || 'unknown'));
                        return;
                    }
                    const summary = res.summary ?? res.data ?? res;
                    renderOrderSummary(summary);
                },
                error: function(xhr, status, err) {
                    showAlert('Gagal menghitung total: ' + err);
                }
            });
        }

        // --- Submit order (POST JSON) ---
$('#paymentForm').on('submit', function(e) {
    e.preventDefault();
    const formData = gatherFormData();

    // Basic validation
    if (!formData.address_id || formData.address_id === 'new') { showAlert('Pilih alamat pengiriman terlebih dahulu'); return; }
    if (!formData.payment.method) { showAlert('Pilih metode pembayaran terlebih dahulu'); return; }
    if (formData.payment.method === 'mbanking' && !formData.payment.bank) { showAlert('Pilih bank untuk transfer'); return; }
    if (formData.payment.method === 'ewallet' && !formData.payment.ewallet) { showAlert('Pilih e-wallet'); return; }
    if (formData.payment.method === 'qris' && !formData.payment.qrcode) { showAlert('Pilih metode QRIS'); return; }

    const methodId = parseInt($('#selectedPaymentMethodId').val(), 10) || 0;
    if (!methodId) { showAlert('Pilih opsi pada metode pembayaran'); return; }

    const payload = {
        address_id: parseInt(formData.address_id, 10),
        payment_method: methodId,
        voucher: sessionStorage.getItem('voucher') || ''
        // items: [] // opsional, biarkan backend mengambil dari carts
    };

    $.ajax({
        url: URL_SUBMIT,
        method: 'POST',
        contentType: 'application/json',
        data: JSON.stringify(payload),
        dataType: 'json',
        success: function(res) {
            if (!res) { showAlert('Response kosong dari server'); return; }
            if (res.success && res.order_id) {
                const method = formData.payment.method || '';
                const bank = formData.payment.bank || '';
                const ewallet = formData.payment.ewallet || '';
                const qrcode = formData.payment.qrcode || '';
                const total = res.total || formData.payment.amount || '';

                const params = new URLSearchParams();
                params.set('order_id', res.order_id);
                if (method) params.set('method', method);
                if (bank) params.set('bank', bank);
                if (ewallet) params.set('ewallet', ewallet);
                if (qrcode) params.set('qrcode', qrcode);
                if (total) params.set('amount', total);

                window.location.href = 'payment_instruction.php?' + params.toString();
            } else {
                showAlert('Order gagal: ' + (res.message || 'Terjadi kesalahan'));
            }
        },
        error: function(xhr, status, err) {
            showAlert('Gagal membuat order: ' + err);
        }
    });
});

        // --- UI events that affect totals ---
        $('#billingAddressDropdown').on('change', recalcTotals);
        $('#shipto').on('change', recalcTotals);
        
        // --- Payment method helpers and unified handlers ---
        function codeToLabel(code) {
            switch (code) {
                case 'ewallet': return 'E-Wallet';
                case 'mbanking': return 'Transfer Bank';
                case 'qris': return 'QRIS';
                case 'cod': return 'COD';
                default: return code;
            }
        }
        function codeToGroupName(code) {
            switch (code) {
                case 'ewallet': return 'ewallet_option';
                case 'mbanking': return 'bank_option'; // keep existing group name
                case 'qris': return 'qris_option';
                case 'cod': return 'cod_option';
                default: return code + '_option';
            }
        }
        function groupNameToCode(group) {
            switch (group) {
                case 'ewallet_option': return 'ewallet';
                case 'bank_option': return 'mbanking';
                case 'qris_option': return 'qris';
                case 'cod_option': return 'cod';
                default: return (group || '').replace('_option','');
            }
        }
        function activateJenis(code) {
            // Set selected method and summary text
            $('#selectedMethod').val(code);
            $('#selectedAmount').val($('#orderTotalAmount').text().replace(/[^\d]/g, ''));
            $('#psMethod').text(`Metode dipilih: ${codeToLabel(code)}`);
            $('#psDetail').text('Pilih opsi di bawah untuk detail.');
            $('#psAmount').text($('#orderTotalAmount').text());

            // Clear hidden specific selections
            $('#selectedBank,#selectedEwallet,#selectedQrcode,#selectedPaymentMethodId').val('');

            // Manage radios: uncheck all options and enable only active group
            const activeGroup = codeToGroupName(code);
            $("input[type=radio][name$='_option']").prop('checked', false);
            $("input[type=radio][name$='_option']").prop('disabled', true);
            $(`input[type=radio][name='${activeGroup}']`).prop('disabled', false);
        }

        // When selecting JENIS (E-Wallet, Transfer Bank, QRIS, COD)
        $(document).on('change', 'input.payment-radio', function() {
            const code = $(this).val(); // ewallet | mbanking | qris | cod
            activateJenis(code);
            recalcTotals();
        });

        // When selecting the NAME within a JENIS group
        $(document).on('change', "input[type=radio][name$='_option']", function () {
            const group = $(this).attr('name');
            const code = groupNameToCode(group);
            const nama = $(this).val();
            const methodId = parseInt($(this).data('methodId'), 10) || '';

            // Ensure corresponding jenis is checked (without triggering its change handler)
            const $jenis = $(`.payment-radio[value='${code}']`);
            if (!$jenis.is(':checked')) {
                $jenis.prop('checked', true);
            }

            // Only one sub-option across ALL groups
            $("input[type=radio][name$='_option']").not(`[name='${group}']`).prop('checked', false);

            // Update hidden inputs based on group
            if (group === 'bank_option') {
                $('#selectedBank').val(nama);
            } else if (group === 'ewallet_option') {
                $('#selectedEwallet').val(nama);
            } else if (group === 'qris_option') {
                $('#selectedQrcode').val(nama);
            }
            $('#selectedPaymentMethodId').val(methodId);

            // Lock other groups to avoid cross-jenis selection
            const activeGroup = codeToGroupName(code);
            $("input[type=radio][name$='_option']").prop('disabled', true);
            $(`input[type=radio][name='${activeGroup}']`).prop('disabled', false);

            $('#selectedMethod').val(code);
            $('#psMethod').text(`Metode dipilih: ${codeToLabel(code)}`);
            $('#psDetail').text(nama);
            $('#psAmount').text($('#orderTotalAmount').text());
            recalcTotals();
        });





        // --- Initial load ---
        loadCheckoutData();
    });
    </script>

</body>

</html>
