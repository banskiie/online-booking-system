<?php
@session_start();
if (isset($_SESSION["role"]) != "client" && $_SESSION['loggedIn'] != true) {
    header('Location: index.php');
}
