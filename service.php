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
        </ul>
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Our Services</h3>
            <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-primary">Service</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Service Start -->
    <div class="container py-5">
    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 900px;">
        <p class="mb-0">Berikut adalah daftar organisasi pemerintah daerah (OPD) beserta detail dan layanan yang tersedia.</p>
    </div>

    <!-- Search Bar -->
    <section class="section search-section mb-4">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="input-group rounded-pill shadow-sm overflow-hidden">
                    <input type="text" id="searchInput" onkeyup="searchOPD()" placeholder="Search for OPD..." class="form-control border-0" style="border-top-left-radius: 20px; border-bottom-left-radius: 20px;">
                    <button class="btn btn-primary rounded-0 rounded-end" type="button">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <div class="row g-4" id="opdCards">
        <!-- Cards will be dynamically inserted here -->
    </div>
</div>

<!-- OPD Modal Start -->
<div class="modal fade" id="opdModal" tabindex="-1" aria-labelledby="opdModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="opdModalLabel">OPD Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <p class="card-text"><span id="opdId" style="display: none;"></span></p> <!-- Hidden ID -->
                <p class="card-text"><strong>Visi:</strong> <span id="opdVisi"></span></p>
                <p class="card-text"><strong>Misi:</strong> <span id="opdMisi"></span></p>
                <p class="card-text"><strong>Alamat:</strong> <span id="opdAlamat"></span></p>
                <p class="card-text"><strong>Nomor Telepon:</strong> <span id="opdNo"></span></p>
                <p class="card-text"><strong>Email:</strong> <span id="opdEmail"></span></p>
            </div>
            <div class="modal-footer d-flex">
            <button type="button" class="btn w-45" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary w-45" id="masukPersyaratan">Masuk</button>
            </div>
        </div>
    </div>
</div>
<!-- OPD Modal End -->

<!-- opd bukak layanan -->
    <!-- Layanan Modal Start -->
<div class="modal fade" id="layananModal" tabindex="-1" aria-labelledby="layananModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="layananModalLabel">Available Services</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <select class="form-select" id="namaLayanan">
                    <option selected>Pilih Layanan</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="masukLayanan">Next</button>
            </div>
        </div>
    </div>
</div>
<!-- Layanan Modal End -->

<!-- opd bukak layanan end -->


    <!-- Service End -->

    <!-- Service Request Modal Start -->
<div class="modal fade" id="serviceRequestModal" tabindex="-1" aria-labelledby="serviceRequestModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="serviceRequestModalLabel">Submit Service Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="serviceRequestForm">
                    <div class="mb-3">
                        <label for="syaratLayanan" class="form-label">Syarat Layanan</label>
                        <textarea class="form-control" id="syaratLayanan" rows="3" readonly></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="subjek" class="form-label">Subjek</label>
                        <input type="text" class="form-control" id="subjek" required>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" id="keterangan" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="lampiranFiles" class="form-label">Lampiran Files</label>
                        <input type="file" class="form-control" id="lampiranFiles" multiple>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submitServiceRequest">Submit</button>
            </div>
        </div>
    </div>
</div>
<!-- Service Request Modal End -->


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
    document.addEventListener('DOMContentLoaded', async function() {
    const opdData = await fetchOpd();
    displayOpd(opdData);

    const searchInput = document.getElementById('searchInput');
    searchInput.addEventListener('input', function() {
        const filteredData = filterOpd(opdData, searchInput.value);
        displayOpd(filteredData);
    });
});

// Function to fetch OPD data
async function fetchOpd() {
    try {
        const response = await fetch('http://192.168.10.6:8080/Kominfo/service-sijunjung/public/Opd.php');
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error fetching OPD:', error);
        return [];
    }
}

// Function to filter OPD data
function filterOpd(opdArray, searchTerm) {
    return opdArray.filter(opd => opd.nama_opd.toLowerCase().includes(searchTerm.toLowerCase()));
}

// Function to display OPD data
function displayOpd(opdArray) {
    const opdCards = document.getElementById('opdCards');
    opdCards.innerHTML = '';
    opdArray.slice(0, 4).forEach(opd => {
        const card = `
            <div class="col-md-3">
                <div class="card mb-4 wow fadeInUp" data-wow-delay="0.1s">
                    <img src="http://192.168.10.6:8080/Kominfo/service-sijunjung/asset/images/${opd.logo_opd}" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">${opd.nama_opd}</h5>
                        <p class="card-text">${opd.deskripsi}</p>
                        <a class="btn btn-primary" onclick="showOpdDetails('${opd.visi}', '${opd.misi}', '${opd.alamat_opd}', '${opd.no_telp}', '${opd.email_opd}', '${opd.id_opd}')">Read More</a>
                    </div>
                </div>
            </div>
        `;
        opdCards.insertAdjacentHTML('beforeend', card);
    });
}

