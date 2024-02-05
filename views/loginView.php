<?php
require_once 'Controller.php';

$controller = new UserController();
$notifyMsg = '';
$csrfToken = $controller->generateCsrfToken();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($controller->validateCsrfToken($_POST['csrf_token'])) {
        $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8'); // Protection XSS
        $password = $_POST['pwd']; // Le mot de passe n'est pas affiché, pas besoin de le nettoyer pour XSS
        $notifyMsg = $controller->login($email, $password);
    } else {
        $notifyMsg = "Erreur de validation CSRF.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <!-- Inclusion des fichiers CSS -->
</head>
<body>
    <div id="login-form">
        <h2>Connexion</h2>
        <?php if (!empty($notifyMsg)) { echo "<p>".htmlspecialchars($notifyMsg, ENT_QUOTES, 'UTF-8')."</p>"; } ?>
        <form action="" method="post">
            <div>
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="pwd">Mot de passe :</label>
                <input type="password" id="pwd" name="pwd" required>
            </div>
            <input type="hidden" name="csrf_token" value="<?php echo $csrfToken; ?>">
            <div>
                <button type="submit">Connexion</button>
            </div>
        </form>
    </div>
</body>
</html>
