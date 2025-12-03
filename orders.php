<?php
include __DIR__ . '/../backend/config/config.php';
if (session_status() !== PHP_SESSION_ACTIVE) session_start(); // ensure session available
$db = get_db();

// Determine which tab/page to show
$page = isset($_GET['page']) ? $_GET['page'] : 'profil';
$user_id = $_SESSION['user']['id'] ?? $_SESSION['user_id'] ?? null;
?>

<?php include 'partials/head.php'; ?>
<?php include 'partials/topbar.php'; ?>

<style>
:root {
    --eo-primary: #bbd197;
    --eo-primary-dark: #bbd197;
    --eo-secondary: #f8f9fa;
    --eo-border: #e9ecef;
    --eo-text: #495057;
    --eo-text-light: #6c757d;
    --eo-shadow: 0 2px 10px rgba(0,0,0,0.08);
    --eo-radius: 12px;
}

/* Modern Layout */
.account-layout {
    min-height: 70vh;
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    padding: 2rem 0;
}

.account-sidebar {
    background: white;
    border-radius: var(--eo-radius);
    box-shadow: var(--eo-shadow);
    overflow: hidden;
    border: none;
}

.account-content {
    background: white;
    border-radius: var(--eo-radius);
    box-shadow: var(--eo-shadow);
    min-height: 600px;
}

/* Sidebar Styling */
.sidebar-header {
    background: linear-gradient(135deg, var(--eo-primary) 0%, var(--eo-primary-dark) 100%);
    color: white;
    padding: 1.5rem;
    text-align: center;
}

.sidebar-avatar {
    width: 60px;
    height: 60px;
    background: rgba(255,255,255,0.2);
    border: 3px solid white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    font-weight: bold;
    margin: 0 auto 0.5rem;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.sidebar-menu {
    padding: 0;
}

.sidebar-menu-item {
    border: none;
    border-radius: 0;
    padding: 1rem 1.5rem;
    color: var(--eo-text);
    text-decoration: none;
    display: flex;
    align-items: center;
    transition: all 0.3s ease;
    position: relative;
}

.sidebar-menu-item:hover,
.sidebar-menu-item.active {
    background: var(--eo-secondary);
    color: var(--eo-primary);
    text-decoration: none;
}

.sidebar-menu-item i {
    margin-right: 0.75rem;
    width: 20px;
    text-align: center;
}

.sidebar-menu-item.active::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 4px;
    background: var(--eo-primary);
}

/* Content Styling */
.content-header {
    padding: 2rem;
    border-bottom: 1px solid var(--eo-border);
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-radius: var(--eo-radius) var(--eo-radius) 0 0;
}

.content-header h2 {
    color: var(--eo-text);
    font-weight: 600;
    margin: 0;
    font-size: 1.75rem;
}

/* Order Cards */
.order-card {
    border: 1px solid var(--eo-border);
    border-radius: var(--eo-radius);
    margin-bottom: 1.5rem;
    overflow: hidden;
    transition: all 0.3s ease;
    background: white;
}

.order-card:hover {
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    transform: translateY(-2px);
}

