<?php
session_start();

session_unset(); 

setcookie('cookieId', '', time() - 3600, "/");
header("Location:index.php");

    

?>