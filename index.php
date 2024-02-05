<?php
session_start();

include 'functions.php';

if (empty($_SESSION['currency']) || $_SESSION['currency'] == "EUR") {
	$_SESSION['currency'] = "EUR";
	$_SESSION['c_from'] = "DZD";
	$_SESSION['c_to'] = "EUR";
	$_SESSION['c_symbol'] = "€";
} else if ($_SESSION['currency'] == "DZD") {
	$_SESSION['c_from'] = "EUR";
	$_SESSION['c_to'] = "DZD";
	$_SESSION['c_symbol'] = "DZD";
}

?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DARA TOUR</title>
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
    <script src="js/modernizr-2.6.2.min.js" async></script>
</head>
	<body>


	<div class="colorlib-loader"></div>

	<div id="page">

<?php include 'nav.php'; ?>

		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
				   <li style="background-image: url(images/Europe/turquie/turquie1.jpg);">
					   <div class="overlay"></div>
					   <div class="container-fluid">
						   <div class="row">
							   <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
								   <div class="slider-text-inner text-center">
									   <h2>Voyage entre Europe et Orient</h2>
									   <h1> Antalya</h1>
								   </div>
							   </div>
						   </div>
					   </div>
				   </li>
				   <li style="background-image: url(images/Afrique/zinzibar/ZINZI.jpg);">
					   <div class="overlay"></div>
					   <div class="container-fluid">
						   <div class="row">
							   <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
								   <div class="slider-text-inner text-center">
									   <h2>Entre plages et festivals</h2>
									   <h1> Zinzibar </h1>
								   </div>
							   </div>
						   </div>
					   </div>
				   </li>
				   <li style="background-image: url(images/Asie/AUTRES_DESTINATION/malaisie.jpg);">
					   <div class="overlay"></div>
					   <div class="container-fluid">
						   <div class="row">
							   <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
								   <div class="slider-text-inner text-center">
									   <h2>une destination aux multiples visages</h2>
									   <h1>Malaisie</h1>
								   </div>
							   </div>
						   </div>
					   </div>
				   </li>
				   <li style="background-image: url(images/Afrique/tunis/téléchargement.jpg);">
					   <div class="overlay"></div>
					   <div class="container-fluids">
						   <div class="row">
							   <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
								   <div class="slider-text-inner text-center">
									   <h2>voyage au pays du jasmin</h2>
									   <h1>Hammamet</h1>
								   </div>
							   </div>
						   </div>
					   </div>
				   </li>
				   <li style="background-image: url(images/Europe/avec-visa/france/france2.jpg);">
					   <div class="overlay"></div>
					   <div class="container-fluid">
						   <div class="row">
							   <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
								   <div class="slider-text-inner text-center">
									   <h2> voyage vers le pays le plus visité au monde</h2>
									   <h1> Paris</h1>
								   </div>
							   </div>
						   </div>
					   </div>
				   </li>	
				   <li style="background-image: url(images/Europe/avec-visa/espagne/espagne.jpg);">
					   <div class="overlay"></div>
					   <div class="container-fluid">
						   <div class="row">
							   <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
								   <div class="slider-text-inner text-center">
									   <h2>voyage au pays de Cervantes</h2>
									   <h1>Barcelone</h1>
								   </div>
							   </div>
						   </div>
					   </div>
				   </li>   	
				  </ul>
			  </div>
		</aside>
		<div id="colorlib-reservation">
			<!-- <div class="container"> -->
				<div class="row">
					<div class="search-wrap">
						<div class="container">
							<ul class="nav nav-tabs">
								<li class="active"><a data-toggle="tab" href="#hotel"><i class="flaticon-resort"></i> Hotel</a></li>
								<li><a data-toggle="tab" href="#car"><i class="flaticon-plane"></i> Tour</a></li>
							</ul>
						</div>
						<div class="tab-content">
						 <div id="hotel" class="tab-pane fade in active">
							  <form method="GET" class="colorlib-form" action="search_hotel.php">
								  <div class="row">
								   <div class="col-md-2">
									   <div class="booknow">
										   <h2>Réservez</h2>
										   <span>maintenant</span>
									   </div>
								   </div>
								<div class="col-md-8">
								   <div class="form-group">
									
									<div class="form-field">
										<label for=""></label>
									  <input type="text" id="hotel_location" class="hotel_location tt-query form-control" autocomplete="off" spellcheck="false" placeholder="Nom hotel" name="hotel_location">
									</div>
								  </div>
								</div>
								<div class="col-md-2">
								  <input type="submit" name="submit" id="submit" value="Recherche" class="btn btn-primary btn-block">
								</div>
							  </div>
							</form>
						   </div>

						 <div id="car" class="tab-pane fade">
							  <form method="GET" class="colorlib-form" action="search_tour.php">
								  <div class="row">
								   <div class="col-md-2">
									   <div class="booknow">
										   <h2>Réservez </h2>
										   <span>maintenant</span>
									   </div>
								   </div>
								<div class="col-md-8">
								   <div class="form-group">
								
									<div class="form-field">
										<label for=""></label>
									  <input type="text" id="location" class="form-control" placeholder="Ville" name="tour_location">
									</div>
								  </div>
								</div>
								<div class="col-md-2">
								  <input type="submit" name="submit" id="submit" value="Recherche" class="btn btn-primary btn-block">
								</div>
							  </div>
							</form>
						   </div>

					 </div>
					</div>
				</div>
			</div>
		</div>

		
		<div class="colorlib-tour colorlib-light-grey">
			<div class="container">
				<div class="row">
				<div class="col-md-12col-md-offset-3 text-center colorlib-heading animate-box">
				
	<h2 style="font-family: 'great vibes', cursive;color:orange">Les Plus Belles Destinations</h2>
  

	<p>Nous adorons raconter nos succès, très, très loin. Cependant, notre véritable passion réside dans la découverte des destinations extraordinaires à travers le monde.</p>
