<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <?php
    function getTitle($currentPageId, $language = 'fr')
    {
        // Tableau des titres de page pour les deux langues
        $pageTitles = array(
            'fr' => array(
                'accueil' => 'Accueil',
                'cv' => 'Expériences',
                'hobbies' => 'À propos de moi',
                'contact' => 'Contacts'
            ),
            'en' => array(
                'accueil' => 'Home',
                'cv' => 'Experience',
                'hobbies' => 'About Me',
                'contact' => 'Contact'
            )
        );

        $pageTitle = $pageTitles[$language][$currentPageId];
        echo '<title>' . $pageTitle . '</title>';
    }
    ?>
    <link rel="stylesheet" href="../css/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500&family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
    <?php
    function getCss($currentPageId)
    {
        // Inclure un fichier CSS spécifique à la page en fonction de $currentPageId et de la langue
        if (isset($currentPageId)) {

            echo '<link rel="stylesheet" href="../css/' . $currentPageId .'.css">';
        }
    }

    function renderMenuToHTML($currentPageId, $language)
    {
        // Tableau associatif pour gérer les liens du menu en fonction de la langue
        $menuLinks = array(
            'fr' => array(
                'accueil' => 'Accueil',
                'cv' => 'Expériences',
                'hobbies' => 'À propos de moi',
                'contact' => 'Contacts'
            ),
            'en' => array(
                'accueil' => 'Home',
                'cv' => 'Experiences',
                'hobbies' => 'About Me',
                'contact' => 'Contact'
            )
        );

        echo '<header>';
        echo '<nav class="menu">';
        echo '<img class="userLogo" src="https://icons.veryicon.com/png/o/miscellaneous/two-color-icon-library/user-286.png" alt="userLogo">';
        echo '<div class="menu">';
        foreach ($menuLinks[$language] as $pageId => $pageLinkText) {
            $currentClass = ($pageId === $currentPageId) ? ' id="currentPage"' : '';
            $langParam = '&lang=' . $language; // Ajout du paramètre de langue
            echo '<a' . $currentClass . ' href="index.php?page=' . $pageId . $langParam . '">' . $pageLinkText . '</a>';
        }
        echo '</div>';
        echo '</nav>';

        // Menu déroulant pour changer de langue
        echo '<form class="lang-form" action="index.php" method="get" id="lang-form">';
        echo '<input type="hidden" name="page" value="' . $currentPageId . '">';
        echo '<select class="langSelect" name="lang" id="langSelect" onchange="document.getElementById(\'lang-form\').submit();">';
        echo '<option value="fr"' . ($language === 'fr' ? ' selected' : '') . '>Français</option>';
        echo '<option value="en"' . ($language === 'en' ? ' selected' : '') . '>English</option>';
        echo '</select>';
        echo '</form>';

        echo '</div>';
        echo '</nav>';
        echo '</header>';
    }
    ?>
</head>
<body>
