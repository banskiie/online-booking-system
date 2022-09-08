<?php
@session_start();
// if (isset($_SESSION["role"]) == "client" && $_SESSION['loggedIn'] == true) {
//     require '../db/database.php';
//     $sql = "INSERT INTO user_log (clnt_id, ulog_act) VALUES ('{$_SESSION['sessionId']}','Logged Out')";
//     mysqli_query($conn, $sql);
// }
session_destroy();
header('Location: ../index.php');

