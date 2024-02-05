<?php
// views/tours.php

session_start();
include_once 'functions.php';
include_once 'config.php';
include_once 'controllers/TourController.php';

// Initialisez la connexion à la base de données
$dbConnection = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

// Gestion d'erreur de connexion à la base de données
if ($dbConnection->connect_error) {
    die("Connection failed: " . $dbConnection->connect_error);
}

// Créez des instances du modèle et du contrôleur
$model = new TourModel($dbConnection);
$controller = new TourController($model);

// Récupérez les données nécessaires pour la page
$pageno = isset($_GET['pageno']) && is_numeric($_GET['pageno']) ? intval($_GET['pageno']) : 1;
$pageData = $controller->getPageData($pageno);

// Inclusion du code HTML ci-dessous
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Séjours</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />

    <link rel="stylesheet" href="Admin/dist/css/public.css" />
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">

    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/flexslider.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/modernizr-2.6.2.min.js"></script>
    <style>
       #colorlib-tours {
            padding-top: 150px; 
        }  </style>
</head>
<body>
    <div id="page">
        <!-- Inclure le header, la navigation, etc. -->
        <?php include 'nav.php'; ?>

        <div class="colorlib-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="wrap-division">
                                <div class="col-md-12 col-md-offset-0 heading2 animate-box text-center">
                                    <h2>Explorez le Monde avec Nous</h2>
                                </div>

                                <!-- Boucle sur les données des tours -->
                                <?php
                                foreach ($pageData['tours'] as $row) {
                                    // Conversion de la devise si nécessaire
                                    $price = ($_SESSION['currency'] == "DZD") ? convertCurrency($row['price'], $_SESSION['c_from'], $_SESSION['c_to']) : $row['price'];

                                    echo "<div class=\"col-md-6 col-sm-6 animate-box\">";
                                    echo "<div class=\"tour\">";
                                    echo "<a href=\"tour-place.php?tour_id={$row['tour_id']}\" class=\"tour-img\" style=\"background-image: url(Admin/{$row['image']});\">";
                                    echo "<p class=\"price\"><span>{$_SESSION['c_symbol']}$price</span> <small>/ 7 jours</small></p>";
                                    echo "</a>";
                                    echo "<span class=\"desc\">";
                                    echo "<h2><a href=\"tour-place.php?tour_id={$row['tour_id']}\">{$row['title']}</a></h2>";
                                    echo "<span class=\"city\">{$row['location']}</span>";
                                    echo "</span>";
                                    echo "</div>";
                                    echo "</div>";
                                }
                                ?>

                                <!-- Pagination -->
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <ul class="pagination">
                                            <!-- Génération des liens de pagination -->
                                            <!-- ... Code de pagination ici ... -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php include 'sidebar.php'; ?>
                </div>
            </div>
        </div>

        <?php include 'footer.php'; ?>
    </div>
    <div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
</div>
<!-- jQuery (utilisation d'un CDN) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- jQuery Easing -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<!-- Bootstrap (utilisation d'un CDN) -->
<script

 src="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="js/jquery.waypoints.min.js"></script>
<!-- Flexslider -->
<script src="js/jquery.flexslider-min.js"></script>
<!-- Owl carousel -->
<script src="js/owl.carousel.min.js"></script>
<!-- Magnific Popup -->
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/magnific-popup-options.js"></script>
<!-- Date Picker -->
<script src="js/bootstrap-datepicker.js"></script>
<!-- Stellar Parallax -->
<script src="js/jquery.stellar.min.js"></script>
<!-- Votre propre fichier JavaScript principal -->
<script src="js/main.js"></script>
</body>
</html>