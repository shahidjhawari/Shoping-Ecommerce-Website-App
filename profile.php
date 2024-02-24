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

<div class="container mt-5">
	<div class="row">
		<div class="col-md-4">
			<!-- User Name Section -->
		</div>
	</div>
</div>
<div class="col-md-8">

	<!-- My Profile Section -->

	<div class="card mb-3">
		<div class="card-body">
			<form id="login-form" method="post">
				<h1><?php echo $_SESSION['USER_NAME'] ?></h1>
				<input type="text" name="name" id="name" placeholder="Your Name*" class="form-control" maxlength="30" value="<?php echo $_SESSION['USER_NAME'] ?>">
				<button type="button" class="btn btn-info mt-2" onclick="update_profile()" id="btn_submit">Update</button>
		</div>
	</div>
	</form>

	<!-- My Orders Section -->
	<div class="card">
		<div class="card-body">
			<form id="login-form" method="post">
				<h1>Change Password</h1>
				<label class="password_label">Current Password</label>
				<input type="password" class="form-control" name="current_password" id="current_password">
				<label class="password_label">New Password</label>
				<input type="password" name="new_password" class="form-control" id="new_password">
				<label class="password_label">Confirm New Password</label>
				<input type="password" name="confirm_new_password" class="form-control" id="confirm_new_password">
				<span class="field_error" id="confirm_new_password_error"></span>
				<button type="button" class="btn btn-info mt-2" onclick="update_password()" id="btn_update_password">Change</button>
		</div>
	</div>
	</form>

	<div class="card mt-3">
		<div class="card-body">
			<form id="login-form" method="post">
				<h1>Forgot Password</h1>
				<label class="password_label">Email</label>
				<input type="email" name="email" id="email" class="form-control" placeholder="Email" required>

				<button type="button" class="btn btn-info mt-2" onclick="forgot_password()" id="btn_submit">Submit</button>
		</div>
	</div>
	</form>
	<!-- Logout Section -->
	<div class="card mt-3 mb-2">
		<div class="card-body">
			<a href="logout.php" class="btn btn-danger">Logout</a>
		</div>
	</div>
</div>
</div>
</div>

<script>
	function update_profile() {
		jQuery('.field_error').html('');
		var name = jQuery('#name').val();
		if (name == '') {
			jQuery('#name_error').html('Please enter your name');
		} else {
			jQuery('#btn_submit').html('Please wait...');
			jQuery('#btn_submit').attr('disabled', true);
			jQuery.ajax({
				url: 'update_profile.php',
				type: 'post',
				data: 'name=' + name,
				success: function(result) {
					jQuery('#name_error').html(result);
					jQuery('#btn_submit').html('Update');
					jQuery('#btn_submit').attr('disabled', false);
				}
			})
		}
	}

	function update_password() {
		jQuery('.field_error').html('');
		var current_password = jQuery('#current_password').val();
		var new_password = jQuery('#new_password').val();
		var confirm_new_password = jQuery('#confirm_new_password').val();
		var is_error = '';
		if (current_password == '') {
			jQuery('#current_password_error').html('Please enter password');
			is_error = 'yes';
		}
		if (new_password == '') {
			jQuery('#new_password_error').html('Please enter password');
			is_error = 'yes';
		}
		if (confirm_new_password == '') {
			jQuery('#confirm_new_password_error').html('Please enter password');
			is_error = 'yes';
		}

		if (new_password != '' && confirm_new_password != '' && new_password != confirm_new_password) {
			jQuery('#confirm_new_password_error').html('Please enter same password');
			is_error = 'yes';
		}

		if (is_error == '') {
			jQuery('#btn_update_password').html('Please wait...');
			jQuery('#btn_update_password').attr('disabled', true);
			jQuery.ajax({
				url: 'update_password.php',
				type: 'post',
				data: 'current_password=' + current_password + '&new_password=' + new_password,
				success: function(result) {
					jQuery('#current_password_error').html(result);
					jQuery('#btn_update_password').html('Update');
					jQuery('#btn_update_password').attr('disabled', false);
					jQuery('#frmPassword')[0].reset();
				}
			})
		}

	}

	function forgot_password() {
		jQuery('#email_error').html('');
		var email = jQuery('#email').val();
		if (email == '') {
			jQuery('#email_error').html('Please enter email id');
		} else {
			jQuery('#btn_submit').html('Please wait...');
			jQuery('#btn_submit').attr('disabled', true);
			jQuery.ajax({
				url: 'forgot_password_submit.php',
				type: 'post',
				data: 'email=' + email,
				success: function(result) {
					jQuery('#email').val('');
					jQuery('#email_error').html(result);
					jQuery('#btn_submit').html('Submit');
					jQuery('#btn_submit').attr('disabled', false);
				}
			})
		}
	}
</script>
<?php include('footer.php');
