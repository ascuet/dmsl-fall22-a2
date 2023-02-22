<?php
// Start the session
session_start();
?>
<?php 
    if(!isset($_SESSION["username"])){
        header('Location: ../auth/login.php');
    }
?>