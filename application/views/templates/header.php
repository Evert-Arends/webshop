<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Webshop WEBS2">
    <meta name="author" content="BitHopper">

    <title>Homepage</title>

    <!-- Bootstrap core CSS -->
    <link href="application/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="application/assets/bootstrap/css/bootstrap-grid.min.css" rel="stylesheet">
    <link href="application/assets/bootstrap/css/bootstrap-reboot.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="application/assets/css/styles.css" rel="stylesheet">

    <!-- Bootstrap core JavaScript -->
    <script src="application/assets/jquery/jquery.min.js"></script>
    <script src="application/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- fontAwesome -->
    <script src="application/assets/fontawesome/svg-with-js/js/fontawesome-all.js"></script>

    <!-- Cookie alert -->
    <script src="application/assets/cookie-alert/cookiealert.js"></script>
    <script src="application/assets/cookie-alert/js-cookie.js"></script>

</head>

<body>

<!-- CookieModal -->
<div id="myModal" class="modal fade cuztomz" role="dialog" style="z-index: 9999">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cookies</h4>
                <button type="button" class="close" data-dismiss="modal">X</button>
            </div>
            <div class="modal-body">
                <p>
                    Cookies zijn kleine tekstbestanden die geplaatst worden door websites op computers, telefoons en
                    tablets van bezoekers. Een cookie bevat identificatiegegevens, waarmee websites je kunnen herkennen,
                    ongeacht welk apparaat je gebruikt. Dit is waardevolle informatie, maar omdat dit ook privacy kan
                    schenden, is het gebruik van cookies aan wetgeving gebonden.
                </p>
                <p>
                    De cookies die door ons worden opgeslagen zorgen ervoor dat u kunt winkelen op onze webshop.
                    Wij slaan geen persoonsgegevens op in cookies, alle gegevens zijn anoniem.
                </p>
            </div>
        </div>

    </div>
</div>

<!-- COOKIES -->
<div class="alert alert-dismissible text-center cookiealert" role="alert">
    <div class="cookiealert-container">
        We gebruiken cookies om er zeker van te zijn dat je onze website zo goed mogelijk beleeft.
        Als je deze website blijft gebruiken gaan we ervan uit dat je dat goed vindt.
        <button type="button" class="btn btn-primary btn-sm acceptcookies" aria-label="Close">
            Natuurlijk
        </button>
        <button type="button" class="btn btn-info btn-sm more-information" data-toggle="modal" data-target="#myModal">
            Meer informatie
        </button>

    </div>
</div>

<!-- defaultmodal -->
<div id="myModal2" class="modal fade cuztomz" role="dialog" style="z-index: 9999">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Inloggen</h4>
                <button type="button" class="close" data-dismiss="modal">X</button>
            </div>
            <div class="modal-body">
                <form class="form-signin">
                    <span id="reauth-email" class="reauth-email"></span>
                    <input type="email" id="inputEmail" class="form-control" placeholder="E-mailadres" required
                           autofocus>
                    <input type="password" id="inputPassword" class="form-control" placeholder="Wachtwoord" required>
                    <div id="remember" class="checkbox">
                        <label>
                            <input type="checkbox" value="remember-me"> Onthouden
                        </label>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Inloggen</button>
                </form>
                <a href="#" class="forgot-password">
                    Wachtwoord vergeten?
                </a>

            </div>
        </div>

    </div>
