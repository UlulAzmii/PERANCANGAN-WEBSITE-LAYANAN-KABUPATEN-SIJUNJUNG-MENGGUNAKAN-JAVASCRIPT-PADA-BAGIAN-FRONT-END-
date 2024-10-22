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
            <h3 class="display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Profile</h3>
            <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-primary">Profile</li>
            </ol>    
        </div>
    </div>
    <!-- Header End -->

    <!-- Profile Start -->
    <div class="container-fluid overflow-hidden py-5 mt-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="RotateMoveLeft">
                        <img src="img/blog-4.png" class="img-fluid w-100" alt="">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h4 class="mb-1 text-primary" id="profileStatus"></h4>
                    <h1 class="display-5 mb-4">Lengkapi Profil Kamu agar Pengajuan Layanan Menjadi Lebih Mudah</h1>
                    <p class="mb-4">Untuk memudahkan proses pengajuan layanan, pastikan profil Anda lengkap dan terkini. Klik opsi "Detail Profil" yang tersedia di menu utama untuk melihat informasi saat ini. Jika ada data yang perlu dilengkapi, klik tombol "Edit Profil". </p>
                    <a href="#" class="btn btn-primary rounded-pill py-3 px-5" data-bs-toggle="modal" data-bs-target="#profileModal">Detail Profile</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Profile End -->

    <!-- Profile Details Modal -->
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content shadow-lg rounded-3">
            <div class="modal-header border-0 bg-primary text-white">
                <h5 class="modal-title" id="profileModalLabel">Profile Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row mb-3">
                    <div class="col-6">
                        <label for="profile-name" class="form-label fw-bold">Name</label>
                        <p id="profile-name" class="form-control bg-light border-0 shadow-sm rounded"></p>
                    </div>
                    <div class="col-6">
                        <label for="profile-nik" class="form-label fw-bold">NIK</label>
                        <p id="profile-nik" class="form-control bg-light border-0 shadow-sm rounded"></p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <label for="profile-religion" class="form-label fw-bold">Religion</label>
                        <p id="profile-religion" class="form-control bg-light border-0 shadow-sm rounded"></p>
                    </div>
                    <div class="col-6">
                        <label for="profile-email" class="form-label fw-bold">Email</label>
                        <p id="profile-email" class="form-control bg-light border-0 shadow-sm rounded"></p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <label for="profile-profession" class="form-label fw-bold">Profession</label>
                        <p id="profile-profession" class="form-control bg-light border-0 shadow-sm rounded"></p>
                    </div>
                    <div class="col-6">
                        <label for="profile-birthplace" class="form-label fw-bold">Birthplace</label>
                        <p id="profile-birthplace" class="form-control bg-light border-0 shadow-sm rounded"></p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <label for="profile-birthdate" class="form-label fw-bold">Birthdate</label>
                        <p id="profile-birthdate" class="form-control bg-light border-0 shadow-sm rounded"></p>
                    </div>
                    <div class="col-6">
                        <label for="profile-address" class="form-label fw-bold">Address</label>
                        <p id="profile-address" class="form-control bg-light border-0 shadow-sm rounded"></p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <label for="profile-phone" class="form-label fw-bold">Phone</label>
                        <p id="profile-phone" class="form-control bg-light border-0 shadow-sm rounded"></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 bg-light d-flex justify-content-end">
                <button class="btn btn-primary rounded-pill py-2 px-4" data-bs-target="#editModal" data-bs-toggle="modal" data-bs-dismiss="modal">Edit Profile</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content shadow-lg rounded-3">
            <div class="modal-header border-0 bg-primary text-white">
                <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form id="edit-form">
                    <input type="hidden" name="id" id="modal-id" />
                    <div class="row g-3">
                        <!-- Form Fields -->
                        <div class="col-md-6">
                            <label for="modal-nama_pengguna" class="form-label fw-bold">Name:</label>
                            <input type="text" id="modal-nama_pengguna" name="nama_pengguna" class="form-control bg-light border-0 shadow-sm rounded" />
                        </div>
                        <div class="col-md-6">
                            <label for="modal-password" class="form-label fw-bold">Password:</label>
                            <input type="password" id="modal-password" name="pass_pengguna" class="form-control bg-light border-0 shadow-sm rounded" />
                        </div>
                        <div class="col-md-6">
                            <label for="modal-email" class="form-label fw-bold">Email:</label>
                            <input type="email" id="modal-email" name="email" class="form-control bg-light border-0 shadow-sm rounded" />
                        </div>
                        <div class="col-md-6">
                            <label for="modal-profesi" class="form-label fw-bold">Profession:</label>
                            <input type="text" id="modal-profesi" name="profesi" class="form-control bg-light border-0 shadow-sm rounded" />
                        </div>
                        <div class="col-md-6">
                            <label for="modal-nik" class="form-label fw-bold">NIK:</label>
                            <input type="text" id="modal-nik" name="nik" class="form-control bg-light border-0 shadow-sm rounded" />
                        </div>
                        <div class="col-md-6">
                            <label for="modal-tempat_lahir" class="form-label fw-bold">Birthplace:</label>
                            <input type="text" id="modal-tempat_lahir" name="tempat_lahir" class="form-control bg-light border-0 shadow-sm rounded" />
                        </div>
                        <div class="col-md-6">
                            <label for="modal-tgl_lahir" class="form-label fw-bold">Birthdate:</label>
                            <input type="date" id="modal-tgl_lahir" name="tgl_lahir" class="form-control bg-light border-0 shadow-sm rounded" />
                        </div>
                        <div class="col-md-6">
                            <label for="modal-alamat" class="form-label fw-bold">Address:</label>
                            <input type="text" id="modal-alamat" name="alamat" class="form-control bg-light border-0 shadow-sm rounded" />
                        </div>
                        <div class="col-md-6">
                            <label for="modal-agama" class="form-label fw-bold">Religion:</label>
                            <input type="text" id="modal-agama" name="agama" class="form-control bg-light border-0 shadow-sm rounded" />
                        </div>
                        <div class="col-md-6">
                            <label for="modal-no_hp" class="form-label fw-bold">Phone:</label>
                            <input type="text" id="modal-no_hp" name="no_hp" class="form-control bg-light border-0 shadow-sm rounded" />
                        </div>
                    </div>
                    <div class="modal-footer mt-4 border-0 bg-light d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary rounded-pill py-2 px-4">Save</button>
                        <button type="button" class="btn rounded-pill py-2 px-4" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


    
