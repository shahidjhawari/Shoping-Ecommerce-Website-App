<?php
require('top.php');
if (!isset($_SESSION['USER_LOGIN'])) {
?>
    <script>
        window.location.href = 'index.php';
    </script>
<?php
exit(); // Add exit to stop further execution if not logged in
}
$order_id = get_safe_value($con, $_GET['id']);
?>

<div class="container mt-5">
    <span>Product Details</span>
    <div class="table-responsive"> <!-- Added class for responsiveness -->
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
                $res = mysqli_query($con, "SELECT DISTINCT order_detail.id, order_detail.*, product.name, product.image FROM order_detail INNER JOIN product ON order_detail.product_id = product.id INNER JOIN `order` ON order_detail.order_id = `order`.id WHERE order_detail.order_id = '$order_id' AND `order`.user_id = '$uid'");
                $total_price = 0;
                while ($row = mysqli_fetch_assoc($res)) {
                    $total_price += ($row['qty'] * $row['price']);
                ?>
                    <tr>
                        <td><img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $row['image'] ?>" class="img-thumbnail" width="100"></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['qty'] ?></td>
                        <td><?php echo $row['price'] ?></td>
                        <td><?php echo $row['qty'] * $row['price'] ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="4" class="text-right">Total Price:</td>
                    <td><?php echo $total_price ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php require('footer.php') ?>
