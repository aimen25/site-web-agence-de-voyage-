

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une Offre de Chambre</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f7f7;
            font-family: Arial, sans-serif;
        }

        h1 {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
            margin: 0;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #555;
        }

        a {
            display: block;
            text-align: center;
            margin: 20px;
            text-decoration: none;
            color: #333;
        }
    </style>
</head>
<body>
    <h1>Ajouter une Offre de Chambre</h1>
    
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
        <label for="hotel_id">Hôtel ID :</label>
        <input type="text" name="hotel_id" required>
        
        <label for="room_name">Nom de la Chambre :</label>
        <input type="text" name="room_name" required>
        
        <label for="room_desc">Description de la Chambre :</label>
        <textarea name="room_desc" required></textarea>
        
        <label for="price">Prix :</label>
        <input type="text" name="price" required>

        <label for="capacity">Capacité :</label>
        <input type="text" name="capacity" required>
        
        <label for="available">Disponibilité :</label>
        <input type="text" name="available" required>

        <label for="image">Image :</label>
        <input type="file" name="image" accept="image/*" required>
        
        <button type="submit">Ajouter l'Offre de Chambre</button>
    </form>
    
    <a href="admin_offres_chambres.php">Retour à la Liste des Offres de Chambres</a>
</body>
</html>
