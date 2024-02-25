<?php
require('top.php');
if (!isset($_SESSION['USER_LOGIN'])) {
?>
    <script>
        window.location.href = 'index.php';
    </script>
<?php
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Page</title>
</head>

<body>
    <?php
    $accordion_class = 'accordion__title';
    if (isset($_SESSION['USER_LOGIN'])) {
        $accordion_class = 'accordion__hide';
    ?>
        <div class="container mt-5">
            <span>Order Details</span>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Order Date</th>
                        <th>Address</th>
                        <th>Payment Type</th>
                        <th>Payment Status</th>
                        <th>Order Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $uid = $_SESSION['USER_ID'];
                    $res = mysqli_query($con, "select `order`.*,order_status.name as order_status_str from `order`,order_status where `order`.user_id='$uid' and order_status.id=`order`.order_status");
                    while ($row = mysqli_fetch_assoc($res)) {
                    ?>
                        <tr>
                            <td><a href="my_order_details.php?id=<?php echo $row['id'] ?>">Products</a></td>
                            <td><?php echo $row['added_on'] ?></td>
                            <td><?php echo $row['address'] ?><br />
                                <?php echo $row['city'] ?><br />
                                <?php echo $row['pincode'] ?></td>
                            <td><?php echo $row['payment_type'] ?></td>
                            <td><?php echo $row['payment_status'] ?></td>
                            <td><?php echo $row['order_status_str'] ?></td>
                        </tr>
                    <?php } ?>
                    <!-- Add more rows for additional orders -->
                </tbody>
            </table>
        </div>
    <?php } ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php require('footer.php') ?>