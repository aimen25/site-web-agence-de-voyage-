<?php
include 'HotelModel.php';
include 'config/travel_db.php'; 

class HotelController {
    private $hotelModel;

    public function __construct() {
        $dbConnection = new mysqli("localhost", "root", "", "travel_db");
        if ($dbConnection->connect_error) {
            die("Échec de la connexion : " . $dbConnection->connect_error);
        }
    
        $this->hotelModel = new HotelModel($dbConnection);
    }
    

    public function listHotels($pageNo, $location = '', $minPrice = null, $maxPrice = null) {
        $noOfRecordsPerPage = 6;
        $offset = ($pageNo - 1) * $noOfRecordsPerPage;

        if (!empty($location)) {
            $hotels = $this->hotelModel->searchHotelsByLocation($location, $offset, $noOfRecordsPerPage);
            $totalRows = $this->hotelModel->countHotelsByLocation($location);
        } elseif ($minPrice !== null && $maxPrice !== null) {
            $hotels = $this->hotelModel->searchHotelsByPrice($minPrice, $maxPrice, $offset, $noOfRecordsPerPage);
            $totalRows = $this->hotelModel->countHotelsByPrice($minPrice, $maxPrice);
        } else {
            // Autres scénarios ou erreur
        }

        $totalPages = ceil($totalRows / $noOfRecordsPerPage);

        include 'views/hotel.php'; // Chargement de la vue
    }
}

// Exemple d'utilisation du contrôleur
$hotelController = new HotelController();
$pageNo = isset($_GET['pageno']) ? $_GET['pageno'] : 1;
$hotelController->listHotels($pageNo);
?>