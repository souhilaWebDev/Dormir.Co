<?php 
session_start();
require('./config.php');
$_SESSION = [];
// renvoi vers login
header('Location: '.URL.'/login.php');
?>