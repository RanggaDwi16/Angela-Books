<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AngelaBook</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        .navbar-brand {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 1.5rem;
        }
        .navbar-nav .nav-link {
            font-size: 1rem;
            font-weight: 600;
            margin-right: 20px;
        }
        .btn-outline-primary, .btn-primary {
            font-size: 0.9rem;
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
        }
        .custom-btn {
            font-size: 1rem; 
            font-weight: 500; 
            padding: 0.5rem 1.5rem; 
            border-radius: 5px; 
            border-width: 1px; 
            transition: all 0.3s ease; 
        }

        .custom-btn.btn-outline-primary {
            color: #000; 
            border-color: #000; 
        }

        .custom-btn.btn-outline-primary:hover {
            background-color: #000; 
            color: #fff; 
        }

        .custom-btn.btn-primary {
            background-color: #000; 
            color: #fff; 
            border-color: #000; 
        }

        .custom-btn.btn-primary:hover {
            background-color: #333; 
            color: #fff; 
        }

        .dropdown-item:hover,
        .dropdown-item:focus {
            background-color: #B1F1F1; 
        }

    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand text-dark" href="#">angelaBook</a>
            
            <!-- Toggle Button for Mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- Navigation Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">Langganan</a>
                    </li>
                </ul>
                <div class="d-flex">
    <a href="#" class="btn btn-outline-primary custom-btn me-2">Masuk</a>
    <a href="#" class="btn btn-outline-primary custom-btn">Daftar</a>
</div>

            </div>
        </div>
    </nav>
</body>
</html>