.order-header {
    background: var(--eo-secondary);
    padding: 1rem 1.5rem;
    border-bottom: 1px solid var(--eo-border);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.order-id {
    font-weight: 600;
    color: var(--eo-primary);
    margin: 0;
}

.order-status {
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.875rem;
    font-weight: 500;
    text-transform: uppercase;
}

.status-pending { background: #fff3cd; color: #856404; }
.status-dikemas { background: #d1ecf1; color: #0c5460; }
.status-dikirim { background: #cce5ff; color: #004085; }
.status-selesai { background: #d4edda; color: #155724; }
.status-cancelled { background: #f8d7da; color: #721c24; }

.order-body {
    padding: 1.5rem;
}

.product-info {
    display: flex;
    align-items: center;
    margin-bottom: 1rem;
    padding-bottom: 1rem;
    border-bottom: 1px solid var(--eo-border);
}

.product-image {
    width: 80px;
    height: 80px;
    border-radius: 8px;
    object-fit: cover;
    margin-right: 1rem;
    border: 1px solid var(--eo-border);
}

.product-details h6 {
    color: var(--eo-text);
    font-weight: 600;
    margin-bottom: 0.25rem;
}

.product-details small {
    color: var(--eo-text-light);
}

.order-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.order-total {
    font-size: 1.125rem;
    font-weight: 600;
    color: var(--eo-text);
}

.order-actions {
    display: flex;
    gap: 0.5rem;
}

.btn-outline-secondary {
    border-color: var(--eo-border);
    color: var(--eo-text);
}

.btn-outline-secondary:hover {
    background: var(--eo-primary);
    border-color: var(--eo-primary);
    color: white;
}

/* Tabs */
.nav-tabs-modern {
    border: none;
    background: var(--eo-secondary);
    border-radius: var(--eo-radius) var(--eo-radius) 0 0;
    padding: 0 2rem;
}

.nav-tabs-modern .nav-item {
    margin-bottom: 0;
}

.nav-tabs-modern .nav-link {
    border: none;
    color: var(--eo-text-light);
    font-weight: 500;
    padding: 1rem 1.5rem;
    position: relative;
    transition: all 0.3s ease;
}

.nav-tabs-modern .nav-link:hover {
    color: var(--eo-primary);
    background: transparent;
}

.nav-tabs-modern .nav-link.active {
    color: var(--eo-primary);
    background: transparent;
    font-weight: 600;
}

.nav-tabs-modern .nav-link.active::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 30px;
    height: 3px;
    background: var(--eo-primary);
    border-radius: 2px;
}

/* Profile Section */
.profile-section {
    padding: 2rem;
}

.profile-form .form-group {
    margin-bottom: 1.5rem;
}

.profile-form label {
    font-weight: 600;
    color: var(--eo-text);
    margin-bottom: 0.5rem;
    display: block;
}

.profile-form .form-control {
    border: 2px solid var(--eo-border);
    border-radius: 8px;
    padding: 0.1rem 1rem;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.profile-form .form-control:focus {
    border-color: var(--eo-primary);
    box-shadow: 0 0 0 0.2rem rgba(139, 160, 90, 0.25);
}

.profile-avatar {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid var(--eo-primary);
    margin-bottom: 1rem;
}

.btn-primary-modern {
    background: linear-gradient(135deg, var(--eo-primary) 0%, var(--eo-primary-dark) 100%);
    border: none;
    border-radius: 8px;
    padding: 0.75rem 2rem;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-primary-modern:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(139, 160, 90, 0.3);
}

.btn-cancel {
    background: linear-gradient(135deg, var(--eo-primary) 0%, var(--eo-primary-dark) 100%);
    border: none;
    border-radius: 8px;
    padding: 0.75rem 2rem;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-cancel:hover {
    transform: none;
    box-shadow: none;
}

/* Address Section */
.address-card {
    border: 1px solid var(--eo-border);
    border-radius: var(--eo-radius);
    padding: 1.5rem;
    margin-bottom: 1rem;
    background: var(--eo-secondary);
}

.address-card h6 {
    color: var(--eo-primary);
    font-weight: 600;
    margin-bottom: 0.5rem;
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 4rem 2rem;
    color: var(--eo-text-light);
}

.empty-state i {
    font-size: 4rem;
    color: var(--eo-border);
    margin-bottom: 1rem;
}

/* Responsive */
@media (max-width: 768px) {
    .account-layout {
        padding: 1rem 0;
    }

    .content-header {
        padding: 1.5rem;
    }

    .order-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
    }

    .order-footer {
        flex-direction: column;
        align-items: flex-start;
        gap: 1rem;
    }

    .order-actions {
        width: 100%;
        justify-content: center;
    }

    .product-info {
        flex-direction: column;
        text-align: center;
    }

    .product-image {
        margin-right: 0;
        margin-bottom: 1rem;
    }
}
</style>

<div class="container-fluid account-layout">
    <div class="row px-xl-5">
        <!-- Sidebar -->
        <div class="col-lg-3 mb-4">
            <div class="account-sidebar">
                <div class="sidebar-header">
                    <div class="sidebar-avatar">D</div>
                    <h5 class="mb-0">Akun Saya</h5>
                </div>

                <div class="sidebar-menu">
                    <a href="orders.php?page=profil" class="sidebar-menu-item <?php echo $page === 'profil' ? 'active' : ''; ?>">
                        <i class="fas fa-user"></i>
                        Profil
                    </a>
                    <a href="orders.php?page=alamat" class="sidebar-menu-item <?php echo $page === 'alamat' ? 'active' : ''; ?>">
                        <i class="fas fa-map-marker-alt"></i>
                        Alamat
                    </a>
                    <a href="orders.php?page=pesanan" class="sidebar-menu-item <?php echo $page === 'pesanan' ? 'active' : ''; ?>">
                        <i class="fas fa-shopping-bag"></i>
                        Pesanan Saya
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-lg-9">
            <div class="account-content">
                <?php if ($page === 'profil'): ?>
                    <!-- Profile Section -->
                    <div class="content-header">
                        <h2><i class="fas fa-user mr-2"></i>Profil Saya</h2>
                    </div>

                    <div class="profile-section">
                        <div class="row">
                            <div class="col-md-8">
                                <form class="profile-form" id="profileForm">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" id="fullName" name="username" class="form-control" value="" placeholder="Masukkan nama lengkap" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" id="email" name="email" class="form-control" value="" placeholder="Masukkan email" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor Telepon</label>
                                        <input type="tel" id="phone" name="phone" class="form-control" value="" placeholder="Masukkan nomor telepon">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" id="birthdate" name="birthdate" class="form-control" value="" placeholder="Masukkan tanggal lahir">
                                    </div>
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select class="form-control" id="gender" name="gender">
                                            <option value="">Pilih Gender</option>
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                    <button type="button" id="saveProfileBtn" class="btn btn-primary-modern">
                                        <i class="fas fa-save mr-2"></i>Simpan Perubahan
                                    </button>
                                    <div id="profileMsg" style="margin-top:10px;"></div>
                                </form>
                            </div>
                            <div class="col-md-4 text-center">
                                <img id="profilePreview" src="img/user.jpg" alt="Profile" class="profile-avatar">
                                <div class="mt-3">
                                    <input type="file" id="fotoInput" accept="image/*" style="display:none;">
                                    <button type="button" class="btn btn-outline-secondary mr-2" onclick="document.getElementById('fotoInput').click();">
                                        <i class="fas fa-camera mr-1"></i>Pilih Foto
                                    </button>
                                    <button type="submit" class="btn btn-primary-modern">
                                        <i class="fas fa-upload mr-1"></i>Upload
                                    </button>
                                </div>
                                <p class="text-muted mt-2 small">Maks. 2MB • Format: JPEG, PNG</p>
                            </div>
                        </div>
                    </div>

                <?php elseif ($page === 'alamat'): ?>
                    <!-- Address Section (dynamic via API) -->
                    <div class="content-header">
                        <h2><i class="fas fa-map-marker-alt mr-2"></i>Alamat Saya</h2>
                    </div>

                    <div class="profile-section">
                        <div id="addressesList">
                            <div class="empty-state">
                                <i class="fas fa-spinner fa-pulse"></i>
                                <h4>Memuat alamat...</h4>
                            </div>
                        </div>

                        <button id="btnAddAddress" class="btn btn-primary-modern" data-toggle="modal" data-target="#addAddressModal">
                            <i class="fas fa-plus mr-2"></i>Tambah Alamat Baru
                        </button>
                    </div>

                    <!-- reuse existing modal #addAddressModal and form #addAddressForm -->
                    <!-- Address scripts moved to footer consolidated script to avoid duplicate bindings -->
                <?php elseif ($page === 'pesanan'): ?>
<!-- Orders Section -->
<div class="content-header">
    <h2><i class="fas fa-shopping-bag mr-2"></i>Pesanan Saya</h2>
</div>

<ul class="nav nav-tabs-modern" role="tablist">
    <li class="nav-item"><a class="nav-link active"   data-status=""        data-toggle="tab">Semua</a></li>
    <li class="nav-item"><a class="nav-link"          data-status="pending" data-toggle="tab">Menunggu Pembayaran</a></li>
    <li class="nav-item"><a class="nav-link"          data-status="packed"  data-toggle="tab">Dikemas</a></li>
    <li class="nav-item"><a class="nav-link"          data-status="shipping"data-toggle="tab">Dikirim</a></li>
    <li class="nav-item"><a class="nav-link"          data-status="completed"data-toggle="tab">Selesai</a></li>
</ul>

<div class="tab-content p-4" id="ordersWrapper">
    <div class="empty-state">
        <i class="fas fa-spinner fa-pulse"></i>
        <h4>Memuat pesanan...</h4>
    </div>
</div>

<?php endif; ?>

            </div>
        </div>
    </div>
</div>

<!-- Add Address Modal -->
<div class="modal fade" id="addAddressModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-plus mr-2"></i>Tambah Alamat Baru</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="addAddressForm">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Penerima</label>
                                <input type="text" class="form-control" name="nama_penerima" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nomor Telepon Aktif</label>
                                <input type="tel" class="form-control" name="nomor_telepon" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Alamat Jalan</label>
                        <input type="text" class="form-control" name="alamat_jalan" placeholder="Jl. Contoh No. 123" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>RT/RW</label>
                                <input type="text" class="form-control" name="rt_rw" placeholder="001/002" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kelurahan</label>
                                <input type="text" class="form-control" name="kelurahan" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kecamatan</label>
                                <input type="text" class="form-control" name="kecamatan" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kota/Kabupaten</label>
                                <!-- kota input (autocomplete) + hidden kota_id -->
                                <input type="text" id="kotaInput" class="form-control" name="kota_kabupaten" autocomplete="off" required>
                                <input type="hidden" id="kota_id_hidden" name="kota_id">
                                <div id="kotaAutocomplete" class="autocomplete-list" style="position:relative;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Provinsi</label>
                                <input type="text" class="form-control" name="provinsi" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kode Pos</label>
                                <input type="text" class="form-control" name="kode_pos" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="setAsDefault" name="set_as_default">
                        <label class="form-check-label" for="setAsDefault">Jadikan alamat utama</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary-modern" data-dismiss="modal">Batal</button>
                <button type="button" id="saveAddressBtn" class="btn btn-primary-modern">Simpan Alamat</button>
             </div>
        </div>
    </div>
</div>

<?php include 'partials/footer.php'; ?>

<!-- Consolidated scripts: profile + addresses (cleaned) -->
<script>
document.addEventListener('DOMContentLoaded', function () {

    /* ============================================
     *  API ENDPOINTS
     * ============================================ */
    const API_PROFILE = 'http://localhost/backend/api/user_profile.php';
    const API_ADDR    = 'http://localhost/backend/api/addresses.php';
    const API_ORDERS  = 'http://localhost/backend/api/order_list.php';

    const wrapper      = document.getElementById("ordersWrapper");
    const profileMsg   = document.getElementById('profileMsg');
    const saveProfileBtn = document.getElementById('saveProfileBtn');
    const listEl       = document.getElementById('addressesList');
    const form         = document.getElementById('addAddressForm');
    const btnAdd       = document.getElementById('btnAddAddress');
    const saveAddrBtn  = document.getElementById('saveAddressBtn');

    let editingId = null;


    /* ============================================
     *  HELPERS
     * ============================================ */
    const escapeHtml = s => String(s || '')
        .replace(/&/g,'&amp;')
        .replace(/</g,'&lt;')
        .replace(/>/g,'&gt;')
        .replace(/"/g,'&quot;')
        .replace(/'/g,'&#39;');

    async function fetchJson(url, opts = {}) {
        const res = await fetch(url, Object.assign({ credentials: 'include' }, opts));
        let json = null;
        try { json = await res.json(); } 
        catch(e) { throw new Error("Invalid JSON response"); }

        return { ok: res.ok, status: res.status, json };
    }


    /* ============================================
     *  LOAD ORDERS (Pesanan Saya)
     * ============================================ */
    async function loadOrders(status = "") {
        if (!wrapper) return;

        wrapper.innerHTML = `
            <div class="empty-state">
                <i class="fas fa-spinner fa-pulse"></i>
                <h4>Memuat pesanan...</h4>
            </div>
        `;

        const url = status ? `${API_ORDERS}?status=${status}` : API_ORDERS;

        try {
            const res = await fetch(url, { credentials: "include" });
            const data = await res.json();

            if (!data.success) throw new Error(data.message);
            renderOrders(data.data || []);

        } catch (err) {
            wrapper.innerHTML = `
                <div class="empty-state">
                    <i class="fas fa-exclamation-circle"></i>
                    <h4>Gagal memuat pesanan</h4>
                    <p>${err.message}</p>
                </div>
            `;
        }
    }

function generateOrderButton(o) {
    switch (o.status) {
        case "pending":
            return `<a href="payment.php?order=${o.id}" class="btn btn-outline-warning">Bayar Sekarang</a>`;
        
        case "dikemas":
            return `<a href="detail.php?order=${o.id}" class="btn btn-outline-secondary">Lihat Detail</a>`;
        
        case "dikirim":
            return `<a href="tracking.php?order=${o.id}" class="btn btn-outline-primary">Lacak Pesanan</a>`;
        
        case "selesai":
            return `<a href="review.php?order=${o.id}" class="btn btn-outline-success">Beri Ulasan</a>`;
        
        default:
            return `<a href="detail.php?order=${o.id}" class="btn btn-outline-secondary">Detail</a>`;
    }
}


    function renderOrders(rows) {
        if (!wrapper) return;

        if (!rows.length) {
            wrapper.innerHTML = `
                <div class="empty-state">
                    <i class="fas fa-shopping-bag"></i>
                    <h4>Belum ada pesanan</h4>
                    <p>Anda belum melakukan pembelian.</p>
                </div>
            `;
            return;
        }

        wrapper.innerHTML = "";

        rows.forEach(o => {
            const statusClass = `status-${o.status}`;
            const total = new Intl.NumberFormat("id-ID").format(o.total_harga);
            let img = "img/product-1.jpg";

            if (o.image) {
                if (o.image.startsWith("http")) {
                    // Sudah URL lengkap dari API
                    img = o.image;
                } else {
                    // Hanya filename
                    img = `/uploads/${o.image}`;
                }
            }

            wrapper.innerHTML += `
                <div class="order-card">
                    <div class="order-header">
                        <h6 class="order-id">${o.order_code}</h6>
                        <span class="order-status ${statusClass}">${o.status.toUpperCase()}</span>
                    </div>

                    <div class="order-body">
                        <div class="product-info">
                            <img class="product-image" src="${img}" alt="Product Image">
                            <div class="product-details">
                                <h6>${o.product_name}</h6>
                                <small>Jumlah: ${o.item_count} item</small>
                            </div>
                        </div>

                        <div class="order-footer">
                            <div class="order-total">Rp ${total}</div>
                            <div class="order-actions">
                                ${generateOrderButton(o)}
                            </div>

                        </div>
                    </div>
                </div>
            `;
        });
    }

    // Event tab status klik
    document.querySelectorAll(".nav-link[data-status]").forEach(tab => {
        tab.addEventListener("click", function () {
            document.querySelector(".nav-link.active").classList.remove("active");
            this.classList.add("active");
            loadOrders(this.dataset.status);
        });
    });

    // Load awal (tab semua)
    if (wrapper) loadOrders("");


    /* ============================================
     *  PROFILE
     * ============================================ */
    async function loadProfile() {
        if (!profileMsg) return;

        profileMsg.textContent = "";

        try {
            const { ok, json } = await fetchJson(API_PROFILE);
            if (!ok || !json.success) throw new Error(json.message);

            const u = json.data || {};
            document.getElementById('fullName').value   = u.username || '';
            document.getElementById('email').value      = u.email || '';
            document.getElementById('phone').value      = u.phone || '';
            document.getElementById('birthdate').value  = u.birthdate ? u.birthdate.split(' ')[0] : '';

            const g = (u.gender || "").toLowerCase();
            document.getElementById('gender').value = g.startsWith('l') ? 'L' : g.startsWith('p') ? 'P' : '';

            if (u.avatar) {
                document.getElementById('profilePreview').src = u.avatar;
            }

        } catch (err) {
            profileMsg.style.color = "#d9534f";
            profileMsg.textContent = "Gagal memuat profil: " + err.message;
        }
    }

    if (saveProfileBtn) {
        saveProfileBtn.addEventListener("click", async function () {
            if (!profileMsg) return;

            profileMsg.style.color = "";
            profileMsg.textContent = "Menyimpan...";

            const payload = {
                username:  document.getElementById('fullName').value.trim(),
                email:     document.getElementById('email').value.trim(),
                phone:     document.getElementById('phone').value.trim(),
                birthdate: document.getElementById('birthdate').value || null,
                gender:    document.getElementById('gender').value || null
            };

            try {
                const { ok, json } = await fetchJson(API_PROFILE, {
                    method: 'POST',
                    headers: { 'Content-Type':'application/json' },
                    body: JSON.stringify(payload)
                });

                if (!ok || !json.success) throw new Error(json.message);

                profileMsg.style.color = '#28a745';
                profileMsg.textContent = json.message || "Profil tersimpan";
                setTimeout(loadProfile, 300);

            } catch (err) {
                profileMsg.style.color = '#d9534f';
                profileMsg.textContent = "Gagal menyimpan: " + err.message;
            }
        });
    }

    if (window.location.search.includes("page=profil")) {
        loadProfile();
    }


    /* ============================================
     *  ADDRESS
     * ============================================ */

    async function loadAddresses() {
        if (!listEl) return;

        listEl.innerHTML = `
            <div class="empty-state">
                <i class="fas fa-spinner fa-pulse"></i>
                <h4>Memuat alamat...</h4>
            </div>
        `;

        try {
            const { ok, json } = await fetchJson(API_ADDR);
            if (!ok || !json.success) throw new Error(json.message);

            renderAddresses(json.data || []);

        } catch (err) {
            listEl.innerHTML = `
                <div class="empty-state">
                    <h4>Gagal memuat alamat</h4>
                    <p>${escapeHtml(err.message)}</p>
                </div>
            `;
        }
    }

    function renderAddresses(rows) {
        if (!listEl) return;

        listEl.innerHTML = "";

        if (!rows.length) {
            listEl.innerHTML = `
                <div class="empty-state">
                    <i class="fas fa-map-marker-alt"></i>
                    <h4>Belum ada alamat.</h4>
                    <p>Tambahkan alamat pengiriman Anda.</p>
                </div>
            `;
            return;
        }

        rows.forEach(a => {
            const isDef = Number(a.is_default) === 1;

            const div = document.createElement("div");
            div.className = "address-card";
            div.innerHTML = `
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h6>${escapeHtml(a.nama_penerima)} 
                            ${isDef ? '<span class="badge badge-success">Utama</span>' : ''}
                        </h6>
                        <p class="mb-1">${escapeHtml(a.jalan || '')} ${escapeHtml(a.rt_rw || '')}</p>
                        <p class="mb-1">Kelurahan ${escapeHtml(a.kelurahan || '')}, Kecamatan ${escapeHtml(a.kecamatan || '')}</p>
                        <p class="mb-1">Kota ${escapeHtml(a.nama_kota || a.kota_kabupaten || '')}, ${escapeHtml(a.provinsi || '')}${a.kode_pos ? ' - ' + escapeHtml(a.kode_pos) : ''}</p>
                        <p class="mb-0">${escapeHtml(a.phone || a.nomor_telepon || '')}</p>
                    </div>

                    <div class="btn-group">
                        <button class="btn btn-sm btn-outline-secondary" data-action="edit" data-id="${a.id}">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="btn btn-sm btn-outline-danger" data-action="delete" data-id="${a.id}">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </div>
                </div>
            `;

            listEl.appendChild(div);
        });

        bindAddressActions();
    }

    function bindAddressActions() {
        // Edit
        listEl.querySelectorAll('button[data-action="edit"]').forEach(btn => {
            btn.addEventListener("click", async function () {
                const id = this.dataset.id;

                try {
                    const { ok, json } = await fetchJson(API_ADDR + '?id=' + id);
                    if (!ok || !json.success) throw new Error(json.message);

                    fillAddressForm(json.data);
                    editingId = id;
                    $('#addAddressModal').modal('show');

                } catch (err) {
                    alert("Gagal mengambil alamat: " + err.message);
                }
            });
        });

        // Hapus
        listEl.querySelectorAll('button[data-action="delete"]').forEach(btn => {
            btn.addEventListener("click", async function () {
                const id = this.dataset.id;
                if (!confirm("Hapus alamat ini?")) return;

                try {
                    const { ok, json } = await fetchJson(API_ADDR + '?id=' + id, { method:'DELETE' });
                    if (!ok || !json.success) throw new Error(json.message);

                    loadAddresses();

                } catch (err) {
                    alert("Gagal menghapus: " + err.message);
                }
            });
        });
    }

    function fillAddressForm(a) {
        form.elements['nama_penerima'].value = a.nama_penerima || "";
        form.elements['nomor_telepon'].value = a.phone || "";
        form.elements['alamat_jalan'].value = a.jalan || "";
        form.elements['rt_rw'].value = a.rt_rw || "";
        form.elements['kelurahan'].value = a.kelurahan || "";
        form.elements['kecamatan'].value = a.kecamatan || "";
        form.elements['kota_kabupaten'].value = a.nama_kota || "";
        form.elements['provinsi'].value = a.provinsi || "";
        form.elements['kode_pos'].value = a.kode_pos || "";
        form.elements['set_as_default'].checked = Number(a.is_default) === 1;
    }

    if (btnAdd && form) {
        btnAdd.addEventListener("click", function () {
            editingId = null;
            form.reset();
            form.elements['set_as_default'].checked = false;
        });
    }

    if (saveAddrBtn && form) {
        saveAddrBtn.addEventListener("click", () => {
            form.dispatchEvent(new Event("submit", { cancelable: true }));
        });
    }

    if (form) {
        form.addEventListener("submit", async function (e) {
            e.preventDefault();

            const payload = {
                nama_penerima:   form.elements['nama_penerima'].value.trim(),
                nomor_telepon:   form.elements['nomor_telepon'].value.trim(),
                alamat_jalan:    form.elements['alamat_jalan'].value.trim(),
                rt_rw:           form.elements['rt_rw'].value.trim(),
                kelurahan:       form.elements['kelurahan'].value.trim(),
                kecamatan:       form.elements['kecamatan'].value.trim(),
                kota_id:         document.getElementById('kota_id_hidden').value || '',
                kota_kabupaten:  form.elements['kota_kabupaten'].value.trim(),
                provinsi:        form.elements['provinsi'].value.trim(),
                kode_pos:        form.elements['kode_pos'].value.trim(),
                set_as_default:  form.elements['set_as_default'].checked ? 1 : 0
            };

            try {
                let resp;
                if (editingId) {
                    resp = await fetchJson(API_ADDR + '?id=' + editingId, {
                        method: 'PUT',
                        headers: { 'Content-Type':'application/json' },
                        body: JSON.stringify(payload)
                    });
                } else {
                    resp = await fetchJson(API_ADDR, {
                        method: 'POST',
                        headers: { 'Content-Type':'application/json' },
                        body: JSON.stringify(payload)
                    });
                }

                if (!resp.ok || !resp.json.success) throw new Error(resp.json.message);
                $('#addAddressModal').modal('hide');
                loadAddresses();

            } catch (err) {
                alert("Gagal menyimpan alamat: " + err.message);
            }
        });
    }

    // Autocomplete kota
    (function attachKotaAutocomplete() {
        const kotaInput    = document.getElementById('kotaInput');
        const kotaIdInput  = document.getElementById('kota_id_hidden');
        const dropdown     = document.getElementById('kotaAutocomplete');

        if (!kotaInput || !kotaIdInput || !dropdown) return;

        let timer = null;

        kotaInput.addEventListener('input', () => {
            clearTimeout(timer);
            kotaIdInput.value = '';

            timer = setTimeout(async () => {
                const q = kotaInput.value.trim();
                dropdown.innerHTML = '';
                if (!q) return;

                try {
                    const res = await fetch(
                        'http://localhost/backend/api/cities_search.php?q=' + encodeURIComponent(q),
                        { credentials:'include' }
                    );

                    if (!res.ok) return;

                    const rows = await res.json();
                    if (!Array.isArray(rows)) return;

                    rows.forEach(r => {
                        const item = document.createElement('div');
                        item.textContent = r.name;
                        item.dataset.id  = r.id;
                        item.style.cursor = 'pointer';
                        item.style.padding = '6px 8px';

                        item.addEventListener('click', () => {
                            kotaInput.value = r.name;
                            kotaIdInput.value = r.id;
                            dropdown.innerHTML = '';
                        });

                        dropdown.appendChild(item);
                    });

                } catch (err) {
                    console.error(err);
                }

            }, 250);
        });

        document.addEventListener('click', e => {
            if (!dropdown.contains(e.target) && e.target !== kotaInput)
                dropdown.innerHTML = '';
        });

    })();

    // Load addresses when on alamat page
    if (window.location.search.includes("page=alamat")) {
        loadAddresses();
    }

});
</script>
