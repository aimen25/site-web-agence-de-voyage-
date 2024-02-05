<?php
include('../connection.php');
include('../controllers/HotelController.php');
include('../models/HotelModel.php');

$model = new HotelModel($conn);
$controller = new HotelController($model);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $location = $_POST['location'];
    $hotel_desc = $_POST['hotel_desc'];
    $owner = $_POST['owner'];

    $target_dir = "uploads/";
    $target_file = $target_dir . md5(basename($_FILES["hotel_image"]["name"])) . '.' . strtolower(pathinfo($_FILES["hotel_image"]["name"], PATHINFO_EXTENSION));
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Vérifier si le fichier est une image réelle
    $check = getimagesize($_FILES["hotel_image"]["tmp_name"]);
    if($check === false) {
        echo "Le fichier n'est pas une image.";
        $uploadOk = 0;
    }

    // Vérifier la taille du fichier
    if ($_FILES["hotel_image"]["size"] > 500000) {
        echo "Désolé, votre fichier est trop grand.";
        $uploadOk = 0;
    }

    // Autoriser certains formats de fichier
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "Désolé, seuls les fichiers JPG, JPEG, PNG & GIF sont autorisés.";
        $uploadOk = 0;
    }

    // Vérifier si $uploadOk est à 0 à cause d'une erreur
    if ($uploadOk == 0) {
        echo "Désolé, votre fichier n'a pas été téléchargé.";
    } else {
        if (move_uploaded_file($_FILES["hotel_image"]["tmp_name"], $target_file)) {
            $controller->createHotel($title, $location, $hotel_desc, $owner, $target_file);
        } else {
            echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Hôtel</title>
    <!-- Votre code CSS ici -->
</head>
<body>
    <h1>Ajouter un Hôtel</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <label for="title">Titre:</label>
        <input type="text" name="title" id="title" required><br>

        <label for="location">Emplacement:</label>
        <input type="text" name="location" id="location" required><br>

        <label for="hotel_desc">Description:</label>
        <textarea name="hotel_desc" id="hotel_desc" required></textarea><br>

        <label for="owner">Propriétaire:</label>
        <input type="text" name="owner" id="owner" required><br>

        <label for="hotel_image">Image de l'hôtel:</label>
        <input type="file" name="hotel_image" id="hotel_image" accept="image/*" required><br>

        <input type="submit" name="submit" value="Ajouter l'Hôtel">
    </form>
</body>
</html>
