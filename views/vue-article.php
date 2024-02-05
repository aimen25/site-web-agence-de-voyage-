<?php
if (!isset($_SESSION)) {
    session_start();
}

require 'config.php';
require 'controllers/VueArticleController.php';

$postId = isset($_GET['post_id']) ? intval($_GET['post_id']) : null;

if (!$postId) {
    header("Location: blog.php");
    exit();
}

$dbConnection = new mysqli("localhost","root","","travel_db");
$model = new PostModel($dbConnection);
$controller = new VueArticleController($model);

$article = $controller->afficherArticle($postId);
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
        <!-- Liens CSS -->
        <link rel="stylesheet" href="Admin/dist/css/public.css" />
        <!-- Autres liens CSS si nécessaire -->
    </head>
    <body>
        <div class="colorlib-loader"></div>
        <div id="page">
            <?php include 'nav.php'; ?>

            <aside id="colorlib-hero">
                <div class="flexslider">
                    <ul class="slides">
                        <li style="background-image: url(images/cover-img.jpg);">
                            <div class="overlay"></div>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
                                        <div class="slider-text-inner text-center">
                                            <h1>Blogs</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </aside>

            <div class="colorlib-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="wrap-division">
                                        <div class="col-md-12 col-md-offset-0 heading2 animate-box">
                                            <h2><?php echo $article['title']; ?></h2>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 animate-box">
                                                <div class="room-wrap">
                                                    <div class="row">
                                                        <div class="post-details">
                                                            <?php echo $article['description']; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php include 'sidebar.php'; ?>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'subscribe.php'; ?>
        <?php include 'footer.php'; ?>

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
