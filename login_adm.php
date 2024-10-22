<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f7f9fc;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .container {
            max-width: 400px;
            margin-top: 80px;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease-in-out;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            transition: background-color 0.3s ease-in-out;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .form-group label {
            color: #6c757d;
            font-weight: 600;
        }
        .form-control {
            border-radius: 10px;
            padding: 15px;
            font-size: 14px;
        }
        .message {
            margin-top: 10px;
            text-align: center;
            font-weight: bold;
        }
        .modal-content {
            border-radius: 15px;
        }
        .close {
            outline: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title text-center">Welcome Back</h3>
                <p class="text-center text-muted">Please login to your account</p>
                <form id="loginForm" method="POST" action="authenticate.php">
                    <div class="form-group">
                        <label for="nama">Name</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mt-4">Login</button>
                </form>
                <div class="text-center mt-3">
                    <a href="register.php" class="text-decoration-none">Don't have an account? <span style="color: #007bff;">Register</span></a>
                </div>
                <div class="text-center mt-3">
                    <a href="login_OP.php" class="text-decoration-none">Are you an operator? <span style="color: #007bff;">Login here</span></a>
                </div>
                <?php
                if (isset($_GET['message'])) {
                    echo '<div class="message alert alert-danger mt-4">' . htmlspecialchars($_GET['message']) . '</div>';
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Modal Notification -->
    <div class="modal fade" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="notificationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="notificationModalLabel">Notification</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalMessage">
                    <!-- Message will be set dynamically -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', async function (event) {
            event.preventDefault();

            const nama = document.getElementById('nama').value;
            const password = document.getElementById('password').value;
            console.log('Sending data:', { nama: nama, password: password });

            try {
                const response = await fetch('http://192.168.10.6:8080/Kominfo/service-sijunjung/controllers/loginAdmin/loginJwtAdm.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({
                        nama: nama,
                        password: password
                    })
                });

                const data = await response.json();

                if (data.success) {
                    localStorage.setItem('jwt', data.token);
                    localStorage.setItem('nama', nama);

                    const tokenVerification = await fetch('http://192.168.10.6:8080/Kominfo/service-sijunjung/controllers/loginClient/protected.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Authorization': 'Bearer ' + data.token
                        }
                    });

                    const verificationData = await tokenVerification.json();

                    if (verificationData.success) {
                        window.location.href = 'admin/index.php?page=masterData';
                    } else {
                        showModal('Token verification failed: ' + verificationData.message);
                    }
                } else {
                    showModal('Login failed: ' + data.message);
                }
            } catch (error) {
                showModal('An error occurred: ' + error.message);
            }
        });

        function showModal(message) {
            document.getElementById('modalMessage').innerText = message;
            $('#notificationModal').modal('show');
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
