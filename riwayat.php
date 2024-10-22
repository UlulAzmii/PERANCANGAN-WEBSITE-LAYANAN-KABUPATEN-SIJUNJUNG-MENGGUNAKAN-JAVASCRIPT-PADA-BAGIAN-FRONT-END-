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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
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

    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <ul class="breadcrumb-animation">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Riwayat</h3>
            <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-primary">Riwayat</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Riwayat -->
    <div class="container py-5">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 900px;">
            <p class="mb-0">Below is the list of your activity history.</p>
        </div>

        <!-- History Table -->
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama Layanan</th>
                        <th>Nama OPD</th>
                        <th>Status</th>
                        <th>Tanggal Diajukan</th>
                        <th>Catatan</th>
                    </tr>
                </thead>
                <tbody id="historyContainer">
                    <!-- Rows will be dynamically inserted here -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>

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

    <!-- Custom Script to Fetch and Display Data -->
    <script>
        async function fetchHistory(email) {
            try {
                const response = await fetch(`http://192.168.10.6:8080/Kominfo/service-sijunjung/public/Tiket.php?action=tiketdetails`);
                const historyData = await response.json();
                return historyData.filter(item => item.email === email);
            } catch (error) {
                console.error('Error fetching history:', error);
                return [];
            }
        }

        async function displayHistory() {
            const email = localStorage.getItem('email');
            const token = localStorage.getItem('jwt');

            const historyData = email ? await fetchHistory(email) : [];
            const historyContainer = document.getElementById('historyContainer');

            if (historyData.length > 0) {
                historyContainer.innerHTML = historyData.map(item => `
                    <tr>
                        <td>${item.nama_layanan}</td>
                        <td>${item.nama_opd}</td>
                        <td>${item.ket_proses}</td>
                        <td>${item.tgl_diajukan}</td>
                        <td>${item.detail_proses ? item.detail_proses : 'Belum di proses operator'}</td>
                    </tr>
                `).join('');
            } else {
                historyContainer.innerHTML = '<tr><td colspan="5" class="text-center">No history found.</td></tr>';
            }
        }

        document.addEventListener('DOMContentLoaded', displayHistory);
    </script>

</body>

</html>
