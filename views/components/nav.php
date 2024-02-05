

<!DOCTYPE html>
<html>
<head>
  <title>Votre titre</title>
  
  <style>

     .colorlib-nav ul li a  {
        font-weight: bold;
		 color: black; 
    
    }
  </style>
</head>
<body>
<nav class="colorlib-nav margin-bottom-50" role="navigation">
	<div class="top-menu">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-2">
					<div id="colorlib-logo"><a href="index.php"><i class="fas fa-plane"></i>DARA TOUR</a></div>
				</div>
				<div class="col-xs-10 text-right menu-1">
					<ul>
						<li class="<?php echo basename($_SERVER['PHP_SELF']) == "index.php" ? "active" : "" ?>"><a href="index.php">Accueil</a></li>
						<li class="<?php echo basename($_SERVER['PHP_SELF']) == "tours.php" ? "active" : "" ?>"><a href="tours.php">Destinations</a></li>
						<li class="<?php echo basename($_SERVER['PHP_SELF']) == "hotels.php" ? "active" : "" ?>"><a href="hotels.php">Hotels</a></li>
						<li class="<?php echo basename($_SERVER['PHP_SELF']) == "blog.php" ? "active" : "" ?>"><a href="blog.php">Blog</a></li>
						<li class="<?php echo basename($_SERVER['PHP_SELF']) == "about.php" ? "active" : "" ?>"><a href="about.php">A propos</a></li>
						<li class="<?php echo basename($_SERVER['PHP_SELF']) == "contact.php" ? "active" : "" ?>"><a href="contact.php">Contacte</a></li>
						<li class="has-dropdown">
							<a href="#">Compte</a>
							<ul class="dropdown">
						<?php

						$login = "<li id=\"id01\"><a href=\"login.php\">Se connecter</a></li>";
						$logout = "<li><a href=\"Admin/logout.php\">Déconnecter</a></li>";

						echo isset($_SESSION['user']) ? $logout : $login;
						?>

<?php

$className = (basename($_SERVER['PHP_SELF']) == "register.php" ? "active" : "");

$register = "<li class=" . "\"$className\"" . "><a href=\"register.php\">S'inscrire</a></li>";


echo isset($_SESSION['users']) ? $admin : $register;
?></ul>
</li>

						<li class="has-dropdown">
							<a href="#">Devise</a>
							<ul class="dropdown">
								<li class="<?php echo $_SESSION['currency'] == "eur" ? "active" : "" ?>"><a href="currency.php?currency=EUR">EUR</a></li>
								<li class="<?php echo $_SESSION['currency'] == "dzd" ? "active" : "" ?>"><a href="currency.php?currency=DZD">DZD</a></li>

							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</nav>
</body>
</html>