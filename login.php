<?php
ob_start();
include('includes/connection.php');
if (isset($_SESSION['user_id']) == false) {
          include('includes/header.php');
} else {
          include('includes/headerUser.php');
}
?>
<?php
//Gọi file connection.php
// Kiểm tra nếu người dùng đã ân nút đăng nhập thì mới xử lý
if (isset($_POST["btn_submit"])) {
          // lấy thông tin người dùng
          $username = $_POST["username"];
          $password = $_POST["password"];
          //làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
          //mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
          $username = strip_tags($username);
          $username = addslashes($username);
          $password = strip_tags($password);
          $password = addslashes($password);
          if ($username == "" || $password == "") {
                    echo "username hoặc password bạn không được để trống!";
          } else {
                    $sql = "select * from users where username = '$username'";
                    // trả về true or false
                    $query = mysqli_query($conn, $sql);
                    $num_rows = mysqli_num_rows($query);
                    if ($num_rows == 0) {
                              echo "<div class='error text-center'>tên đăng nhập hoặc mật khẩu không đúng !</div>";
                    } else {
                              $data = mysqli_fetch_array($query);
                              $passwordHashed = $data["password"];
                              if (password_verify($password, $passwordHashed)) {
                                        $_SESSION["user_id"] = $data["userId"];
                                        $_SESSION["user_name"] = $data["username"];
                                        $_SESSION["role_User"] = $data["role"];
                                        if ($_SESSION["role_User"] == 0) {
                                                  $_SESSION["success"] = "<div class='success text text-center'>Bạn đã đăng nhập thành công.</div>";
                                                  header('Location: homeUser.php');
                                        } else {
                                                  $_SESSION["success"] = "<div class='success text text-center'>Bạn đã đăng nhập thành công.</div>";
                                                  header('Location: admin/index.php');
                                        }
                              } else {
                                        echo "<div class='error text-center'>tên đăng nhập hoặc mật khẩu không đúng !</div>";
                              }
                    }
          }
}
?>
<div class="container mt-5 mb-5">
          <div class="row d-flex align-items-center justify-content-center">
                    <div class="col-md-6">
                              <div class="card px-5 py-5">
                                        <form method="POST" action="login.php">
                                                  <?php
                                                  if (isset($_SESSION['login'])) {
                                                            echo $_SESSION['login'];
                                                            unset($_SESSION['login']);
                                                  }
                                                  if (isset($_SESSION['dangky'])) {
                                                            echo $_SESSION['dangky'];
                                                            unset($_SESSION['dangky']);
                                                  }
                                                  ?>
                                                  <span class="circle"><i class="fa fa-check"></i></span>
                                                  <h5 class="mt-3">Đăng nhập</h5>
                                                  <div class="form-input"> <i class="fa fa-user"></i> <input type="text" class="form-control" name="username" placeholder="User name" required></div>
                                                  <div class="form-input"> <i class="fa fa-lock"></i> <input type="password" class="form-control" name="password" placeholder="Password" required></div>
                                                  <button class="btn btn-primary mt-4 signup" type="submit" name="btn_submit">Đăng nhập</button>
                                        </form>
                              </div>
                    </div>
          </div>
</div>
<?php include 'includes/footer.php';
ob_end_flush();
?>