<!-- Navbar & Hero Start -->
<div class="container-fluid header position-relative overflow-hidden p-0">
            <nav class="navbar navbar-expand-lg fixed-top navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="index.html" class="navbar-brand p-0">
                    <h1 class="display-6 text-primary m-0">Service Sijunjung</h1>
                    
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="index.php" class="nav-item nav-link ">Home</a>
                        <a href="index.php?page=profile" class="nav-item nav-link">Profile</a>
                        <a href="index.php?page=service" class="nav-item nav-link">Services</a>
                        <a href="index.php?page=riwayat" class="nav-item nav-link">History</a>
                        <!-- <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0">
                            <a href="index.php?page=riwayat" class="dropdown-item">Riwayat</a>
                            </div>
                        </div> -->
                        <a href="index.php?page=contact" class="nav-item nav-link">Contact Us</a>
                    </div>
                    <!-- <a href="login.php" class="btn btn-light border border-primary rounded-pill text-primary py-2 px-4 me-4">Log In</a>
                    <a href="register.php" class="btn btn-primary rounded-pill text-white py-2 px-4">Sign Up</a> -->
                    <div id="authButtons" class="d-flex">
                <a href="login.php" id="loginButton" class="btn btn-light border border-primary rounded-pill text-primary py-2 px-4 me-4">Log In</a>
                <a href="register.php" id="signupButton" class="btn btn-primary rounded-pill text-white py-2 px-4">Sign Up</a>
                <a href="logout.php" id="logoutButton" class="btn btn-light border border-primary rounded-pill text-primary py-2 px-4 me-4 d-none">Log Out</a>
            </div>
                </div>
            </nav>

                    <!-- Logout Confirmation Modal -->
        <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to log out?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" id="confirmLogout" class="btn btn-primary">Log Out</button>
                    </div>
                </div>
            </div>
        </div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const loginButton = document.getElementById('loginButton');
        const signupButton = document.getElementById('signupButton');
        const logoutButton = document.getElementById('logoutButton');
        const confirmLogoutButton = document.getElementById('confirmLogout');
        const isLoggedIn = localStorage.getItem('jwt');

        if (isLoggedIn) {
            loginButton.classList.add('d-none');
            signupButton.classList.add('d-none');
            logoutButton.classList.remove('d-none');

            logoutButton.addEventListener('click', function(event) {
                event.preventDefault();
                // Tampilkan modal konfirmasi logout
                var logoutModal = new bootstrap.Modal(document.getElementById('logoutModal'));
                logoutModal.show();
            });

            confirmLogoutButton.addEventListener('click', function() {
                localStorage.removeItem('jwt');
                localStorage.removeItem('email');
                window.location.href = 'login.php';
            });
        }
    });
</script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>



