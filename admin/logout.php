<?php include('../includes/connection.php') ?>
<?php
header("Location: " . SITEURL);
session_destroy();
// unset($_SESSION["id"]);
// unset($_SESSION["user_name"]);
?>