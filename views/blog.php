<?php
// views/blog.php

session_start();
require 'path/to/BlogModel.php';
require 'path/to/BlogController.php';

$dbConnection = new mysqli("host", "username", "password", "dbname");
$model = new BlogModel($dbConnection);
$controller = new BlogController($model);

$pageno = isset($_GET['pageno']) ? $_GET['pageno'] : 1;
$data = $controller->getBlogPageData($pageno);

include 'path/to/header.php'; // Votre en-tête, si vous en avez un

foreach ($data['posts'] as $post) {
    // Affichez chaque post ici
}

// Logique de pagination ici

include 'path/to/footer.php'; // Votre pied de page, si vous en avez un
?>
