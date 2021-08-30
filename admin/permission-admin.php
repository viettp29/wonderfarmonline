<?php
if (isset($_SESSION['user_id']) == false) {
          $_SESSION['login'] = "<div class='error'>Bạn chưa đăng nhập.</div>";
          // Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
          header('Location: ./login.php');
} else {
          if (isset($_SESSION['user_id']) == true) {
                    // Ngược lại nếu đã đăng nhập
                    $permission = $_SESSION['role_User'];
                    // Kiểm tra quyền của người đó có phải là admin hay không
                    if ($permission == '0') {
                              $_SESSION['login'] = "<div class='error'>Bạn không có quyền truy cập vào trang này.</div>";
                              // Nếu không phải admin thì xuất thông báo
                              header('Location: ./homeUser.php');
                              exit();
                    }
          }
}
