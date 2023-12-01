<?php 
session_start();
session_destroy();
header('Location: ../../public/src/index.php');
?>