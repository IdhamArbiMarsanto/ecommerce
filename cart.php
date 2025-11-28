<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Effort Outdoor - Shopping Cart</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Effort Outdoor Ecommerce" name="keywords">
    <meta content="Modern shopping cart for Effort Outdoor" name="description">

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
        .cart-item {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .cart-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0,0,0,0.15);
        }
        .cart-img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 10px;
        }
        .quantity-controls {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .quantity-controls button {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            border: none;
            background: #bbd197;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        .quantity-controls button:hover {
            background: #a8c085;
        }
        .quantity-controls input {
            width: 50px;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin: 0 10px;
        }
        .cart-summary {
            background: linear-gradient(135deg, #bbd197 0%, #a8c085 100%);
            color: white;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
        .cart-summary .card-header {
            background: rgba(255,255,255,0.1);
            border: none;
            border-radius: 15px 15px 0 0;
        }
        .cart-summary .card-body {
            background: rgba(255,255,255,0.05);
        }
        .cart-summary .card-footer {
            background: rgba(255,255,255,0.1);
            border-radius: 0 0 15px 15px;
            border: none;
        }
        .btn-remove {
            background: #dc3545;
            color: white;
            border: none;
            border-radius: 50%;
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        .btn-remove:hover {
            background: #c82333;
        }
        .empty-cart {
            text-align: center;
            padding: 50px 20px;
            background: #f8f9fa;
            border-radius: 15px;
            margin: 20px 0;
        }
        .empty-cart i {
            font-size: 4rem;
            color: #6c757d;
            margin-bottom: 20px;
        }
        .coupon-section {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <!-- Topbar Start -->
    <?php include 'partials/topbar.php'; ?>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <?php include 'partials/navbar.php'; ?>
    <!-- Navbar End -->

    <!-- Page Header Start -->
    <?php include 'partials/head.php'; ?>
    <!-- Page Header End -->

    <!-- Cart Start -->
    <div class="container-fluid pt-5 pb-5">
        <div class="row px-xl-5 justify-content-center">
            <div class="col-lg-8">
                <h2 class="mb-4 text-center" style="color: #333; font-weight: 600;">Shopping Cart</h2>
                
                <!-- Cart Items -->
                <div class="cart-container">
                    <!-- Items loaded dynamically -->
                </div>

                <!-- Empty Cart (hidden by default) -->
                <div id="empty-cart" class="empty-cart d-none">
                    <i class="fas fa-shopping-cart"></i>
                    <h4>Your cart is empty</h4>
                    <p>Looks like you haven't added anything to your cart yet.</p>
                    <a href="shop.php" class="btn btn-primary">Continue Shopping</a>
                </div>
            </div>

            <div class="col-lg-4">
                <!-- Coupon Section -->
                <div class="coupon-section">
                    <h5 class="mb-3"><i class="fas fa-ticket-alt text-primary mr-2"></i>Have a Coupon?</h5>
                    <form class="d-flex" id="couponForm">
                        <input type="text" id="couponCode" class="form-control mr-2" placeholder="Enter coupon code" style="border-radius: 25px;">
                        <button class="btn btn-outline-primary" style="border-radius: 25px; padding: 0 20px;">Apply</button>
                    </form>
                </div>

                <!-- Cart Summary -->
                <div class="card cart-summary border-0">
                    <div class="card-header">
                        <h4 class="font-weight-semi-bold m-0"><i class="fas fa-receipt mr-2"></i>Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <span>Subtotal (2 items)</span>
                            <span>Rp 650.000</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span>Shipping</span>
                            <span>Rp 20.000</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span>Tax</span>
                            <span>Rp 65.000</span>
                        </div>
                        <hr style="border-color: rgba(255,255,255,0.3);">
                        <div class="d-flex justify-content-between">
                            <strong>Total</strong>
                            <strong>Rp 735.000</strong>
                        </div>
                    </div>
                    <div class="card-footer">
                        <form action="checkout.php" method="POST">
                            <button type="submit" class="btn btn-light w-100 py-3" style="border-radius: 25px; font-weight: 600;">
                                <i class="fas fa-credit-card mr-2"></i>Proceed To Checkout
                            </button>
                        </form>
                        <a href="shop.php" class="btn btn-outline-light w-100 mt-2" style="border-radius: 25px;">
                            <i class="fas fa-arrow-left mr-2"></i>Continue Shopping
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->

    <!-- Footer Start -->
    <?php include 'partials/footer.php'; ?>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <script>
    let appliedVoucher = sessionStorage.getItem('voucher') || '';
    const BACKEND_API = '/backend/api'; // Adjust if different

    async function api(path, opts) {
        const res = await fetch(BACKEND_API + '/' + path, opts);
        return res.json();
    }

    async function loadCart() {
        const j = await api('cart.php?action=list');
        const container = document.querySelector('.cart-container');
        const empty = document.getElementById('empty-cart');
        container.innerHTML = '';
        if (!j.success || !j.data || j.data.length === 0) {
            container.classList.add('d-none');
            empty.classList.remove('d-none');
            renderSummary(0, 0, 0, 0);
            return;
        }
        empty.classList.add('d-none');
        container.classList.remove('d-none');
        j.data.forEach(it => {
            const price = Number(it.harga || 0);
            const qty = Number(it.quantity || 1);
            // try common stock property names; fallback to large number if missing
            const stock = Number(it.stok ?? it.stock ?? it.jumlah ?? it.qty ?? 9999);
            const line = price * qty;
            const btnPlusDisabled = qty >= stock ? 'disabled' : '';
            const html = `
                <div class="cart-item p-4" data-cart-id="${it.id}" data-stock="${stock}">
                    <div class="row align-items-center">
                        <div class="col-md-2 col-4">
                            <img src="${it.foto || 'img/product-placeholder.jpg'}" alt="${it.nama || ''}" class="cart-img">
                        </div>
                        <div class="col-md-3 col-8">
                            <h6 class="mb-1">${it.nama || 'Product'}</h6>
                            <small class="text-muted">Size: ${it.size || ''} | Panjang: ${it.panjang || ''} | Lebar: ${it.lebar || ''}</small>
                        </div>
                        <div class="col-md-2">
                            <span class="font-weight-bold text-primary">Rp ${formatRp(price)}</span>
                        </div>
                        <div class="col-md-3">
                            <div class="quantity-controls">
                                <button class="btn-minus">-</button>
                                <input type="number" value="${qty}" min="1" max="${stock}" class="quantity-input">
                                <button class="btn-plus" ${btnPlusDisabled}>+</button>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <span class="font-weight-bold subtotal">Rp ${formatRp(line)}</span>
                        </div>
                        <div class="col-md-1 text-center">
                            <button class="btn-remove"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>
                </div>`;
             container.insertAdjacentHTML('beforeend', html);
         });
        attachHandlers();
        // Load summary from cart_summary.php
await loadSummary('', appliedVoucher);
    }

    function formatRp(v) { return Number(v || 0).toLocaleString('id-ID'); }

    function attachHandlers() {
        document.querySelectorAll('.btn-plus').forEach(btn => {
            btn.onclick = async function() {
                const item = this.closest('.cart-item');
                const cartId = item.dataset.cartId;
                const input = item.querySelector('.quantity-input');
                const stock = Number(item.dataset.stock || 9999);
                let qty = parseInt(input.value || '0') || 0;
                if (qty >= stock) {
                    // already at max
                    this.disabled = true;
                    return;
                }
                qty = qty + 1; // increment
                if (qty > stock) qty = stock;
                input.value = qty;
                // disable button immediately if reached stock
                if (qty >= stock) this.disabled = true;
                // ensure minus is enabled
                const minus = item.querySelector('.btn-minus');
                if (minus) minus.disabled = false;
                await api('cart.php?action=update', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ cart_id: cartId, quantity: qty })
                });
                await refreshLine(item, cartId, qty);
            };
        });
        document.querySelectorAll('.btn-minus').forEach(btn => {
            btn.onclick = async function() {
                const item = this.closest('.cart-item');
                const cartId = item.dataset.cartId;
                const input = item.querySelector('.quantity-input');
                const stock = Number(item.dataset.stock || 9999);
                let qty = Math.max(1, parseInt(input.value) - 1);
                input.value = qty;
                // re-enable plus if quantity below stock
                const plus = item.querySelector('.btn-plus');
                if (plus && qty < stock) plus.disabled = false;
                await api('cart.php?action=update', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ cart_id: cartId, quantity: qty })
                });
                await refreshLine(item, cartId, qty);
            };
        });
        // handle manual quantity edits
        document.querySelectorAll('.quantity-input').forEach(input => {
            input.addEventListener('change', async function() {
                const item = this.closest('.cart-item');
                const stock = Number(item.dataset.stock || 9999);
                let v = Math.max(1, parseInt(this.value || '1'));
                if (v > stock) {
                    v = stock;
                    this.value = v;
                    alert('Jumlah melebihi stok tersedia (' + stock + '). Jumlah disesuaikan.');
                }
                // disable/enable plus accordingly
                const plus = item.querySelector('.btn-plus');
                if (plus) plus.disabled = (v >= stock);
                const cartId = item.dataset.cartId;
                await api('cart.php?action=update', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ cart_id: cartId, quantity: v })
                });
                await refreshLine(item, cartId, v);
            });
        });
        document.querySelectorAll('.btn-remove').forEach(btn => {
             btn.onclick = async function() {
                 const item = this.closest('.cart-item');
                 const cartId = item.dataset.cartId;
                 await api('cart.php?action=remove', {
                     method: 'POST',
                     headers: { 'Content-Type': 'application/json' },
                     body: JSON.stringify({ cart_id: cartId })
                 });
                 item.remove();
                 await loadCart();
             };
         });
     }

    async function refreshLine(itemElem, cartId, qty) {
        const j = await api('cart.php?action=list');
        const it = j.data.find(x => x.id == cartId);
        if (!it) {
            itemElem.remove();
        } else {
            const line = Number(it.harga || 0) * it.quantity;
            itemElem.querySelector('.subtotal').textContent = 'Rp ' + formatRp(line);
        }
        const v = sessionStorage.getItem('voucher') || '';
    await loadSummary('', v);
    }

    async function loadSummary(kota = '', voucher = '') {
    // pakai voucher tersimpan jika kosong
    if (!voucher) voucher = sessionStorage.getItem('voucher') || '';

    const j = await api('cart_summary.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ kota, voucher })
    });
    if (j.success) {
        renderSummary(j.subtotal, j.shipping, j.discount, j.total, j.items ? j.items.length : 0);
    }
}


    function renderSummary(subtotal, shipping, discount, total, itemsCount) {
        const body = document.querySelector('.cart-summary .card-body');
        body.innerHTML = `
            <div class="d-flex justify-content-between mb-3">
                <span>Subtotal (${itemsCount} items)</span>
                <span>Rp ${formatRp(subtotal)}</span>
            </div>
            <div class="d-flex justify-content-between mb-3">
                <span>Shipping</span>
                <span>Rp ${formatRp(shipping)}</span>
            </div>
            ${discount > 0 ? `<div class="d-flex justify-content-between mb-3">
                <span>Discount</span>
                <span>-Rp ${formatRp(discount)}</span>
            </div>` : ''}
            <hr style="border-color: rgba(255,255,255,0.3);">
            <div class="d-flex justify-content-between">
                <strong>Total</strong>
                <strong>Rp ${formatRp(total)}</strong>
            </div>
        `;
    }

    // Coupon apply
    document.querySelector('.coupon-section form')?.addEventListener('submit', async function(e) {
    e.preventDefault();
    const voucher = this.querySelector('input').value.trim();

    sessionStorage.setItem('voucher', voucher); // SIMPAN VOUCHER
    appliedVoucher = voucher;

await loadSummary('', appliedVoucher);
});


    document.addEventListener('DOMContentLoaded', loadCart);
    </script>
</body>

</html>