</div>

				</div>
				
			</div>
			<div class="tour-wrap">

							<?php
							require 'config.php';

							$statement = "select * from tours where deletedAt is null order by tour_id asc LIMIT 8";
							$res_data = mysqli_query($conn, $statement);

							if (mysqli_num_rows($res_data) > 0) {
								while ($row = mysqli_fetch_assoc($res_data)) {
									if ($_SESSION['currency'] == "EUR") {
										$price = $row['price'];
									} else if ($_SESSION['currency'] == "DZD") {
										$price = convertCurrency($row['price'], $_SESSION['c_from'], $_SESSION['c_to']);
									}

									echo "<a href=\"tour-place.php?tour_id=$row[tour_id]\" class=\"tour-entry animate-box\">";
									echo "<div class=\"tour-img\" style=\"background-image: url(Admin/$row[image]);\">";
									echo "</div>";
									echo "<span class=\"desc\">";
									echo "<h2>$row[title]</h2>";
									echo "<span class=\"city\">$row[location]</span>";
									//echo "<span class=\"price\">$$row[price]</span>";
									echo "<span class=\"price\">$_SESSION[c_symbol]$price</span>";
									echo "</span>";
									echo "</a>";
								}
							} else {
								echo "Oups ! , nous n'avons rien pour cette recherche";
							}
							//mysqli_close($conn);
							?>

			</div>
		</div>


		<div id="colorlib-blog">
			<div class="container">
				<div class="row">
					<div class="col-md-12col-md-offset-3 text-center colorlib-heading animate-box">
						<h2 style="font-family: 'great vibes', cursive;color:orange"> L'Écho de DARA TOUR</h2>
						<p> Bienvenue sur notre blog de voyage ! Ici, nous partageons des récits passionnants, des conseils pratiques et des inspirations pour vous aider à planifier vos prochaines aventures à travers le monde. </p>
					</div>
				</div>
				<div class="blog-flex">
					<div class="f-entry-img" style="background-image: url(images/cover-img-21.jpg);">
					</div>
					<div class="blog-entry aside-stretch-right">
						<div class="row">
							<?php
							require 'config.php';

							$statement = "select * from posts where deletedAt is null order by addedOn asc LIMIT 3";
							$res_data = mysqli_query($conn, $statement);

							if (mysqli_num_rows($res_data) > 0) {
								while ($row = mysqli_fetch_assoc($res_data)) {
									$cat_title_query = mysqli_query($conn, "SELECT title from categories WHERE cat_id= $row[cat_id]");
									$cat_title = mysqli_fetch_assoc($cat_title_query);
									$title = $cat_title['title'];

									$timeStamp = $row['addedOn'];
									$timeStamp = date("m/d/Y", strtotime($timeStamp));

									echo "<div class=\"col-md-12 animate-box\">";
									echo "<a href=\"post-view.php?post_id=$row[post_id]\" class=\"blog-post\">";
									echo "<span class=\"img\" style=\"background-image: url(Admin/$row[image]);\"></span>";
									echo "<div class=\"desc\">";
									echo "<span class=\"date\">$timeStamp</span>";
									echo "<h3>$row[title]</h3>";
									echo "<span class=\"cat\">$title</span>";
									echo "</div>";
									echo "</a>";
									echo "</div>";
								}
							} else {
								echo "Oups ! , nous n'avons rien pour cette recherche";
							}

							?>

						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="colorlib-intro" class="intro-img" style="background-image: url(images/cover-img-20.jpg); background-position: center !important;" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center animate-box">
						<div class="intro-desc">
							<div class="text-salebox">
								<div class="text-lefts">
									<div class="sale-box">
										<div class="sale-box-top">
											<h2 class="number">15</h2>
											<span class="sup-1">%</span>
											<span class="sup-2">De</span>
										</div>
										<h2 class="text-sale">Remise</h2>
									</div>
								</div>
								<div class="text-rights">
									<h3 class="title">Allons-y</h3>
									
									<p><a href="http://localhost/1/dara-tours/tour-place.php" class="btn btn-primary">Réservez</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="colorlib-hotel">
			<div class="container">
				<div class="row">
				<div class="col-md-12col-md-offset-3 text-center colorlib-heading animate-box">
	<h2 style="font-family: 'Great Vibes', cursive; color:ORANGE">Expérience Hôtelière Recommandée</h2>
	<p>Découvrez nos recommandations d'hôtels soigneusement sélectionnés pour rendre votre séjour inoubliable. Nous vous guidons vers des établissements de qualité, des logements de charme et des hébergements adaptés à tous les budgets. </p>
