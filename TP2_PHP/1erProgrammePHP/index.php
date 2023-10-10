<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Date du jour</title>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500&family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
    <style>
        h1{
            color: azure;
        }
        body{
            background-color: cornflowerblue;
            font-family: 'Manrope', sans-serif;
            padding: 150px;
        }
        .signature {
            display: flex;
            align-items: center;
            font-style: italic;
            font-size: small;
            position: relative;
            left:40%;
            top:100%;
            padding-top: 200px;

        }
        .table{
            margin: 20px;
        }
    </style>
</head>
<body>
<header>

</header>
<main>
    <h1>Heure Courante</h1>
    <p>L'heure courante UTC est : <?php echo date('H:i:s'); ?></p>
    <p>L'heure courante en Europe Centrale (Paris) est : <?php  date_default_timezone_set('Europe/Paris'); $heureCourante = date('H:i:s');  echo $heureCourante ;?>
    <?php
    // on affiche les heures en fonction des régions du monde
    $regions = array(
        'New York (USA)' => 'America/New_York',
        'Paris (France)' => 'Europe/Paris',
        'Johannesburg (Afrique du Sud)' => 'Africa/Johannesburg',
        'Tokyo (Japon)' => 'Asia/Tokyo',
        'Sydney(Australie)' => 'Australia/Sydney'
    );

    // Afficher l'heure pour chaque région
    foreach ($regions as $region => $timezone) {
        date_default_timezone_set($timezone);
        echo '<div class="table"><tr ><tr>' . $region . '</tr><li>' . date('H:i:s') . '</li></li></div>';
    }
    ?>
</main>
<footer>
    <div class="signature">
        <span>Fait avec &#10084; par Donia - oct 2023 </span>
    </div>
</footer>
</body>
</html>