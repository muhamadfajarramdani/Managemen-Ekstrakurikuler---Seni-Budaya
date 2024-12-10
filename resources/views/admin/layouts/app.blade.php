<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EKSTRAKURIKULER DAN SENI BUDAYA SMK WIKRAMA</title>
    <link rel="icon" href="{{ asset('assets/images/logo-smkwikrama.png') }}" type="image/png">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts - Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>

        .sidebar {
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            background-color: #343a40;
            padding-top: 20px;
        }

        .sidebar .nav-link {
            color: #fff;
            font-weight: bold;
        }

        .sidebar .nav-link:hover {
            background-color: #495057;
            border-radius: 5px;
        }

        .sidebar .nav-link i {
            margin-right: 10px;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }

        .navbar-brand {
            color: #fff;
            font-size: 1.5rem;
            text-align: center;
            display: block;
            margin-bottom: 30px;
            font-family: 'Poppins', sans-serif;
        }

        .logo-img {
            display: block;
            margin: 0 auto 20px auto;
            width: 100px;
            height: auto;
        }

        .sidebar hr {
            border: none;

            height: 5px;
            background-image: linear-gradient(to right, #6c757d, #fff);
            margin: 20px auto;
            width: 100%;
        }
    </style>
</head>

<body>

    <div class="sidebar shadow-sm">
        <img src="{{ asset('assets/images/logo-smkwikrama.png') }}" alt="Logo SMK Wikrama" class="logo-img">
        <a class="navbar-brand fw-bold">SMK WIKRAMA</a>
        <hr>
        <ul class="navbar-nav flex-column mt-4">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/landing') }}">
                    <i class="fas fa-home"></i> Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('ekstrakurikuler.index') }}">
                    <i class="fas fa-football-ball"></i> Ekstrakurikuler
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('senbud.data') }}">
                    <i class="fas fa-paint-brush"></i> Seni Budaya
                </a>
            </li>
        </ul>
    </div>

    <div class="content">
        @yield('content')
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 600,
            once: true,
        });
    </script>

</body>

</html>
