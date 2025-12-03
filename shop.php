<?php
include 'partials/head.php';
include __DIR__ . '/../backend/config/config.php';
$db = get_db();

// Fetch categories
$catStmt = $db->query("SELECT id_kategori, nama_kategori FROM kategori_produk ORDER BY nama_kategori ASC");
$allCategories = $catStmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include 'partials/topbar.php'; ?>
<?php include 'partials/navbar.php'; ?>

<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Shop</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="index.php">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Shop</p>
        </div>
    </div>
</div>

<!-- Shop Start -->
<div class="container-fluid pt-5">
    <style>
        /* Ensure product images keep consistent crop regardless of original dimensions */
        /* Fixed card image height to 300px for consistent grid; object-fit will crop as needed */
        .product-img { height: 300px; }
        .product-img img { height: 100%; width: 100%; object-fit: cover; display: block; }
    </style>
    <div class="row px-xl-5">

        <!-- Shop Product Start -->
        <div class="col-lg-12">
            <div class="row pb-3">

                <!-- Filter & Search -->
                <div class="col-12 pb-1">
                    <div class="card mb-4 border-0 shadow-sm">
                        <div class="card-body bg-light rounded">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle text-primary border-primary" type="button" data-toggle="dropdown" style="border-radius: 50px; background-color: rgba(0, 123, 255, 0.1);">
                                            <i class="fa fa-filter mr-1"></i> Filter
                                        </button>
                                        <div class="dropdown-menu p-3" style="min-width: 250px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                                            <form id="filterForm" method="get" class="mb-0">
                                                <div class="mb-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="kategori[]" value="Semua Kategori" id="semua-kategori" onchange="this.form.submit()" <?= in_array('Semua Kategori', $filterKategoris ?? []) ? 'checked' : '' ?>>
                                                        <label class="form-check-label" for="semua-kategori">
                                                            Semua Kategori
                                                        </label>
                                                    </div>
                                                    <?php foreach ($allCategories as $category): ?>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="kategori[]" value="<?= htmlspecialchars($category['nama_kategori']) ?>" id="kategori-<?= $category['id_kategori'] ?>" onchange="this.form.submit()" <?= in_array($category['nama_kategori'], $filterKategoris ?? []) ? 'checked' : '' ?>>
                                                            <label class="form-check-label" for="kategori-<?= $category['id_kategori'] ?>">
                                                                <?= htmlspecialchars($category['nama_kategori']) ?>
                                                            </label>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                                <?php if (isset($_GET['search'])): ?>
                                                    <input type="hidden" name="search" value="<?= htmlspecialchars($_GET['search']) ?>">
                                                <?php endif; ?>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <form method="get" class="position-relative">
                                        <?php if (!empty($filterKategoris)): ?>
                                            <?php foreach ($filterKategoris as $kategori): ?>
                                                <input type="hidden" name="kategori[]" value="<?= htmlspecialchars($kategori) ?>">
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                        <input
                                            type="text"
                                            name="search"
                                            value="<?= htmlspecialchars($_GET['search'] ?? '') ?>"
                                            class="form-control ps-5 border-primary"
                                            placeholder="Cari produk..."
                                            style="border-radius: 50px; background-color: rgba(0, 123, 255, 0.1);"
                                        >
                                        <i class="fas fa-search position-absolute text-primary"
                                            style="top: 50%; right: 15px; transform: translateY(-50%); pointer-events: none;"></i>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                // Pagination setup
                $limit = 12;
                $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
                $offset = ($page - 1) * $limit;

                // Filters
                $filterKategoris = $_GET['kategori'] ?? [];
                if (!is_array($filterKategoris)) {
                    $filterKategoris = [];
                }
                $search = trim($_GET['search'] ?? '');

                $where = [];
                $params = [];

                if (!empty($filterKategoris) && !in_array('Semua Kategori', $filterKategoris)) {
                    $placeholders = [];
                    foreach ($filterKategoris as $index => $kategori) {
                        $placeholders[] = ":kategori$index";
                        $params[":kategori$index"] = $kategori;
                    }
                    $where[] = "kategori IN (" . implode(',', $placeholders) . ")";
                }

                if ($search !== '') {
                    $where[] = "nama LIKE :search";
                    $params[':search'] = "%$search%";
                }

                $whereClause = $where ? 'WHERE ' . implode(' AND ', $where) : '';

                // Count total products
                $stmt = $db->prepare("SELECT COUNT(*) FROM produk $whereClause");
                $stmt->execute($params);
                $total_products = $stmt->fetchColumn();
                $total_pages = ceil($total_products / $limit);

                // Get products for current page
                $stmt = $db->prepare("SELECT * FROM produk $whereClause ORDER BY created_at DESC LIMIT :limit OFFSET :offset");
                foreach ($params as $k => $v) $stmt->bindValue($k, $v);
                $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
                $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
                $stmt->execute();
                $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($products as $produk):
                    // Pastikan foto URL lengkap
                    $fotoUrl = !empty($produk['foto']) 
                        ? $produk['foto'] 
                        : BACKEND_URL . '/assets/images/products/default.png';
                ?>
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <a href="detail.php?id=<?= $produk['id'] ?>" class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="<?= htmlspecialchars($fotoUrl) ?>" alt="<?= htmlspecialchars($produk['nama']) ?>">
                        </a>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3"><?= htmlspecialchars($produk['nama']) ?></h6>
                            <div class="d-flex justify-content-center align-items-center">
                                <?php if(!empty($produk['harga_diskon']) && $produk['harga_diskon'] > 0): ?>
                                    <h6 class="text-muted mr-2 mb-0"><del>Rp <?= number_format($produk['harga'], 0, ',', '.') ?></del></h6>
                                    <h6 class="product-price text-danger mb-0">Rp <?= number_format($produk['harga_diskon'], 0, ',', '.') ?></h6>
                                <?php else: ?>
                                    <h6 class="product-price text-danger mb-0">Rp <?= number_format($produk['harga'], 0, ',', '.') ?></h6>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                    <a href="detail.php?id=<?= $produk['id'] ?>" class="btn btn-sm text-primary p-0">
                        <i class="fas fa-eye text-primary mr-1"></i>View Detail
                    </a>
                    <div class="d-flex">
                        <a href="#" class="btn btn-sm btn-outline-secondary position-relative mr-2 cart-btn" data-id="<?= $produk['id'] ?>" title="Add to cart">
                            <i class="fas fa-shopping-cart text-primary"></i>
                        </a>
                        <a href="#" class="btn border like-btn" data-id="<?= $produk['id'] ?>" title="Add to Wishlist">
                            <i class="far fa-heart" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                    </div>
                </div>
                <?php endforeach; ?>

                <!-- Pagination -->
                <div class="col-12 pb-1">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center mb-3">
                            <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
                                <a class="page-link" href="?<?= http_build_query(array_merge($_GET, ['page' => max(1,$page-1)])) ?>">&laquo;</a>
                            </li>
                            <?php
                            $start = max(1, $page - 3);
                            $end = min($total_pages, $page + 3);
                            for ($i = $start; $i <= $end; $i++): ?>
                                <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                                    <a class="page-link" href="?<?= http_build_query(array_merge($_GET, ['page' => $i])) ?>"><?= $i ?></a>
                                </li>
                            <?php endfor; ?>
                            <li class="page-item <?= $page >= $total_pages ? 'disabled' : '' ?>">
                                <a class="page-link" href="?<?= http_build_query(array_merge($_GET, ['page' => min($total_pages,$page+1)])) ?>">&raquo;</a>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>
        </div>
        <!-- Shop Product End -->

    </div>
