@props(['title' => 'Event Management'])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $title }}</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin_resource/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_resource/vendors/base/vendor.bundle.base.css') }}">
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('admin_resource/css/style.css') }}">
    <script src="//unpkg.com/alpinejs" defer></script>
    <!-- endinject -->
</head>

<body>
    <div class="container-scroller">

        <!-- Navbar -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo me-5" href="index.html">
                    <img src="../assets/img/Logo & name.png" alt="logo">
                </a>
                <a class="navbar-brand brand-logo-mini" href="index.html">
                    <img src="../assets/img/Logo.jpg" alt="logo">
                </a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler" type="button" data-toggle="minimize">
                    <span class="ti-view-list"></span>
                </button>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRYPRLSISP2uoEdGxNPVFrz02gI2KWiJ_VwNA&s"
                                alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="#"><i class="ti-settings text-primary"></i> Settings</a>
                            <form action="/logout" method="POST">
                                @csrf
                                <button class="dropdown-item" type="submit">
                                    <i class="ti-power-off text-primary"></i> Logout
                                </button>
                            </form>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none" type="button" data-toggle="offcanvas">
                    <span class="ti-view-list"></span>
                </button>
            </div>
        </nav>

        <!-- Sidebar + Page Body -->
        <div class="container-fluid page-body-wrapper">
            <!-- Sidebar -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/dashboard">
                            <i class="ti-shield menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                            aria-controls="ui-basic">
                            <i class="ti-layers menu-icon"></i>
                            <span class="menu-title">Events</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link" href="/admin/add_event">Add Events</a></li>
                                <li class="nav-item"><a class="nav-link" href="/admin/events">View Events</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>

            <!-- Main Content -->
            <div class="main-panel">
                <div class="content-wrapper">
                    {{ $slot }}
                </div>

                <!-- Footer -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
                            Copyright © <a href="https://www.eventmanagemtsystem.com/" target="_blank">
                                Event Management System
                            </a> 2021
                        </span>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <x-flash-message />
    <!-- Scripts -->
    <script src="{{ asset('admin_resource/vendors/base/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('admin_resource/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin_resource/js/jquery.cookie.js') }}"></script>
    <script src="{{ asset('admin_resource/js/off-canvas.js') }}"></script>
    <script src="{{ asset('admin_resource/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('admin_resource/js/template.js') }}"></script>
    <script src="{{ asset('admin_resource/js/todolist.js') }}"></script>
    <script src="{{ asset('admin_resource/js/dashboard.js') }}"></script>
</body>

</html>