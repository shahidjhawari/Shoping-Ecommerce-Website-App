<?php
require('top.php');
if (!isset($_SESSION['USER_LOGIN'])) {
?>
    <script>
        window.location.href = 'index.php';
    </script>
<?php
}
$uid = $_SESSION['USER_ID'];

$res = mysqli_query($con, "select product.name,product.image,product.price,product.mrp,wishlist.id from product,wishlist where wishlist.product_id=product.id and wishlist.user_id='$uid'");
?>

<div class="container mt-5">
    <span>My Wishlist</span>
    <table class="table">
        <thead>
            <tr>
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($res)) {
            ?>
                <tr>
                    <td><img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $row['image'] ?>" height="100px" width="70px"></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['price'] ?></td>
                    <td><a href="wishlist.php?wishlist_id=<?php echo $row['id'] ?>" class="btn btn-danger">Remove</a></td>
                </tr>
            <?php } ?>
            <!-- Add more rows as needed -->
        </tbody>
    </table>

</div>






<?php require('footer.php') ?>