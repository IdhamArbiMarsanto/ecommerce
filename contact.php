<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
   <?php include 'partials/topbar.php'; ?>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <?php include 'partials/navbar.php'; ?>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Contact Us</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="index.php">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Contact</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-5">
            <h2 class="section-title px-5"><span class="px-2">Contact For Any Queries</span></h2>
            <p class="mb-4">Kami siap membantu Anda dengan pertanyaan tentang produk, pesanan, atau layanan kami. Hubungi kami melalui form di bawah atau informasi kontak yang tersedia.</p>
        </div>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form bg-light p-4 rounded shadow-sm">
                    <div id="success"></div>
                    <form name="sentMessage" id="contactForm" novalidate="novalidate">
                        <div class="row">
                            <div class="col-md-6 control-group mb-3">
                                <input type="text" class="form-control border-0 py-3" id="name" placeholder="Your Name"
                                    required="required" data-validation-required-message="Please enter your name" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="col-md-6 control-group mb-3">
                                <input type="email" class="form-control border-0 py-3" id="email" placeholder="Your Email"
                                    required="required" data-validation-required-message="Please enter your email" />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="control-group mb-3">
                            <input type="text" class="form-control border-0 py-3" id="subject" placeholder="Subject"
                                required="required" data-validation-required-message="Please enter a subject" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group mb-4">
                            <textarea class="form-control border-0 py-3" rows="6" id="message" placeholder="Message"
                                required="required"
                                data-validation-required-message="Please enter your message"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary py-3 px-5" type="submit" id="sendMessageButton">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 mb-5">
                <div class="bg-light p-4 rounded shadow-sm">
                    <h5 class="font-weight-semi-bold mb-4">Get In Touch</h5>
                    <p class="mb-4">Effort Outdoor berkomitmen untuk memberikan pelayanan terbaik. Jika Anda memiliki pertanyaan tentang produk outdoor kami, pesanan, atau dukungan lainnya, jangan ragu untuk menghubungi kami.</p>
                    <div class="d-flex flex-column mb-4">
                        <h6 class="font-weight-semi-bold mb-3 text-primary">Informasi Kontak</h6>
                        <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Jl. Raya Jakarta-Bogor No.40, Cilangkap, Depok</p>
                        <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>effortoutdoor@gmail.com</p>
                        <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>+62 881 7588 9044</p>
                        <p class="mb-0"><i class="fab fa-whatsapp text-primary mr-3"></i><a href="http://wa.me/628817589044" target="_blank" class="text-dark">WhatsApp: +62 881 7588 9044</a></p>
                    </div>
                    <div class="d-flex flex-column">
                        <h6 class="font-weight-semi-bold mb-3 text-primary">Jam Operasional</h6>
                        <p class="mb-1"><strong>Senin - Jumat:</strong> 09:00 - 18:00 WIB</p>
                        <p class="mb-1"><strong>Sabtu:</strong> 09:00 - 15:00 WIB</p>
                        <p class="mb-0"><strong>Minggu:</strong> Tutup</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <!-- Map Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-12">
                <div class="bg-light p-4 rounded shadow-sm">
                    <h5 class="font-weight-semi-bold mb-4 text-center">Lokasi Kami</h5>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.032!2d106.8533435!3d-6.4468888!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ebd92e0ea4ef%3A0x5b33f047b30548a4!2seffort_outdoor!5e0!3m2!1sen!2sid!4v1690000000000!5m2!1sen!2sid" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- Map End -->


    <!-- Footer Start -->
    <?php include 'partials/footer.php'; ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>



</body>

</html>