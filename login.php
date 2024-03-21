<?php
require('top.php');
if (isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN'] == 'yes') {
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
    <title>Registration Page</title>
    <style>
        .myh1 {
            margin-top: 30px;
        }

        .mybtn {
            margin-bottom: 30px;
        }

        .field_error {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-4 mt-10 myh1">Sign Up</h2>
                <form id="register-form" method="post" action="index.php">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" required><br>
                        <span class="field_error" id="name_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email or Phone Number</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email or Phone Number">
                        <small>Email or Phone Number</small><br>
                        <span class="field_error" id="email_error"></span>

                        <!-- <button type="button" class="btn btn-primary" style="width: 100px; margin-top:15px;" onclick="email_sent_otp()">Send OTP</button> -->

                        <!-- <input type="number" id="email_otp" style="width: 100px; margin-top:15px; margin-bottom:15px;" placeholder="OTP" class="form-control">

                        <button type="button" class="btn btn-primary" onclick="email_verify_otp()">Verify OTP</button> -->

                        <!-- <span id="email_otp_result"></span> -->
                    </div>
                    <div class="form-group">
                        <label for="phoneNumber">Phone Number</label>
                        <input type="tel" class="form-control" name="mobile" id="mobile" placeholder="Enter your phone number" required>
                        <small>etc. 03001234567</small><br>
                        <span class="field_error" id="mobile_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter a password" required>
                        <small>Password must be at least 8 characters</small><br>
                        <span class="field_error" id="password_error"></span>
                    </div>
                    <button type="button" class="btn btn-primary mybtn" onclick="user_register()" id="btn_register">Sign Up</button>
                </form>
                <div class="form-output register_msg">
                    <p class="form-messege field_error"></p>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-4 myh1">Login</h2>
                <form id="login-form" method="post" action="index.php">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="login_email" id="login_email" placeholder="Enter your email" required>
                        <a href="forgot_password.php" class="span mt-3 ml-1">Forgot Password</a>
                        <span class="field_error" id="login_email_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="login_password" id="login_password" placeholder="Enter your password" required>
                        <span class="field_error" id="login_password_error">
                    </div>
                    <button type="button" class="btn btn-primary mybtn" onclick="user_login()">Login</button>
                </form>
                <div class="form-output login_msg">
                    <p class="form-messege field_error"></p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <input type="hidden" id="is_email_verified" />
    <input type="hidden" id="is_mobile_verified" />
    <script>
        function email_sent_otp() {
            jQuery('#email_error').html('');
            var email = jQuery('#email').val();
            if (email == '') {
                jQuery('#email_error').html('Please enter email id');

            } else {
                jQuery('.email_sent_otp').html('Please wait..');
                jQuery('.email_sent_otp').attr('disabled', true);
                jQuery.ajax({
                    url: 'send_otp.php',
                    type: 'post',
                    data: 'email=' + email + '&type=email',
                    success: function(result) {
                        if (result == 'done') {
                            jQuery('#email').attr('disabled', true);
                            jQuery('.email_verify_otp').show();
                            jQuery('.email_sent_otp').hide();

                        } else if (result == 'email_present') {
                            jQuery('.email_sent_otp').html('Send OTP');
                            jQuery('.email_sent_otp').attr('disabled', false);
                            jQuery('#email_error').html('Email id already exists');
                        } else {
                            jQuery('.email_sent_otp').html('Send OTP');
                            jQuery('.email_sent_otp').attr('disabled', false);
                            jQuery('#email_error').html('Please try after sometime');
                        }
                    }
                });
            }
        }

        function email_verify_otp() {
            jQuery('#email_error').html('');
            var email_otp = jQuery('#email_otp').val();
            if (email_otp == '') {
                jQuery('#email_error').html('Please enter OTP');
            } else {
                jQuery.ajax({
                    url: 'check_otp.php',
                    type: 'post',
                    data: 'otp=' + email_otp + '&type=email',
                    success: function(result) {
                        if (result == 'done') {
                            jQuery('.email_verify_otp').hide();
                            jQuery('#email_otp_result').html('Email id verified');
                            jQuery('#is_email_verified').val('1');
                            if (jQuery('#is_email_verified').val() == 1) {
                                jQuery('#btn_register').attr('disabled', false);
                            }
                        } else {
                            jQuery('#email_error').html('Please enter valid OTP');
                        }
                    }

                });
            }
        }
    </script>
</body>

</html>
<?php include('footer.php') ?>