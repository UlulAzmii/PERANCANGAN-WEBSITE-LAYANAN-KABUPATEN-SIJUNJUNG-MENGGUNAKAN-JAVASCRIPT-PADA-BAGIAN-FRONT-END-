<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

        .login-container {
            max-width: 400px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            text-align: center;
        }

        .login-container h3 {
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

        .btn-login {
            border-radius: 30px;
            padding: 10px 20px;
            background-color: #ff6347;
            border-color: #ff6347;
            transition: all 0.3s ease;
            font-size: 16px;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.9);
        }

        .btn-login:hover {
            background-color: #ff4500;
            border-color: #ff4500;
            color: rgba(255, 255, 255, 0.9);
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

        .alert {
            border-radius: 30px;
            font-weight: 600;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h3>Login</h3>
        <div id="alert" class="alert alert-danger d-none"></div>
        <form id="loginForm" action="" method="post">
            <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-login btn-block">Login</button>
        </form>
            <p class="footer-text">Don't have an account? <a href="register.php">Registere here</a>.</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        document.getElementById('loginForm').addEventListener('submit', async function (event) {
            event.preventDefault();

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const alertBox = document.getElementById('alert');

            try {
                const response = await fetch('http://192.168.10.6:8080/Kominfo/service-sijunjung/controllers/loginClient/loginJWT.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({
                        email: email,
                        password: password
                    })
                });

                const data = await response.json();

                if (data.success) {
                    localStorage.setItem('jwt', data.token);
                    localStorage.setItem('email', email);

                    const tokenVerification = await fetch('http://192.168.10.6:8080/Kominfo/service-sijunjung/controllers/loginClient/protected.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Authorization': 'Bearer ' + data.token
                        }
                    });

                    const verificationData = await tokenVerification.json();

                    if (verificationData.success) {
                        window.location.href = 'index.php?page=dashboard';
                    } else {
                        alertBox.classList.remove('d-none');
                        alertBox.innerText = 'Token verification failed: ' + verificationData.message;
                    }
                } else {
                    alertBox.classList.remove('d-none');
                    alertBox.innerText = 'Login failed: ' + data.message;
                }
            } catch (error) {
                alertBox.classList.remove('d-none');
                alertBox.innerText = 'An error occurred: ' + error.message;
            }
        });
    </script>
</body>
</html>
