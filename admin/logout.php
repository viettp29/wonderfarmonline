<?php include('../includes/connection.php') ?>
<?php
"<div class='error text text-center'>Đăng xuất thành công!</div>";
header("Location: ../index.php");
session_destroy();
// unset($_SESSION["id"]);
// unset($_SESSION["user_name"]);
?>