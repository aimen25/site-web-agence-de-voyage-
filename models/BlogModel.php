<?php
session_start();
require 'path/to/BlogController.php';

$dbConnection = new mysqli("host", "username", "password", "dbname");
$controller = new BlogController($dbConnection);

$pageno = isset($_GET['pageno']) ? $_GET['pageno'] : 1;
$data = $controller->getBlogPageData($pageno);

include 'nav.php'; // inclure la navigation
?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Blogs</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />


	<link rel="stylesheet" href="Admin/dist/css/public.css" />

	<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">


	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	
	<!-- Date Picker -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

	<link rel="stylesheet" href="css/style.css">

	
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- Vos balises meta et liens CSS ici -->
</head>
<body>
<div class="colorlib-loader"></div>
<div id="page">

    <!-- ... Autres contenus avant les blogs ... -->

    <div id="colorlib-blog">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="wrap-division">

                        <?php foreach ($data['posts'] as $row): ?>
                            <article class="animate-box">
                                <div class="blog-img" style="background-image: url(Admin/<?php echo $row['image']; ?>);"></div>
                                <div class="desc">
                                    <!-- Autres détails du post -->
                                </div>
                            </article>
                        <?php endforeach; ?>

                    </div>

                    <div class="row">
                        <div class="col-md-12 text-center">
                            <ul class="pagination">
                                <!-- Logique de pagination ici -->
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <!-- Barre latérale, si nécessaire -->
                </div>
            </div>
        </div>
    </div>

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