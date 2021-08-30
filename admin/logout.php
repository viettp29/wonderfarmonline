<?php include('../includes/connection.php') ?>
<?php
$_SESSION['login'] = "<div class='error text text-center'>Đăng xuất thành công!</div>";
header("Location: " . SITEURL);
session_destroy();
// unset($_SESSION["id"]);
// unset($_SESSION["user_name"]);
?>