</div>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark" id="menu">
    <div class="container">
        <a class="navbar-brand" href="index.html"><span class="icon-uilove icon-uilove-realestate"></span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu-content"
                aria-controls="menu-content" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu-content">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="#" role="button">
                        Home
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#" role="button">
                        Contact
                    </a>
                </li>

                <li class="nav-item dropdown megamenu">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        Categorieen
                    </a>
                    <div class="dropdown-menu custom-padding">
                        <div class="row justify-content-md-center no-margin">
                            <div class="col col-md-8">
                                <div class="row">
                                    <div class="col-md-6 col-lg-3">
                                        <ul class="list-unstyled">
                                            <li class="title">Homepage</li>
                                            <li><a href="index.html">Homepage 1</a></li>
                                            <li><a href="index2.html">Homepage 2</a></li>
                                            <li><a href="index3.html">Homepage 3</a></li>
                                            <li><a href="index4.html">Homepage 4</a></li>
                                            <li><a href="index5.html">Homepage 5</a></li>
                                            <li><a href="index6.html">Homepage 6</a></li>
                                            <li><a href="index7.html">Homepage 7</a></li>
                                            <li class="title">Login Pages</li>
                                            <li><a href="signin.html">Signin</a></li>
                                            <li><a href="register.html">Register</a></li>
                                            <li><a href="forgot-password.html">Forgot Password</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <ul class="list-unstyled">
                                            <li class="title">Property Listing</li>
                                            <li><a href="property_listing.html">List View</a></li>
                                            <li><a href="property_grid.html">Grid View</a></li>
                                            <li><a href="property_listing_map.html">Map View</a></li>
                                            <li class="title">Single Property</li>
                                            <li><a href="property_single.html">Single View 1</a></li>
                                            <li><a href="property_single2.html">Single View 2</a></li>
                                            <li><a href="property_single3.html">Single View 3</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <ul class="list-unstyled">
                                            <li class="title">Other Pages</li>
                                            <li><a href="plans.html">Plans</a></li>
                                            <li><a href="information_page.html">Information Page</a></li>
                                            <li><a href="coming_soon.html">Coming Soon</a></li>
                                            <li><a href="404_error.html">Error Page</a></li>
                                            <li><a href="success.html">Success Page</a></li>
                                            <li><a href="contact.html">Contact Page</a></li>
                                            <li><a href="compare.html">Compare Properties</a></li>
                                            <li class="title">Agent Pages</li>
                                            <li><a href="agent_list.html">Agent List</a></li>
                                            <li><a href="agent.html">Agent Profile</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <ul class="list-unstyled">
                                            <li class="title">Account Pages</li>
                                            <li><a href="my_listing_add.html">Add Listing</a></li>
                                            <li><a href="my_bookmarked_listings.html">Bookmarked Listing</a></li>
                                            <li><a href="my_listings.html">My Listings</a></li>
                                            <li><a href="my_profile.html">My Profile</a></li>
                                            <li><a href="my_password.html">Change Password</a></li>
                                            <li><a href="my_notifications.html">Notifications</a></li>
                                            <li><a href="my_membership.html">Membership</a></li>
                                            <li><a href="my_payments.html">Payments</a></li>
                                            <li><a href="my_account.html">Account</a></li>
                                            <li class="title">Blog Pages</li>
                                            <li><a href="blog.html">Blog Archive</a></li>
                                            <li><a href="blog_single.html">Blog Single</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

            </ul>

            <?php
            $userIsLoggedIn = false;

            if ($userIsLoggedIn) {
                ?>
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item dropdown user-account">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            Profiel
                        </a>
                        <div class="dropdown-menu">
                            <a href="my_profile.html" class="dropdown-item">My Profile</a>
                            <a href="my_password.html" class="dropdown-item">Change Password</a>
                            <a href="my_notifications.html" class="dropdown-item">Notifications</a>
                            <a href="my_membership.html" class="dropdown-item">Membership</a>
                            <a href="my_payments.html" class="dropdown-item">Payments</a>
                            <a href="my_account.html" class="dropdown-item">Account</a>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link nav-btn" href="my_listing_add.html"><span><i
                                        class="fa fa-shopping-cart" aria-hidden="true"></i> Winkelwagen</span></a></li>
                </ul>
                <?php
            } else {
                ?>
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item" style="cursor: pointer;"><a class="nav-link nav-btn" data-toggle="modal"
                                                                     data-target="#myModal2"><span><i
                                        class="fas fa-sign-in-alt" aria-hidden="true"> </i>   Inloggen</span></a></li>

                </ul>
                <?php
            }
            ?>
        </div>
    </div>
</nav>

<div class="col-lg-10 col-md-10 offset-lg-1 offset-md-1 mt-5">
    <div class="row">
        <div class="col-12">
            <div class="banner-container background-cover layout-fill layout-align-center-center layout-row"
                 layout="row" layout-align="center center" layout-fill=""
                 style="background-image: url('https://www.w3schools.com/css/trolltunga.jpg');"
                 ng-class="{ 'banner-short' : banner.short }">

                <div class="banner-text padding-mobile">
                    <h1 class="ls-heading banner-title">
                        HELLOWORLD
                    </h1>
                    <p class="ls-subheading banner-title">
                        A responsive banner
                    </p>

                </div>
            </div>
        </div>
    </div>