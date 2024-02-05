<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactez-nous</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    
    <link rel="stylesheet" href="path_to_your_css_file.css">
</head>
<body>

<div class="container">
    <h2>Contactez-nous</h2>
    <form action="ContactController.php" method="post">
        <div class="form-group">
            <label for="first_name">Prénom :</label>
            <input type="text" id="first_name" name="first_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="last_name">Nom :</label>
            <input type="text" id="last_name" name="last_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="subject">Sujet :</label>
            <input type="text" id="subject" name="subject" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="message">Message :</label>
            <textarea id="message" name="message" class="form-control" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>

<?php if (isset($_SESSION['contact_result'])): ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    Swal.fire({
        title: 'Résultat du contact',
        text: "<?php echo $_SESSION['contact_result']; ?>",
        icon: '<?php echo isset($_SESSION['contact_success']) && $_SESSION['contact_success'] ? "success" : "error"; ?>',
        confirmButtonText: 'Fermer'
    }).then(function() {
        window.location = 'contactForm.php'; 
    });
</script>
<?php
    // Nettoyer les résultats de la session après l'affichage
    unset($_SESSION['contact_result'], $_SESSION['contact_success']);
endif;
?>

</body>
</html>

