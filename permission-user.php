<?php
if (isset($_SESSION['user_id']) == false) {
          $_SESSION['login'] = "<div class='error'>Bạn chưa đăng nhập. Vui lòng đăng nhập</div>";
          //Redirect to Manage Admin Page
          header('Location: login.php');
}
