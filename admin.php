<?php session_start(); ?>
<?php require("class/user.php"); ?>
<?php
try {
    $coUser = new user(); //le mot de passe est correct, on crée l'objet user
    $Base = $coUser->Connexionbdd();
    $DonneeBruteUser = $Base->query('SELECT * from user');
    $TabUserIndex = 0;

    while ($tab = $DonneeBruteUser->fetch()) {
        $TabUser[$TabUserIndex] = new user();
        $TabUser[$TabUserIndex]->construct($tab['id_user'], $tab['identifiant'], $tab['mdp'], $tab['isadmin']);
        $TabUser[$TabUserIndex++];
    }
} catch (Exception $erreurs) {
    echo "echec de la connexion à la base";
}
?>
<!DOCTYPE html>
<!-- Page admin-->
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Accueil</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="css/background.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link rel="icon" type="image/png" href="images/icon/favicon.ico" />

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>


<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/img-01.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Utilisateur</a>
                        </li>

                        <li>
                            <a href="map.html">
                                <i class="fas fa-map-marker-alt"></i>Maps</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="nav nav-pills">

                        <li type="button" class="btn btn-outline-primary" role="presentation"><a href="#2" data-toggle="tab">Modifier User</a></li>
                        <li type="button" class="btn btn-outline-primary " class="active" role="presentation"><a href="#1" data-toggle="tab">Supprimer l'utilisateur</a></li>


                    </ul>

                </nav>

            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Rechercher coordonnées" />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-comment-more"></i>

                                        <div class="mess-dropdown js-dropdown">
                                            <div class="mess__title">
                                                <p>You have 2 news message</p>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-06.jpg" alt="Michelle Moreno" />
                                                </div>
                                                <div class="content">
                                                    <h6>Michelle Moreno</h6>
                                                    <p>Have sent a photo</p>
                                                    <span class="time">3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-04.jpg" alt="Diane Myers" />
                                                </div>
                                                <div class="content">
                                                    <h6>Diane Myers</h6>
                                                    <p>You are now connected on message</p>
                                                    <span class="time">Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="mess__footer">
                                                <a href="#">View all messages</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-email"></i>
                                        <div class="email-dropdown js-dropdown">
                                            <div class="email__title">
                                                <p>You have 3 New Emails</p>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-06.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, 3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-05.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-04.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, April 12,,2018</span>
                                                </div>
                                            </div>
                                            <div class="email__footer">
                                                <a href="#">See all emails</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="fas fa-user"></i>
                                        <span class="quantity">1</span>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="deconnexion.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">

                                        <div class="content">
                                            <div class="api_heure h4" id="zone_api" onload="affiche_heure()"></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">
                                        <?php

                                        echo "Vous êtes connecté en tant que | " . $_SESSION['identifiant'] . " |";




                                        ?>
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-sm-20 col-lg-10">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <?php
                                                echo "<h2>" . $_SESSION['identifiant'] . "</h2>";
                                                ?>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="tab-content">
                            <div class="tab-pane active" class="user" id="1">
                                <div class="row">
                                    <div class="col-lg-10">
                                        <div class="au-card recent-report">
                                            <div class="au-card-inner">
                                                <h1 class="panel-title">Gestion User:</h1>
                                                <div class="info_GPS">

                                                    <div class="col-lg-5">
                                                        <div class="panel-heading">
                                                            <h3 class="title-2">Supprimer l'utilisateur :</h3>
                                                        </div>
                                                        <div class="panel-body">
                                                            <FORM action="" method="POST">
                                                                <?php
                                                                //parcours du tableau User pour delete a partir d'une checkbox
                                                                foreach ($TabUser as $objetUser) {
                                                                    echo '<p><input type="checkbox" value="' . $objetUser->getIdUser() . '" name="user[]" />';
                                                                    echo '<label for="coding">  ' .  $objetUser->getIdentifiant() . ' </label></p>';
                                                                }
                                                                ?>
                                                                <input type="submit" value="Supprimer"></input>
                                                            </FORM>
                                                            <?php
                                                            //Traitement checkbox pour delete user sélectionner
                                                            if (isset($_POST["user"])) {
                                                                foreach ($_POST['user'] as $id_user) {

                                                                    $j = 0;
                                                                    foreach ($TabUser as $objetUser) {
                                                                        if ($objetUser->getIdUser() == $id_user) {
                                                                            $objetUser->deleteUser(); //Appel de la méthode pour delete 

                                                                            //j'en profite pour le retirer de mon tableau. car il sera supprimé à l'affichage
                                                                            unset($TabUser[$j]);
                                                                        }
                                                                        $j++;
                                                                    }
                                                                }
                                                            }


                                                            ?>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane  " class="ModifUser" id="2">
                                <div class="row">
                                    <div class="col-lg-10">
                                        <div class="au-card recent-report">
                                            <div class="au-card-inner">
                                                <h1 class="panel-title">Gestion User:</h1>
                                                <div class="info_GPS">

                                                    <div class="col-lg-5">
                                                        <div class="panel-heading">
                                                            <h3 class="title-2">Modifier l'utilisateur:</h3>
                                                        </div>
                                                        <div class="panel-body">
                                                            <form action="" method="POST" class="login100-form validate-form">

                                                                <!-- Champ de saisie pour le Identifiant  -->
                                                                <div class="wrap-input100 validate-input">
                                                                    <input class="input100" type="text" name="identifiant" placeholder="Identifiant actuel">
                                                                    <span class="focus-input100"></span>
                                                                    <span class="symbol-input100">
                                                                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                                                    </span>
                                                                </div>
                                                                <!-- Champ de saisie pour le Password -->
                                                                <div class="wrap-input100 validate-input" data-validate="Password is required">
                                                                    <input class="input100" type="text" name="newid" placeholder="Nouvel Identifian">
                                                                    <span class="focus-input100"></span>
                                                                    <span class="symbol-input100">
                                                                        <i class="fa fa-lock" aria-hidden="true"></i>
                                                                    </span>
                                                                </div>
                                                                <div class="wrap-input100 validate-input" data-validate="Password is required">
                                                                    <input class="input100" type="password" name="newmdp" placeholder="Nouveau mot de passe">

                                                                </div>
                                                                <div class="container-login100-form-btn">
                                                                    <input type="submit" value="Modifier l'utilisateur" class="login100-form-btn">
                                                                    </input>
                                                                </div>
                                                            </form>

                                                            <?php
                                                            if (isset($_POST['identifiant']) && isset($_POST['newid']) && isset($_POST['newmdp'])) //copier coller
                                                            {
                                                                $identifiant = $_POST['identifiant'];
                                                                $newid = $_POST['newid'];
                                                                $newmdp = $_POST['newmdp'];

                                                                $idamdin = "admin";
                                                                $mdpadmin = "admin";

                                                                $userrequete = new user($idadmin, $mdpadmin);
                                                                $base = $userrequete->Connexionbdd();
                                                                $userrequete->Modification_user($identifiant, $base, $newid, $newmdp);
                                                            }
                                                            ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="copyright">
                    <p>Copyright © 2020 La Providence. Tous droits reservés. Developper par RoroMatFloGANG</p>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- END MAIN CONTENT-->
    <!-- END PAGE CONTAINER-->
    </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main2.js"></script>
    <!-- JS HEURE MATHIS-->
    <script src="js/javascript.js"></script>

</body>

</html>
<!-- end document-->