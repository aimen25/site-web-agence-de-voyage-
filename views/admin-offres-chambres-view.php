<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Offres de Chambres</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body>
    <div class="container">
        <h1 class="bg-dark text-white p-4 text-center">Liste des Offres de Chambres</h1>
        
        <table class="table mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>ID de l'Offre</th>
                    <th>Hôtel</th>
                    <th>Nom de la Chambre</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Capacité</th>
                    <th>Disponibilité</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($roomTypes as $row) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['room_type_id']); ?></td>
                        <td><?php echo htmlspecialchars($row['hotel_id']); ?></td>
                        <td><?php echo htmlspecialchars($row['room_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['room_desc']); ?></td>
                        <td><?php echo htmlspecialchars($row['price']); ?></td>
                        <td><?php echo htmlspecialchars($row['capacity']); ?></td>
                        <td><?php echo htmlspecialchars($row['available']); ?></td>
                        <td>
                            <a href="modifier_offre_chambre.php?id=<?php echo $row['room_type_id']; ?>" class="btn btn-primary btn-sm">Modifier</a>
                            <a href="delete_offre_chambre.php?id=<?php echo $row['room_type_id']; ?>" class="btn btn-danger btn-sm delete-link" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette offre de chambre ?')">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if (empty($roomTypes)) : ?>
                    <tr><td colspan="8">Aucun résultat trouvé</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
        
        <a href="ajouter_offre_chambre.php" class="btn btn-primary d-block mx-auto">Ajouter une Offre de Chambre</a>
        
        <div class="text-center mt-4">
            <a href="../admin_show.php" class="btn btn-secondary">Menu Principal</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min
