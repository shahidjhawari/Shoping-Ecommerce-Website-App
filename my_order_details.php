<?php
require('top.php');
if (!isset($_SESSION['USER_LOGIN'])) {
?>
    <script>
        window.location.href = 'index.php';
    </script>
<?php
}
$order_id = get_safe_value($con, $_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
</head>

<body>
    <div class="container mt-5">
        <span>Product Details</span>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $uid = $_SESSION['USER_ID'];
                $res = mysqli_query($con, "select distinct(order_detail.id) ,order_detail.*,product.name,product.image from order_detail,product ,`order` where order_detail.order_id='$order_id' and `order`.user_id='$uid' and order_detail.product_id=product.id");
                $total_price = 0;
                while ($row = mysqli_fetch_assoc($res)) {
                    $total_price = $total_price + ($row['qty'] * $row['price']);
                ?>
                    <!-- Replace the following rows with your actual product data -->
                    <tr>
                        <td><img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $row['image'] ?>"" class=" img-thumbnail" width="100"></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['qty'] ?></td>
                        <td><?php echo $row['price'] ?></td>
                        <td><?php echo $row['qty'] * $row['price'] ?></td>
                    </tr>
                <?php } ?>
                <!-- Add more rows for additional products -->
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JavaScript and jQuery (optional) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>



<?php require('footer.php') ?>