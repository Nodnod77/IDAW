
<?php
require_once("template_header.php");

$currentPageId = 'accueil';
if(isset($_GET['page'])) {
    $currentPageId = $_GET['page'];
}
/*session_start();
//if (isset($_GET(['disconnect'])) pr disconnect
if (isset($_SESSION['login'])){

}*/
?>

<?php
renderMenuToHTML($currentPageId);
getCss($currentPageId)
?>

<section class="corps">
    <form id="style_form" action="index.php" method="GET">
        <select name="css">
            <option value="style2">Thème Clair</option>
            <option value="style1">Thème Sombre</option>
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