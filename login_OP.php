<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operator Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f0f2f5;
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
            background-color: #28a745;
            border: none;
            transition: background-color 0.3s ease-in-out;
        }
        .btn-primary:hover {
            background-color: #218838;
        }
        .form-group label {
            color: #495057;
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
        /* Loader styles */
        .loader {
            border: 8px solid #f3f3f3;
            border-radius: 50%;
            border-top: 8px solid #28a745;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
            display: none; /* Initially hidden */
            margin: 20px auto;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title text-center">Operator Access</h3>
                <p class="text-center text-muted">Login with your operator credentials</p>
                <form id="operatorLoginForm">
                    <div class="form-group">
                        <label for="nama_operator">Operator Name</label>
                        <input type="text" class="form-control" id="nama_operator" name="nama_operator" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group">
                        <label for="pass_operator">Password</label>
                        <input type="password" class="form-control" id="pass_operator" name="pass_operator" placeholder="Enter your password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mt-4">Login</button>
                </form>
                <div class="text-center mt-3">
                    <a href="login_adm.php" class="text-decoration-none">Not an operator? <span style="color: #28a745;">Login here</span></a>
                </div>
                <div id="messageContainer" class="message"></div>
            </div>
        </div>
        <!-- Loader -->
        <div class="loader" id="loader"></div>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
    <script>
        document.getElementById('operatorLoginForm').addEventListener('submit', async function (event) {
            event.preventDefault();
            document.getElementById('loader').style.display = 'block'; // Show loader

            const nama_operator = document.getElementById('nama_operator').value;
            const pass_operator = document.getElementById('pass_operator').value;

            try {
                const response = await fetch('http://192.168.10.6:8080/Kominfo/service-sijunjung/controllers/loginOperator/loginJwtOp.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({
                        nama_operator: nama_operator,
                        pass_operator: pass_operator
                    })
                });

                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }

                const data = await response.json();

                if (data.success) {
                    // Save data without encryption
                    localStorage.setItem('jwt', data.token);
                    localStorage.setItem('nama_operator', nama_operator);
                    localStorage.setItem('id_opd', data.id_opd.toString());

                    // Verifikasi token JWT dengan REST API protected
                    const tokenVerification = await fetch('http://192.168.10.6:8080/Kominfo/service-sijunjung/controllers/loginClient/protected.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Authorization': 'Bearer ' + data.token
                        }
                    });

                    if (!tokenVerification.ok) {
                        throw new Error('Network response was not ok');
                    }

                    const verificationData = await tokenVerification.json();

                    if (verificationData.success) {
                        window.location.href = 'operator/index.php?page=profile';  // Redirect ke dashboard
                    } else {
                        document.getElementById('messageContainer').innerText = 'Token verification failed: ' + verificationData.message;
                    }
                } else {
                    document.getElementById('messageContainer').innerText = 'Login failed: ' + data.message;
                }
            } catch (error) {
                document.getElementById('messageContainer').innerText = 'An error occurred: ' + error.message;
            } finally {
                document.getElementById('loader').style.display = 'none'; // Hide loader
            }
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
