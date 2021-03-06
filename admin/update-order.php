<?php
ob_start();
include('../includes/connection.php');
include('permission-admin.php');
include('includesAdmin/header.php');
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Cập Nhập Đơn Hàng</h1>
        <br><br>


        <?php

        //CHeck whether id is set or not
        if (isset($_GET['id'])) {
            //GEt the Order Details
            $id = $_GET['id'];

            //Get all other details based on this id
            //SQL Query to get the order details
            $sql = "SELECT * FROM orders WHERE orderId='$id'";
            //Execute Query
            $res = mysqli_query($conn, $sql);
            //Count Rows
            $count = mysqli_num_rows($res);

            if ($count == 1) {
                //Detail Availble
                $row = mysqli_fetch_assoc($res);
                $drink = $row['drink'];
                $price = $row['price'];
                $quantity = $row['quantity'];
                $status = $row['status'];
                $customer_name = $row['customerName'];
                $customerPhone = $row['customerPhone'];
                $customer_address = $row['customerAddress'];
            } else {
                //DEtail not Available/
                //Redirect to Manage Order
                header('location: manage-order.php');
            }
        } else {
            //REdirect to Manage ORder PAge
            header('location: manage-order.php');
        }

        ?>

        <form action="update-order.php" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Đồ uống</td>
                    <td><b> <?php echo $drink; ?> </b></td>
                </tr>

                <tr>
                    <td>Price</td>
                    <td>
                        <b> $ <?php echo $price; ?></b>
                    </td>
                </tr>

                <tr>
                    <td>Số lượng</td>
                    <td>
                        <input type="number" name="qty" value="<?php echo $quantity; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Status</td>
                    <td>
                        <select name="status">
                            <option <?php if ($status == "Đã đặt hàng") {
                                        echo "selected";
                                    } ?> value="Đã đặt hàng">Đã đặt hàng</option>
                            <option <?php if ($status == "Đang giao") {
                                        echo "selected";
                                    } ?> value="Đang giao">Đang giao</option>
                            <option <?php if ($status == "Đã giao") {
                                        echo "selected";
                                    } ?> value="Đã giao">Đã giao</option>
                            <option <?php if ($status == "Đã huỷ") {
                                        echo "selected";
                                    } ?> value="Đã huỷ">Đã huỷ</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Họ tên: </td>
                    <td>
                        <input type="text" name="customer_name" value="<?php echo $customer_name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Số ĐT: </td>
                    <td>
                        <input type="text" name="customerPhone" value="<?php echo $customerPhone; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Địa chỉ: </td>
                    <td>
                        <textarea name="customer_address" cols="30" rows="5"><?php echo $customer_address; ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td clospan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <input type="submit" name="submit" value="Cập nhập đơn hàng" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>


        <?php
        //CHeck whether Update Button is Clicked or Not
        if (isset($_POST['submit'])) {
            $updateId = $_POST['id'];
            //echo "Clicked";
            //Get All the Values from Form
            $price = $_POST['price'];
            $qty = $_POST['qty'];

            $total = $price * $qty;

            $status = $_POST['status'];

            $customer_name = $_POST['customer_name'];
            $customerPhone = $_POST['customerPhone'];
            $customer_address = $_POST['customer_address'];

            //Update the Values
            $sql2 = "UPDATE orders SET 
                    quantity = '$qty',
                    total = '$total',
                    status = '$status',
                    customerName = '$customer_name',
                    customerPhone = '$customerPhone',
                    customerAddress = '$customer_address'
                    WHERE orderId='$updateId'
                ";

            //Execute the Query
            $res2 = mysqli_query($conn, $sql2);

            //CHeck whether update or not
            //And REdirect to Manage Order with Message
            if ($res2 == true) {
                //Updated
                $_SESSION['update'] = "<div class='success text text-center'>Đã cập nhật đơn hàng thành công.</div>";
                header('location: manage-order.php');
            } else {
                //Failed to Update
                $_SESSION['update'] = "<div class='error text text-center'>Không cập nhật được đơn đặt hàng.</div>";
                header('location: manage-order.php');
            }
        }
        ?>


    </div>
</div>
<?php include('includesAdmin/footer.php');
ob_end_flush();
?>