</div>

				</div>
				<div class="row">
					<div class="col-md-12 animate-box">
						<div class="owl-carousel">
							<?php

							$statement_hotel = "select * from hotels where deletedAt is null order by hotel_id asc LIMIT 5";
							$res_data_hotel = mysqli_query($conn, $statement_hotel);

							if (mysqli_num_rows($res_data_hotel) > 0) {
								while ($row = mysqli_fetch_assoc($res_data_hotel)) {
									$min_price_query = mysqli_query($conn, "SELECT min(price) from room_type WHERE hotel_id= $row[hotel_id]");
									$min_price = mysqli_fetch_assoc($min_price_query);
									$price_min = $min_price['min(price)'];

									if ($_SESSION['currency'] == "EUR") {
										$price = $price_min;
									} else if ($_SESSION['currency'] == "DZD") {
										$price = convertCurrency($price_min, $_SESSION['c_from'], $_SESSION['c_to']);
									}

									echo "<div class=\"item\">";
									echo "<div class=\"hotel-entry\">";
									echo "<a href=\"hotel-room.php?hotel_id=$row[hotel_id]\" class=\"hotel-img\" style=\"background-image: url(Admin/$row[image]);\">";
									echo "<p class=\"price\"><span>$_SESSION[c_symbol]$price</span><small> /nuit</small></p>";
									echo "</a>";
									echo "<div class=\"desc\">";
									echo "<h3><a href=\"hotel-room.php?hotel_id=$row[hotel_id]\">$row[title]</a></h3>";
									echo "<span class=\"place\">$row[location]</span>";
									echo "<p>$row[hotel_desc]</p>";
									echo "</div>";
									echo "</div>";
									echo "</div>";
								}
							} else {
								echo "Oups ! , nous n'avons rien pour cette recherche";
							}
							mysqli_close($conn);
							?>
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
