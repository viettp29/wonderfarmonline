<?php
include('../includes/connection.php');
include('includesAdmin/header.php');
?>

<!-- Main Content Section Starts -->
<div class="main-content">
    <div class="wrapper">
        <h2>Quản Lý Người Dùng</h2>
        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add']; //Displaying Session Message
            unset($_SESSION['add']); //REmoving Session Message
        }

        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        // product, drinks, order, admin
        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        // trong update pass
        if (isset($_SESSION['user-not-found'])) {
            echo $_SESSION['user-not-found'];
            unset($_SESSION['user-not-found']);
        }

        if (isset($_SESSION['pwd-not-match'])) {
            echo $_SESSION['pwd-not-match'];
            unset($_SESSION['pwd-not-match']);
        }

        if (isset($_SESSION['change-pwd'])) {
            echo $_SESSION['change-pwd'];
            unset($_SESSION['change-pwd']);
        }

        ?>
        <br><br><br>

        <!-- Button to Add Admin -->
        <br />

        <table class="tbl-full">
            <tr>
                <th>STT</th>
                <th>Tên tài khoản</th>
                <th>Email</th>
                <th>Họ tên</th>
                <th>Quyền truy cập</th>
                <th class=" text-center">Hành động</th>
            </tr>


            <?php
            //Query to Get all Admin
            $sql = "SELECT * FROM users";
            //Execute the Query
            $res = mysqli_query($conn, $sql);

            //CHeck whether the Query is Executed of Not
            if ($res == TRUE) {
                // Count Rows to CHeck whether we have data in database or not
                $count = mysqli_num_rows($res); // Function to get all the rows in database

                $stt = 1; //Create a Variable and Assign the value

                //CHeck the num of rows
                if ($count > 0) {
                    //WE HAve data in database
                    while ($rows = mysqli_fetch_assoc($res)) {
                        //Using While loop to get all the data from database.
                        //And while loop will run as long as we have data in database

                        //Get individual DAta
                        $id = $rows['userId'];
                        $username = $rows['username'];
                        $email = $rows['email'];
                        $fullName = $rows['fullName'];
                        $role = $rows['role'];
                        //Display the Values in our Table
            ?>
                        <tr>
                            <td><?php echo $stt++; ?>. </td>
                            <td><?php echo $username; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $fullName; ?></td>
                            <td class="text-center"><?php echo $role; ?></td>
                            <td>
                                <a href="update-password.php?id=<?php echo $id; ?>" class="btn-primary">Đổi mật khẩu</a>
                                <a href="update-user.php?id=<?php echo $id; ?>" class="btn-secondary">Cập nhập người dùng</a>
                            </td>
                        </tr>

            <?php
                    }
                } else {
                    //We Do not Have Data in Database
                }
            }

            ?>



        </table>

    </div>
</div>
<!-- Main Content Setion Ends -->

<?php include('includesAdmin/footer.php'); ?>