<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title> SAKJI Donia </title>
    <link href="../css/index.css">
    <?php

    // si on envoie un get sans cookie
    if (isset($_GET['css'])) {
        setcookie('css',$_GET['css']); // il faut que le serveur renvoie un cookie avec le setcookie
        echo '<link rel="stylesheet" type="text/css" href="../css/'.$_GET['css'].'.css">';
    }
    elseif (isset($_COOKIE['selected_style'])) { // si on envoie un get avec un cookie
        $selectedStyle = $_COOKIE['selected_style']; // pas besoin de set cookie
        echo '<link rel="stylesheet" type="text/css" href="../css/'.$selectedStyle.'.css">';
    } else {
        // Utilise un style par défaut si le cookie n'existe pas
        echo '<link rel="stylesheet" type="text/css" href="../css/style1.css">'; // style par defaut
    }
    ?>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500&family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
</head>
<body>

    <?php
    //session_start();
    function getTitle ($currentPageId){
        $pageTitles= array(
            // idPage titre
            'index' => array('Accueil'),
            'cv' => array('Expériences'),
            'hobbies' => array('À propos de moi'),
            'contact' => array('Contacts'),
            //'info-technique' => array('Info-technique')
        );
            $pageTitle=pageTitles[$currentPageId];
            echo $pageTitle;
    }
    function getCss($currentPageId)
    {
        // Inclure un fichier CSS spécifique à la page en fonction de $currentPageId
        if (isset($currentPageId)) {
            echo '<link rel="stylesheet" href="../css/' . $currentPageId . '.css">';
        }
    }

    function renderMenuToHTML($currentPageId)
    {

        // Un tableau qui définit la structure du menu
        $mymenu = array(
            // idPage titre
            'accueil' => array('Accueil'),
            'cv' => array('Expériences'),
            'hobbies' => array('À propos de moi'),
            'contact' => array('Contacts'),
            //'connected' => array($_SESSION['login']),
            //'info-technique' => array('Info-technique')
        );
       // print_r($_SESSION);
        echo '<header>';
        echo '<nav class="menu">';
        echo '<img class="userLogo" src="https://icons.veryicon.com/png/o/miscellaneous/two-color-icon-library/user-286.png" alt="userLogo">';
        echo '<div class="menu">';
        foreach ($mymenu as $pageId => $pageParameters) {
            if ($pageId == 'connected')
            {
                return;
            } else {
                $currentClass = ($pageId === $currentPageId) ? ' id="currentPage"' : ''; // Ajout de la classe 'id="currentPage"' pour la page courante
                echo '<a' . $currentClass . ' href="index.php?page=' . $pageId . '">' . $pageParameters[0] . '</a>';

                echo '</div>';
                echo '</nav>';
                echo '</header>';
            }
        }
    }
    ?>
