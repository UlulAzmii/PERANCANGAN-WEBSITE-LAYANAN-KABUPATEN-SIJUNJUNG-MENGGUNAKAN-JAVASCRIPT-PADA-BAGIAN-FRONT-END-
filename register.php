<?php
// Hapus session_start() jika tidak diperlukan
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
        .alert {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title text-center">Create an Account</h3>
                <p class="text-center text-muted">Fill in the details below to register</p>
                <form id="registerForm" method="POST">
                    <div class="form-group">
                        <label for="nama">Name</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mt-4">Register</button>
                </form>
                <div class="text-center mt-3">
                    <a href="login_adm.php" class="text-decoration-none">Already have an account? <span style="color: #007bff;">Login here</span></a>
                </div>
                <div id="alert" class="alert mt-4"></div>
                <?php
                if (isset($_GET['message'])) {
                    echo '<div class="message alert alert-danger mt-4">' . htmlspecialchars($_GET['message']) . '</div>';
                }
                ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#registerForm').on('submit', function (e) {
                e.preventDefault(); // Mencegah form submit secara default

                var formData = {
                    action: 'create',
                    nama: $('#nama').val(),
                    password: $('#password').val()
                };

                $.ajax({
                    url: 'http://192.168.10.6:8080/Kominfo/service-sijunjung/public/admin.php',
                    type: 'POST',
                    data: $.param(formData), // Encode form data as URL-encoded
                    success: function (response) {
                        $('#alert').text('Registration successful! Redirecting to login page...').removeClass('alert-danger').addClass('alert-success').fadeIn();
                        setTimeout(function () {
                            window.location.href = 'login_adm.php'; // Mengarahkan pengguna ke login.php
                        }, 2000); // Tunggu 2 detik sebelum mengalihkan
                    },
                    error: function (xhr, status, error) {
                        $('#alert').text('An error occurred: ' + xhr.responseText).removeClass('alert-success').addClass('alert-danger').fadeIn();
                    },
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded' // Sesuaikan dengan format data yang dikirimkan
                    }
                });
            });
        });
    </script>
</body>
</html>
