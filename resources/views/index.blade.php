<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="assets/css/style.css">

    <title>
        @section('title')
        @show
    </title>
</head>

<body class="d-flex flex-column h-100">
    <!-- Navbar -->
    <header>
        <nav class="  navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav me-2 mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="{{ route('signup') }}" type="button" class="btn btn-outline-primary">Sign Up</a>
                            <a href="{{ route('login') }}" type="button" class="btn btn-outline-success">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Section   -->
    <main class="flex-shrink-0">
        @section('main')
        @show
    </main>

    <footer class="footer mt-auto py-3 bg-light">
        <div class="container">
            <span class="text-muted">Place sticky footer content here.</span>
        </div>
    </footer>


    <script src="assets/js/jquery-3.6.0.min.js"></script>
        <!-- Js code -->
        @section('js')
        @show

    <script src="assets/js/bootstrap.bundle.min.js"></script>
    

</body>

</html>