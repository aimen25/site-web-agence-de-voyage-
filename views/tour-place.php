<?php
// views/tour-place.php

if(!isset($_SESSION)) { session_start(); }

// Validation et assainissement de l'entrée
$tourId = isset($_GET['tour_id']) ? intval($_GET['tour_id']) : null;

if (!$tourId) {
    header("Location: tours.php");
    exit();
}

require 'config.php';
require 'controllers/TourDetailsController.php';

// Initialisation du modèle et du contrôleur
$dbConnection = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);
$model = new TourDetailsModel($dbConnection);
$controller = new TourDetailsController($model);

// Récupération des détails du tour
$tourDetails = $controller->displayTour($tourId);

// Inclusion du code HTML ici...
?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Detaille du séjour</title>
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


	</head>
	<body>
 

    <div class="colorlib-loader"></div>
    <div id="page">
        <?php include 'nav.php'; ?>
        <div class="colorlib-wrap  margin-top-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="wrap-division">
                                    <?php
                                    require 'config.php';
                                    $statement = mysqli_query($conn, "SELECT * from tours where tour_id= $_SESSION[tour_id]");
                                    $row = mysqli_fetch_assoc($statement);

                                    echo "<div class=\"col-md-12 col-md-offset-0 heading2 animate-box\">";
                                    echo "<h2>$row[title]</h2>";
                                    echo "</div>";
                                    echo "<div class=\"row\">";
                                    echo "<div class=\"col-md-12 animate-box\">";
                                    echo "<div class=\"room-wrap\">";
                                    echo "<div class=\"row\">";
                                    echo "<div class=\"tour-details\">$row[description]</div>";
                                    echo "</div>";
                                    echo "</div>";
                                    echo "</div>";

                                    echo "<div class=\"col-md-12 animate-box text-center\">";
                           
                                    echo "<p><a href=\"#popupModal\" class=\"btn btn-primary\" data-toggle=\"modal\">Réservez!</a></p>";
                                    echo "</div>";
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
           
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="popupModal" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
               
                <div class="modal-header">
                    <h5 class="modal-title" id="popupModalLabel">Réserver un hôtel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Souhaitez-vous réserver un hôtel pour cette destination ?</p>
                   
                </div>
                <div class="modal-footer">
                
                <a href="package-booking.php?tour_id=$row[tour_id]\" class="btn btn-primary">Non,MERCI!</a>
           
                    <a href="hotels.php?tour_id=<?php echo $row['tour_id']; ?>" class="btn btn-primary">Réserver un hôtel</a>
                </div>
            </div>
        </div>
    </div>


				</div>
			</div>
		</div>
	</div>

	
<?php include 'subscribe.php'; ?>

<?php include 'footer.php'; ?>

	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
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

	<!-- Main -->
	<script src="js/main.js"></script>



	</body>
</html>
