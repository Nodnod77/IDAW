
<?php
require_once("template_header.php");

$currentPageId = 'accueil';
if(isset($_GET['page'])) {
    $currentPageId = $_GET['page'];
}
?>
<?php
// 2. Récup des identifiants
if (isset($_GET['css'])) {
    $selectedStyle = $_GET['css'];

    // Stocker l'identifiant de style dans un cookie
    setcookie('selected_style', $selectedStyle);
} /*elseif (isset($_COOKIE['selected_style'])) {
    // Lire lidentifiant CSS depuis les cookies
    $selectedStyle = $_COOKIE['selected_style'];
} else {
    // ssi aucune valeur n'est présente dans les cookies alor définir un style par défaut
    $selectedStyle = 'style1';
} */
?>

<
<?php
renderMenuToHTML($currentPageId);
getCss($currentPageId)
?>

<section class="corps">
    <form id="style_form" action="index.php" method="GET">
        <select name="css">
            <option value="style1">Thème Clair</option>
            <option value="style2">Thème Sombre</option>
        </select>
        <input type="submit" value="Appliquer" />
    </form>
    <?php
    $pageToInclude = $currentPageId . ".php";
    if(is_readable($pageToInclude))
        require_once($pageToInclude);
    else
        require_once("error.php");
    ?>

</section>
<?php

require_once("template_footer.php");
?>