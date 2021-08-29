<?php
if (isset($_SESSION['user_id']) == false) {
          // Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
          header('Location: ./login.php');
} else {
          if (isset($_SESSION['user_id']) == true) {
                    // Ngược lại nếu đã đăng nhập
                    $permission = $_SESSION['role_User'];
                    // Kiểm tra quyền của người đó có phải là admin hay không
                    if ($permission == '0') {
                              // Nếu không phải admin thì xuất thông báo
                              echo "Bạn không đủ quyền truy cập vào trang này<br>";
                              echo "<a href='../index.php'> Click để về lại trang chủ</a>";
                              exit();
                    }
          }
}
