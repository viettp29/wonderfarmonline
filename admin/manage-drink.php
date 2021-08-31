<?php
ob_start();
include('../includes/connection.php');
include('permission-admin.php');
include('includesAdmin/header.php');
?>
<div class="main-content">
    <div class="wrapper">
        <h2>Quản Lý Đồ Uống</h2>

        <br />
        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }

        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }

        if (isset($_SESSION['unauthorize'])) {
            echo $_SESSION['unauthorize'];
            unset($_SESSION['unauthorize']);
        }

        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }

        ?>
        <br />

        <!-- Button to Add Admin -->
        <a href="add-drink.php" class="btn-primary">Thêm Đồ Uống</a>

        <br /><br /><br />



        <table class="tbl-full">
            <tr>
                <th>STT</th>
                <th>Tiêu đề</th>
                <th>Giá</th>
                <th>Hình ảnh</th>
                <th>Còn hoạt động</th>
                <th>Hành động</th>
            </tr>

            <?php
            //Create a SQL Query to Get all the drink
            $sql = "SELECT * FROM drink";

            //Execute the qUery
            $res = mysqli_query($conn, $sql);

            //Count Rows to check whether we have drinks or not
            $count = mysqli_num_rows($res);

            //Create Serial Number VAriable and Set Default VAlue as 1
            $stt = 1;

            if ($count > 0) {
                //We have drink in Database
                //Get the drinks from Database and Display
                while ($row = mysqli_fetch_assoc($res)) {
                    //get the values from individual columns
                    $id = $row['drinkId'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $imageName = $row['imageName'];
                    $active = $row['active'];
            ?>

                    <tr>
                        <td><?php echo $stt++; ?>. </td>
                        <td><?php echo $title; ?></td>
                        <td>$<?php echo $price; ?></td>
                        <td>
                            <?php
                            //CHeck whether we have image or not
                            if ($imageName == "") {
                                //WE do not have image, DIslpay Error Message
                                echo "<div class='error text text-center'>Image not Added.</div>";
                            } else {
                                //WE Have Image, Display Image
                            ?>
                                <img src="images/drink/<?php echo $imageName; ?>" width="100px">
                            <?php
                            }
                            ?>
                        </td>
                        <td><?php echo $active; ?></td>
                        <td>
                            <a href="update-drink.php?id=<?php echo $id; ?>" class="btn-secondary">Cập nhập đồ uống</a>
                            <a href="delete-drink.php?id=<?php echo $id; ?>&imageName=<?php echo $imageName; ?>" class="btn-danger">Xoá đồ uống</a>
                        </td>
                    </tr>

            <?php
                }
            } else {
                //drink not Added in Database
                echo "<tr> <td colspan='7' class='error text text-center'>Đồ uống chưa được thêm vào. </td> </tr>";
            }

            ?>


        </table>
    </div>

</div>

<?php include('includesAdmin/footer.php');
ob_end_flush();
?>