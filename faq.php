<?php include 'partials/head.php'; ?>
<?php include 'partials/topbar.php'; ?>
<?php include 'partials/navbar.php'; ?>

<!-- FAQ Section Start -->
<div class="container py-5" style="background: linear-gradient(135deg, #f8fafc 60%, #e3f0ff 100%); border-radius: 18px; box-shadow: 0 2px 16px rgba(0,123,255,0.07);">
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold text-primary mb-2">
            <i class="fa fa-question-circle text-secondary me-2"></i>Frequently Asked Questions
        </h1>
        <p class="text-muted">Temukan jawaban atas pertanyaan yang sering diajukan oleh pelanggan kami.</p>
    </div>

    <div class="accordion shadow-sm rounded" id="faqAccordion">
        <!-- Item 1 -->
        <div class="accordion-item mb-3 border-0">
            <h2 class="accordion-header" id="faqOne">
                <button class="accordion-button fw-semibold text-dark bg-light d-flex align-items-center" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapseOne" 
                        aria-expanded="true" aria-controls="collapseOne">
                    <i class="fa fa-store-alt text-primary me-2"></i>
                    Apa itu Effort Outdoor?
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" 
                 aria-labelledby="faqOne" data-bs-parent="#faqAccordion">
                <div class="accordion-body bg-white">
                    Effort Outdoor adalah toko perlengkapan outdoor yang menyediakan berbagai kebutuhan
                    untuk aktivitas seperti hiking, camping, dan travelling. Kami berkomitmen menghadirkan produk berkualitas dengan harga terjangkau.
                </div>
            </div>
        </div>

        <!-- Item 2 -->
        <div class="accordion-item mb-3 border-0">
            <h2 class="accordion-header" id="faqTwo">
                <button class="accordion-button collapsed fw-semibold text-dark bg-light d-flex align-items-center" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapseTwo" 
                        aria-expanded="false" aria-controls="collapseTwo">
                    <i class="fa fa-certificate text-success me-2"></i>
                    Apakah produk yang dijual original?
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" 
                 aria-labelledby="faqTwo" data-bs-parent="#faqAccordion">
                <div class="accordion-body bg-white">
                    Ya, semua produk di Effort Outdoor dijamin 100% original dan bergaransi resmi dari brand terkait.
                </div>
            </div>
        </div>

        <!-- Item 3 -->
        <div class="accordion-item mb-3 border-0">
            <h2 class="accordion-header" id="faqThree">
                <button class="accordion-button collapsed fw-semibold text-dark bg-light d-flex align-items-center" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapseThree" 
                        aria-expanded="false" aria-controls="collapseThree">
                    <i class="fa fa-shopping-cart text-warning me-2"></i>
                    Bagaimana cara melakukan pemesanan?
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" 
                 aria-labelledby="faqThree" data-bs-parent="#faqAccordion">
                <div class="accordion-body bg-white">
                    Kamu bisa melakukan pemesanan langsung di website kami dengan menambahkan produk ke keranjang,
                    lalu lanjut ke halaman checkout untuk pembayaran.
                </div>
            </div>
        </div>

        <!-- Item 4 -->
        <div class="accordion-item mb-3 border-0">
            <h2 class="accordion-header" id="faqFour">
                <button class="accordion-button collapsed fw-semibold text-dark bg-light d-flex align-items-center" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapseFour" 
                        aria-expanded="false" aria-controls="collapseFour">
                    <i class="fa fa-undo-alt text-danger me-2"></i>
                    Apakah tersedia layanan pengembalian barang?
                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" 
                 aria-labelledby="faqFour" data-bs-parent="#faqAccordion">
                <div class="accordion-body bg-white">
                    Ya, kami menyediakan layanan retur barang maksimal 7 hari setelah produk diterima,
                    dengan syarat kondisi produk masih utuh dan lengkap dengan kemasan asli.
                </div>
            </div>
        </div>

        <!-- Item 5 -->
        <div class="accordion-item border-0">
            <h2 class="accordion-header" id="faqFive">
                <button class="accordion-button collapsed fw-semibold text-dark bg-light d-flex align-items-center" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapseFive" 
                        aria-expanded="false" aria-controls="collapseFive">
                    <i class="fa fa-headset text-info me-2"></i>
                    Bagaimana cara menghubungi layanan pelanggan?
                </button>
            </h2>
            <div id="collapseFive" class="accordion-collapse collapse" 
                 aria-labelledby="faqFive" data-bs-parent="#faqAccordion">
                <div class="accordion-body bg-white">
                    Kamu bisa menghubungi kami melalui WhatsApp di <b>+62 812-3456-7890</b> atau melalui email 
                    <a href="mailto:support@effortoutdoor.com">support@effortoutdoor.com</a>.
                </div>
            </div>
        </div>
    </div>
</div>
<!-- FAQ Section End -->

<?php include 'partials/footer.php'; ?>
