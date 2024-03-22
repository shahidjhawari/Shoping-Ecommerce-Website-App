<?php
require('top.php');
if (!isset($_SESSION['USER_LOGIN'])) {
?>
	<script>
		window.location.href = 'login.php';
	</script>
<?php
}
?>

<script>
    window.onload = function() {
			window.scrollTo(0, 450);
		};
</script>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <!-- User Name Section -->

                <?php if (isset($_SESSION['USER_LOGIN'])) {
                ?>
                    <h2>Welcome <strong><?php echo $_SESSION['USER_NAME'] ?></strong></h2>
                <?php
                } else {
                    echo '
                    <div class="card mb-3">
                    <div class="card">
                    <div class="card-body">
                    <a href="login.php" class="card-title">Please login/registration</a>
                    <!-- Add user profile information and edit options here -->
                </div>';
                }
                ?>
            </div>
        </div>
    </div>
    <div class="col-md-8">

        <!-- My Profile Section -->
        <?php if (isset($_SESSION['USER_LOGIN'])) {
        ?>
            <div class="card mb-3">
                <div class="card-body">
                    <a href="profile.php" class="card-title">My Profile</a>
                    <!-- Add user profile information and edit options here -->
                </div>
            </div>
        <?php } ?>

        <!-- My Orders Section -->
        <div class="card">
            <div class="card-body">
                <a href="my_order.php" class="card-title">My Orders</a>
                <!-- Add your order details here -->
            </div>
        </div>
        <!-- Logout Section -->
        <div class="card mt-3 mb-2">
            <div class="card-body">
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
    </div>
    </div>


<?php require('footer.php') ?>