<?php
session_start();

include 'header.php';
?>

<div class="container-fluid">
    <div class="row">
        <main>
            <?php
            // Memuat konten halaman berdasarkan parameter 'page'
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                switch ($page) {
                    case 'dashboard':
                        include 'dashboard.php';
                        break;
                    case 'service':
                        include 'service.php';
                        break;
                    case 'riwayat':
                        include 'riwayat.php';
                        break;
                    case 'profile':
                        include 'profile.php';
                        break;
                    case 'contact':
                            include 'contact.php';
                            break;
                    default:
                        include 'dashboard.php';
                }
            } else {
                include 'dashboard.php';
            }
            ?>
        </main>
    </div>
</div>

<?php include 'footer.php'; ?>
