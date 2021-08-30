<?php
ob_start();
include('../includes/connection.php');
include('permission-admin.php');
include('includesAdmin/header.php');
?>
<div class="main-content">
    <div class="wrapper">
        <h2>Quản Lý Đơn Hàng</h2>

        <br /><br /><br />

        <?php
        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        ?>
        <br><br>

        <table class="tbl-full">
            <tr>
                <th>STT</th>
                <th>Đồ uống</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng tiền</th>
                <th>Ngày đặt</th>
                <th>Trạng thái</th>
                <th>Tên khách</th>
                <th>Số ĐT</th>
                <th>Địa chỉ</th>
                <th>Hành Động</th>
            </tr>

            <?php
            //Get all the orders from database
            $sql = "SELECT * FROM orders ORDER BY orderId DESC"; // DIsplay the Latest Order at First
            //Execute Query
            $res = mysqli_query($conn, $sql);
            //Count the Rows
            $count = mysqli_num_rows($res);

            $stt = 1; //Create a Serial Number and set its initail value as 1

            if ($count > 0) {
                //Order Available
                while ($row = mysqli_fetch_assoc($res)) {
                    //Get all the order details
                    $id = $row['orderId'];
                    $drink = $row['drink'];
                    $price = $row['price'];
                    $qty = $row['quantity'];
                    $total = $row['total'];
                    $order_date = $row['orderDate'];
                    $status = $row['status'];
                    $customer_name = $row['customerName'];
                    $customer_phone = $row['customerPhone'];
                    $customer_address = $row['customerAddress'];

            ?>

                    <tr>
                        <td><?php echo $stt++; ?>. </td>
                        <td><?php echo $drink; ?></td>
                        <td><?php echo $price; ?></td>
                        <td><?php echo $qty; ?></td>
                        <td><?php echo $total; ?></td>
                        <td><?php echo $order_date; ?></td>

                        <td>
                            <?php
                            // Ordered, On Delivery, Delivered, Cancelled

                            if ($status == "Ordered") {
                                echo "<label>$status</label>";
                            } elseif ($status == "On Delivery") {
                                echo "<label style='color: orange;'>$status</label>";
                            } elseif ($status == "Delivered") {
                                echo "<label style='color: green;'>$status</label>";
                            } elseif ($status == "Cancelled") {
                                echo "<label style='color: red;'>$status</label>";
                            }
                            ?>
                        </td>

                        <td><?php echo $customer_name; ?></td>
                        <td><?php echo $customer_phone; ?></td>
                        <td><?php echo $customer_address; ?></td>
                        <td>
                            <a href="update-order.php?id=<?php echo $id; ?>" class="btn-secondary">Cập nhập đơn hàng</a>
                        </td>
                    </tr>

            <?php

                }
            } else {
                //Order not Available
                echo "<tr><td colspan='12' class='error'>Chưa có đơn đặt hàng</td></tr>";
            }
            ?>


        </table>
    </div>

</div>

<?php include('includesAdmin/footer.php');
ob_end_flush();
?>