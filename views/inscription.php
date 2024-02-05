<?php
// Démarre une nouvelle session ou reprend une session existante
session_start();

// Inclure les fichiers nécessaires pour la configuration et les fonctions
require 'config.php'; // Configuration de la base de données
require 'controllers/InscriptionController.php'; // Contrôleur pour l'inscription
require 'functions.php'; // Fonctions utilitaires, y compris sanitize_data

// Traitement du formulaire lorsqu'il est soumis
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Établissement de la connexion à la base de données
    $dbConnection = new mysqli("localhost", "root", "", "travel_db"); 

    // Création des objets modèle et contrôleur
    $model = new UserModel($dbConnection);
    $controller = new InscriptionController($model);

    // Nettoyage et sécurisation des données du formulaire
    $name = sanitize_data($_POST['name']);
    $password = sanitize_data($_POST['password']);
    $email = sanitize_data($_POST['email']);
    $phone = sanitize_data($_POST['phone']);

    // Appel de la méthode d'inscription du contrôleur et récupération de la réponse
    $response = $controller->inscrire($name, $password, $email, $phone);

    // Gestion de la réponse du contrôleur
    if ($response == "success") {
        // Redirection vers une autre page en cas de succès
        header("Location: Admin/tableau.php");
        exit();
    } else {
        // Stockage du message d'erreur dans la session pour l'affichage
        $_SESSION['notifyMsg'] = $response;
    }
}
?>

<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>S'inscrire</title>
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
	
	<style>
    .colorlib-wrap.margin-top-50 {
        margin-top: 50px; 
    }
</style>

	</head>
	<body>



	<div class="colorlib-loader"></div>

	<div id="page">

<?php include 'nav.php'; ?>

	

<div class="colorlib-wrap margin-top-50">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="wrap-division">
                                <div class="col-md-12 col-md-offset-0 heading2 animate-box text-center">
                                    <h2>Prêt pour l'aventure ? Rejoignez-nous !</h2>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 animate-box">
                                        <div class="room-wrap">
                                            <div class="row">
                                            <form role="form" name="user-registration" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                            <div class="form-group">
    <label for="sub-input-name">Nom</label>
    <input type="text" class="form-control" id="sub-input-name" placeholder="Votre nom" name="name" required pattern="^([a-zA-Z\s'-]+\.)*[a-zA-Z\s'-]+$" title="Veuillez entrer votre nom">
    <span id="name-error" class="error"></span>
</div>

<div class="form-group">
    <label for="sub-input-password">Choisir un mot de passe</label>
    <input type="password" class="form-control" id="sub-input-password" placeholder="Saisissez un nouveau mot de passe" name="password" required>
    <span id="password-error" class="error"></span>
</div>

                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="email" class="form-control" id="email" placeholder="Votre Email" name="email" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="sub-input-phone">Numéro de téléphone</label>
                                                        <input type="text" class="form-control" id="sub-input-phone" placeholder="Numéro de téléphone" name="phone" required pattern="^[0-9]{3,15}$" title="Entrez votre numéro de téléphone">
                                                    </div>

                                                    <div class="error">
                                                    <?php
                        if (!empty($_SESSION['notifyMsg'])) {
                            echo '<div class="alert alert-danger">' . $_SESSION['notifyMsg'] . '</div>';
                            // Supprimez le message d'erreur de la session après l'avoir affiché
                            unset($_SESSION['notifyMsg']);
                        }
                        ?>
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
	
    <script>
    // Scripts JavaScript pour la validation côté client
    document.addEventListener("DOMContentLoaded", function() {
        // Validation du nom
        document.getElementById("sub-input-name").addEventListener("input", function() {
            var name = this.value;
            var nameError = document.getElementById("name-error");
            if (name.length < 3) {
                nameError.textContent = "Le nom doit contenir au moins 3 lettres.";
            } else {
                nameError.textContent = "";
            }
        });

        // Validation du mot de passe
        document.getElementById("sub-input-password").addEventListener("input", function() {
            var password = this.value;
            var passwordError = document.getElementById("password-error");
            if (password.length < 8) {
                passwordError.textContent = "Le mot de passe doit contenir au moins 8 caractères.";
            } else {
                passwordError.textContent = "";
            }
        });
    });
    </script>

	</body>
</html>

