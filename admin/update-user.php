<?php
ob_start();
include('../includes/connection.php');
include('permission-admin.php');
include('includesAdmin/header.php');
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Cập Nhập Người Dùng</h1>

        <br><br>

        <?php
        //1. Get the ID of Selected Admin
        $id = $_GET['id'];

        //2. Create SQL Query to Get the Details
        $sql = "SELECT * FROM users WHERE userId=$id";

        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //Check whether the query is executed or not
        if ($res == true) {
            // Check whether the data is available or not
            $count = mysqli_num_rows($res);
            //Check whether we have admin data or not
            if ($count == 1) {
                // Get the Details
                //echo "Admin Available";
                $row = mysqli_fetch_assoc($res);
                $email = $row['email'];
                $fullName = $row['fullName'];
                $role = $row['role'];
            } else {
                //Redirect to Manage Admin PAge
                header('location:' . SITEURL . 'admin/manage-user.php');
            }
        }

        ?>


        <form action="update-user.php" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Email: </td>
                    <td>
                        <input type="text" name="email" value="<?php echo $email; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Họ tên: </td>
                    <td>
                        <input type="text" name="fullName" value="<?php echo $fullName; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Quyền truy cập: </td>
                    <td>
                        <input type="text" name="role" value="<?php echo $role; ?>">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Cập nhập người dùng" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>
    </div>
</div>

<?php

//Check whether the Submit Button is Clicked or not
if (isset($_POST['submit'])) {
    //echo "Button CLicked";
    //Get all the values from form to update
    $id = $_POST['id'];
    $email = $_POST['email'];
    $fullName = $_POST['fullName'];
    $role = $_POST['role'];

    //Create a SQL Query to Update Admin
    $sql2 = "UPDATE users SET
        email = '$email',
        fullName = '$fullName',
        role = '$role'
        WHERE userId='$id'
        ";
    $res1 = mysqli_query($conn, $sql2);

    //Check whether the query executed successfully or not
    if ($res1 == true) {
        //Query Executed and Admin Updated
        $_SESSION['update'] = "<div class='success'>Cập nhập người dùng thành công.</div>";
        //Redirect to Manage Admin Page
        header('location:' . SITEURL . 'admin/manage-user.php');
    } else {
        //Failed to Update Admin
        $_SESSION['update'] = "<div class='error'>Không xoá được người dùng.</div>";
        //Redirect to Manage Admin Page
        header('location:' . SITEURL . 'admin/manage-user.php');
    }
}
?>
<?php include('includesAdmin/footer.php');
ob_end_flush();
?>