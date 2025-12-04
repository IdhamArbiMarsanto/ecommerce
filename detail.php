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
        <div class="col-lg-7 pb-5" id="productDetail">
            <h3 class="font-weight-semi-bold"><?= htmlspecialchars($produk['nama']) ?></h3>
            <div class="d-flex mb-3">
                <div class="text-primary mr-2" id="productRating">
                    <!-- Rating bintang akan di-update via JavaScript -->
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star-half-alt"></small>
                    <small class="far fa-star"></small>
                </div>
                <small class="pt-1">
                    <a href="#" id="toggleReviews" style="color: #bbd197; text-decoration: none; font-weight: 600;">
                        Lihat Ulasan (<span id="reviewCount">0</span>)
                    </a>
                </small>
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

        <!-- Reviews Section -->
        <div class="col-lg-7 pb-5" id="reviewsSection" style="display: none;">
            <div style="margin-bottom: 25px; padding-bottom: 20px; border-bottom: 2px solid #e9ecef;">
                <button id="backToDetail" class="btn btn-primary" style="background: linear-gradient(135deg, #bbd197 0%, #9bb372 100%); border: none; padding: 10px 20px; font-weight: 600; border-radius: 6px;">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali ke Detail Produk
                </button>
            </div>

            <h4 class="mb-4" style="font-weight: 700; font-size: 1.4rem;"><i class="fas fa-star mr-2" style="color: #ffc107;"></i>Ulasan Produk</h4>

            <!-- Reviews Stats -->
            <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 30px;">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <div style="font-size: 2rem; font-weight: 700; color: #bbd197;">4.2</div>
                        <div style="color: #ffc107; margin-bottom: 10px;">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <small style="color: #6c757d;">Rating Rata-rata</small>
                    </div>
                    <div class="col-md-4 text-center">
                        <div style="font-size: 2rem; font-weight: 700; color: #bbd197;">50</div>
                        <small style="color: #6c757d;">Total Ulasan</small>
                    </div>
                    <div class="col-md-4">
                        <div style="margin-bottom: 8px; display: flex; align-items: center; justify-content: space-between;">
                            <small>5⭐</small>
                            <div style="flex: 1; height: 6px; background: #e9ecef; margin: 0 10px; border-radius: 3px;">
                                <div style="height: 100%; background: #bbd197; width: 60%; border-radius: 3px;"></div>
                            </div>
                            <small style="min-width: 30px; text-align: right;">30</small>
                        </div>
                        <div style="margin-bottom: 8px; display: flex; align-items: center; justify-content: space-between;">
                            <small>4⭐</small>
                            <div style="flex: 1; height: 6px; background: #e9ecef; margin: 0 10px; border-radius: 3px;">
                                <div style="height: 100%; background: #bbd197; width: 20%; border-radius: 3px;"></div>
                            </div>
                            <small style="min-width: 30px; text-align: right;">10</small>
                        </div>
                        <div style="display: flex; align-items: center; justify-content: space-between;">
                            <small>3⭐</small>
                            <div style="flex: 1; height: 6px; background: #e9ecef; margin: 0 10px; border-radius: 3px;">
                                <div style="height: 100%; background: #bbd197; width: 10%; border-radius: 3px;"></div>
                            </div>
                            <small style="min-width: 30px; text-align: right;">5</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reviews List -->
            <div id="reviewsList">
                <!-- Reviews akan dimuat via AJAX -->
                <div style="text-align: center; padding: 40px;">
                    <i class="fas fa-spinner fa-pulse" style="font-size: 2rem; color: #bbd197;"></i>
                    <p style="color: #6c757d; margin-top: 10px;">Memuat ulasan...</p>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- Shop Detail End -->

<?php include 'partials/footer.php'; ?>