<!-- JavaScript Libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    const profileStatus = document.getElementById('profileStatus');
    const detailProfileButton = document.querySelector('.btn-primary[data-bs-target="#profileModal"]');
    let userData;

    if (!token || !email) {
        profileStatus.textContent = 'Wah, kamu belum login nih!';
        detailProfileButton.addEventListener('click', function () {
            window.location.href = 'login.php';
        });
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
        userData = data.find(user => user.email === email);

        if (userData) {
            profileStatus.textContent = `Halo, ${userData.nama_pengguna}`;
        } else {
            profileStatus.textContent = 'Data tidak tersedia.';
        }

    } catch (error) {
        console.error('Error:', error);
        profileStatus.textContent = 'Terjadi kesalahan saat mengambil data.';
    }

    // Event listener for showing profile details modal
    const profileModal = document.getElementById('profileModal');
    profileModal.addEventListener('show.bs.modal', function () {
        if (userData) {
            document.getElementById('profile-name').textContent = userData.nama_pengguna;
            document.getElementById('profile-nik').textContent = userData.nik;
            document.getElementById('profile-religion').textContent = userData.agama;
            document.getElementById('profile-email').textContent = userData.email;
            document.getElementById('profile-profession').textContent = userData.profesi;
            document.getElementById('profile-birthplace').textContent = userData.tempat_lahir;
            document.getElementById('profile-birthdate').textContent = userData.tgl_lahir;
            document.getElementById('profile-address').textContent = userData.alamat;
            document.getElementById('profile-phone').textContent = userData.no_hp;
        }
    });

    // Event listener for showing edit modal
    const editModal = document.getElementById('editModal');
    editModal.addEventListener('show.bs.modal', function () {
        if (userData) {
            document.getElementById('modal-nama_pengguna').value = userData.nama_pengguna;
            document.getElementById('modal-nik').value = userData.nik;
            document.getElementById('modal-email').value = userData.email;
            document.getElementById('modal-profesi').value = userData.profesi;
            document.getElementById('modal-tempat_lahir').value = userData.tempat_lahir;
            document.getElementById('modal-tgl_lahir').value = userData.tgl_lahir;
            document.getElementById('modal-alamat').value = userData.alamat;
            document.getElementById('modal-agama').value = userData.agama;
            document.getElementById('modal-no_hp').value = userData.no_hp;
            document.getElementById('modal-password').value = userData.pass_pengguna; // Assign password value
        }
    });


    document.getElementById('edit-form').addEventListener('submit', async function (e) {
    e.preventDefault();

    const form = e.target;

    const updatedData = {
        id: userData.id,  // Make sure to have the user ID available in your user data
        nama_pengguna: document.getElementById('modal-nama_pengguna').value,
        email: document.getElementById('modal-email').value,
        pass_pengguna: document.getElementById('modal-password').value,
        profesi: document.getElementById('modal-profesi').value,
        nik: document.getElementById('modal-nik').value,
        tempat_lahir: document.getElementById('modal-tempat_lahir').value,
        tgl_lahir: document.getElementById('modal-tgl_lahir').value,
        alamat: document.getElementById('modal-alamat').value,
        agama: document.getElementById('modal-agama').value,
        no_hp: document.getElementById('modal-no_hp').value
    };

    try {
        const response = await fetch('http://192.168.10.6:8080/Kominfo/service-sijunjung/public/Client.php', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams(updatedData).toString()
        });

        if (response.ok) {
            alert('Data updated successfully');
            location.reload();
        } else {
            alert('Failed to update data');
        }
    } catch (error) {
        alert('An error occurred: ' + error.message);
    }
});
});

</script>

</body>
</html>
