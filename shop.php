<?php 
include 'partials/head.php'; 
include __DIR__ . '/../backend/config/config.php';
$db = get_db();
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
    <div class="row px-xl-5">

        <!-- Shop Product Start -->
        <div class="col-lg-12">
            <div class="row pb-3">

                <!-- Filter & Search -->
                <div class="col-12 pb-1">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <form action="" method="GET">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Search by name" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
                                <div class="input-group-append">
                                    <button class="input-group-text bg-transparent text-primary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="d-flex align-items-center">
                            <button type="button" class="btn btn-outline-primary mr-2" data-toggle="modal" data-target="#filterModal">
                                <i class="fa fa-filter mr-1"></i> Filter
                            </button>
                        </div>
                    </div>
                </div>

                <?php
                // Pagination setup
                $limit = 12;
                $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
                $offset = ($page - 1) * $limit;

                // Search filter
                $search = isset($_GET['search']) ? "%{$_GET['search']}%" : "%";

                // Count total products
                $stmt = $db->prepare("SELECT COUNT(*) FROM produk WHERE nama LIKE :search");
                $stmt->execute([':search' => $search]);
                $total_products = $stmt->fetchColumn();
                $total_pages = ceil($total_products / $limit);

                // Get products for current page
                $stmt = $db->prepare("SELECT * FROM produk WHERE nama LIKE :search ORDER BY created_at DESC LIMIT :limit OFFSET :offset");
                $stmt->bindValue(':search', $search, PDO::PARAM_STR);
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
                            <div class="d-flex justify-content-center">
                                <?php if(!empty($produk['harga_diskon']) && $produk['harga_diskon'] > 0): ?>
                                    <h6 class="text-muted mr-2"><del>Rp <?= number_format($produk['harga'], 0, ',', '.') ?></del></h6>
                                    <h6>Rp <?= number_format($produk['harga_diskon'], 0, ',', '.') ?></h6>
                                <?php else: ?>
                                    <h6>Rp <?= number_format($produk['harga'], 0, ',', '.') ?></h6>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                    <a href="detail.php?id=<?= $produk['id'] ?>" class="btn btn-sm text-primary p-0">
                        <i class="fas fa-eye text-primary mr-1"></i>View Detail
                    </a>
                    <div class="d-flex">
                        <a href="#" class="btn btn-sm btn-outline-secondary position-relative mr-2 cart-btn" title="Add to cart">
                            <i class="fas fa-shopping-cart text-primary"></i>
                        </a>
                        <a href="#" class="btn border like-btn" data-id="<?= $produk['id'] ?>" title="Add to Wishlist">
                            <i class="far fa-heart"></i>
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
                                <a class="page-link" href="?page=<?= $page-1 ?>&search=<?= urlencode($_GET['search'] ?? '') ?>">&laquo;</a>
                            </li>
                            <?php for($i=1; $i<=$total_pages; $i++): ?>
                                <li class="page-item <?= $i==$page ? 'active' : '' ?>">
                                    <a class="page-link" href="?page=<?= $i ?>&search=<?= urlencode($_GET['search'] ?? '') ?>"><?= $i ?></a>
                                </li>
                            <?php endfor; ?>
                            <li class="page-item <?= $page >= $total_pages ? 'disabled' : '' ?>">
                                <a class="page-link" href="?page=<?= $page+1 ?>&search=<?= urlencode($_GET['search'] ?? '') ?>">&raquo;</a>
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

        $.post('<?= BACKEND_URL ?>/api/wishlist.php', { id: productId }, function(response){
            if(response.status === 'added'){
                btn.find('i').removeClass('far').addClass('fas'); // full heart
            } else if(response.status === 'removed'){
                btn.find('i').removeClass('fas').addClass('far'); // empty heart
            } else if(response.status === 'error'){
                alert(response.message);
            }
        }, 'json');
    });
});
</script>