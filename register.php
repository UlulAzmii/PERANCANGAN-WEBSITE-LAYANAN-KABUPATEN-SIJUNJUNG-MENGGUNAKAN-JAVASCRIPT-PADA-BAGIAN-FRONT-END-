<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://themewagon.github.io/Mailler/assets/css/style.css">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('https://themewagon.github.io/Mailler/assets/images/bg_1.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        .registration-container {
            max-width: 400px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            text-align: center;
        }

        .registration-container h3 {
            font-weight: 600;
            color: #333;
            margin-bottom: 30px;
        }

        .form-control {
            border-radius: 30px;
            padding: 20px;
            font-size: 14px;
            border: 1px solid #ced4da;
        }

        .btn-register {
            border-radius: 30px;
            padding: 10px 20px;
            background-color: #ff6347;
            border-color: #ff6347;
            transition: all 0.3s ease;
            font-size: 16px;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.9);
        }

        .btn-register:hover {
            background-color: #ff4500;
            border-color: #ff4500;
            color: rgba(255, 255, 255, 0.9);
        }

        .alert {
            border-radius: 30px;
            font-weight: 600;
            text-align: center;
            margin-bottom: 20px;
        }

        .footer-text {
            margin-top: 20px;
            font-size: 14px;
            color: #333;
        }

        .footer-text a {
            color: #ff6347;
            text-decoration: none;
        }

        .footer-text a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="registration-container">
        <h3>Register</h3>
        <div id="alert" class="alert alert-danger d-none"></div>
        <form id="registrationForm">
            <div class="form-group">
                <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="pass_pengguna" name="pass_pengguna" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-register btn-block">Register</button>
        </form>
        <p class="footer-text">Already have an account? <a href="login.php">Login here</a>.</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#registrationForm').on('submit', function (e) {
                e.preventDefault(); // Mencegah form submit secara default

                var formData = {
                    action: 'create',
                    nama_pengguna: $('#nama_pengguna').val(),
                    pass_pengguna: $('#pass_pengguna').val(),
                    email: $('#email').val()
                };

                $.ajax({
                    url: 'http://192.168.10.6:8080/Kominfo/service-sijunjung/public/client.php',
                    type: 'POST',
                    data: $.param(formData), // Encode form data as URL-encoded
                    success: function (response) {
                        $('#alert').text('Registrasi berhasil! Mengalihkan ke halaman login...').removeClass('d-none').addClass('alert-success');
                        setTimeout(function () {
                            window.location.href = 'login.php'; // Mengarahkan pengguna ke login.php
                        }, 2000); // Tunggu 2 detik sebelum mengalihkan
                    },
                    error: function (xhr, status, error) {
                        $('#alert').text('Terjadi kesalahan: ' + xhr.responseText).removeClass('d-none').addClass('alert-danger');
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
