<?php
//Include Constants File
include('../includes/connection.php');

//echo "Delete Page";
//Check whether the id and imageName value is set or not
if (isset($_GET['id']) and isset($_GET['imageName'])) {
    //Get the Value and Delete
    //echo "Get Value and Delete";
    $id = $_GET['id'];
    $imageName = $_GET['imageName'];
    //Remove the physical image file is available
    if ($imageName != "") {
        //Image is Available. So remove it
        $path = "images/product/" . $imageName;
        //REmove the Image
        $remove = unlink($path);


        //IF failed to remove image then add an error message and stop the process
        if ($remove == false) {
            //Set the SEssion Message
            $_SESSION['remove'] = "<div class='error'>Failed to Remove product Image.</div>";
            //REdirect to Manage product page
            header('location:' . SITEURL . 'admin/manage-product.php');
            //Stop the Process
            die();
        }
    }

    //Delete Data from Database
    //SQL Query to Delete Data from Database
    $sql = "DELETE FROM product WHERE productId=$id";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    //Check whether the data is delete from database or not
    if ($res == true) {
        //SEt Success MEssage and REdirect
        $_SESSION['delete'] = "<div class='success'>Sản phẩm đã được xóa thành công.</div>";
        //Redirect to Manage product
        header('location:' . SITEURL . 'admin/manage-product.php');
    } else {
        //SEt Fail MEssage and Redirecs
        $_SESSION['delete'] = "<div class='error'>Không xóa được sản phẩm.</div>";
        //Redirect to Manage product
        header('location:' . SITEURL . 'admin/manage-product.php');
    }
} else {
    //redirect to Manage product Page
    header('location:' . SITEURL . 'admin/manage-product.php');
}
