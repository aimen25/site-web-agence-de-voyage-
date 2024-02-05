<?php
// Assurez-vous d'inclure les fichiers nécessaires pour la connexion à la base de données et le MVC
include 'controllers/SidebarController.php';
include 'models/SidebarModel.php';

$dbConnection = new mysqli("localhost", "root", "", "travel_db"); // Remplacez avec vos informations de connexion
$sidebarModel = new SidebarModel($dbConnection);
$sidebarController = new SidebarController($sidebarModel);
$tourLocations = $sidebarController->displayTourLocations();
?>

<div class="col-md-3">
    <div class="sidebar-wrap">
        <!-- Recherche Hôtel -->
        <div class="side search-wrap animate-box">
            <h3 class="sidebar-heading">Trouver votre Hôtel</h3>
            <form method="GET" class="colorlib-form" action="search_hotel.php">
                <!-- Formulaire Recherche Hôtel -->
            </form>
        </div>

        <hr>

        <!-- Recherche Destination -->
        <div class="side search-wrap animate-box">
            <h3 class="sidebar-heading">Trouver votre Destination</h3>
            <form method="GET" class="colorlib-form" action="search_tour.php">
                <!-- Formulaire Recherche Destination -->
            </form>
        </div>

        <!-- Recherche par Tranche de Prix -->
        <div class="side animate-box">
            <h3 class="sidebar-heading">Hotels - Tranche de Prix</h3>
            <form method="GET" class="colorlib-form-2" action="search_by_price.php">
                <!-- Formulaire Recherche par Prix -->
            </form>
        </div>

        <!-- Localisation des Tours -->
        <div class="side animate-box">
            <h3 class="sidebar-heading">Localisation Tour</h3>
            <form method="GET" class="colorlib-form-2" action="search_tour.php">
                <?php foreach ($tourLocations as $location): ?>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="location-<?php echo $location['location']; ?>" name="tour_location" value="<?php echo $location['location']; ?>">
                        <label class="form-check-label" for="location-<?php echo $location['location']; ?>">
                            <h4 class="place"><?php echo $location['location']; ?></h4>
                        </label>
                    </div>
                <?php endforeach; ?>
                <div class="col-md-12">
                    <input type="submit" name="submit" id="submit" value="Recherche" class="btn btn-primary btn-block">
                </div>
            </form>
        </div>
    </div>
</div>
