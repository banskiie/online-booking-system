<?php
@session_start();
if (isset($_SESSION["role"]) != "client") {
    header('Location: index.php');
}