// Function to show OPD details in modal
// Function to show OPD details in modal
function showOpdDetails(visi, misi, alamat_opd, no_telp, email_opd, opdId) {
    document.getElementById('opdVisi').textContent = visi;
    document.getElementById('opdMisi').textContent = misi;
    document.getElementById('opdAlamat').textContent = alamat_opd;
    document.getElementById('opdNo').textContent = no_telp;
    document.getElementById('opdEmail').textContent = email_opd;
    document.getElementById('opdId').textContent = opdId; // Displaying id_opd

    document.getElementById('masukPersyaratan').setAttribute('data-opd-id', opdId);
     console.log(opdId);

    const opdModal = new bootstrap.Modal(document.getElementById('opdModal'));
    opdModal.show();
}


document.getElementById('masukPersyaratan').addEventListener('click', function() {
    const jwtToken = localStorage.getItem('jwt');

    if (!jwtToken) {
        // Redirect to login page if JWT is not found
        window.location.href = 'login.php';
    } else {
        // Proceed with fetching layanan and opening the layanan modal
        const opdId = this.getAttribute('data-opd-id');
        fetchLayanan(opdId);
        const opdModal = bootstrap.Modal.getInstance(document.getElementById('opdModal'));
        opdModal.hide();

        const layananModal = new bootstrap.Modal(document.getElementById('layananModal'));
        layananModal.show();
    }
});


async function fetchLayanan(opdId) {
    try {
        // Ambil semua layanan dari API
        const response = await fetch('http://192.168.10.6:8080/Kominfo/service-sijunjung/public/Layanan.php');
        const semuaLayanan = await response.json();

        // Cek data yang diterima dari API
        console.log('Semua layanan:', semuaLayanan);

        // Filter layanan berdasarkan opdId
        const filteredLayanan = semuaLayanan.filter(layanan => String(layanan.id_opd) === String(opdId));

        // Cek layanan yang telah difilter
        console.log('Layanan yang difilter:', filteredLayanan);

        const layananSelect = document.getElementById('namaLayanan');
        layananSelect.innerHTML = '<option value="">Pilih Layanan</option>';

        // Tampilkan layanan yang telah difilter di dropdown
        filteredLayanan.forEach(layanan => {
            const option = document.createElement('option');
            option.value = layanan.id_layanan;
            option.text = layanan.nama_layanan;
            layananSelect.appendChild(option);
        });
    } catch (error) {
        console.error('Error fetching layanan:', error);
    }
}




document.getElementById('masukLayanan').addEventListener('click', async function() {
    const idLayanan = document.getElementById('namaLayanan').value;

    if (idLayanan) {
        fetchServiceRequirements(idLayanan);
        const layananModal = bootstrap.Modal.getInstance(document.getElementById('layananModal'));
        layananModal.hide();

        const serviceRequestModal = new bootstrap.Modal(document.getElementById('serviceRequestModal'));
        serviceRequestModal.show();
    } else {
        alert('Please select a service.');
    }
});

async function fetchServiceRequirements(idLayanan) {
    try {
        const response = await fetch(`http://192.168.10.6:8080/Kominfo/service-sijunjung/public/Layanan.php?id_layanan=${idLayanan}`);
        const layananData = await response.json();
        document.getElementById('syaratLayanan').textContent = layananData.syarat || 'No requirements available.';
    } catch (error) {
        console.error('Error fetching service requirements:', error);
    }
}

// Function to get user ID from email
async function getIdFromEmail(email) {
    try {
        const response = await fetch('http://192.168.10.6:8080/Kominfo/service-sijunjung/public/client.php');
        const data = await response.json();

        const user = data.find((client) => client.email === email);

        if (user) {
            return user.id;
        } else {
            throw new Error('Email not found in API.');
        }
    } catch (error) {
        console.error('Error fetching ID from email:', error);
        return null;
    }
}

document.getElementById('submitServiceRequest').addEventListener('click', async function() {
    const selectedOpdId = document.getElementById('masukPersyaratan').getAttribute('data-opd-id');
    const idLayanan = document.getElementById('namaLayanan').value;
    const email = localStorage.getItem('email'); // Get email from localStorage

    if (!email) {
        alert('User email not found in local storage.');
        return;
    }

    const userId = await getIdFromEmail(email);

    if (!userId) {
        alert('Unable to get user ID.');
        return;
    }

    const subjek = document.getElementById('subjek').value;
    const keterangan = document.getElementById('keterangan').value;
    const lampiranFiles = document.getElementById('lampiranFiles').files;

    const formData = new FormData();
    formData.append("action", "create");
    formData.append("id_opd", selectedOpdId);
    formData.append("id_layanan", idLayanan);
    formData.append("id", userId);
    formData.append("subjek", subjek);
    formData.append("keterangan", keterangan);

    for (const file of lampiranFiles) {
        formData.append("lampiran[]", file);
    }

    try {
        const response = await fetch("http://192.168.10.6:8080/Kominfo/service-sijunjung/public/Tiket.php", {
            method: "POST",
            body: formData,
        });

        const responseText = await response.text();
        console.log("Response from server:", responseText);

        try {
            const result = JSON.parse(responseText);
            if (result.error) {
                alert("Error: " + result.error);
            } else {
                alert("Data successfully submitted.");
                $("#serviceRequestModal").modal("hide");
            }
        } catch (error) {
            console.error("Error parsing JSON:", error);
            alert("Failed to parse server response.");
        }
    } catch (error) {
        console.error("Error submitting data:", error);
        alert("Error submitting data.");
    }
});
</script>


</body>

</html>
