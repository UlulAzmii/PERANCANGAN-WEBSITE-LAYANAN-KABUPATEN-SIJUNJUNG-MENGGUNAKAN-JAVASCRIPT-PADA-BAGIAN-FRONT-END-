<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Service Sijunjung</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700&family=Rubik:wght@400;500&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Hero Header Start -->
    <div class="hero-header overflow-hidden px-5">
        <div class="rotate-img">
            <img src="img/sty-1.png" class="img-fluid w-100" alt="">
            <div class="rotate-sty-2"></div>
        </div>
        <div class="row gy-5 align-items-center">
            <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
                <h1 class="display-4 text-dark mb-4 wow fadeInUp" data-wow-delay="0.3s">Layanan Terpadu Sijunjung</h1>
                <p class="fs-4 mb-4 wow fadeInUp" data-wow-delay="0.5s">Dashboard ini menyediakan akses cepat dan mudah ke semua layanan Organisasi Pemerintah Daerah. Atur dan pantau layanan dengan lebih efektif untuk memenuhi kebutuhan masyarakat.</p>
                <a href="login.php" id="getStartedButton" class="btn btn-primary rounded-pill py-3 px-5 wow fadeInUp" data-wow-delay="0.7s">Get Started</a>
            </div>
            <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.2s">
                <img src="img/hero-img-1.png" class="img-fluid w-100 h-100" alt="">
            </div>
        </div>
    </div>
    <!-- Hero Header End -->

    <!-- About Start -->
    <div class="container-fluid overflow-hidden py-5" style="margin-top: 6rem;">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="RotateMoveLeft">
                        <img src="img/about-1.png" class="img-fluid w-100" alt="">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h4 class="mb-1 text-primary">Services</h4>
                    <h1 class="display-5 mb-4">Jelajahi Kemudahan Akses Layanan yang Dipersonalisasi</h1>
                    <p class="mb-4">Service Sijunjung adalah platform terintegrasi yang dirancang untuk memudahkan akses dan pengelolaan semua layanan yang disediakan oleh Organisasi Pemerintah Daerah (OPD) di Kabupaten Sijunjung. 
                    </p>
                    <a href="index.php?page=service" class="btn btn-primary rounded-pill py-3 px-5">About More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', async function () {
    const token = localStorage.getItem('jwt');
    const email = localStorage.getItem('email');
    const getStartedButton = document.getElementById('getStartedButton');

    if (!token || !email) {
        // User is not logged in, keep the button clickable and redirect to login
        getStartedButton.href = 'login.php';
        return;
    }

    try {
        const response = await fetch('http://192.168.10.6:8080/Kominfo/service-sijunjung/public/client.php', {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${token}`
            }
        });

        if (!response.ok) {
            throw new Error('Gagal mengambil data pengguna.');
        }

        const data = await response.json();
        const userData = data.find(user => user.email === email);

        if (userData) {
            // Change the button text to welcome the user
            getStartedButton.textContent = `Selamat datang, ${userData.nama_pengguna}`;
            getStartedButton.href = '#'; // Set href to "#" to disable navigation
            getStartedButton.style.pointerEvents = 'none'; // Make the button unclickable
            getStartedButton.style.cursor = 'default'; // Change the cursor to default to indicate it's not clickable
        } else {
            document.querySelector('.profile-overview').innerHTML = '<p>Data tidak tersedia.</p>';
        }

    } catch (error) {
        console.error('Error:', error);
    }
});
    </script>
</body>

</html>
