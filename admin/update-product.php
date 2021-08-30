<?php
ob_start();
include('../includes/connection.php');
include('permission-admin.php');
include('includesAdmin/header.php');
?>
<div class="main-content">
    <div class="wrapper">
        <h2>Cập Nhập Sản Phẩm </h2>

        <br><br>


        <?php

        //Check whether the id is set or not
        if (isset($_GET['id'])) {
            //Get the ID and all other details
            //echo "Getting the Data";
            $id = $_GET['id'];
            //Create SQL Query to get all other details
            $sql = "SELECT * FROM product WHERE productId=$id";

            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);
            if ($count == 1) {
                //Get all the data
                $row = mysqli_fetch_assoc($res);
                $title = $row['title'];
                $current_image = $row['imageName'];
                $active = $row['active'];
            } else {
                //redirect to manage Product with session message
                $_SESSION['no-product-found'] = "<div class='error'>Sản phẩm không tồn tại.</div>";
                header('location:' . SITEURL . 'admin/manage-product.php');
            }
        } else {
            //redirect to Manage Product
            header('location:' . SITEURL . 'admin/manage-product.php');
        }
        ?>
        <form action="update-product.php" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Tiêu đề: </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Ảnh hiện tại: </td>
                    <td>
                        <?php
                        if ($current_image != "") {
                            //Display the Image
                        ?>
                            <img src="<?php echo SITEURL; ?>/admin/images/product/<?php echo $current_image; ?>" width="150px">
                        <?php
                        } else {
                            //Display Message
                            echo "<div class='error'>Thêm ảnh thất bại.</div>";
                        }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>Ảnh mới: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Còn hoạt động: </td>
                    <td>
                        <input <?php if ($active == "Yes") {
                                    echo "checked";
                                } ?> type="radio" name="active" value="Yes"> Yes

                        <input <?php if ($active == "No") {
                                    echo "checked";
                                } ?> type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Cập nhập sản phẩm" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>
        <?php
        if (isset($_POST['submit'])) {
            //echo "Clicked";
            //1. Get all the values from our form
            $id = $_POST['id'];
            $title = $_POST['title'];
            $current_image = $_POST['current_image'];
            $active = $_POST['active'];

            //2. update ảnh mới nếu được chọn
            //kiểm tra ảnh mới đc chọn hay chưa
            if (isset($_FILES['image']['name'])) {
                //Get the Image Details
                $imageName = $_FILES['image']['name'];

                //Kiểm tra xem hình ảnh tồn tại hay không
                if ($imageName != "") {
                    //Image Available

                    //A. UPload the New Image

                    //Auto Rename our Image
                    //Get the Extension of our image (jpg, png, gif, etc) e.g. "specialfood1.jpg"
                    $ext = end(explode('.', $imageName));

                    //Rename the Image
                    $imageName = "Drink_Product_" . rand(000, 999) . '.' . $ext; // e.g. Drink_Product_834.jpg
                    // đường dẫn nguồn
                    $source_path = $_FILES['image']['tmp_name'];
                    // đường dẫn đích
                    $destination_path = "images/product/" . $imageName;

                    // cuối cùng tải lên hình ảnh
                    $upload = move_uploaded_file($source_path, $destination_path);

                    //Kiểm tra xem hình ảnh có được tải lên hay không
                    //Và nếu hình ảnh không được tải lên thì chúng tôi sẽ dừng quá trình và chuyển hướng với thông báo lỗi
                    if ($upload == false) {
                        //SEt message
                        $_SESSION['upload'] = "<div class='error'>Không tải lên được hình ảnh. </div>";
                        //Redirect to Add Product Page
                        header('location:' . SITEURL . 'admin/manage-product.php');
                        //STop the Process
                        die();
                    }

                    //B. Xóa hình ảnh hiện tại nếu có
                    if ($current_image != "") {
                        $remove_path = "images/product/" . $current_image;

                        $remove = unlink($remove_path);

                        //Kiểm tra xem hình ảnh có bị xóa hay không
                        //Nếu không loại bỏ được thì hiển thị thông báo và dừng quá trình
                        if ($remove == false) {
                            //Failed to remove image
                            $_SESSION['failed-remove'] = "<div class='error'>Không xóa được Hình ảnh hiện tại.</div>";
                            header('location:' . SITEURL . 'admin/manage-Product.php');
                            die(); //Stop the Process
                        }
                    }
                } else {
                    $imageName = $current_image;
                }
            } else {
                $imageName = $current_image;
            }

            //3. Update the Database
            $sql2 = "UPDATE product SET
                    title = '$title',
                    imageName = '$imageName',
                    active = '$active' 
                    WHERE productId='$id'
                ";

            //Execute the Query
            $res2 = mysqli_query($conn, $sql2);

            //4. REdirect to Manage Product with MEssage
            //CHeck whether executed or not
            if ($res2 == true) {
                //Product Updated
                $_SESSION['update'] = "<div class='success'>Đã cập nhật sản phẩm thành công.</div>";
                header('location:' . SITEURL . 'admin/manage-Product.php');
            } else {
                //failed to update Product
                $_SESSION['update'] = "<div class='error'>Không cập nhật được sản phẩm.</div>";
                header('location:' . SITEURL . 'admin/manage-product.php');
            }
        }
        ?>

    </div>
</div>
<?php include('includesAdmin/footer.php');
ob_end_flush();
?>