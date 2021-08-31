<?php
ob_start();
include('../includes/connection.php');
include('permission-admin.php');
include('includesAdmin/header.php');
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Đổi Mật Khẩu</h1>
        <?php if (isset($_SESSION['user-not-found'])) {
            echo $_SESSION['user-not-found'];
            unset($_SESSION['user-not-found']);
            unset($_SESSION['user-not-found']);
        }
        if (isset($_SESSION['pwd-not-match'])) {
            echo $_SESSION['pwd-not-match'];
            unset($_SESSION['pwd-not-match']);
        }
        ?>
        <br><br>
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        ?>

        <form action="update-password.php" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Mật khẩu hiện tại: </td>
                    <td>
                        <input type="password" name="current_password" placeholder="Mật khẩu hiện tại">
                    </td>
                </tr>

                <tr>
                    <td>Mật khẩu mới:</td>
                    <td>
                        <input type="password" name="new_password" placeholder="Mật khẩu mới">
                    </td>
                </tr>

                <tr>
                    <td>Nhập lại mật khẩu: </td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Nhập lại mật khẩu">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Đổi mật khẩu" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>

    </div>
</div>
<?php
//CHeck whether the Submit Button is Clicked on Not
if (isset($_POST['submit'])) {
    //echo "CLicked";
    //1. Get the DAta from Form
    $id = $_POST['id'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $uppercase = preg_match('@[A-Z]@', $new_password);
    $lowercase = preg_match('@[a-z]@', $new_password);
    $number    = preg_match('@[0-9]@', $new_password);
    // check 2 pass mới trùng không
    if ((!$uppercase || !$lowercase || !$number || strlen($new_password) < 8)) {
        $_SESSION['pwd-not-match'] = "<div class='error text text-center'>Mật khẩu mới của bạn không đúng. 
        Mật khẩu phải chứa ít nhất một chữ hoa, một chữ thường và số. </div>";
        //Redirect the User
        header('location: update-password.php');
    }
    if (($new_password === $confirm_password)) {
        $sql = "SELECT * FROM users WHERE userId=$id";
        // check có tài khoản được yêu cầu đổi pass k
        $res = mysqli_query($conn, $sql);
        if ($res == false) {
            $_SESSION['user-not-found'] = "<div class='error text text-center'>Không tìm thấy người dùng. </div>";
            //Redirect the User
            header('location: manage-user.php');
        } else {
            $count = mysqli_num_rows($res);
            // nếu có 1 thì lấy ra mật khẩu
            if ($count == 1) {
                $data = mysqli_fetch_array($res);
                $password = $data["password"];
                // so sánh mật khẩu người dùng nhập với pass trên DB
                if (password_verify($current_password, $password)) {
                    // nếu pass khớp thì thực hiện hash pass mới và đổi pass
                    $passwordNew = password_hash($new_password, PASSWORD_DEFAULT);
                    $sql2 = "UPDATE users SET
                   password='$passwordNew' 
                   WHERE userId='$id'";
                    $res2 = mysqli_query($conn, $sql2);
                    // nếu đổi thành công thì đẩy ra thông báo
                    if ($res2 == true) {
                        $_SESSION['change-pwds'] = "<div class='success text text-center'>Đã thay đổi mật khẩu thành công. </div>";
                        //Redirect the User
                        header('location: manage-user.php');
                    } else {
                        $_SESSION['change-pwds'] = "<div class='error text text-center'>Đổi mật khẩu thất bại. </div>";
                        //Redirect the User
                        header('location: manage-user.php');
                    }
                } else {
                    $_SESSION['pwd-not-match'] = "<div class='error text text-center'>Mật khẩu hiện tại không đúng. </div>";
                    //Redirect the User
                    header('location: update-password.php');
                }
            } else {
                $_SESSION['user-not-found'] = "<div class='error text text-center'> Tài khoản không hợp lệ. </div>";
                //Redirect the User
                header('location: update-password.php');
            }
        }
    } else {
        $_SESSION['pwd-not-match'] = "<div class='error text text-center'>Mật khẩu mới của bạn không đúng. 
        Mật khẩu phải chứa ít nhất một chữ hoa, một chữ thường và số. </div>";
        //Redirect the User
        header('location: update-password.php');
    }
}
?>
<?php include('includesAdmin/footer.php'); //' . SITEURL . 'admin/
ob_end_flush();
?>