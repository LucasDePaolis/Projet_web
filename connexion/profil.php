<!DOCTYPE html>
<?php
$bdd = new PDO('mysql:host=localhost;dbname=projet_web;charset=utf8', 'root', '');
?>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Profil</title>
</head>

<body>
    <?php
    session_start();

    $test = (array) $_SESSION['transfert'];
    $requete = $bdd->prepare('SELECT * FROM `_user` WHERE `email` = \'thibaud@gmail.com\'');
    $requete->bindValue(':test', '$test', PDO::PARAM_STR);
    $requete->execute();
    $data = $requete->fetch();
    $requete->closeCursor();
    switch ($data['id_Localisation']) {
        case "1":
            $data['id_Localisation'] = 'Bordeaux';
            break;
        case "2":
            $data['id_Localisation'] = 'Nancy';
            break;
        case "3":
            $data['id_Localisation'] = 'Rouen';
            break;
        case "4":
            $data['id_Localisation'] = 'Strasbourg';
            break;
    }
    switch ($data['id_Role']) {
        case "1":
            $data['id_Role'] = 'etudiant';
            break;
        case "2":
            $data['id_Role'] = 'membre du BDE';
            break;
        case "3":
            $data['id_Role'] = 'personnel CESI';
            break;
    }
    echo ('<br> le mdp est : ' . $data['password']);
    echo ('<br> l\'adresse mail : ' . $data['email']);
    echo (' <br> le role est : ' . $data['id_Role']);
    echo (' <br> la localisation est : ' . $data['id_Localisation']);

    $objet = (object) [
        "email" => $data['email'],
        "passwordd" => $data['password'],
        "role" => $data['id_Role'],
        "localisation" => $data['id_Localisation']
    ];
    $_SESSION['transfert_all'] = $objet; ?>

            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h4 class="card-title"><?php echo ($data['name'] . '    ' . $data['first_name']) ?></h4>
                    <p class="card-text"><?php echo ($data['email'] . '<br>' . $data['password'] . '<br>' . $data['id_Role'] . '<br>' . $data['id_Localisation'])  ?></p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
            ?>
</body>

</html>