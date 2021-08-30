<?php
ob_start();
include('../includes/connection.php');
include('permission-admin.php');
include('includesAdmin/header.php');
?>
<?php
//CHeck whether drinkId is set or not 
if (isset($_GET['id'])) {
    //Get all the details
    $drinkId = $_GET['id'];

    //SQL Query to Get the Selected drink
    $sql2 = "SELECT * FROM drink WHERE drinkId=$drinkId";
    //execute the Query
    $res2 = mysqli_query($conn, $sql2);

    //Get the value based on query executed
    $row2 = mysqli_fetch_assoc($res2);

    //Get the IndivdrinkIdual Values of Selected drink
    $title = $row2['title'];
    $description = $row2['description'];
    $price = $row2['price'];
    $current_image = $row2['imageName'];
    $current_product = $row2['productId'];
    $active = $row2['active'];
} else {
    //Redirect to Manage drink
    header('location: manage-drink.php');
}
?>


<div class="main-content">
    <div class="wrapper">
        <h2>Cập nhập đồ uống</h2>
        <br><br>

        <form action="update-drink.php" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">

                <tr>
                    <td>Tiêu đề: </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Mô tả: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5"><?php echo $description; ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Giá: </td>
                    <td>
                        <input type="number" name="price" value="<?php echo $price; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Ảnh hiện tại: </td>
                    <td>
                        <?php
                        if ($current_image == "") {
                            //Image not Available 
                            echo "<div class='error'>Image not Available.</div>";
                        } else {
                            //Image Available
                        ?>
                            <img src="images/drink/<?php echo $current_image; ?>" wdrinkIdth="150px">
                        <?php
                        }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>Chọn ảnh mới: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Sản phẩm: </td>
                    <td>
                        <select name="product">

                            <?php
                            //Query to Get ACtive Categories
                            $sql = "SELECT * FROM product WHERE active='Yes'";
                            //Execute the Query
                            $res = mysqli_query($conn, $sql);
                            //Count Rows
                            $count = mysqli_num_rows($res);

                            //Check whether product available or not
                            if ($count > 0) {
                                //product Available
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $product_title = $row['title'];
                                    $productId = $row['productId'];

                                    //echo "<option value='$productId'>$product_title</option>";
                            ?>
                                    <option <?php if ($current_product == $productId) {
                                                echo "selected";
                                            } ?> value="<?php echo $productId; ?>"><?php echo $product_title; ?></option>
                            <?php
                                }
                            } else {
                                //product Not Available
                                echo "<option value='0'>Sản phẩm không tồn tại.</option>";
                            }

                            ?>

                        </select>
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
                        <input type="hidden" name="drinkId" value="<?php echo $drinkId; ?>">
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">

                        <input type="submit" name="submit" value="Cập nhập đồ uống" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>

        <?php

        if (isset($_POST['submit'])) {
            //echo "Button Clicked";

            //1. Get all the details from the form
            $drinkId = $_POST['drinkId'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $current_image = $_POST['current_image'];
            $product = $_POST['product'];
            $active = $_POST['active'];

            //2. Upload the image if selected

            //CHeck whether upload button is clicked or not
            if (isset($_FILES['image']['name'])) {
                //Upload BUtton Clicked
                $imageName = $_FILES['image']['name']; //New Image NAme

                //CHeck whether th file is available or not
                if ($imageName != "") {
                    //IMage is Available
                    //A. Uploading New Image

                    //REname the Image
                    $ext = end(explode('.', $imageName)); //Gets the extension of the image

                    $imageName = "Drink_Name_" . rand(0000, 9999) . '.' . $ext; //THis will be renamed image

                    //Get the Source Path and DEstination PAth
                    $src_path = $_FILES['image']['tmp_name']; //Source Path
                    $dest_path = "images/drink/" . $imageName; //DEstination Path

                    //Upload the image
                    $upload = move_uploaded_file($src_path, $dest_path);

                    /// CHeck whether the image is uploaded or not
                    if ($upload == false) {
                        //FAiled to Upload
                        $_SESSION['upload'] = "<div class='error text text-center'>Không tải lên được hình ảnh mới.</div>";
                        //REdirect to Manage drink 
                        header('location: manage-drink.php');
                        //Stop the Process
                        die();
                    }
                    //3. Remove the image if new image is uploaded and current image exists
                    //B. Remove current Image if Available
                    if ($current_image != "") {
                        //Current Image is Available
                        //REmove the image
                        $remove_path = "images/drink/" . $current_image;

                        $remove = unlink($remove_path);

                        //Check whether the image is removed or not
                        if ($remove == false) {
                            //failed to remove current image
                            $_SESSION['remove-failed'] = "<div class='error text text-center'>Xoá hình ảnh hiện tại không thành công.</div>";
                            //redirect to manage drink
                            header('location: manage-drink.php');
                            //stop the process
                            die();
                        }
                    }
                } else {
                    $imageName = $current_image; //Default Image when Image is Not Selected
                }
            } else {
                $imageName = $current_image; //Default Image when Button is not Clicked
            }



            //4. Update the drink in Database
            $sql3 = "UPDATE drink SET 
                    title = '$title',
                    description = '$description',
                    price = '$price',
                    imageName = '$imageName',
                    productId = '$productId',
                    active = '$active'
                    WHERE drinkId='$drinkId'
                ";

            //Execute the SQL Query
            $res3 = mysqli_query($conn, $sql3);

            //CHeck whether the query is executed or not 
            if ($res3 == true) {
                //Query Exectued and drink Updated
                $_SESSION['update'] = "<div class='success text text-center'>Đồ uống được cập nhập thành công.</div>";
                header('location: manage-drink.php');
            } else {
                //Failed to Update drink
                $_SESSION['update'] = "<div class='error text text-center'>Không cập nhật được đồ uống.</div>";
                header('location: manage-drink.php');
            }
        }

        ?>

    </div>
</div>
<?php include('includesAdmin/footer.php');
ob_end_flush();
?>