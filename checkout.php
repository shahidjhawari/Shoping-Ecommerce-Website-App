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


	if (isset($_SESSION['COUPON_ID'])) {
		$coupon_id = $_SESSION['COUPON_ID'];
		$coupon_code = $_SESSION['COUPON_CODE'];
		$coupon_value = $_SESSION['COUPON_VALUE'];
		$total_price = $total_price - $coupon_value;
		unset($_SESSION['COUPON_ID']);
		unset($_SESSION['COUPON_CODE']);
		unset($_SESSION['COUPON_VALUE']);
	} else {
		$coupon_id = '';
		$coupon_code = '';
		$coupon_value = '';
	}

	mysqli_query($con, "insert into `order`(user_id,address,city,pincode,payment_type,payment_status,order_status,added_on,total_price,txnid,coupon_id,coupon_code,coupon_value) values('$user_id','$address','$city','$pincode','$payment_type','$payment_status','$order_status','$added_on','$total_price','$txnid','$coupon_id','$coupon_code','$coupon_value')");

	$order_id = mysqli_insert_id($con);

	foreach ($_SESSION['cart'] as $key => $val) {
		$productArr = get_product($con, '', '', $key);
		$price = $productArr[0]['price'];
		$qty = $val['qty'];

		mysqli_query($con, "insert into `order_detail`(order_id,product_id,qty,price) values('$order_id','$key','$qty','$price')");
	}


	if ($payment_type == 'instamojo') {

		$userArr = mysqli_fetch_assoc(mysqli_query($con, "select * from users where id='$user_id'"));

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
		curl_setopt(
			$ch,
			CURLOPT_HTTPHEADER,
			array("X-Api-Key:test_a5ee4680df615d01eb8396e1da4", "X-Auth-Token:test_939292b985fc3339fc5fb21521d")
		);

		$payload = array(
			'purpose' => 'Buy Product',
			'amount' => $total_price,
			'phone' => $userArr['mobile'],
			'buyer_name' => $userArr['name'],
			'redirect_url' => 'http://127.0.0.1/php/ecom/payment_complete.php',
			'send_email' => false,
			'send_sms' => false,
			'email' => $userArr['email'],
			'allow_repeated_payments' => false
		);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
		$response = curl_exec($ch);
		curl_close($ch);
		$response = json_decode($response);
		if (isset($response->payment_request->id)) {
			//unset($_SESSION['cart']);
			$_SESSION['TID'] = $response->payment_request->id;
			mysqli_query($con, "update `order` set txnid='" . $response->payment_request->id . "' where id='" . $order_id . "'");
	?>
			<script>
				window.location.href = '<?php echo $response->payment_request->longurl ?>';
			</script>
		<?php
		} else {
			if (isset($response->message)) {
				$errMsg .= "<div class='instamojo_error'>";
				foreach ($response->message as $key => $val) {
					$errMsg .= strtoupper($key) . ' : ' . $val[0] . '<br/>';
				}
				$errMsg .= "</div>";
			} else {
				echo "Something went wrong";
			}
		}
	} else {
		//sentInvoice($con,$order_id);
		?>
		<script>
			window.location.href = 'thank_you.php';
		</script>
<?php
	}
}
?>

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
			<div id="order_total_price"></div>
		</div>

		<div class="container">
			<label for="inputName">Coupon Code</label>
			<input type="text" id="coupon_str" name="submit" class="form-control" placeholder="Coupon Code">
			<button class="btn btn-warning mt-2" onclick="set_coupon()">Add</button>
		</div>

		<div class="container mt-5">
			<h2>Shipping Address</h2>
			<form method="post">
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="inputName">Full Name</label>
						<input type="text" class="form-control" id="inputName" name="address" placeholder="Enter Name" required="">
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
				<div class="form-check mt-3 <?php echo $accordion_class ?>">
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

<script>
	function set_coupon() {
		var coupon_str = jQuery('#coupon_str').val();
		if (coupon_str != '') {
			jQuery('#coupon_result').html('');
			jQuery.ajax({
				url: 'set_coupon.php',
				type: 'post',
				data: 'coupon_str=' + coupon_str,
				success: function(result) {
					var data = jQuery.parseJSON(result);
					if (data.is_error == 'yes') {
						jQuery('#coupon_box').hide();
						jQuery('#coupon_result').html(data.dd);
						jQuery('#order_total_price').html(data.result);
					}
					if (data.is_error == 'no') {
						jQuery('#coupon_box').show();
						jQuery('#coupon_price').html(data.dd);
						jQuery('#order_total_price').html("Total : " + data.result);
					}
				}
			});
		}
	}
</script>
<?php
if (isset($_SESSION['COUPON_ID'])) {
	unset($_SESSION['COUPON_ID']);
	unset($_SESSION['COUPON_CODE']);
	unset($_SESSION['COUPON_VALUE']);
}
include('footer.php') ?>