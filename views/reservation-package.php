<?php
// views/reservation-package.php

session_start();
require 'config.php';
require 'controllers/ReservationPackageController.php';

if(empty($_SESSION['login_status'])) {
    $_SESSION["login_redirect"] = $_SERVER['HTTP_REFERER'];
    header("location: login.php");
    exit;
}

$tourId = isset($_GET['tour_id']) ? intval($_GET['tour_id']) : null;

if (!$tourId) {
    header("Location: tours.php");
    exit;
}

$dbConnection = new mysqli("localhost", "root", "", "travel_db"); // Remplacez avec vos informations de connexion
$model = new TourBookingModel($dbConnection);
$controller = new ReservationPackageController($model);

$notifyMsg = "";
if($_SERVER['REQUEST_METHOD'] == "POST") {
    // Récupérez et assainissez les données POST ici
    // Appelez la méthode de réservation du contrôleur
    // Stockez le message de retour dans $notifyMsg
}

// Code HTML pour le formulaire de réservation
?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Informations</title>
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

		
			<div class="flexslider">
			
		  	</div>


		<div class="colorlib-wrap">
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<div class="row">
							<div class="col-md-12">
								<div class="wrap-division">
								<?php
							    require 'config.php';

							    $tour_name_query=mysqli_query($conn, "SELECT title from tours where tour_id= $_SESSION[tour_id]");
			                    $tour_name= mysqli_fetch_assoc($tour_name_query);
			                    $tour_title= $tour_name['title'];

									echo "<div class=\"col-md-12 col-md-offset-0 heading2 animate-box\">";
										echo "<h2>$tour_title</h2>";
									echo "</div>";
									echo "<div class=\"row\">";
								
			                    mysqli_close($conn);
								?>			
										<div class="col-md-12 animate-box">
											<div class="room-wrap">
												<div class="row">
            									  <form role="form" name="tour-enq" method="post" action="">
									                <div class="form-group">
									                  <label>Nom</label>
									                  <input type="text" class="form-control" id="enq-input" placeholder="Votre nom" name="enq_tour_name" value=""required pattern="^([a-zA-Z\s'-]+\.)*[a-zA-Z\s'-]+$" title="Please Enter Your Name">
									                </div>
									                <div class="form-group">
									                  <label>Email</label>
									                  <input type="email" class="form-control" id="enq-input" placeholder="Votre Email" name="enq_tour_email" value="">
									                </div>
									                <div class="form-group">
									                  <label>Téléphone</label>
									                  <input type="text" class="form-control" id="enq-input" placeholder="Votre numéro de téléphone" name="enq_tour_phone" value=""required pattern="^[0-9]{3,15}$" title="Enter Your Phone Number">
									                </div>
									                <div class="form-group">
									                  <label>Nombre de jours</label>
									                  <input type="number" class="form-control" id="enq-input" placeholder="Nombre de jour(s)" name="enq_tour_days" value="">
									                </div>									                					
									                <div class="form-group">
									                  <label>Enfants</label>
									                  <input type="number" class="form-control total" id="enq-child" placeholder="Nombre d'enfant(s)" name="enq_tour_child" value=""required pattern="^[0-9]{0,15}$" title="Enter Child Number">
									                </div>
									                <div class="form-group">
									                  <label>Adulte</label>
									                  <input type="number" class="form-control total" id="enq-adult" placeholder="Nombre d'adult(s)" name="enq_tour_adult" value=""required pattern="^[0-9]{0,15}$" title="Enter Adult Number">
									                </div>
									                <div class="form-group">
									                  <label>Totale</label>
									                  <input type="number" readonly class="form-control" id="enq-total" placeholder="Totale de(s) personne(s)" name="total" value="">
									                </div>									              
									                
									                <div class="form-group">
									                  <label>Message</label>
                  									  <textarea class="form-control" rows="3" id="enq-textarea" placeholder="Ecrire votre message" name="enq_tour_message" required></textarea>
                  									</div>				

                  									<div class="error">
									                 <?php

									                   if (!empty($notifyMsg)) 
									                   {
									                    echo "<p><span id=\"error\">$notifyMsg</span></p>";
									                   }

									                 ?>
										            </div>		
                  									<button type="submit" class="btn btn-primary  ">Envoyer</button>
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

$('.total').change(function() {
    var total = 0;

    $('.total').each(function() {
        if( $(this).val() != '' )
            total += parseInt($(this).val());
    });

    $('input[name=total]').val(total);
});

  $(".seat-unavailable").css("display", "none");
  $('#enq-total').click(function() {
    var value = $(this).val();
    var tour_id= <?php echo $tour_id; ?>;

    $.ajax({
      type: 'post',
      url: 'seat-available-check.php',
      data: {
      	'seat_available' : value,
      	'tour_id' : tour_id
      },
      success: function(r) {
        $('.seat-unavailable').html(r);
        $(".seat-unavailable").css("display", "");
      }
    });
  });
});
</script>

	</body>
</html>
