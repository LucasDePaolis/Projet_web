<?php require_once '_header.php' ?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="../css/style.css">

    <link rel="stylesheet" type="text/css" href="../assets/vendors/bootstrap/css/bootstrap.min.css">
    <script src="../assets/vendors/jquery-3.4.1.min.js"></script>

    <link rel="stylesheet" href="../assets/vendors/fontawesome/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display&display=swap" rel="stylesheet">

    <script src="../assets/vendors/bootstrap/js/bootstrap.min.js"></script>

    <script src="./JS/main.js"></script>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#search").autocomplete({
                source: "liste_interet.php",
                minLength: 2
            });
        });
    </script>

</head>


<body>

    <header>
        <nav class="menu_priority">
            <div class="hamburger"> <i class="fa fa-bars fa-2x"></i></div>
            <div class="symbole"><a href="../home.php"><img id="logo_bde" src="../images/bde.png"></i> </a></div>
            <div class="menu">
                <ul>
                    <li><a href="../home.php">Accueil</a></li>
                    <li><a href="boutique.php">Boutique</a></li>
                    <li><a href="panier.php">panier</a></li>
                    <li> <span class="items">Objets :
                            <span id="count"><?= $panier->count(); ?></span>
                        </span></li>
                    <li> <span class="letotal">
                            <span id="total"><?= number_format($panier->total() * 1.196, 2, ',', ' ') ?></span>€
                        </span></li>
                    <li> <input type="search" id="search" name="search" placeholder="Recherche..." />
                    </li>
                    <?php
                    if (isset($_SESSION['user_name'])) {
                        echo '<div class="ho"> <h5><a href="../connexion/profil.php">' . $_SESSION['user_name']  . '</a> |  <a href="../connexion/deconnexion.php">Deconnexion</a></h5></div>';
                    } else {
                        echo '
                <div class="lienHeader">
                <div class="ho"> <a href="../connexion/mention.php"> S\'inscrire</a>  |  <a href="../connexion/connexion.php?var=">Se connecter</a>
                </div>';
                    }
                    ?>
                </ul>
            </div>
        </nav>
    </header>

    <script>
        $(window).on("scroll", function() {
            if ($(window).scrollTop()) {
                $('nav').addClass('scroll');
            } else {
                $('nav').removeClass('scroll');
            }
        })
    </script>

</body>