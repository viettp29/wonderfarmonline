<?php
require_once("includes/connection.php");
?>
<?php
if (isset($_POST["btn_submit"])) {
          $username = $_POST["username"];
          $passWord = $_POST["password"];
          $email = $_POST["email"];
          $fullName = $_POST["fullName"];
          $role = 0; // default = 0 là user
          $uppercase = preg_match('@[A-Z]@', $passWord);
          $lowercase = preg_match('@[a-z]@', $passWord);
          $number    = preg_match('@[0-9]@', $passWord);
          if ($username == "" || $passWord == "" || $fullName == "" || $email == "") {
                    echo "bạn vui lòng nhập đầy đủ thông tin" . $back;
                    exit;
          } else {
                    $verifyUsername = "SELECT username FROM users WHERE username='$username'";
                    $query = mysqli_query($conn, $verifyUsername);
                    $num_rows = mysqli_num_rows($query);
                    if ($num_rows == 0) {
                              // validate email với filter_var
                              if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                                        //Kiểm tra email đã có người dùng chưa
                                        $verifyEmail = "SELECT email FROM users WHERE email='$email'";
                                        $queryEmail = mysqli_query($conn, $verifyEmail);
                                        $num_rows_email = mysqli_num_rows($queryEmail);
                                        if ($num_rows_email == 0) {
                                                  if ($_POST["password"] === $_POST["re_password"]) {
                                                            // regex kiểm tra mật khẩu
                                                            if (!$uppercase || !$lowercase || !$number || strlen($passWord) < 8) {
                                                                      echo "Mật khẩu phải chứa ít nhất một chữ in hoa, một chữ thường và số!" . back;
                                                            } else {
                                                                      $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
                                                                      $addUser = "INSERT INTO users(username, password, email, fullName, role) 
                                                                      VALUES ( '$username', '$password', '$email', '$fullName', '$role')";
                                                                      // thực thi câu $sql với biến conn lấy từ file connection.php
                                                                      $result = mysqli_query($conn, $addUser);
                                                                      if ($result == false) {
                                                                                $_SESSION['register'] = "<div class='error text text-center'>Đăng ký tài khoản thất bại!.</div>" . back;
                                                                      } else {
                                                                                $_SESSION['register'] = "<div class='success text-center'>Đăng ký tài khoản thành công!.</div>";
                                                                                header('Location: ' . SITEURL);
                                                                      }
                                                            }
                                                  } else {
                                                            echo "Mật khẩu của bạn không khớp." . back;
                                                            exit;
                                                  }
                                        }
                                        // kiểm tra mật khẩu
                                        echo "Email này đã có người dùng. Vui lòng chọn Email khác." . back;
                                        exit;
                              } else {
                                        echo "Email này không hợp lệ. Vui lòng chọn Email khác." . back;
                                        exit;
                              }
                    } else {
                              echo "Tên đăng nhập đã được sử dụng!" . back;
                              exit;
                    }
          }
}
?>
<?php include("includes/header.php");
?>
<div class="container mt-5 mb-5">
          <div class="row d-flex align-items-center justify-content-center">
                    <div class="col-md-6">
                              <div class="card px-5 py-5">
                                        <form method="POST" action="register.php">
                                                  <?php
                                                  if (isset($_SESSION['register'])) {
                                                            echo $_SESSION['register'];
                                                            unset($_SESSION['register']);
                                                  }
                                                  ?>
                                                  <span class="circle"><i class="fa fa-check"></i></span>
                                                  <h5 class="mt-3">Đăng ký thành viên mới </h5>
                                                  <div class="form-input"> <i class="fa fa-user"></i> <input type="text" class="form-control" name="username" placeholder="User name" required></div>
                                                  <div class="form-input"> <i class="fa fa-lock"></i> <input type="password" class="form-control" name="password" placeholder="Password" required></div>
                                                  <div class="form-input"> <i class="fa fa-lock"></i> <input type="password" class="form-control" name="re_password" placeholder="Re-password" required></div>
                                                  <div class="form-input"> <i class="fa fa-envelope"></i> <input type="text" class="form-control" name="email" placeholder="Email address" required></div>
                                                  <div class="form-input"> <i class="fa fa-user"></i> <input type="text" class="form-control" name="fullName" placeholder="Full name" required></div>
                                                  <button class="btn btn-primary mt-4 signup" type="submit" name="btn_submit">Đăng ký</button>
                                        </form>

                              </div>
                    </div>
          </div>
</div>
<?php include('includes/footer.php');
?>