<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Hotels</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

	<link rel="stylesheet" href="Admin/dist/css/public.css" />


	<link rel="stylesheet" href="Admin/dist/css/public.css" />
	
	<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	
	<!-- Date Picker -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
<div class="colorlib-loader"></div>

<div id="page">
    <?php include 'nav.php'; ?>

    <div class="colorlib-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12 col-md-offset-0 heading2 animate-box text-center">
                            <h2>Découvrez Nos Hôtels Sélectionnés avec Soin </h2>
                        </div>
                        <div class="wrap-division">
                            <?php foreach ($hotels as $row): ?>
                                <div class="col-md-6 col-sm-6 animate-box">
                                    <div class="hotel-entry">
                                        <a href="hotel-room.php?hotel_id=<?php echo $row['hotel_id']; ?>" class="hotel-img" style="background-image: url(Admin/<?php echo $row['image']; ?>);">
                                            <p class="price"><span><?php echo $_SESSION['c_symbol'] . $row['price']; ?></span><small> /nuit</small></p>
                                        </a>
                                        <div class="desc">
                                            <h3><a href="hotel-room.php?hotel_id=<?php echo $row['hotel_id']; ?>"><?php echo $row['title']; ?></a></h3>
                                            <span class="place"><?php echo $row['location']; ?></span>
                                            <p><?php echo $row['hotel_desc']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                            <!-- Pagination ici -->
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