</div>
<!-- Shop End -->

<?php include 'partials/footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    $('.like-btn').click(function(e){
    e.preventDefault();
    
    let btn = $(this);
    let productId = btn.data('id');

    $.ajax({
        url: '<?= BACKEND_URL ?>/api/wishlist.php',
        method: 'POST',
        xhrFields: {
            withCredentials: true // ← WAJIB AGAR SESSION TERKIRIM
        },
        crossDomain: true,        // ← penting
        data: { id: productId },
        success: function(response){
            if(response.status === 'added'){
                btn.find('i').removeClass('far').addClass('fas');
            } else if(response.status === 'removed'){
                btn.find('i').removeClass('fas').addClass('far');
            } else {
                alert(response.message);
            }
            loadWishlistCount();

        }
    });
});


    // Handle "Semua Kategori" checkbox
    $('#semua-kategori').change(function(){
        if ($(this).is(':checked')) {
            // Uncheck all other checkboxes
            $('input[name="kategori[]"]').not(this).prop('checked', false);
        }
    });

    // Handle other category checkboxes
    $('input[name="kategori[]"]').not('#semua-kategori').change(function(){
        if ($(this).is(':checked')) {
            // Uncheck "Semua Kategori" if any other is checked
            $('#semua-kategori').prop('checked', false);
        }
    });

    // Cart API integration
    const BACKEND_BASE = '<?= defined("BACKEND_URL") ? rtrim(BACKEND_URL, "/") : "http://localhost/backend" ?>';
    const CART_API_ADD = BACKEND_BASE + '/api/cart.php?action=add';

    function disableBtn($btn, flag){
        $btn.prop('disabled', !!flag);
        if (flag) $btn.addClass('opacity-50').css('pointer-events','none');
        else $btn.removeClass('opacity-50').css('pointer-events','auto');
    }

    $(document).on('click', '.cart-btn', async function(e){
        e.preventDefault();
        const $btn = $(this);
        if ($btn.data('processing')) return;
        $btn.data('processing', true);
        disableBtn($btn, true);
        const productId = $btn.data('id');

        try {
            const res = await fetch(CART_API_ADD, {
                method: 'POST',
                credentials: 'include',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ product_id: productId, quantity: 1 })
            });
            const j = await res.json().catch(()=>({ success:false, message:'Invalid response' }));
            if (!res.ok || !j.success) throw new Error(j.message || 'Gagal menambahkan ke keranjang');
            loadCart();
            $btn.find('i').removeClass('fas fa-shopping-cart').addClass('fas fa-check text-success');
        setTimeout(()=>{
            $btn.find('i').removeClass('fas fa-check text-success').addClass('fas fa-shopping-cart text-primary');
        }, 1500);
        } catch (err) {
            alert('Gagal menambahkan ke keranjang: ' + err.message);
            console.error(err);
        } finally {
            $btn.data('processing', false);
            disableBtn($btn, false);
        }
    });
});
</script>
