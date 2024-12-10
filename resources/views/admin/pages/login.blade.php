<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        /* Fullscreen Background */
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            font-family: 'Arial', sans-serif;
            color: #fff;
            background-image: url(https://i.pinimg.com/736x/67/4c/e9/674ce97127296dd4bf75ed8040886318.jpg);
        }

        /* Centered Form Container */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            max-width: 400px;
        }

        .form-container {
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            width: 100%;
            box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.2);
        }

        .form-title {
            text-align: center;
            font-size: 1.8rem;
            color: #333;
            margin-bottom: 20px;
            font-weight: bold;
        }

        /* Form Group Styling */
        .form-group {
            margin-bottom: 15px;
        }

        .form-label {
            display: flex;
            align-items: center;
            font-weight: bold;
            color: #555;
            margin-bottom: 5px;
        }

        .form-label i {
            margin-right: 10px;
        }

        .input-group {
            width: 100%;
        }

        .form-input {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 1rem;
            box-sizing: border-box;
            transition: 0.3s;
        }

        .form-input:focus {
            border-color: #2575fc;
            box-shadow: 0 0 5px rgba(37, 117, 252, 0.4);
            outline: none;
        }

        .input-group-text {
            background-color: #f5f5f5;
            border: 1px solid #ccc;
            border-right: none;
            border-radius: 8px 0 0 8px;
        }

        /* Button Styling */
        .form-button {
            width: 100%;
            padding: 12px 0;
            background: #2575fc;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 1.2rem;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .form-button:hover {
            background: #1d63cc;
        }

        /* Alert Styling */
        .alert {
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 8px;
            font-size: 1rem;
            text-align: center;
            color: #fff;
            position: relative;
            /* Allow absolute positioning of close button */
        }

        .alert-danger {
            background: #e74c3c;
        }

        .alert-success {
            background: #2ecc71;
        }

        /* Alert Close Button */
        .alert .btn-close {
            position: absolute;
            top: 10px;
            right: 10px;
            color: #fff;
            border: none;
            background: transparent;
            font-size: 1.2rem;
        }

        /* Ensure that alert looks good on mobile */
        @media (max-width: 576px) {
            .form-container {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="container">


        <form action="{{ route('login.proses') }}" class="form-container" method="POST">
            @csrf

            @if (Session::get('error') || Session::get('success'))
                <div class="alert alert-dismissible fade show @if (Session::get('error')) alert-danger @elseif(Session::get('success')) alert-success @endif"
                    role="alert">
                    @if (Session::get('error'))
                        {{ Session::get('error') }}
                    @elseif (Session::get('success'))
                        {{ Session::get('success') }}
                    @endif
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (Session::get('failed') || Session::get('success'))
                <div class="alert alert-dismissible fade show @if (Session::get('failed')) alert-danger @elseif(Session::get('success')) alert-success @endif"
                    role="alert">
                    @if (Session::get('failed'))
                        {{ Session::get('failed') }}
                    @elseif (Session::get('success'))
                        {{ Session::get('success') }}
                    @endif
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <h3 class="form-title">Login</h3>
            <div class="form-group">
                <label for="email" class="form-label">
                    <i class="fas fa-envelope"></i>Email Address
                </label>
                <div class="input-group">
                    <input type="email" id="email" name="email" class="form-input"
                        placeholder="Enter your email" required>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="form-label">
                    <i class="fas fa-lock"></i>Password
                </label>
                <div class="input-group">
                    <input type="password" id="password" name="password" class="form-input"
                        placeholder="Enter your password" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary form-button">Login</button>
        </form>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
