<?php
require_once 'Model.php';
require './config.php';

session_start();

class UserController {
    private $model;

    public function __construct() {
        $this->model = new UserModel($GLOBALS['conn']);
    }

    public function login($email, $password) {
        $result = $this->model->getUserByEmail($email);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                session_regenerate_id(true); // Protection contre la fixation de session
                $_SESSION['user_id'] = $row['id'];
                header("Location: Admin/tableau.php");
                exit();
            } else {
                return "Adresse e-mail ou mot de passe incorrect.";
            }
        } else {
            return "Utilisateur non trouvé.";
        }
    }

    public function generateCsrfToken() {
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }

    public function validateCsrfToken($token) {
        return isset($_SESSION['csrf_token']) && $token === $_SESSION['csrf_token'];
    }
}
?>
