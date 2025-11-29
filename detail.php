<?php
include 'partials/head.php';
include 'partials/topbar.php';
include 'partials/navbar.php';

// Ambil ID produk dari URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id === 0) {
    die('<h3 class="text-center mt-5">Produk tidak ditemukan</h3>');
}

// Panggil API backend
$apiUrl = "http://localhost/backend/api/product_get.php?id={$id}";
$response = @file_get_contents($apiUrl);
if (!$response) {
    die('<h3 class="text-center mt-5">Gagal mengambil data produk.</h3>');
}

$data = json_decode($response, true);
if (!$data || !$data['success']) {
    die('<h3 class="text-center mt-5">' . htmlspecialchars($data['message'] ?? 'Produk tidak ditemukan') . '</h3>');
}

$produk = $data['data'];
$photos = $data['photos'] ?? [];
?>
<!-- Shop Detail Start -->
<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <!-- Carousel Gambar -->
        <div class="col-lg-5 pb-5">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner border">
                    <?php if (!empty($photos)): ?>
                        <?php foreach ($photos as $index => $photo): ?>
                            <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                                <img class="w-100 h-100"
                                     src="<?= htmlspecialchars($photo['file_path']) ?>"
                                     alt="Foto produk <?= $index + 1 ?>">
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="img/default-product.jpg" alt="Default Image">
                        </div>
                    <?php endif; ?>
                </div>
                <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                    <i class="fa fa-2x fa-angle-left text-dark"></i>
                </a>
                <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                    <i class="fa fa-2x fa-angle-right text-dark"></i>
                </a>
            </div>
        </div>

        <!-- Detail Produk -->
        <div class="col-lg-7 pb-5">
            <h3 class="font-weight-semi-bold"><?= htmlspecialchars($produk['nama']) ?></h3>
            <div class="d-flex mb-3">
                <div class="text-primary mr-2">
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star-half-alt"></small>
                    <small class="far fa-star"></small>
                </div>
                <small class="pt-1">(50 Reviews)</small>
            </div>
            <h3 class="font-weight-semi-bold mb-4">Rp <?= number_format($produk['harga'], 0, ',', '.') ?></h3>
            <p class="mb-4"><?= nl2br(htmlspecialchars($produk['deskripsi'])) ?></p>

            <!-- Info Size -->
            <div class="d-flex mb-3">
                <p class="text-dark font-weight-medium mb-0 mr-3">Ukuran: 
                    <?= htmlspecialchars($produk['size'] ?? '-') ?></p>
                <p class="mb-0">
                    Panjang: <?= htmlspecialchars($produk['panjang'] ?? '-') ?> cm /
                    Lebar: <?= htmlspecialchars($produk['lebar'] ?? '-') ?> cm
                </p>
            </div>

            <!-- Stok -->
            <p class="text-dark font-weight-medium mb-3">Stok: <?= htmlspecialchars($produk['stok']) ?> pcs</p>

            <style>
                .like-btn { width:36px; height:36px; padding:0; display:inline-flex; align-items:center; justify-content:center; border-radius:6px; border:1px solid #ddd; background:#fff; margin-left:8px; }
                .like-btn .heart-icon { width:18px; height:18px; display:block; fill:none; stroke:#e60101; stroke-width:1.5px; }
                .like-btn.liked .heart-icon { fill:#e60101; stroke:none; }
            </style>

            <div class="d-flex align-items-center mb-4 pt-2">
            <!-- Input jumlah -->
            <div class="input-group quantity mr-3" style="width: 130px;">
                <button class="btn btn-primary btn-minus"><i class="fa fa-minus"></i></button>
                <input type="text" id="detailQty" class="form-control bg-secondary text-center" value="1">
                <button class="btn btn-primary btn-plus"><i class="fa fa-plus"></i></button>
            </div>

            <!-- Tombol keranjang -->
            <button id="detailAddCart" class="btn btn-primary px-3 mr-3">
                <i class="fa fa-shopping-cart mr-1"></i>
            </button>

            <!-- Tombol beli sekarang -->
            <button id="detailBuyNow" class="btn btn-primary px-3">Beli Sekarang</button>
            </div>


            <div class="d-flex pt-2">
                <p class="text-dark font-weight-medium mb-0 mr-2">Bagikan:</p>
                <div class="d-inline-flex">
                    <a class="text-dark px-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="text-dark px-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="text-dark px-2" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Review Section -->
    <div class="row px-xl-5">
        <div class="col">
            <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-3">Reviews (0)</a>
            </div>

            <div class="tab-pane fade show active" id="tab-pane-3">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="mb-4">Belum ada ulasan untuk produk ini</h4>
                    </div>
                    <div class="col-md-6">
                        <h4 class="mb-4">Tulis ulasan</h4>
                        <div class="d-flex my-3">
                            <p class="mb-0 mr-2">Rating Anda:</p>
                            <div class="text-primary">
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                        <form>
                            <div class="form-group">
                                <label for="message">Ulasan *</label>
                                <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group mb-0">
                                <input type="submit" value="Kirim Ulasan" class="btn btn-primary px-3">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Shop Detail End -->

<?php include 'partials/footer.php'; ?>

<?php $BACKEND_BASE = defined('BACKEND_URL') ? rtrim(BACKEND_URL, '/') : 'http://localhost/backend'; ?>
<script>
(function(){
  const BACKEND_BASE = '<?= $BACKEND_BASE ?>';
  const CART_API_ADD = BACKEND_BASE + '/api/cart.php?action=add';
  const BUY_NOW_API  = BACKEND_BASE + '/api/buynow.php';
  const productId = <?= intval($produk['id']) ?>;
  const stok = <?= intval($produk['stok']) ?>;

  function getQty(){
    const el = document.getElementById('detailQty');
    let v = parseInt(el.value) || 1;
    if (v < 1) v = 1;
    el.value = v;
    return v;
  }

  function disableBtn(btn, flag){
    if (!btn) return;
    btn.disabled = !!flag;
    if(flag) btn.classList.add('opacity-50');
    else btn.classList.remove('opacity-50');
  }

  // ============================
  // ADD TO CART NORMAL
  // ============================
  async function addToCart(btn, qty){
    try {
      disableBtn(btn, true);
      const res = await fetch(CART_API_ADD, {
        method: 'POST',
        credentials: 'include',
        headers: {'Content-Type':'application/json'},
        body: JSON.stringify({ product_id: productId, quantity: qty })
      });

      const j = await res.json().catch(()=>({ success:false, message:'Invalid response' }));

      if (!res.ok || !j.success)
        throw new Error(j.message || 'Gagal menambahkan ke keranjang');

      loadCart();

      // efek centang
      const icon = btn.querySelector('i');
      const prev = icon.className;
      icon.className = 'fas fa-check text-success';
      setTimeout(()=>{ icon.className = prev; }, 1400);

    } catch (err) {
      alert('Gagal menambahkan ke keranjang: ' + (err.message||''));     
    } finally {
      disableBtn(btn, false);
    }
  }

  // ============================
  // BUY NOW — Langsung checkout
  // ============================
  async function startBuyNow(qty){
    try{
        const res = await fetch(BUY_NOW_API, {
            method:'POST',
            credentials:'include',
            headers:{ 'Content-Type':'application/json' },
            body: JSON.stringify({
                product_id: productId,
                qty: qty   // <-- SUDAH DIBENERIN
            })
        });

        const j = await res.json().catch(()=>null);

        if (!res.ok || !j || !j.success)
            throw new Error(j?.message || "Gagal Buy Now");

        window.location.href = "checkout.php?mode=buynow";

    }catch(err){
        alert("Gagal Buy Now: " + err.message);
        console.error(err);
    }
}


  // events
  const addCartBtn = document.getElementById('detailAddCart');
  addCartBtn?.addEventListener('click', function(e){
    e.preventDefault();
    const qty = getQty();
    addToCart(addCartBtn, qty);
  });

  const buyNowBtn = document.getElementById('detailBuyNow');
  buyNowBtn?.addEventListener('click', function(e){
    e.preventDefault();
    const qty = getQty();
    startBuyNow(qty);
  });

  // plus/minus
  document.querySelectorAll('.btn-minus, .btn-plus').forEach(btn=>{
    btn.addEventListener('click', function(e){
      e.preventDefault();
      const el = document.getElementById('detailQty');
      let v = parseInt(el.value) || 1;
      if(this.classList.contains('btn-minus')){
        v = Math.max(1, v-1);
      } else {
        v = Math.min(stok, v+1);
      }
      el.value = v;
    });
  });

})();
</script>
