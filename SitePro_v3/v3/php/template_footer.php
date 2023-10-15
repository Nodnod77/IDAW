<?php
function renderFooter($language) {
    echo '<footer>';
    echo '<div class="footerContent">';
    echo '<nav class="menuFooter">';
    echo '<ul>';
    if ($language == "fr"){
    echo '<li><a href="index.php?page=accueil&lang=fr">Accueil</a></li>';
    echo '<li><a href="index.php?page=cv&lang=fr">Expériences</a></li>';
    echo '<li><a href="index.php?page=hobbies&lang=' . $language . '">À propos de moi</a></li>';
    echo '<li><a href="index.php?page=contact&lang=' . $language . '">Contacts</a></li>';
    } elseif ($language="en"){
        echo '<li><a href="index.php?page=accueil&lang=en">Home</a></li>';
        echo '<li><a href="index.php?page=cv&lang=en">Experiences</a></li>';
        echo '<li><a href="index.php?page=hobbies&lang=en">About me</a></li>';
        echo '<li><a href="index.php?page=contact&lang=en">Contact me</a></li>';
    }
    echo '</ul>';
    echo '</nav>';
    echo '<div class="APropos">';
    echo '<h6>';
    if ($language == "en") {
        echo 'About';
    } else {
        echo 'À propos';
    }
    echo '</h6>';
    echo '</div>';
    echo '</div>';
    echo '<div class="signature">';
    echo '<span>';
    if ($language == "en") {
        echo 'Made with &#10084; by Donia - Oct 2023';
    } else {
        echo 'Fait avec &#10084; par Donia - oct 2023';
    }
    echo '</span>';
    echo '</div>';
    echo '</footer>';
}
?>
