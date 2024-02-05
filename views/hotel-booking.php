<?php// views/hotel-booking.php

session_start();
require 'controllers/BookingController.php';
require 'models/BookingModel.php';
require 'functions.php'; 

$dbConnection = new mysqli("localhost", "root", "", "travel_db"); 
$model = new BookingModel($dbConnection);
$controller = new BookingController($model);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        // Collecte et assainissement des données
        $userInfo = [
            'name' => sanitize_data($_POST['enq_hotel_name']),
            'email' => sanitize_data($_POST['enq_hotel_email']),
            'phone' => sanitize_data($_POST['enq_hotel_phone']),
            'checkin_date' => sanitize_data($_POST['enq_hotel_checkin']),
            'checkout_date' => sanitize_data($_POST['enq_hotel_checkout']),
            'number_of_rooms' => sanitize_data($_POST['enq_hotel_room']),
            'number_of_children' => sanitize_data($_POST['enq_hotel_child']),
            'number_of_adults' => sanitize_data($_POST['enq_hotel_adult']),
            'message' => sanitize_data($_POST['enq_hotel_message'])
        ];
    
        // Obtenez les ID de l'hôtel et du type de chambre depuis l'URL ou la session
        $hotelId = $_SESSION['hotel_id']; // ou $_GET['hotel_id']
        $roomTypeId = $_SESSION['room_type_id']; // ou $_GET['room_type_id']
        
        // Définissez le nombre de chambres requises
        $requiredRooms = sanitize_data($_POST['enq_hotel_room']); // Assurez-vous que cela est un entier valide
    
        // Appel au contrôleur pour traiter la réservation
        $bookingStatus = $controller->bookRoom($hotelId, $roomTypeId, $requiredRooms, $userInfo);
    
        // Traitez la réponse et fournissez un feedback à l'utilisateur
        if ($bookingStatus === true) {
            // Redirection ou affichage d'un message de succès
        } else {
            // Affichage d'un message d'erreur
        }
    }
}    

?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>réserver chambre</title>
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
				   					<h1>Réserver un Hôtel</h1>
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

						        if (!empty($notifyMsg)) 
						        {
								echo "<div class=\"alert alert-primary\" role=\"alert\">";
					            echo "<p><span id=\"error\">$notifyMsg</span></p>";
			                    echo "</div>";
				                }

								?>	
								<?php
							    require 'config.php';

							    $hotel_name_query=mysqli_query($conn, "SELECT title from hotels where hotel_id= '$_SESSION[hotel_id]' ");
			                    $hotel_name= mysqli_fetch_assoc($hotel_name_query);
			                    $hotel_title= $hotel_name['title'];

							    $room_name_query=mysqli_query($conn, "SELECT room_name from room_type where room_type_id= '$room_type_id' ");
			                    $room_name= mysqli_fetch_assoc($room_name_query);
			                    $room_title= $room_name['room_name'];

									echo "<div class=\"col-md-12 col-md-offset-0 heading2 animate-box\">";
										echo "<h2>$hotel_title - $room_title Room</h2>";
									echo "</div>";
									echo "<div class=\"row\">";
								
			                    mysqli_close($conn);
								?>			
										<div class="col-md-12 animate-box">
											<div class="room-wrap">
												<div class="row">
            									  <form role="form" name="hotels-enq" method="post" action="">
									                <div class="form-group">
									                  <label>Nom</label>
									                  <input type="text" class="form-control" id="enq-input" placeholder="Votre nom" name="enq_hotel_name" value="" required pattern="^([a-zA-Z\s'-]+\.)*[a-zA-Z\s'-]+$" title="Please Enter Your First Name">
									                </div>
									                <div class="form-group">
									                  <label>Email</label>
									                  <input type="text" class="form-control" id="enq-input" placeholder="Votre Email" name="enq_hotel_email" value="">
									                </div>
									                <div class="form-group">
									                  <label>Téléphone</label>
									                  <input type="text" class="form-control" id="enq-input" placeholder="Votre numéro de téléphone" name="enq_hotel_phone" value="" required pattern="^[0-9]{3,15}$" title="Enter Your Phone Number">
									                </div>
									                <div class="form-group">
									                  <label>Date d'arrivée</label>
									                  <input type="date" class="form-control" id="enq-input" placeholder="date d'arrivée" name="enq_hotel_checkin" value="" required title="Enter Check-In Date">
									                </div>	
									                <div class="form-group">
									                  <label>Date de départ</label>
									                  <input type="date" class="form-control" id="enq-input" placeholder="Date de départ" name="enq_hotel_checkout" value="" required title="Enter Check-Out Date">
									                </div>	
									                <div class="form-group">
									                  <label>Nombre de chambre</label>
									                  <input type="number" class="form-control" id="enq-room-available" placeholder="Nombre de chambre " name="enq_hotel_room" value="" required pattern="^[0-9]{0,15}$" title="Enter Number Of Rooms">
									                </div>

													<div class="alert alert-primary room-unavailable" role="alert"></div>									                	                
									               	<div class="form-group">
									                  <label>Enfant</label>
									                  <input type="number" class="form-control" id="enq-input" placeholder="Nombre d'enfants" name="enq_hotel_child" value="" required pattern="^[0-9]{0,15}$" title="Enter Child Number">
									                </div>
									                <div class="form-group">
									                  <label>Adult</label>
									                  <input type="number" class="form-control" id="enq-input" placeholder="Nombre d'adulte" name="enq_hotel_adult" value="" required pattern="^[0-9]{0,15}$" title="Enter Adult Number">
									                </div>
									                <div class="form-group">
									                  <label>Message</label>
                  									  <textarea class="form-control" rows="3" id="enq-textarea" placeholder="Ecrire votre  Message" name="enq_hotel_message" required></textarea>
                  									</div>				



                  									<button type="submit" class="btn btn-primary">Envoyer</button>
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


<script type="text/javascript">
$(document).ready(function() {
  $(".room-unavailable").css("display", "none");
  $('#enq-room-available').keyup(function() {
    var value = $(this).val();
    var hotel_id= <?php echo $hotel_id; ?>;
    var room_type_id= <?php echo $room_type_id; ?>;

    $.ajax({
      type: 'post',
      url: 'room_available_check.php',
      data: {
      	'room_available' : value,
      	'hotel_id' : hotel_id,
      	'room_type_id' : room_type_id
      },
      success: function(r) {
        $('.room-unavailable').html(r);
        $(".room-unavailable").css("display", "");
      }
    });
  });
});
</script>


	</body>
</html>
