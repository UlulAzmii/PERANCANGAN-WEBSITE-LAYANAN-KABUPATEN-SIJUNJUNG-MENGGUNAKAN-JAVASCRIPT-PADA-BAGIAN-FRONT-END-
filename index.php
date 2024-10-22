<?php
session_start();
header('Location: login_adm.php');


// Memuat konten halaman berdasarkan parameter 'page'
if (isset($_GET['page'])) {
    $page = $_GET['page'];

    switch ($page) {
        case 'operator':
            include 'operator/index.php';
            break;
        case 'profile_OP':
            include 'operator/pages_OP/profile.php';
            break;
        case 'logbook_OP':
            include 'operator/pages_OP/logbook.php';
            break;
        case 'layanan_OP':
            include 'operator/pages_OP/layanan.php';
            break;
            case 'admin':
                include 'admin/index.php';
                break;
            case 'masterData':
                include 'admin/pages_adm/masterData.php';
                break;
            case 'historyLayanan':
                include 'admin/pages_adm/historyLayanan.php';
                break;
            case 'laporan':
                include 'admin/pages_adm/laporan.php';
                break;
            case 'login_adm':
                include 'login_adm.php';
                break;
        default:
            echo 'Page not found';
            break;
    }
} else {
    echo 'No page specified';
}
?>
