<?php
session_start();
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'wonderfarm');
define('back', "<a href='javascript: history.go(-1)' style='font-weight:300'>Trở lại</a>");
define('SITEURL', 'http://localhost/wonderfarmonline/');
// Tạo kết nối đến database dùng mysqli_connect()
$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME) or die("không thể kết nối tới database");
// Thiết lập kết nối của chúng ta khi truy vấn là dạng UTF8 trong trường hợp dữ liệu là tiếng việt có dâu
mysqli_query($conn, "SET NAMES 'UTF8'");
