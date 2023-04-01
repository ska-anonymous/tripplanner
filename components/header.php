<?php
session_start();
//  redirect user to login page if not logged in already and tries to access pages 
if (!$_SESSION['logged']) {
    // store the url to redirect the user to after successful login 
    header("location:login.php?previousURL=" . urlencode($_SERVER['REQUEST_URI']));
}
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
<!-- Theme style -->
<link rel="stylesheet" href="../dist/css/adminlte.min.css">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<!-- Toastr -->
<link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
<!-- BS Stepper Style-->
<link rel="stylesheet" href="../plugins/bs-stepper/css/bs-stepper.min.css">
</head>

<style>
    .dark-mode input:-webkit-autofill {
        -webkit-text-fill-color: white !important;
        -webkit-box-shadow: inset 0 0 0 50px rgb(52, 58, 64) !important;
    }

    input:-webkit-autofill {
        -webkit-text-fill-color: rgb(73, 80, 87) !important;
        -webkit-box-shadow: inset 0 0 0 50px white !important;
    }
</style>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index.php" class="nav-link">Home</a>
                </li>
                <!-- <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li> -->
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- User Menu Dropdown -->
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <img src="../dist/img/user2-160x160.jpg" class="user-image img-circle elevation-2" alt="User Image">
                        <span class="d-none d-md-inline"><?php echo $_SESSION['user']['user_name']; ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header bg-primary">
                            <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">

                            <p>
                                <?php echo $_SESSION['user']['user_name']; ?>
                                <?php
                                $user_creation_timestring = $_SESSION['user']['user_created_at'];
                                $user_creation_date = date("F, Y", strtotime($user_creation_timestring));
                                ?>
                                <small>Member since <?php echo $user_creation_date; ?></small>
                            </p>
                        </li>

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                            <a href="logout.php" class="btn btn-default btn-flat float-right">Log out</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <!-- Theme toggler -->
                <li class="nav-item">
                    <a href="#" class="nav-link" role="button" id="theme-toggler" onclick="toggleTheme()" data-theme="light">
                        <i class="bi bi-brightness-high-fill"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Trip Planner</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar mt-2">

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">
                                <i class="nav-icon bi bi-house"></i>
                                <p>
                                    HOME
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="find_places.php" class="nav-link">
                                <i class="nav-icon bi bi-globe"></i>
                                <p>
                                    Find Places
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="wishlist.php" class="nav-link">
                                <i class="nav-icon bi bi-heart"></i>
                                <p>
                                    Wishlist
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="trip_planner.php" class="nav-link">
                                <i class="nav-icon bi bi-card-list"></i>
                                <p>
                                    Trip Planner
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <script>
            let button;
            let iconElement;
            let currentTheme;
            window.addEventListener('DOMContentLoaded', () => {
                button = document.querySelector('#theme-toggler');
                iconElement = button.querySelector('i');
                currentTheme = button.getAttribute('data-theme');
                // check localStorage to apply selected theme if present.
                let theme = localStorage.getItem('skag-theme');
                if (theme) {
                    applyTheme(theme);
                }
            })
            // function for changing theme
            function toggleTheme() {
                currentTheme = button.getAttribute('data-theme');
                if (currentTheme === "light") {
                    applyTheme('dark');
                } else {
                    applyTheme('light');

                }
            }
            // function for applying theme
            function applyTheme(theme) {
                if (theme == "light") {
                    button.setAttribute('data-theme', 'light');
                    iconElement.className = "bi bi-moon-stars-fill";
                    document.querySelector('body').classList.remove('dark-mode');
                    document.querySelector('nav').classList.remove('navbar-dark');
                    document.querySelector('nav').classList.add('navbar-light');
                    localStorage.setItem('skag-theme', 'light');
                } else {
                    button.setAttribute('data-theme', 'dark');
                    iconElement.className = "bi bi-brightness-high-fill";
                    document.querySelector('body').classList.add('dark-mode');
                    document.querySelector('nav').classList.remove('navbar-light');
                    document.querySelector('nav').classList.add('navbar-dark');
                    localStorage.setItem('skag-theme', 'dark');
                }
            }

            // function for applying active attribute
            window.onload = function() {
                var currentUrl = window.location.href;
                var menuItems = document.querySelectorAll('.nav-item');

                for (var i = 0; i < menuItems.length; i++) {
                    var menuItemUrl = menuItems[i].querySelector('a').href;
                    if (currentUrl.includes(menuItemUrl)) {
                        menuItems[i].querySelector('a').classList.add('active');
                        menuItems[i].closest('.nav-treeview')?.parentElement.classList.add('menu-open');
                        menuItems[i].closest('.nav-treeview')?.parentElement.querySelector('.nav-link').classList.add('active');
                    }
                }
            };
        </script>