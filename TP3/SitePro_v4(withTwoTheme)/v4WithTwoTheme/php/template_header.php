<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title> SAKJI Donia </title>
        <?php
    // Vérifie si le cookie 'selected_style' existe avant de l'utiliser
    if (isset($_COOKIE['selected_style'])) {
        $selectedStyle = $_COOKIE['selected_style'];
        // Utilise le style sélectionné s'il existe
        $selectedStylePath = '../css/' . $selectedStyle . '.css';
        echo '<link rel="stylesheet" type="text/css" href="' . $selectedStylePath . '">';
    } else {
        // Utilise un style par défaut si le cookie n'existe pas
        echo '<link rel="stylesheet" type="text/css" href="style1.css">';
    }
    ?>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500&family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
</head>
<body>

    <?php
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
            //'info-technique' => array('Info-technique')
        );

        echo '<header>';
        echo '<nav class="menu">';
        echo '<img class="userLogo" src="https://icons.veryicon.com/png/o/miscellaneous/two-color-icon-library/user-286.png" alt="userLogo">';
        echo '<div class="menu">';
        foreach ($mymenu as $pageId => $pageParameters) {
            $currentClass = ($pageId === $currentPageId) ? ' id="currentPage"' : ''; // Ajout de la classe 'id="currentPage"' pour la page courante
            echo '<a' . $currentClass . ' href="index.php?page=' . $pageId . '">' . $pageParameters[0] . '</a>';
        }
        echo '</div>';
        echo '</nav>';
        echo '</header>';
    }
    ?>
