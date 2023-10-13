<?php

// table des users
$usersTable = array(
// login => password
    'riri' => 'fifi',
    'yoda' => 'pp' );

$login = "anonymous";
$errorText = "";
$successfullyLogged = false;
if(isset($_POST['login']) && isset($_POST['password'])) {

    $tryLogin = $_POST['login'];
    $tryPwd = $_POST['password'];
// si login existe et password correspond
    if (array_key_exists($tryLogin, $usersTable) && $usersTable[$tryLogin] == $tryPwd) {
        $successfullyLogged = true;
        $login = $tryLogin;
        session_start(); //on ouvre la session
        $_SESSION['login'] = $login;
        header("Location: ../SitePro_v4(withTwoTheme)/v4WithTwoTheme/php/index.php");
    } elseif (!$successfullyLogged) {
        $errorText = "Erreur de login/password";
    }
}
?>