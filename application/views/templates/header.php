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
    <link href="<?= APPPATH ?>/assets/css/styles.css" rel="stylesheet">

    <!-- Bootstrap core JavaScript -->
    <script src="<?= APPPATH ?>/assets/jquery/jquery.min.js"></script>
    <script src="<?= APPPATH ?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- fontAwesome -->
    <script src="<?= APPPATH ?>/assets/fontawesome/svg-with-js/js/fontawesome-all.js"></script>

    <!-- Cookie alert -->
    <script src="<?= APPPATH ?>/assets/cookie-alert/cookiealert.js"></script>
    <script src="<?= APPPATH ?>/assets/cookie-alert/js-cookie.js"></script>


</head>

<body>

<!-- COOKIEMODAL -->
<div id="myModal" class="modal fade cuztomz" role="dialog" style="z-index: 9999">
    <div class="modal-dialog">

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

<!-- LOGINMODAL -->
<div id="myModal2" class="modal fade cuztomz" data-attr="<?php echo BASEPATH; ?>" role="dialog" style="z-index: 9999">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Inloggen</h4>
                <button type="button" class="close" data-dismiss="modal">X</button>
            </div>
            <div class="modal-body">
                <div id="error" class="alert alert-danger" role="alert"></div>
                <form id="login-form" name="login" class="form-signin" method="post">
                    <span id="reauth-email" class="reauth-email"></span>
                    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="E-mailadres"
                           required
                           autofocus>
                    <input type="password" id="password" class="form-control" name="password" placeholder="Wachtwoord"
                           required>
                    <input type="password" id="thingy" class="form-control" name="login" placeholder="Wachtwoord"
                           hidden>
                    <div id="remember" class="checkbox">
                        <label>
                            <input type="checkbox" value="remember-me"> Onthouden
                        </label>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block btn-signin" type="button"
                            onclick="submitLoginForm();" name="btn-login"
                            id="btn-login">Inloggen
                    </button>
                </form>
                <a href="#" class="forgot-password">
                    Wachtwoord vergeten?
                </a>

            </div>
        </div>

    </div>
</div>

<!-- REGISTERMODAL-->
<div id="myModal3" class="modal fade cuztomz" role="dialog" style="z-index: 9999" data-attr="<?php echo BASEPATH; ?>">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Registreren</h4>
                <button type="button" class="close" data-dismiss="modal">X</button>
            </div>
            <div class="modal-body">
                <div id="register-error" class="alert alert-danger" role="alert"></div>

                <form id="register-form" class="form-signin" name="register" role="form" autocomplete="off">

                    <div class="form-group row">
                        <label class="col-md-12">Naam</label>
                        <div class="col-md-6">
                            <input type="text" id="inputFirstName" name="inputFirstName" class="form-control"
                                   placeholder="Voornaam" required
                                   autofocus>
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="inputLastName" name="inputLastName" class="form-control"
                                   placeholder="Achternaam" required
                                   autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-12">Afleveradres</label>
                        <div class="col-md-5">
                            <input type="text" id="inputStreet" name="inputStreet" class="form-control"
                                   placeholder="Straatnaam" required
                                   autofocus>
                        </div>
                        <div class="col-md-4">
                            <input type="text" id="inputHouseNumber" name="inputHouseNumber" class="form-control"
                                   placeholder="Huisnummer"
                                   required autofocus>
                        </div>
                        <div class="col-md-3">

                            <input type="text" id="inputHouseAddition" name="inputHouseAddition"" class="form-control"
                            placeholder="Toevgsl"
                            required autofocus>
                        </div>
                        <div class="col-md-5">
                            <input type="text" id="inputPostalCode" name="inputPostalCode" class="form-control"
                                   placeholder="Postcode" required
                                   autofocus>
                        </div>
                        <div class="col-md-7">
                            <input type="text" id="inputCityName" name="inputCityName" class="form-control"
                                   placeholder="Plaatsnaam" required
                                   autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Telefoonnummer</label>
                        <input type="text" id="inputPhone" name="inputPhone" class="form-control" placeholder="Telefoon"
                               required
                               autofocus>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="E-mail" required
                               autofocus>
                        <label>Wachtwoord</label>
                        <input type="password" id="password" class="form-control" name="password"
                               placeholder="Wachtwoord"
                               required>
                    </div>

                    <div class="form-group">
                        <input type="password" id="thingy" class="form-control" name="register" placeholder="Wachtwoord"
                               hidden>
                        <!--                        <button id="RegisterUser" class="btn btn-lg btn-primary btn-block btn-signin">Registreren-->
                        <!--                        </button>-->
                        <button class="btn btn-lg btn-primary btn-block btn-signin" type="button" name="btn-register"
                                id="btn-register"> Registreren
                        </button>
                    </div>
                </form>

                <script type="text/javascript">
                    $('#btn-register').on('click', function (event) {
                        submitRegisterForm();
                    });
                </script>

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
                    <a class="nav-link" href="<?= BASEPATH; ?>" role="button">
                        Home
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="<?= BASEPATH; ?>overview/" role="button">
                        Producten
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="<?= BASEPATH; ?>contact/" role="button">
                        Contact
                    </a>
                </li>
            </ul>
            <?php
            $userIsLoggedIn = $this->request->User->isAuthenticated;
            if ($userIsLoggedIn) {
                ?>
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item dropdown user-account">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            Profiel
                        </a>
                        <div class="dropdown-menu">
                            <a href="<?= BASEPATH ?>profile" class="dropdown-item">Account</a>
                            <a href="<?= BASEPATH ?>logout" class="dropdown-item">Logout</a>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link nav-btn" href="<?= BASEPATH ?>cart"><span><i
                                        class="fa fa-shopping-cart" aria-hidden="true"></i> Winkelwagen</span></a></li>
                </ul>
                <?php
            } else {
                ?>
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item" style="cursor: pointer;"><a class="nav-link nav-btn" data-toggle="modal"
                                                                     data-target="#myModal2"><span><i
                                        class="fas fa-sign-in-alt" aria-hidden="true"> </i>   Inloggen</span></a></li>
                    <li class="nav-item" style="cursor: pointer;"><a class="nav-link nav-btn" data-toggle="modal"
                                                                     data-target="#myModal3"><span><i
                                        class="fas fa-sign-in-alt" aria-hidden="true"> </i>   Registreren</span></a>
                    </li>
                    <li class="nav-item"><a class="nav-link nav-btn" href="<?= BASEPATH ?>cart"><span><i
                                        class="fa fa-shopping-cart" aria-hidden="true"></i> Winkelwagen</span></a></li>
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