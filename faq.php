<?php include 'partials/head.php'; ?>
<?php include 'partials/topbar.php'; ?>
<?php include 'partials/navbar.php'; ?>


    <style>
      .faq-search-banner {
          background-color: #edf1ff;
          margin-bottom: 30px;
      }

      .faq-search-banner .banner-inner {
          min-height: 300px;
          display: flex;
          align-items: center;
          justify-content: center;
          padding: 24px 0;
      }

      .faq-search-banner .search-box {
          background: #fff;
          border-radius: 8px;
          padding: 12px 16px;
          box-shadow: 0 4px 18px rgba(0,0,0,0.06);
          display: flex;
          align-items: center;
          gap: 12px;
          max-width: 980px;
          width: 100%;
      }

      .faq-search-banner .search-box input {
          border: none;
          outline: none;
          flex: 1;
          font-size: 16px;
          background: transparent;
      }

      .faq-search-banner .search-box button {
          border: none;
          background: #2f7a3e;
          color: white;
          padding: 10px 20px;
          border-radius: 6px;
          cursor: pointer;
          font-size: 15px;
          transition: 0.15s;
      }

      .faq-search-banner .search-box button:hover {
          background: #255f33;
      }

      .faq-search-banner .search-icon {
          color: #666;
          font-size: 18px;
      }

      @media (max-width: 576px) {
          .faq-search-banner .banner-inner { min-height: 180px; }
          .faq-search-banner .search-box { padding: 8px 10px; max-width: 92%; }
      }
    </style>

    <div class="container-fluid faq-search-banner">
      <div class="banner-inner">
        <div class="container">
          <form action="" method="GET" class="d-flex justify-content-center mb-0">
            <div class="search-box">
              <i class="fa fa-search search-icon"></i>
              <input 
                type="text" 
                id="faqSearchInput"
                name="search" 
                placeholder="Cari FAQ..." 
                value="<?= htmlspecialchars($_GET['search'] ?? '') ?>"
              >
              <button type="submit">Cari</button>
            </div>
          </form>
        </div>
      </div>
    </div>


<!-- FAQ Section Start -->
<div class="container py-5">
  <div class="text-center mb-4">
    <h1 class="display-5 fw-bold text-primary mb-2">
      <i class="fa fa-question-circle text-secondary"></i> Frequently Asked Questions
    </h1>
    <p class="text-muted">
      Klik pertanyaan untuk melihat jawaban. Setiap pertanyaan berada dalam kotak yang sama dan mengembang ke bawah ketika dibuka.
    </p>
  </div>


  <div id="faqList">
    <div class="text-center text-muted py-3">Memuat pertanyaan...</div>
  </div>

  <script>
    const backendURL = 'http://localhost/backend/api/faq_get.php?public=1';

    // icon list untuk variasi (opsional)
    const icons = [
      'fa-store-alt text-primary',
      'fa-certificate text-success',
      'fa-shopping-cart text-warning',
      'fa-undo-alt text-danger',
      'fa-headset text-info'
    ];

    async function loadFaq() {
      try {
        const res = await fetch(backendURL);
        const data = await res.json();
        const list = document.getElementById('faqList');
        list.innerHTML = '';

        if (!data.length) {
          list.innerHTML = '<div class="text-center text-muted py-3">Belum ada FAQ tersedia</div>';
          return;
        }

        data.forEach((f, i) => {
          const id = `faq${f.id}`;
          const iconClass = icons[i % icons.length]; // biar rotasi iconnya cantik

          list.innerHTML += `
            <div class="faq-card">
              <div class="faq-header" data-target="#${id}">
                <div class="faq-title">
                  <i class="fa ${iconClass}"></i> ${f.pertanyaan}
                </div>
                <div class="faq-arrow"><i class="fa fa-chevron-down"></i></div>
              </div>
              <div id="${id}" class="collapse" data-parent="#faqList">
                <div class="faq-body">${f.jawaban}</div>
              </div>
            </div>`;
        });

        initAccordion();
      } catch (err) {
        console.error(err);
        document.getElementById('faqList').innerHTML = `
          <div class="text-center text-danger py-3">
            Gagal memuat FAQ. Pastikan backend aktif.
          </div>`;
      }
    }

    function initAccordion() {
      const cards = document.querySelectorAll('.faq-card');
      cards.forEach(card => {
        const header = card.querySelector('.faq-header');
        const targetSelector = header.getAttribute('data-target');
        const arrow = header.querySelector('.faq-arrow');
        const target = card.querySelector(targetSelector);

        header.addEventListener('click', () => {
          const parent = document.getElementById('faqList');
          const isOpen = target.classList.contains('show');

          parent.querySelectorAll('.collapse.show').forEach(openEl => {
            if (openEl !== target) {
              openEl.classList.remove('show');
              openEl.style.maxHeight = null;
              const openHeader = parent.querySelector(`[data-target='#${openEl.id}']`);
              const openArrow = openHeader?.querySelector('.faq-arrow');
              if (openArrow) openArrow.classList.remove('open');
            }
          });

          if (isOpen) {
            target.classList.remove('show');
            target.style.maxHeight = null;
            arrow.classList.remove('open');
          } else {
            target.classList.add('show');
            target.style.maxHeight = target.scrollHeight + 'px';
            arrow.classList.add('open');
          }
        });
      });
    }

    loadFaq();
  </script>
</div>
<!-- FAQ Section End -->

<?php include 'partials/footer.php'; ?>
