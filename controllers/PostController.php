<?PHP
include('../models/PostModel.php');
include('../connection.php'); // Assurez-vous que cela crée et renvoie une instance de connexion à la base de données.

class PostController {
    protected $postModel;

    public function __construct() {
        $this->postModel = new PostModel($conn);
    }

    public function delete($postId) {
        if ($this->postModel->deletePost($postId)) {
            header("Location: admin_posts.php?success=2");
            exit;
        } else {
            echo "Erreur lors de la suppression du post";
        }
    }
}

// Vérifier si l'administrateur est connecté.
session_start();
if (!isset($_SESSION['login_user'])) {
    header("location: admin_login.php");
    exit();
}

if (isset($_GET['id'])) {
    $controller = new PostController();
    $controller->delete($_GET['id']);
} else {
    header("Location: admin_posts.php");
    exit();
}
?>