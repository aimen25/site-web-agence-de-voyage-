<?php
session_start();
require 'path/to/HotelBookingModel.php';
require 'path/to/HotelBookingController.php';

$dbConnection = new mysqli("host", "username", "password", "dbname");
$model = new HotelBookingModel($dbConnection);
$controller = new HotelBookingController($model);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Assainissement et collecte des données utilisateur
    $userInfo = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        // Ajoutez d'autres champs ici
    ];

    // Obtenez les identifiants de l'hôtel et du type de chambre
    $hotelId = $_SESSION['hotel_id'];
    $roomTypeId = $_SESSION['room_type_id'];

    // Appelez le contrôleur pour effectuer la réservation
    $controller->bookRoom($hotelId, $roomTypeId, $userInfo);

    // Affichez le résultat de la réservation
}

// Reste du code HTML pour la page
?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Confirmer votre réservation</title>
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

<?php include 'Admin/login.php'; ?>

	<div class="colorlib-loader"></div>

	<div id="page">

<?php include 'nav.php'; ?>

		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
				   <li style="background-image: url(images/cover-img-18.jpg);">
					   <div class="overlay"></div>
					   <div class="container-fluid">
						   <div class="row">
							   <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
								   <div class="slider-text-inner text-center">
									   <h1>confirmer votre réservation</h1>
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
								<?php
								require 'config.php';

								$hotel_name_query = mysqli_query($conn, "SELECT title from hotels where hotel_id= '$_SESSION[hotel_id]' ");
								$hotel_name = mysqli_fetch_assoc($hotel_name_query);
								$hotel_title = $hotel_name['title'];

								$room_name_query = mysqli_query($conn, "SELECT room_name from room_type where room_type_id= $_SESSION[room_type_id]");
								$room_name = mysqli_fetch_assoc($room_name_query);
								$room_title = $room_name['room_name'];

								$hotel_room_price_query = mysqli_query($conn, "SELECT price from room_type where hotel_id= '$_SESSION[hotel_id]' and room_type_id= '$_SESSION[room_type_id]' ");
								$room_price = mysqli_fetch_assoc($hotel_room_price_query);
								$price_room = $room_price['price'];

								echo "<div class=\"col-md-12 col-md-offset-0 heading2 animate-box\">";
								echo "<h2>$hotel_title - Réservation confirmé</h2>";
								echo "</div>";
								echo "<div class=\"row\">";

								if ($_SESSION['currency'] == "EUR") {
									$price = $price_room;
								} else if ($_SESSION['currency'] == "DZD") {
									$price = convertCurrency($price_room, $_SESSION['c_from'], $_SESSION['c_to']);
								}

								mysqli_close($conn);
								?>			
										<div class="col-md-12 animate-box">
											<div class="room-wrap">
												<div class="row">
													
												  <form role="form" name="hotels-enq" method="post" action="">

													<div class="form-group">
														<label>Nom:</label> <?php echo $enq_hotel_name; ?>
													</div>
													<div class="form-group">
														<label>Email:</label> <?php echo $enq_hotel_email; ?>
													</div>
													<div class="form-group">
														<label>Téléphone:</label> <?php echo $enq_hotel_phone; ?>
													</div>
													<div class="form-group">
														<label>Heure d'arrivée:</label> <?php echo $enq_hotel_checkin; ?>
													</div>								                    					
													<div class="form-group">
														<label>Heure de sortie:</label> <?php echo $enq_hotel_checkout; ?>
													</div>	
													<div class="form-group">
														<label>Numéro de la chambre:</label> <?php echo $enq_hotel_room; ?>
													</div>	
													<div class="form-group">
														<label>Nombre d'enfant:</label> <?php echo $enq_hotel_child; ?>
													</div>	
													<div class="form-group">
														<label>Nombre d'adulte:</label> <?php echo $enq_hotel_adult; ?>
													</div>	
													<div class="form-group">
														<label>votre message:</label> <?php echo $enq_hotel_message; ?>
													</div>	


													<div class="text-center">
														<h1>Facture</h1>
													</div>
													</span>
													<table class="table table-hover">
														<thead>
															<tr>
																<th>Details</th>
																<th class="text-center">chambre(s)</th>
																<th class="text-center">Prix</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td class="col-md-9"><em><?php echo $hotel_title . "- " . $room_title ?></em></h4></td>
																<td class="col-md-1 text-center"> <?php echo $enq_hotel_room; ?> </td>
																<td class="col-md-1 text-center"><?php echo $_SESSION['c_symbol'] . $price; ?></td>
															</tr>
															<tr>
																<td>   </td>
																<td class="text-right"><h4><strong>Total: </strong></h4></td>
																<td class="text-center text-danger"><h4><strong><?php echo $_SESSION['c_symbol'] . $enq_hotel_room * $price; ?></strong></h4></td>
															</tr>
														</tbody>
													</table>

													<div class="paymentCont">
														<div class="headingWrap">
																<h3 class="headingTop text-center">Envoyez nous votre réservation</h3>  
														</div>
														<div class="paymentWrap">
															<div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
																<label class="btn paymentMethod active">
																	<div class="method visa"></div>
																	<input type="radio" name="options" value="Visa" required> 
																</label>
																
																<label class="btn paymentMethod">
																	<div class="method cash"></div>
																	<input type="radio" name="options" value="cash">
																</label>
																 <label class="btn paymentMethod">
																	<div class="method cod"></div>
																	<input type="radio" name="options" value="Cash-On-Booth"> 
																</label>
															</div>        
														</div>
													</div>


													 <?php

													 if (!empty($notifyMsg)) {
														 echo "<div class=\"alert alert-primary\" role=\"alert\">";
														 echo "<p><span id=\"error\">$notifyMsg</span></p>";
														 echo "</div>";
													 }

													 ?>	

													  <button type="submit" name="submit" class="btn btn-primary">Envoyez</button>
													 </form>
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

	
		<div id="colorlib-subscribe" style="background-image: url(images/img_bg_2.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						<h2>Restez connecté à toutes nos actualités !</h2>
						<p>Restez connecté à toutes nos actualités !</p>
						<form class="form-inline qbstp-header-subscribe">
							<div class="row">
								<div class="col-md-12 col-md-offset-0">
									<div class="form-group">
										<input type="text" class="form-control" id="email" placeholder="Enter your email">
										<button type="submit" class="btn btn-primary">S'inscrire</button>
									</div>
								</div>
							</div>
						</form>
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
