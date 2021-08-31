<?php
ob_start();
include('includes/connection.php');
if (isset($_SESSION['user_id']) == false) {
    $_SESSION['login'] = "<div class='error'>Bạn cần tạo tài khoản để đặt được đơn hàng.</div>";
    header("Location: login.php");
} else {
    include('includes/headerUser.php');
}
?>
<?php
//CHeck whether drink id is set or not
if (isset($_GET['drink_id'])) {
    //Get the drink id and details of the selected drink
    $drink_id = $_GET['drink_id'];

    //Get the DEtails of the SElected drink
    $sql = "SELECT * FROM drink WHERE drinkId=$drink_id";
    //Execute the Query
    $res = mysqli_query($conn, $sql);
    //Count the rows
    $count = mysqli_num_rows($res);
    //CHeck whether the data is available or not
    if ($count == 1) {
        //WE Have DAta
        //GEt the Data from Database
        $row = mysqli_fetch_assoc($res);

        $title = $row['title'];
        $price = $row['price'];
        $imageName = $row['imageName'];
    } else {
        //drink not Availabe
        //REdirect to Home Page
        header('location:' . SITEURL);
    }
} else {
    //Redirect to homepage
    header('location:' . SITEURL);
}
?>

<!-- drink sEARCH Section Starts Here -->
<section class="food-search">

</section>
<!-- drink sEARCH Section Ends Here -->
<div class="container" style="background-image:url('images/latte1_2.jpg')">
    <br>
    <!-- <h5 class="text-center text-black">Điền vào biểu mẫu này để xác nhận đơn đặt hàng của bạn.</h5> -->
    <br>
    <form action="" method="POST" class="order" style=" padding-left:2%; padding-bottom:2%">
        <fieldset>
            <legend style="color:#f32fa1">Đồ uống đã chọn</legend>

            <div class="food-menu-img">
                <?php

                //CHeck whether the image is available or not
                if ($imageName == "") {
                    //Image not Availabe
                    echo "<div class='error'>Hình ảnh không có sẵn.</div>";
                } else {
                    //Image is Available
                ?>
                    <img src="admin/images/drink/<?php echo $imageName; ?>" class="img-responsive img-curve">
                <?php
                }
                ?>

            </div>
            <div class="food-menu-desc">
                <h3 style="color:#f32fa1"><?php echo $title; ?></h3>
                <input type="hidden" name="drink" value="<?php echo $title; ?>">

                <p class="food-price" style="color:#f32fa1">$<?php echo $price; ?></p>
                <input type="hidden" name="price" value="<?php echo $price;
                                                            if (isset($_POST['quantity'])) {
                                                                echo $price = $price * $_POST['quantity'];
                                                            } ?>">

                <div class="order-label" style="color:#f32fa1">Số lượng</div>
                <input type="number" name="quantity" class="input-responsive" value="1">


            </div>

        </fieldset>

        <fieldset>
            <legend style="color:#f32fa1">Chi tiết giao hàng</legend>
            <div class="order-label" style="color:#f32fa1">Họ tên</div>
            <input type="text" name="full-name" placeholder="E.g. Vijay Thapa" class="input-responsive" required>

            <div class="order-label" style="color:#f32fa1">Số ĐT</div>
            <input type="tel" name="phone" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

            <div class="order-label" style="color:#f32fa1">Địa chỉ</div>
            <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

            <input type="submit" name="submit" value="Xác nhận đặt hàng" class="btn btn-danger">
        </fieldset>

    </form>

    <?php

    //CHeck whether submit button is clicked or not
    if (isset($_POST['submit'])) {
        // Get all the details from the form

        $drink = $_POST['drink'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];

        $total = $price; // total = price x quantity 

        $order_date = date("Y-m-d h:i:sa"); //Order DAte

        $status = "Đã đặt hàng";  // Ordered, On Delivery, Delivered, Cancelled

        $customer_name = $_POST['full-name'];
        $customer_phone = $_POST['phone'];
        $customer_address = $_POST['address'];
        $userId = $_SESSION['user_id'];
        //Save the Order in Databaase
        //Create SQL to save the data
        $sql2 = "INSERT INTO `orders` (`drink`, `price`, `quantity`, `total`, `orderDate`, `status`, `customerName`, `customerPhone`, `customerAddress`, `userId`) 
        VALUES ('$drink', '$price', '$quantity', '$total', '$order_date', '$status', '$customer_name', '$customer_phone', '$customer_address', '$userId');";

        // $sql2 = "INSERT INTO orders  values(
        //          '$drink','$price','$quantity','$total','$order_date','$status', '$customer_name','$customer_phone','$customer_address','$userId' )
        //     ";

        //echo $sql2; die();

        //Execute the Query
        $res2 = mysqli_query($conn, $sql2);

        //Check whether query executed successfully or not
        if (!$res2) {
            //Failed to Save Order
            $_SESSION['order'] = "<div class='error text-center'>Không đặt được đồ uống.</div>";
            header('location: homeUser.php');
        } else {
            //Query Executed and Order Saved
            $_SESSION['order'] = "<div class='success text-center'>Bạn đã đặt hàng thành công.</div>";
            header('location: homeUser.php');
        }
    }

    ?>

</div>

<!-- fOOD Menu Section Ends Here -->
<?php include 'includes/footer.php';
ob_end_flush();
?>