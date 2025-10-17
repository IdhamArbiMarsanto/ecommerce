<?php include 'partials/head.php'; ?>
<?php include 'partials/topbar.php'; ?>
<?php include 'partials/navbar.php'; ?>

<!-- FAQ Section Start -->
<div class="container py-5">
    <div class="text-center mb-4">
        <h1 class="display-5 fw-bold text-primary mb-2"><i class="fa fa-question-circle text-secondary"></i> Frequently Asked Questions</h1>
        <p class="text-muted">Klik pertanyaan untuk melihat jawaban. Setiap pertanyaan berada dalam kotak yang sama dan mengembang ke bawah ketika dibuka.</p>
    </div>

    <style>
        .faq-card {
            border-radius: 10px;
            box-shadow: 0 6px 22px rgba(20,40,80,0.06);
            overflow: hidden;
            border: 1px solid #eef3fb;
            margin-bottom: 16px;
        }
        .faq-header {
            background: #fff;
            padding: 18px 20px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .faq-title {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 600;
            color: #223;
            margin: 0;
        }
        .faq-arrow {
            transition: transform .25s ease;
            color: #6c757d;
        }
        .faq-arrow.open { transform: rotate(180deg); color: #007bff; }
        .faq-body {
            padding: 0 20px 18px 20px;
            background: #fff;
            color: #444;
        }
        /* Smooth collapse for faq bodies */
        .faq-card .collapse {
            max-height: 0;
            overflow: hidden;
            transition: max-height .28s ease, padding .28s ease;
            padding-top: 0;
            padding-bottom: 0;
        }
        .faq-card .collapse.show {
            padding-top: 12px;
            padding-bottom: 18px;
        }
    </style>

    <div id="faqList">
        <!-- Card 1 -->
        <div class="faq-card">
            <div class="faq-header" data-toggle="collapse" data-target="#faq1" aria-expanded="true">
                <div class="faq-title"><i class="fa fa-store-alt text-primary"></i> Apa itu Effort Outdoor?</div>
                <div class="faq-arrow"><i class="fa fa-chevron-down"></i></div>
            </div>
            <div id="faq1" class="collapse show" data-parent="#faqList">
                <div class="faq-body">
                    Effort Outdoor adalah toko perlengkapan outdoor yang menyediakan berbagai kebutuhan untuk aktivitas seperti hiking, camping, dan travelling. Kami berkomitmen menghadirkan produk berkualitas dengan harga terjangkau.
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="faq-card">
            <div class="faq-header" data-toggle="collapse" data-target="#faq2" aria-expanded="false">
                <div class="faq-title"><i class="fa fa-certificate text-success"></i> Apakah produk yang dijual original?</div>
                <div class="faq-arrow"><i class="fa fa-chevron-down"></i></div>
            </div>
            <div id="faq2" class="collapse" data-parent="#faqList">
                <div class="faq-body">
                    Ya, semua produk di Effort Outdoor dijamin 100% original dan bergaransi resmi dari brand terkait.
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="faq-card">
            <div class="faq-header" data-toggle="collapse" data-target="#faq3" aria-expanded="false">
                <div class="faq-title"><i class="fa fa-shopping-cart text-warning"></i> Bagaimana cara melakukan pemesanan?</div>
                <div class="faq-arrow"><i class="fa fa-chevron-down"></i></div>
            </div>
            <div id="faq3" class="collapse" data-parent="#faqList">
                <div class="faq-body">
                    Kamu bisa melakukan pemesanan langsung di website kami dengan menambahkan produk ke keranjang, lalu lanjut ke halaman checkout untuk pembayaran.
                </div>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="faq-card">
            <div class="faq-header" data-toggle="collapse" data-target="#faq4" aria-expanded="false">
                <div class="faq-title"><i class="fa fa-undo-alt text-danger"></i> Apakah tersedia layanan pengembalian barang?</div>
                <div class="faq-arrow"><i class="fa fa-chevron-down"></i></div>
            </div>
            <div id="faq4" class="collapse" data-parent="#faqList">
                <div class="faq-body">
                    Ya, kami menyediakan layanan retur barang maksimal 7 hari setelah produk diterima, dengan syarat kondisi produk masih utuh dan lengkap dengan kemasan asli.
                </div>
            </div>
        </div>

        <!-- Card 5 -->
        <div class="faq-card">
            <div class="faq-header" data-toggle="collapse" data-target="#faq5" aria-expanded="false">
                <div class="faq-title"><i class="fa fa-headset text-info"></i> Bagaimana cara menghubungi layanan pelanggan?</div>
                <div class="faq-arrow"><i class="fa fa-chevron-down"></i></div>
            </div>
            <div id="faq5" class="collapse" data-parent="#faqList">
                <div class="faq-body">
                    Kamu bisa menghubungi kami melalui WhatsApp di <b>+62 812-3456-7890</b> atau melalui email <a href="mailto:support@effortoutdoor.com">support@effortoutdoor.com</a>.
                </div>
            </div>
        </div>
    </div>

    <script>
        // Pure JS collapse toggle with smooth max-height animation and accordion behavior
        (function () {
            const cards = document.querySelectorAll('.faq-card');

            cards.forEach(card => {
                const header = card.querySelector('.faq-header');
                const targetSelector = header.getAttribute('data-target');
                const arrow = header.querySelector('.faq-arrow');
                const target = document.querySelector(targetSelector);

                // set initial max-height for shown items
                if (target.classList.contains('show')) {
                    target.style.maxHeight = target.scrollHeight + 'px';
                    arrow.classList.add('open');
                    header.setAttribute('aria-expanded', 'true');
                } else {
                    target.style.maxHeight = null;
                    header.setAttribute('aria-expanded', 'false');
                }

                header.addEventListener('click', () => {
                    const parent = document.getElementById('faqList');
                    const isOpen = target.classList.contains('show');

                    // If accordion behaviour: close others
                    parent.querySelectorAll('.collapse.show').forEach(openEl => {
                        if (openEl !== target) {
                            openEl.classList.remove('show');
                            openEl.style.maxHeight = null;
                            const openHeader = parent.querySelector(`[data-target='#${openEl.id}']`);
                            if (openHeader) openHeader.setAttribute('aria-expanded', 'false');
                            const openArrow = openHeader ? openHeader.querySelector('.faq-arrow') : null;
                            if (openArrow) openArrow.classList.remove('open');
                        }
                    });

                    if (isOpen) {
                        // close
                        target.classList.remove('show');
                        target.style.maxHeight = null;
                        arrow.classList.remove('open');
                        header.setAttribute('aria-expanded', 'false');
                    } else {
                        // open
                        target.classList.add('show');
                        // allow browser to calculate scrollHeight
                        target.style.maxHeight = target.scrollHeight + 'px';
                        arrow.classList.add('open');
                        header.setAttribute('aria-expanded', 'true');
                    }
                });
            });
        })();
    </script>

</div>
<!-- FAQ Section End -->

<?php include 'partials/footer.php'; ?>
