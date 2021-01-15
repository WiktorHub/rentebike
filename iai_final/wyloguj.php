<?php
session_start();
session_unset();
header('Location: logowanie.php');
$_SESSION['wylogowany'] = '<br /><a href="logowanie.php">  Wylogowano <br />
Zaloguj się ponownie! </a> ';
?>