<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Webshop WEBS2">
    <meta name="author" content="BitHopper">

    <title>Webshop</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= APPPATH ?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= APPPATH ?>/assets/bootstrap/css/bootstrap-grid.min.css" rel="stylesheet">
    <link href="<?= APPPATH ?>/assets/bootstrap/css/bootstrap-reboot.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= APPPATH ?>/assets/css/admin.css" rel="stylesheet">

    <!-- Bootstrap core JavaScript -->
    <script src="<?= APPPATH ?>/assets/jquery/jquery.min.js"></script>
    <script src="<?= APPPATH ?>/assets/bootstrap/js/jquery-ease.js"></script>
    <script src="<?= APPPATH ?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- fontAwesome -->
    <script src="<?= APPPATH ?>/assets/fontawesome/svg-with-js/js/fontawesome-all.js"></script>

    <!-- Cookie alert -->
    <script src="<?= APPPATH ?>/assets/cookie-alert/cookiealert.js"></script>
    <script src="<?= APPPATH ?>/assets/cookie-alert/js-cookie.js"></script>

    <script>
        (function ($) {
            "use strict"; // Start of use strict

            // Smooth scrolling using jQuery easing
            $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function () {
                if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    if (target.length) {
                        $('html, body').animate({
                            scrollTop: (target.offset().top - 50)
                        }, 1000, "easeInOutExpo");
                        return false;
                    }
                }
            });

            // Activate scrollspy to add active class to navbar items on scroll
            $('body').scrollspy({
                target: '#mainNav',
                offset: 57
            });
        })(jQuery); // End of use strict

    </script>

</head>
<body>

<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Administratiepaneel</a>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="/logout">Uitloggen</a>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Webshop beheren</span>
                    <a class="d-flex align-items-center text-muted" href="#">
                        <span data-feather="plus-circle"></span>
                    </a>
                </h6>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="/webshop/admin">
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/webshop/products">
                            Producten
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/webshop/categories">
                            Categorieen
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/webshop/users">
                            Klantgegevens
                        </a>
                    </li>
                </ul>
            </div>
        </nav>