<?php
session_start();
$_SESSION[ 'username' ] = '';
$_SESSION[ 'id' ] = '';
$_SESSION[ 'isAdmin' ] = '';
unset($_SESSION['username']);
unset($_SESSION['id']);
unset($_SESSION['isAdmin']);
session_destroy();
header('Location:../../views/auth/login.php');
?>