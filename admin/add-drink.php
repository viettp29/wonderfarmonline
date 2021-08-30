<?php
ob_start();
include('../includes/connection.php');
include('permission-admin.php');
include('includesAdmin/header.php');
?>
<div class="main-content">
    <div class="wrapper">
        <h2>Thêm Đồ Uống</h2>

        <br><br>

        <?php
        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        ?>

        <form action="add-drink.php" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">

                <tr>
                    <td>Tiêu đề: </td>
                    <td>
                        <input type="text" name="title" placeholder="Tiêu đề của sản phẩm">
                    </td>
                </tr>

                <tr>
                    <td>Mô tả: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Mô tả của sản phẩm"></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Giá: </td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>

                <tr>
                    <td>Chọn ảnh: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Sản phẩm: </td>
                    <td>
                        <select name="product">

                            <?php
                            //Create PHP Code to display product from Database
                            //1. CReate SQL to get all active product from database
                            $sql = "SELECT * FROM product WHERE active='Yes'";

                            //Executing qUery
                            $res = mysqli_query($conn, $sql);

                            //Count Rows to check whether we have product or not
                            $count = mysqli_num_rows($res);

                            //IF count is greater than zero, we have product else we donot have product
                            if ($count > 0) {
                                //WE have product
                                while ($row = mysqli_fetch_assoc($res)) {
                                    //get the details of product
                                    $productId = $row['productId'];
                                    $title = $row['title'];

                            ?>

                                    <option value="<?php echo $productId; ?>"><?php echo $title; ?></option>

                                <?php
                                }
                            } else {
                                //WE do not have product
                                ?>
                                <option value="0">Không tìm thấy sản phẩm</option>
                            <?php
                            }


                            //2. Display on Drpopdown
                            ?>

                        </select>
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
                        <input type="submit" name="submit" value="Thêm sản phẩm" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>


        <?php

        //CHeck whether the button is clicked or not
        if (isset($_POST['submit'])) {
            //Add the Drink in Database
            //echo "Clicked";

            //1. Get the DAta from Form
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $product = $_POST['product'];

            if (isset($_POST['active'])) {
                $active = $_POST['active'];
            } else {
                $active = "No"; //Setting Default Value
            }

            //2. Upload the Image if selected
            //Check whether the select image is clicked or not and upload the image only if the image is selected
            if (isset($_FILES['image']['name'])) {
                //Get the details of the selected image
                $imageName = $_FILES['image']['name'];

                //Check Whether the Image is Selected or not and upload image only if selected
                if ($imageName != "") {
                    // Image is SElected
                    //A. REnamge the Image
                    //Get the extension of selected image (jpg, png, gif, etc.) "vijay-thapa.jpg" vijay-thapa jpg
                    $ext = end(explode('.', $imageName));

                    // Create New Name for Image
                    $imageName = "Drink-Name-" . rand(0000, 9999) . "." . $ext; //New Image Name May Be "Drink-Name-657.jpg"

                    //B. Upload the Image
                    //Get the Src Path and DEstinaton path

                    // Source path is the current location of the image
                    $src = $_FILES['image']['tmp_name'];

                    //Destination Path for the image to be uploaded
                    $dst = "images/drink/" . $imageName;

                    //Finally Uppload the Drink image
                    $upload = move_uploaded_file($src, $dst);

                    //check whether image uploaded of not
                    if ($upload == false) {
                        //Failed to Upload the image
                        //REdirect to Add Drink Page with Error Message
                        $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
                        header('location: ' . SITEURL . 'admin/add-drink.php');
                        //STop the process
                        die();
                    }
                }
            } else {
                $imageName = ""; //SEtting DEfault Value as blank
            }

            //3. Insert Into Database

            //Create a SQL Query to Save or Add Drink
            // For Numerical we do not need to pass value inside quotes '' But for string value it is compulsory to add quotes ''
            $sql2 = "INSERT INTO drink SET 
                    title = '$title',
                    description = '$description',
                    price = $price,
                    imageName = '$imageName',
                    productId = $product,
                    active = '$active'
                ";

            //Execute the Query
            $res2 = mysqli_query($conn, $sql2);

            //CHeck whether data inserted or not
            //4. Redirect with MEssage to Manage Drink page
            if ($res2 == true) {
                //Data inserted Successfullly
                $_SESSION['add'] = "<div class='success'>Thêm đồ uống thành công.</div>";
                header('location: manage-drink.php');
            } else {
                //FAiled to Insert Data
                $_SESSION['add'] = "<div class='error'>Thêm đồ uống thất bại.</div>";
                header('location: manage-drink.php');
            }
        }

        ?>


    </div>
</div>
<?php include('includesAdmin/footer.php');
ob_end_flush();
?>