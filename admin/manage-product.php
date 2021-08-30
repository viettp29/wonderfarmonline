<?php
ob_start();
include('../includes/connection.php');
include('permission-admin.php');
include('includesAdmin/header.php');
?>
<div class="main-content">
    <div class="wrapper">
        <h2>Quản Lý Sản Phẩm</h2>

        <br /><br />
        <?php

        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if (isset($_SESSION['remove'])) {
            echo $_SESSION['remove'];
            unset($_SESSION['remove']);
        }

        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }

        if (isset($_SESSION['no-product-found'])) {
            echo $_SESSION['no-product-found'];
            unset($_SESSION['no-product-found']);
        }

        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }

        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }

        if (isset($_SESSION['failed-remove'])) {
            echo $_SESSION['failed-remove'];
            unset($_SESSION['failed-remove']);
        }

        ?>
        <br><br>

        <!-- Button to Add Admin -->
        <a href="add-product.php" class="btn-primary">Thêm sản phẩm</a>

        <br /><br /><br />

        <table class="tbl-full">
            <tr>
                <th>STT</th>
                <th>Tiêu đề</th>
                <th>Hình ảnh</th>
                <th>Còn hoạt động</th>
                <th>Hành động</th>
            </tr>

            <?php

            //Query to Get all CAtegories from Database
            $sql = "SELECT * FROM product";

            //Execute Query
            $res = mysqli_query($conn, $sql);

            //Count Rows
            $count = mysqli_num_rows($res);

            //Create Serial Number Variable and assign value as 1
            $stt = 1;

            //Check whether we have data in database or not
            if ($count > 0) {
                //We have data in database
                //get the data and display
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['productId'];
                    $title = $row['title'];
                    $imageName = $row['imageName'];
                    $active = $row['active'];

            ?>

                    <tr>
                        <td><?php echo $stt++; ?>. </td>
                        <td><?php echo $title; ?></td>

                        <td>

                            <?php
                            //Chcek whether image name is available or not
                            if ($imageName != "") {
                                //Display the Image
                            ?>

                                <img src="images/product/<?php echo $imageName; ?>" width="100px">

                            <?php
                            } else {
                                //DIsplay the MEssage
                                echo "<div class='error text text-center'>Không thể tải lên Image.</div>";
                            }
                            ?>

                        </td>

                        <td><?php echo $active; ?></td>
                        <td>
                            <a href="update-product.php?id=<?php echo $id; ?>" class="btn-secondary">Cập nhập sản phẩm</a>
                            <a href="delete-product.php?id=<?php echo $id; ?>&imageName=<?php echo $imageName; ?>" class="btn-danger">Xoá sản phẩm</a>
                        </td>
                    </tr>

                <?php

                }
            } else {
                //WE do not have data
                //We'll display the message inside table
                ?>

                <tr>
                    <td colspan="6">
                        <div class="error text text-center">Không có sản phẩm được thêm vào.</div>
                    </td>
                </tr>

            <?php
            }

            ?>




        </table>
    </div>

</div>

<?php include('includesAdmin/footer.php');
ob_end_flush();
?>