<?php $BACKEND_BASE = defined('BACKEND_URL') ? rtrim(BACKEND_URL, '/') : 'http://localhost/backend'; ?>
<script>
document.addEventListener('DOMContentLoaded', function(){
    const productDetail = document.getElementById('productDetail');
    const reviewsSection = document.getElementById('reviewsSection');
    const toggleReviewsBtn = document.getElementById('toggleReviews');
    const backToDetailBtn = document.getElementById('backToDetail');
    const reviewsList = document.getElementById('reviewsList');
    const productId = <?= intval($id) ?>;

    // Toggle reviews
    toggleReviewsBtn.addEventListener('click', function(e) {
        e.preventDefault();
        productDetail.style.display = 'none';
        reviewsSection.style.display = 'block';
        loadReviews();
    });

    // Back to detail
    backToDetailBtn.addEventListener('click', function(e) {
        e.preventDefault();
        productDetail.style.display = 'block';
        reviewsSection.style.display = 'none';
    });

    // Load reviews via AJAX
    async function loadReviews() {
        const apiUrl = 'http://localhost/backend/api/reviews_list.php?product_id=' + productId;
        
        try {
            const response = await fetch(apiUrl, { credentials: 'include' });
            const data = await response.json();

            if (data.success && data.data.length > 0) {
                renderReviews(data.data);
                // Update review count
                document.getElementById('reviewCount').textContent = data.data.length;
                // Update rating stars
                updateRatingStars(data.data);
            } else {
                reviewsList.innerHTML = `
                    <div style="text-align: center; padding: 40px;">
                        <i class="fas fa-comments" style="font-size: 3rem; color: #bbd197; opacity: 0.5;"></i>
                        <p style="color: #6c757d; margin-top: 10px;">Belum ada ulasan untuk produk ini</p>
                    </div>
                `;
                document.getElementById('reviewCount').textContent = '0';
            }
        } catch (err) {
            console.error(err);
            // Jika API error, tampilkan dummy data
            reviewsList.innerHTML = `
                <div style="text-align: center; padding: 40px; color: #6c757d;">
                    <p>Gagal memuat ulasan. Menampilkan contoh data...</p>
                </div>
            `;
            loadDummyReviews();
            updateRatingStars(dummyReviews);
        }
    }

    // Update rating stars berdasarkan review data
    function updateRatingStars(reviews) {
        if (!reviews || reviews.length === 0) return;

        const avgRating = reviews.reduce((sum, r) => sum + r.rating, 0) / reviews.length;
        const ratingDiv = document.getElementById('productRating');
        let starsHtml = '';

        for (let i = 1; i <= 5; i++) {
            if (i <= Math.floor(avgRating)) {
                starsHtml += '<small class="fas fa-star"></small>';
            } else if (i === Math.ceil(avgRating) && avgRating % 1 !== 0) {
                starsHtml += '<small class="fas fa-star-half-alt"></small>';
            } else {
                starsHtml += '<small class="far fa-star"></small>';
            }
        }

        ratingDiv.innerHTML = starsHtml;
    }

    let dummyReviews = [];

    function renderReviews(reviews) {
        reviewsList.innerHTML = '';
        reviews.forEach(review => {
            const stars = '⭐'.repeat(review.rating) + '☆'.repeat(5 - review.rating);
            const date = new Date(review.created_at).toLocaleDateString('id-ID', { 
                day: 'numeric', 
                month: 'short', 
                year: 'numeric' 
            });

            const reviewHtml = `
                <div style="border-left: 4px solid #bbd197; padding: 20px; margin-bottom: 20px; background: white; border-radius: 4px;">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 10px;">
                        <div>
                            <strong style="font-size: 1.05rem;">${escapeHtml(review.user_name)}</strong>
                            ${review.is_anonymous ? '<span style="background: #e9ecef; padding: 2px 8px; border-radius: 4px; font-size: 0.75rem; margin-left: 8px; color: #6c757d;"><i class="fas fa-user-secret mr-1"></i>Anonim</span>' : ''}
                        </div>
                    </div>
                    <div style="color: #ffc107; margin-bottom: 8px; font-size: 0.9rem;">
                        ${stars} <small style="color: #6c757d; margin-left: 8px;">${date}</small>
                    </div>
                    <p style="margin-bottom: 15px; color: #495057; line-height: 1.6;">${escapeHtml(review.review_text)}</p>
                    
                    ${review.photo ? `
                        <div style="margin-bottom: 15px;">
                            <img src="${review.photo}" alt="Review photo" style="max-width: 100%; max-height: 300px; border-radius: 8px; object-fit: cover; border: 1px solid #e9ecef;">
                        </div>
                    ` : `
                        <div style="width: 100%; height: 200px; background: linear-gradient(135deg, #f0f0f0 0%, #e0e0e0 100%); border-radius: 8px; margin-bottom: 15px; display: flex; align-items: center; justify-content: center;">
                            <div style="text-align: center;">
                                <i class="fas fa-image" style="font-size: 2rem; color: #ccc; margin-bottom: 10px; display: block;"></i>
                                <small style="color: #999;">Tidak ada foto</small>
                            </div>
                        </div>
                    `}
                </div>
            `;
            reviewsList.innerHTML += reviewHtml;
        });
    }

    function loadDummyReviews() {
        dummyReviews = [
            {
                user_name: 'Budi Santoso',
                rating: 5,
                review_text: 'Produk sangat bagus dan sesuai dengan deskripsi. Kualitas bahan premium, jahitan rapi. Pengiriman juga cepat!',
                created_at: '2025-12-02',
                photo: null,
                is_anonymous: false
            },
            {
                user_name: 'Siti Nurhaliza',
                rating: 5,
                review_text: 'Terbaik! Warna lebih bagus dari foto, kualitas bahan lebih premium dari harga. Seller responsif dan helpful.',
                created_at: '2025-12-01',
                photo: 'img/product-1.jpg',
                is_anonymous: false
            },
            {
                user_name: 'Pengguna Anonim',
                rating: 4,
                review_text: 'Bagus sih, cuma ukurannya agak membesar. Tapi overall puas dengan pembelian ini.',
                created_at: '2025-11-30',
                photo: null,
                is_anonymous: true
            }
        ];
        renderReviews(dummyReviews);
    }

    function escapeHtml(text) {
        const map = {
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;'
        };
        return text.replace(/[&<>"']/g, m => map[m]);
    }

    document.querySelectorAll('.like-btn').forEach(function(btn){
        btn.addEventListener('click', function(e){
            e.preventDefault();
            const pressed = btn.getAttribute('aria-pressed') === 'true';
            btn.classList.toggle('liked', !pressed);
            btn.setAttribute('aria-pressed', (!pressed).toString());
        });
    });
});
</script>

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
