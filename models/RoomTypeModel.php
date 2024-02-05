<?PHP
class RoomTypeModel {
    protected $dbConnection;

    public function __construct($dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    public function getAllRoomTypes() {
        $sql = "SELECT * FROM room_type";
        $result = $this->dbConnection->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Ajoutez ici d'autres méthodes si nécessaire, comme deleteRoomType, etc.
}
?>