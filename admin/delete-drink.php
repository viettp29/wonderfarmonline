<?php
//Include COnstants Page
include('../includes/connection.php');
include('permission-admin.php');
//echo "Delete drink Page";

if (isset($_GET['id']) && isset($_GET['imageName'])) //Either use '&&' or 'AND'
{
    //Process to Delete
    //echo "Process to Delete";

    //1.  Get ID and Image NAme
    $id = $_GET['id'];
    $imageName = $_GET['imageName'];

    //2. Remove the Image if Available
    //CHeck whether the image is available or not and Delete only if available
    if ($imageName != "") {
        // IT has image and need to remove from folder
        //Get the Image Path
        $path = "images/drink/" . $imageName;


        //REmove Image File from Folder
        $remove = unlink($path);
        //Check whether the image is removed or not
        if ($remove == false) {
            //Failed to Remove image
            $_SESSION['upload'] = "<div class='error text text-center'>Xoá ảnh không thành công.</div>";
            //REdirect to Manage drink
            header('location: ' . SITEURL . 'admin/manage-drink.php');
            //Stop the Process of Deleting drink
            die();
        }
    }

    //3. Delete drink from Database
    $sql = "DELETE FROM drink WHERE drinkId=$id";
    //Execute the Query
    $res = mysqli_query($conn, $sql);

    //CHeck whether the query executed or not and set the session message respectively
    //4. Redirect to Manage drink with Session Message
    if ($res == true) {
        //drink Deleted
        $_SESSION['delete'] = "<div class='success text text-center'>Xoá đồ uống thành công.</div>";
        header('location: ' . SITEURL . 'admin/manage-drink.php');
    } else {
        //Failed to Delete drink
        $_SESSION['delete'] = "<div class='error text text-center'>Xoá đồ uống thất bại.</div>";
        header('location: ' . SITEURL . 'admin/manage-drink.php');
    }
} else {
    //Redirect to Manage drink Page
    //echo "REdirect";
    $_SESSION['unauthorize'] = "<div class='error text text-center'>Không có quyền truy cập.</div>";
    header('location: ' . SITEURL . 'admin/manage-drink.php');
}
