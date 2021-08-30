<?php
ob_start();
include('../includes/connection.php');
include('permission-admin.php');
include('includesAdmin/header.php');
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Thêm Sản Phẩm</h1>

        <br><br>

        <?php

        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }

        ?>

        <br><br>

        <!-- Add product image + title -->
        <form action="add-product.php" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Tiêu đề: </td>
                    <td>
                        <input type="text" name="title" placeholder="Product Title">
                    </td>
                </tr>

                <tr>
                    <td>Chọn ảnh: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Còn hoạt động: </td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Product" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>
        <!-- Add Product Form Ends -->

        <?php

        //CHeck whether the Submit Button is Clicked or Not
        if (isset($_POST['submit'])) {
            //echo "Clicked";

            //1. Get the Value from Product Form
            $title = $_POST['title'];

            if (isset($_POST['active'])) {
                $active = $_POST['active'];
            } else {
                $active = "No";
            }

            //Check whether the image is selected or not and set the value for image name accoridingly
            //print_r($_FILES['image']);

            //die();//Break the Code Here
            // biến này dùng để lấy thông tin từ file upload
            if (isset($_FILES['image']['name'])) {
                //Upload the Image
                //Để tải lên hình ảnh, chúng ta cần tên hình ảnh, đường dẫn nguồn và đường dẫn đích
                $image_name = $_FILES['image']['name'];

                // Upload the Image only if image is selected
                if ($image_name != "") {

                    //Auto Rename our Image
                    //Get the Extension of our image (jpg, png, gif, etc) e.g. "specialfood1.jpg"
                    $ext = end(explode('.', $image_name));

                    //Rename the Image
                    $image_name = "Drink_Product_" . rand(000, 999) . '.' . $ext; // e.g. drink_Product_834.jpg


                    $source_path = $_FILES['image']['tmp_name'];

                    $destination_path = "images/product/" . $image_name;

                    //Finally Upload the Image
                    $upload = move_uploaded_file($source_path, $destination_path);

                    //Check whether the image is uploaded or not
                    //And if the image is not uploaded then we will stop the process and redirect with error message
                    if ($upload == false) {
                        //SEt message
                        $_SESSION['upload'] = "<div class='error'>Upload ảnh không thành công! </div>";
                        //Redirect to Add Product Page
                        header('location: add-product.php');
                        //STop the Process
                        die();
                    }
                }
            } else {
                //Don't Upload Image and set the image_name value as blank
                $image_name = "";
            }

            //2. Create SQL Query to Insert Product into Database
            $sql = "INSERT INTO product SET 
                    title='$title',
                    imageName='$image_name',
                    active='$active'
                ";

            //3. Execute the Query and Save in Database
            $res = mysqli_query($conn, $sql);

            //4. Check whether the query executed or not and data added or not
            if ($res == true) {
                //Query Executed and Product Added
                $_SESSION['add'] = "<div class='success'>Sản phẩm đã được thêm thành công.</div>";
                //Redirect to Manage Product Page
                header('location: manage-product.php');
            } else {
                //Failed to Add Product
                $_SESSION['add'] = "<div class='error'>Thêm sản phẩm thất bại.</div>";
                //Redirect to Manage Product Page
                header('location: add-product.php');
            }
        }

        ?>

    </div>
</div>

<?php include('includesAdmin/footer.php');
ob_end_flush();
?>