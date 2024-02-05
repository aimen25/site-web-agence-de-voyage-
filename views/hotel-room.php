<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Chambre d'hôtel</title>
    <!-- autres métadonnées, feuilles de style et scripts -->
</head>
<body>

    <?php include 'Admin/login.php'; ?>
    <div class="colorlib-loader"></div>
    <div id="page">
        <?php include 'nav.php'; ?>

        <!-- Contenu spécifique à la page -->
        <div class="colorlib-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="wrap-division">
                                    <!-- Boucle pour afficher les chambres d'hôtel -->
                                    <?php foreach ($rooms as $row) { ?>
                                        <div class="col-md-12 animate-box">
                                            <div class="room-wrap">
                                                <div class="row">
                                                    <!-- Contenu de chaque chambre -->
                                                    <div class="col-md-6 col-sm-6">
                                                        <div class="room-img" style="background-image: url(Admin/<?php echo $row['image']; ?>);"></div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6">
                                                        <div class="desc">
                                                            <h2><?php echo $row['room_name']; ?></h2>
                                                            <p class="price"><span><?php echo $row['price']; ?></span> <small>/ Nuit</small></p>
                                                            <p><?php echo $row['room_desc']; ?></p>
                                                            <p><a href="hotel-booking.php?hotel_id=<?php echo $row['hotel_id']; ?>&room_type_id=<?php echo $row['room_type_id']; ?>" class="btn btn-primary">Réservez!</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php include 'sidebar.php'; ?>
                </div>
            </div>
        </div>
    </div>

    <?php include 'subscribe.php'; ?>
    <?php include 'footer.php'; ?>
    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
    </div>

    <!-- Scripts jQuery et autres -->
</body>
</html>
