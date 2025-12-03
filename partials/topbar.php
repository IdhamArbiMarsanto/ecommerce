<?php
// Default username
$username = 'Guest';

// Jika session user tersedia
if (!empty($_SESSION['user']['username'])) {
    $username = $_SESSION['user']['username'];
}
?>

<div class="row align-items-center py-3 px-xl-5">

    <!-- LOGO -->
    <div class="col-lg-3 d-none d-lg-block">
        <a href="index.php" class="text-decoration-none d-flex align-items-center">
            <img src="img/logo.jpg" alt="Logo" style="height: 56px; width: auto;" class="mr-1 border" />
            <h1 class="m-0 display-5 font-weight-semi-bold">Effort Outdoor</h1>
        </a>
    </div>

    <!-- SEARCH BAR -->
    <div class="col-lg-6 col-6 text-left">
        <form action="">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for products">
                <div class="input-group-append">
                    <span class="input-group-text bg-transparent text-primary">
                        <i class="fa fa-search"></i>
                    </span>
                </div>
            </div>
        </form>
    </div>

    <!-- RIGHT ICONS -->
    <div class="col-lg-3 col-6 text-right d-flex justify-content-end align-items-center">

        <!-- WISHLIST -->
        <a href="wishlist.php" class="btn border mr-2 position-relative" aria-label="Wishlist">
            <i class="fas fa-heart text-primary"></i>
            <span class="badge" id="wishlist-count">0</span>
        </a>


        <!-- CART DROPDOWN -->
        <div class="dropdown mr-2" id="cartDropdown">
            <a href="#" class="btn border" id="cartToggle" aria-expanded="false">
                <i class="fas fa-shopping-cart text-primary"></i>
                <span class="badge" id="cart-count">0</span>
            </a>

            <div id="miniCart" class="dropdown-menu dropdown-menu-right" style="width:300px; padding:15px; top:100%;">
                <h6 class="mb-3">Shopping Cart</h6>

                <div id="mini-cart-items"></div>

                <hr>
                <div class="d-flex justify-content-between">
                    <strong>Total</strong>
                    <strong id="mini-cart-total">Rp0</strong>
                </div>
                <a href="cart.php" class="btn btn-primary btn-block mt-3">View Cart</a>
            </div>
        </div>

        <!-- USER DROPDOWN -->
        <div class="dropdown" id="userDropdown">
            <a class="btn border" id="userToggle" aria-expanded="false">
                <i class="fas fa-user text-primary"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" style="min-width:250px; padding:15px; top:100%;">

                <div class="d-flex align-items-center border-bottom pb-2 mb-2">
                    <i class="fas fa-user-circle fa-2x text-primary mr-3"></i>
                    <div>
                        <h6 class="mb-0"><?php echo htmlspecialchars($username); ?></h6>
                    </div>
                </div>

                <a class="dropdown-item" href="orders.php?page=pesanan">
                    <i class="fas fa-shopping-bag mr-2"></i> Pembelian
                </a>
                <a class="dropdown-item" href="orders.php?page=profil">
                    <i class="fas fa-cog mr-2"></i> Pengaturan
                </a>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" href="#" onclick="logoutUser()">
                    <i class="fas fa-sign-out-alt mr-2"></i> Keluar (Logout)
                </a>

            </div>
        </div>

    </div>
</div>

<script>
// =============================
// CART LOADING
// =============================
function loadCart() {
    fetch("../backend/api/cart.php?action=list")
        .then(res => res.json())
        .then(data => {
            if (!data.success) return;

            const items = data.data || [];
            const totalQty = items.reduce((sum, item) => sum + parseInt(item.quantity), 0);
            document.getElementById("cart-count").innerText = totalQty;

            const miniList = document.getElementById("mini-cart-items");
            miniList.innerHTML = "";

            let totalHarga = 0;

            if (items.length === 0) {
                miniList.innerHTML = `<p class="text-center text-muted">Keranjang kosong</p>`;
            } else {
                items.forEach(item => {
                    const harga = parseInt(item.harga) * parseInt(item.quantity);
                    totalHarga += harga;

                    miniList.innerHTML += `
                        <div class="cart-item d-flex justify-content-between mb-2">
                            <span>${item.nama} (x${item.quantity})</span>
                            <span>Rp${harga.toLocaleString()}</span>
                        </div>
                    `;
                });
            }

            document.getElementById("mini-cart-total").innerText = "Rp" + totalHarga.toLocaleString();
        });
}

loadCart();

// =============================
// WISHLIST LOADING
// =============================
function loadWishlistCount() {
    fetch("../backend/api/wishlist_count.php", {
        credentials: "include"
    })
    .then(res => res.json())
    .then(data => {
        if (!data.success) return;
        document.getElementById("wishlist-count").innerText = data.count;
    });
}

// Panggil pertama kali
loadWishlistCount();


// =============================
// DROPDOWN LOGIC
// =============================
function activateHoverDropdown(id) {
    const dropdown = document.getElementById(id);
    if (!dropdown) return;

    dropdown.addEventListener('mouseenter', () => {
        $(dropdown).find('.dropdown-menu').addClass('show');
    });
    dropdown.addEventListener('mouseleave', () => {
        if (dropdown.dataset.manualOpen !== 'true') {
            $(dropdown).find('.dropdown-menu').removeClass('show');
        }
    });
}

activateHoverDropdown('cartDropdown');
activateHoverDropdown('userDropdown');

function activateClickToggle(toggleId, containerId) {
    const btn = document.getElementById(toggleId);
    const container = document.getElementById(containerId);
    if (!btn || !container) return;

    btn.addEventListener('click', (e) => {
        e.preventDefault();
        const menu = container.querySelector('.dropdown-menu');
        const isOpen = btn.getAttribute('aria-expanded') === 'true';

        if (!isOpen) {
            menu.classList.add('show');
            container.dataset.manualOpen = 'true';
            btn.setAttribute('aria-expanded', 'true');
        } else {
            menu.classList.remove('show');
            container.dataset.manualOpen = 'false';
            btn.setAttribute('aria-expanded', 'false');
        }
    });
}

document.addEventListener('click', (e) => {
    ['cartDropdown', 'userDropdown'].forEach(id => {
        const container = document.getElementById(id);
        if (!container) return;

        if (container.dataset.manualOpen === 'true') {
            if (!container.contains(e.target)) {
                const menu = container.querySelector('.dropdown-menu');
                const toggle = container.querySelector('[id$="Toggle"]');
                if (menu) menu.classList.remove('show');
                container.dataset.manualOpen = 'false';
                if (toggle) toggle.setAttribute('aria-expanded', 'false');
            }
        }
    });
});

// =============================
// LOGOUT HANDLER
// =============================
function logoutUser() {
    fetch("../backend/api/logout.php")
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                window.location.href = "login.php";
            }
        });
}

activateClickToggle('cartToggle', 'cartDropdown');
activateClickToggle('userToggle', 'userDropdown');
</script>
