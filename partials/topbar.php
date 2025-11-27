<div class="row align-items-center py-3 px-xl-5">
    <div class="col-lg-3 d-none d-lg-block">
        <a href="index.php" class="text-decoration-none d-flex align-items-center">
            <img src="img/logo.jpg" alt="Logo" style="height: 56px; width: auto;" class="mr-1 border" />
            <h1 class="m-0 display-5 font-weight-semi-bold">Effort Outdoor</h1>
        </a>
    </div>
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
    
    <div class="col-lg-3 col-6 text-right position-relative d-flex justify-content-end align-items-center">
        
        <a href="wishlist.php" class="btn border mr-2" aria-label="Wishlist">
            <i class="fas fa-heart text-primary"></i>
            <span class="badge">0</span>
        </a>
        
        <div class="dropdown mr-2" id="cartDropdown">
            <a href="#" class="btn border" id="cartToggle" role="button" aria-expanded="false">
                <i class="fas fa-shopping-cart text-primary"></i>
                <span class="badge">2</span>
            </a>
            <div id="miniCart" class="dropdown-menu dropdown-menu-right" 
                 style="width:300px; padding: 15px; top: 100%;">
                <h6 class="mb-3">Shopping Cart</h6>
                <div class="cart-item d-flex justify-content-between mb-2">
                    <span>Produk A</span>
                    <span>Rp50.000</span>
                </div>
                <div class="cart-item d-flex justify-content-between mb-2">
                    <span>Produk B</span>
                    <span>Rp70.000</span>
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <strong>Total</strong>
                    <strong>Rp120.000</strong>
                </div>
                <a href="cart.php" class="btn btn-primary btn-block mt-3">View Cart</a>
            </div>
        </div>

        <div class="dropdown" id="userDropdown">
            <a  class="btn border" id="userToggle" role="button" aria-expanded="false"> 
                <i class="fas fa-user text-primary"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" style="min-width: 250px; padding: 15px; top: 100%;">
                
                <div class="d-flex align-items-center border-bottom pb-2 mb-2">
                    <i class="fas fa-user-circle fa-2x text-primary mr-3"></i>
                    <div>
                        <h6 class="mb-0">Nama Pengguna Anda</h6>
                    </div>
                </div>
                
                <a class="dropdown-item" href="orders.php?page=pesanan">
                    <i class="fas fa-shopping-bag mr-2"></i> Pembelian
                </a>
                <a class="dropdown-item" href="orders.php?page=profil">
                    <i class="fas fa-cog mr-2"></i> Pengaturan
                </a>
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" href="#logout">
                    <i class="fas fa-sign-out-alt mr-2"></i> Keluar (Logout)
                </a>
            </div>
        </div>
        
    </div>
</div>

<script>
    // Fungsi untuk mengaktifkan Dropdown saat kursor diarahkan (HOVER)
    function activateHoverDropdown(dropdownId) {
        const dropdown = document.getElementById(dropdownId);
        
        // Cek jika elemen dropdown ditemukan
        if (!dropdown) return; 

        // Tampilkan saat mouse masuk (hover)
        dropdown.addEventListener('mouseenter', function() {
            $(this).find('.dropdown-menu').addClass('show');
        });

        // Sembunyikan saat mouse keluar (tapi jangan tutup jika dibuka manual via click)
        dropdown.addEventListener('mouseleave', function() {
            if (dropdown.dataset.manualOpen !== 'true') {
                $(this).find('.dropdown-menu').removeClass('show');
            }
        });
    }

    // Panggil fungsi untuk Cart dan User
    activateHoverDropdown('cartDropdown');
    activateHoverDropdown('userDropdown');

    // Toggle by click: clicking the toggle keeps the popup open until clicked again.
    function activateClickToggle(toggleId, containerId) {
        const btn = document.getElementById(toggleId);
        const container = document.getElementById(containerId);
        if (!btn || !container) return;

        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const menu = container.querySelector('.dropdown-menu');
            if (!menu) return;

            const isExpanded = btn.getAttribute('aria-expanded') === 'true';
            if (!isExpanded) {
                // Open and mark as manually opened
                menu.classList.add('show');
                container.dataset.manualOpen = 'true';
                btn.setAttribute('aria-expanded', 'true');
            } else {
                // Close and clear manual-open marker
                menu.classList.remove('show');
                container.dataset.manualOpen = 'false';
                btn.setAttribute('aria-expanded', 'false');
            }
        });
    }

    // Clicking outside a manually-opened popup should close it
    document.addEventListener('click', function(e){
        ['cartDropdown','userDropdown'].forEach(function(id){
            const container = document.getElementById(id);
            if (!container) return;
            if (container.dataset.manualOpen === 'true') {
                // If click is outside the container, close
                if (!container.contains(e.target)) {
                    const menu = container.querySelector('.dropdown-menu');
                    const toggle = container.querySelector('[id$="Toggle"]');
                    if (menu) menu.classList.remove('show');
                    container.dataset.manualOpen = 'false';
                    if (toggle) toggle.setAttribute('aria-expanded','false');
                }
            }
        });
    });

    activateClickToggle('cartToggle','cartDropdown');
    activateClickToggle('userToggle','userDropdown');
</script>