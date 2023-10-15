
<?php
$currentLang = 'fr';
if(isset($_GET['lang'])) {
    $currentLang = $_GET['lang'];
}
?>

<?php
require_once("template_header.php");

$currentPageId = 'accueil';
if(isset($_GET['page'])) {
    $currentPageId = $_GET['page'];
}
?>
<?php
getCss($currentPageId);
getTitle($currentPageId);
renderMenuToHTML($currentPageId,$currentLang);

?>


<section class="corps">

    <?php
    if ($currentLang == "en"){
        $pageToInclude = "en/" . $currentPageId . ".php";
    } else {
        $pageToInclude = "fr/" . $currentPageId . ".php";
    }
    if(is_readable($pageToInclude))
        require_once($pageToInclude);
    else
        require_once("error.php");
    ?>

</section>
<?php
require_once ("template_footer.php");
renderFooter($currentLang);
?>