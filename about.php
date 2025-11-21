<?php
include __DIR__ . '/../backend/config/config.php';
$db = get_db();
?>
<?php include 'partials/head.php'; ?>
<?php include 'partials/topbar.php'; ?>
<?php include 'partials/navbar.php'; ?>

<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">About Us</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="index.php">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">About Us</p>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- About Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 pb-4 pb-lg-0">
                <img class="img-fluid rounded" src="img/about.jpg" alt="Tentang Effort Outdoor">
            </div>
            <div class="col-lg-7">
                <h3 class="font-weight-semi-bold text-dark mb-4">Cerita Kami</h3>
                <p class="mb-4">Effort Outdoor lahir dari passion para pendaki dan pecinta alam yang ingin berbagi pengalaman luar ruang yang tak terlupakan. Didirikan pada tahun 2020, kami memulai dengan visi sederhana: membuat peralatan outdoor berkualitas tinggi dapat diakses oleh semua orang, dari pemula hingga profesional.</p>
                <p class="mb-4">Dengan pengalaman bertahun-tahun di dunia outdoor, tim kami memahami pentingnya kenyamanan, keamanan, dan keandalan dalam setiap petualangan. Kami berkomitmen untuk menyediakan produk yang tidak hanya tahan lama, tetapi juga ramah lingkungan dan terjangkau.</p>
                <div class="d-flex align-items-center">
                    <div class="btn-icon bg-primary mr-4">
                        <i class="fa fa-2x fa-map-marker-alt text-white"></i>
                    </div>
                    <div>
                        <h5 class="font-weight-semi-bold m-0">Berdiri Sejak 2020</h5>
                        <p class="m-0">Lebih dari 10.000 pelanggan puas</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Vision Mission Start -->
<div class="container-fluid bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="card-icon bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fa fa-eye fa-2x"></i>
                        </div>
                        <h5 class="card-title font-weight-semi-bold mb-3">Visi Kami</h5>
                        <p class="card-text">Menjadi mitra terpercaya bagi setiap petualangan outdoor, menyediakan peralatan berkualitas yang menginspirasi orang untuk menjelajahi dunia dengan aman dan bertanggung jawab.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="card-icon bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fa fa-bullseye fa-2x"></i>
                        </div>
                        <h5 class="card-title font-weight-semi-bold mb-3">Misi Kami</h5>
                        <p class="card-text">Menyediakan produk outdoor berkualitas tinggi dengan harga terjangkau, memberikan pelayanan pelanggan yang prima, dan berkontribusi pada pelestarian lingkungan melalui praktik bisnis yang berkelanjutan.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="card-icon bg-info text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fa fa-heart fa-2x"></i>
                        </div>
                        <h5 class="card-title font-weight-semi-bold mb-3">Nilai Kami</h5>
                        <p class="card-text">Kualitas, Keandalan, Inovasi, dan Tanggung Jawab Lingkungan. Kami percaya bahwa setiap produk yang kami jual harus melewati standar ketat untuk memastikan kepuasan pelanggan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Vision Mission End -->

<!-- Team Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h3 class="font-weight-semi-bold text-dark">Tim Kami</h3>
            <p class="mb-4">Bertemu dengan orang-orang di balik Effort Outdoor</p>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12 text-center mb-4">
                <div class="team-item">
                    <div class="team-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/team-1.jpg" alt="Founder">
                        <div class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">
                            <a class="btn btn-outline-light text-center mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light text-center" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="bg-light text-center p-4">
                        <h5 class="font-weight-semi-bold m-0">Ahmad Rahman</h5>
                        <small>Founder & CEO</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 text-center mb-4">
                <div class="team-item">
                    <div class="team-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/team-2.jpg" alt="Product Manager">
                        <div class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">
                            <a class="btn btn-outline-light text-center mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light text-center" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="bg-light text-center p-4">
                        <h5 class="font-weight-semi-bold m-0">Siti Nurhaliza</h5>
                        <small>Product Manager</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 text-center mb-4">
                <div class="team-item">
                    <div class="team-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/team-3.jpg" alt="Customer Service">
                        <div class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">
                            <a class="btn btn-outline-light text-center mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light text-center" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="bg-light text-center p-4">
                        <h5 class="font-weight-semi-bold m-0">Budi Santoso</h5>
                        <small>Customer Service Lead</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 text-center mb-4">
                <div class="team-item">
                    <div class="team-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/team-4.jpg" alt="Marketing">
                        <div class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">
                            <a class="btn btn-outline-light text-center mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light text-center" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="bg-light text-center p-4">
                        <h5 class="font-weight-semi-bold m-0">Maya Sari</h5>
                        <small>Marketing Specialist</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->

<?php include 'partials/footer.php'; ?>
