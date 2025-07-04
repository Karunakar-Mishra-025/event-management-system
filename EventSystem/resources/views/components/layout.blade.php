<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>

    <!-- Header -->
    <header class="bg-primary text-white text-center py-4 ">
        <div class="container">
            <h1 class="mb-0">Event Management System</h1>
        </div>
    </header>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Event Management System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
                    @auth
                        @if (auth()->user()->name != "admin")
                            <li class="nav-item">
                                <a class="nav-link" href="/manage_tickets">
                                    <i class="fa-solid fa-gear"></i> Booked Tickets
                                </a>
                            </li>
                        @else
                            <li class="nav-item"><a class="nav-link" href="/trains">All Trains</a></li>
                            <li class="nav-item"><a class="nav-link" href="/users">Users</a></li>
                            <li class="nav-item"><a class="nav-link" href="/messages">Messages</a></li>
                        @endif
                    @endauth
                </ul>

                <!-- Right Side -->
                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-user"></i> {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                @if (auth()->user()->name != "admin")
                                    <li><a class="dropdown-item" href="/edit_profile"><i class="fa-solid fa-pencil"></i> Edit
                                            Profile</a></li>
                                @endif
                                <li>
                                    <form class="dropdown-item m-0 p-0" action="/logout" method="post">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="fa-solid fa-door-closed"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="/login"><i
                                    class="fa-solid fa-arrow-right-to-bracket"></i> Log In</a></li>
                        <li class="nav-item"><a class="nav-link" href="/register"><i class="fa-solid fa-user-plus"></i>
                                Register</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    {{ $slot }}

    <!-- Footer -->
    <footer class="bg-light text-center text-muted py-3 border-top">
        <div class="container">
            &copy; All Rights Reserved by Event Management System.
        </div>
    </footer>

    <x-flash-message />
    <!-- Scripts -->

</body>

</html>