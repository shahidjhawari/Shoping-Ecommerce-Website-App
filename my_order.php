<?php
require('top.php');
if (!isset($_SESSION['USER_LOGIN'])) {
?>
    <script>
        window.location.href = 'login.php';
    </script>
<?php
    exit();
}

$accordion_class = 'accordion__title';
if (isset($_SESSION['USER_LOGIN'])) {
    $accordion_class = 'accordion__hide';
?>

    <style>
        .order-status {
            animation: slideInLeft 0.5s ease forwards;
            margin-bottom: 10px;
        }

        @keyframes slideInLeft {
            from {
                transform: translateX(-100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @media (max-width: 768px) {
            .order-status {
                text-align: center;
            }
        }
    </style>
    <div class="container mt-5">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <?php
                    $uid = $_SESSION['USER_ID'];
                    $res = mysqli_query($con, "SELECT `order`.*, order_status.name AS order_status_str FROM `order` INNER JOIN order_status ON order_status.id = `order`.order_status WHERE `order`.user_id='$uid'");
                    if (mysqli_num_rows($res) > 0) {
                        while ($row = mysqli_fetch_assoc($res)) {
                    ?>
                            <tr>
                                <th colspan="6"><a class="order-status btn btn-warning" href="my_order_details.php?id=<?php echo $row['id'] ?>">Your Order <?php echo $row['id'] ?> Is : <?php echo $row['order_status_str'] ?></a></th>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='6'>No orders found</td></tr>";
                    }
                    ?>
                    <tr>
                        <th>Order ID</th>
                        <th>Order Date</th>
                        <th>Payment Type</th>
                        <th>Payment Status</th>
                        <th>Order Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $uid = $_SESSION['USER_ID'];
                    $res = mysqli_query($con, "SELECT `order`.*, order_status.name AS order_status_str FROM `order` INNER JOIN order_status ON order_status.id = `order`.order_status WHERE `order`.user_id='$uid'");
                    if (mysqli_num_rows($res) > 0) {
                        while ($row = mysqli_fetch_assoc($res)) {
                    ?>
                            <tr>
                                <td><a href="my_order_details.php?id=<?php echo $row['id'] ?>" class="btn btn-primary btn-sm"><?php echo $row['id'] ?></a></td>
                                <td><?php echo $row['added_on'] ?></td>
                                <td><?php echo $row['payment_type'] ?></td>
                                <td><?php echo $row['payment_status'] ?></td>
                                <td><?php echo $row['order_status_str'] ?></td>
                            </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="6">
                            Full Name : <?php echo $row['address'] ?><br>
                            Phone Number : <?php echo $row['city'] ?><br>
                            Address : <?php echo $row['pincode'] ?><br>
                            <a href="my_order_details.php?id=<?php echo $row['id'] ?>" class="btn btn-primary btn-sm">Check Order Detail</a><br>
                        </th>
                    </tr>
                </tfoot>
        <?php
                        }
                    } else {
                        echo "<tr><td colspan='6'>No orders found</td></tr>";
                    }
        ?>
            </table>
        </div>
    </div>

<?php } ?>

<?php require('footer.php') ?>