<?php
if (!isset($_SESSION)) {
    session_start();
}

include 'controllers/AboutController.php';

$dbConnection = new mysqli("localhost", "username", "password", "database");
$model = new AboutModel($dbConnection);
$controller = new AboutController($model);
$teamMembers = $controller->loadTeamMembers();

include 'nav.php';
?>

<!DOCTYPE HTML>
<html>
    <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>About</title>
	<style>
#colorlib-about {
            padding-top: 200px; 
        }
	.rounded-image {
    border-radius: 50%;
    width: 200px; 
    height: 200px; 
}
</style>
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
            <div id="colorlib-about">
                <div class="container">
                    <div class="row">
                        <h2>Notre équipe</h2>
                        <?php foreach ($teamMembers as $member): ?>
                            <div class="team-member">
                                <img src="<?= $member['image'] ?>" alt="<?= $member['name'] ?>">
                                <h3><?= $member['name'] ?></h3>
                                <p><?= $member['role'] ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>
        
	</div>
	</div>

<div class="gototop js-top">
	<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
</div>


<script src="js/jquery.min.js"></script>

<script src="js/jquery.easing.1.3.js"></script>

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
