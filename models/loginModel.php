<?php
class UserModel {
    private $dbConn;

    public function __construct($dbConn) {
        $this->dbConn = $dbConn;
    }

    public function getUserByEmail($email) {
        $stmt = $this->dbConn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        return $stmt->get_result();
    }

    // Supposons l'ajout d'un utilisateur (hachage du mot de passe)
    public function createUser($email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->dbConn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $hashedPassword);
        $stmt->execute();
    }
}
?>
