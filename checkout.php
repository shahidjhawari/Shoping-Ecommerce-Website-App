<?php
require('top.php');
if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
?>
	<script>
		window.location.href = 'index.php';
	</script>
	<?php
}

$cart_total = 0;

if (isset($_POST['submit'])) {
	$address = get_safe_value($con, $_POST['address']);
	$city = get_safe_value($con, $_POST['city']);
	$pincode = get_safe_value($con, $_POST['pincode']);
	$payment_type = get_safe_value($con, $_POST['payment_type']);
	$user_id = $_SESSION['USER_ID'];
	foreach ($_SESSION['cart'] as $key => $val) {
		$productArr = get_product($con, '', '', $key);
		$price = $productArr[0]['price'];
		$qty = $val['qty'];
		$cart_total = $cart_total + ($price * $qty);
	}
	$total_price = $cart_total;
	$payment_status = 'pending';
	if ($payment_type == 'cod') {
		$payment_status = 'success';
	}
	$order_status = '1';
	$added_on = date('Y-m-d h:i:s');

	$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);


	mysqli_query($con, "insert into `order`(user_id,address,city,pincode,payment_type,payment_status,order_status,added_on,total_price,txnid) values('$user_id','$address','$city','$pincode','$payment_type','$payment_status','$order_status','$added_on','$total_price','$txnid')");

	$order_id = mysqli_insert_id($con);

	foreach ($_SESSION['cart'] as $key => $val) {
		$productArr = get_product($con, '', '', $key);
		$price = $productArr[0]['price'];
		$qty = $val['qty'];

		mysqli_query($con, "insert into `order_detail`(order_id,product_id,qty,price) values('$order_id','$key','$qty','$price')");
	}

	unset($_SESSION['cart']);

	if ($payment_type == 'payu') {
		$MERCHANT_KEY = "gtKFFx";
		$SALT = "eCwWELxi";
		$hash_string = '';
		//$PAYU_BASE_URL = "https://secure.payu.in";
		$PAYU_BASE_URL = "https://test.payu.in";
		$action = '';
		$posted = array();
		if (!empty($_POST)) {
			foreach ($_POST as $key => $value) {
				$posted[$key] = $value;
			}
		}

		$userArr = mysqli_fetch_assoc(mysqli_query($con, "select * from users where id='$user_id'"));

		$formError = 0;
		$posted['txnid'] = $txnid;
		$posted['amount'] = $total_price;
		$posted['firstname'] = $userArr['name'];
		$posted['email'] = $userArr['email'];
		$posted['phone'] = $userArr['mobile'];
		$posted['productinfo'] = "productinfo";
		$posted['key'] = $MERCHANT_KEY;
		$hash = '';
		$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
		if (empty($posted['hash']) && sizeof($posted) > 0) {
			if (
				empty($posted['key'])
				|| empty($posted['txnid'])
				|| empty($posted['amount'])
				|| empty($posted['firstname'])
				|| empty($posted['email'])
				|| empty($posted['phone'])
				|| empty($posted['productinfo'])

			) {
				$formError = 1;
			} else {
				$hashVarsSeq = explode('|', $hashSequence);
				foreach ($hashVarsSeq as $hash_var) {
					$hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
					$hash_string .= '|';
				}
				$hash_string .= $SALT;
				$hash = strtolower(hash('sha512', $hash_string));
				$action = $PAYU_BASE_URL . '/_payment';
			}
		} elseif (!empty($posted['hash'])) {
			$hash = $posted['hash'];
			$action = $PAYU_BASE_URL . '/_payment';
		}


		$formHtml = '<form method="post" name="payuForm" id="payuForm" action="' . $action . '"><input type="hidden" name="key" value="' . $MERCHANT_KEY . '" /><input type="hidden" name="hash" value="' . $hash . '"/><input type="hidden" name="txnid" value="' . $posted['txnid'] . '" /><input name="amount" type="hidden" value="' . $posted['amount'] . '" /><input type="hidden" name="firstname" id="firstname" value="' . $posted['firstname'] . '" /><input type="hidden" name="email" id="email" value="' . $posted['email'] . '" /><input type="hidden" name="phone" value="' . $posted['phone'] . '" /><textarea name="productinfo" style="display:none;">' . $posted['productinfo'] . '</textarea><input type="hidden" name="surl" value="' . SITE_PATH . 'payment_complete.php" /><input type="hidden" name="furl" value="' . SITE_PATH . 'payment_fail.php"/><input type="submit" style="display:none;"/></form>';
		echo $formHtml;
		echo '<script>document.getElementById("payuForm").submit();</script>';
	} else {

	?>
		<script>
			window.location.href = 'thank_you.php';
		</script>
<?php
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Checkout Page</title>
	<!-- Add Bootstrap CSS Link -->
	<style>
		.mylogin {
			display: inline-block;
			justify-content: center;
			align-content: center;
		}

		.btn-primary {
			margin-bottom: 20px;
		}
	</style>
</head>

<body>
	<?php
	$accordion_class = 'accordion__title';
	if (!isset($_SESSION['USER_LOGIN'])) {
		$accordion_class = 'accordion__hide';
	?>
		<script>
			window.location.href = 'login.php';
		</script>
	<?php } ?>

	<?php
	$accordion_class = 'accordion__title';
	if (isset($_SESSION['USER_LOGIN'])) {
		$accordion_class = 'accordion__hide';
	?>

		<div class="container mt-20">
			<caption>Checkout</caption>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Product</th>
						<th>Image</th>
						<th>Price</th>
						<th>Remove</th>
					</tr>
				</thead>
				<tbody>
					<!-- Example Product 1 -->
					<?php
					$cart_total = 0;
					foreach ($_SESSION['cart'] as $key => $val) {
						$productArr = get_product($con, '', '', $key);
						$pname = $productArr[0]['name'];
						$mrp = $productArr[0]['mrp'];
						$price = $productArr[0]['price'];
						$image = $productArr[0]['image'];
						$qty = $val['qty'];
						$cart_total = $cart_total + ($price * $qty);
					?>
						<tr>
							<td><?php echo $pname ?></td>
							<td><img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $image ?>" alt="Product 1" class="img-thumbnail" width="100"></td>
							<td><?php echo $price * $qty ?></td>
							<td><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key ?>','remove')" class="btn btn-danger">Remove</a></td>
						</tr>
					<?php }
					?>
				</tbody>
			</table>

			<!-- Total Section -->
			<div class="text-right">
				<h6>Total :<?php echo $cart_total ?></h6>
			</div>

			<div class="container">
				<label for="inputName">Coupon Code</label>
				<input type="number" class="form-control" placeholder="Coupon Code">
			</div>

			<div class="container mt-5">
				<h2>Shipping Address</h2>
				<form method="post">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputName">Full Name</label>
							<input type="text" class="form-control" id="inputName" name="address" placeholder="John Doe" required="">
						</div>
						<div class="form-group col-md-6">
							<label for="inputPhone">Phone Number</label>
							<input type="tel" class="form-control" id="inputPhone" name="city" placeholder="03001234567" required="">
						</div>
					</div>
					<div class="form-group">
						<label for="inputAddress">Address</label>
						<input type="text" class="form-control" id="inputAddress" placeholder="New Lari Adda, Jhawarian" required="" name="pincode">
					</div>
					<div class="form-check <?php echo $accordion_class ?>">
						<h4>Payment Method</h4>
						<input class="form-check-input" type="radio" name="payment_type" id="exampleRadios1" value="Cash On Delivery" checked>
						<label class="form-check-label" for="exampleRadios1">Cash On Delivery</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2" disabled>
						<label class="form-check-label" for="exampleRadios2">JazzCash</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2" disabled>
						<label class="form-check-label" for="exampleRadios2">EasyPaisa</label>
					</div>
			</div>

			<!-- Checkout Button -->
			<div class="text-center mt-4">
				<button type="submit" name="submit" class="btn btn-primary">Order Now</button>
			</div>
			</form>
		</div>
	<?php } ?>

	<!-- Add Bootstrap JS and jQuery Scripts -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>

</html>

<?php include('footer.php') ?>