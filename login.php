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

<script>
    window.onload = function() {
        window.scrollTo(0, 500);
    };
</script>


<!-- For Register Form -->
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
                </div>
                <div class="form-group">
                    <label for="phoneNumber">Phone Number</label>
                    <input type="tel" class="form-control" name="mobile" id="mobile" placeholder="Enter your phone number" required>
                    <small>etc. 03001234567</small><br>
                    <span class="field_error" id="mobile_error"></span>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter a password" required>
                        <div class="input-group-append">
                            <span class="input-group-text" id="togglePassword">
                                <i class="fas fa-eye-slash"></i>
                            </span>
                        </div>
                    </div>
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

<!-- For Login Form -->
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
                    <div class="input-group">
                        <input type="password" class="form-control" name="login_password" id="login_password" placeholder="Enter your password" required>
                        <div class="input-group-append">
                            <span class="input-group-text" id="toggleLoginPassword">
                                <i class="fas fa-eye-slash"></i>
                            </span>
                        </div>
                    </div>
                    <span class="field_error" id="login_password_error"></span>
                </div>
                <button type="button" class="btn btn-primary mybtn" onclick="user_login()">Login</button>
            </form>
            <div class="form-output login_msg">
                <p class="form-messege field_error"></p>
            </div>
        </div>
    </div>
</div>

<script>
    // Function to toggle password visibility for registration form
    document.getElementById('togglePassword').addEventListener('click', function() {
        const passwordInput = document.getElementById('password');
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        this.querySelector('i').classList.toggle('fa-eye-slash');
        this.querySelector('i').classList.toggle('fa-eye');
    });

    // Function to toggle password visibility for login form
    document.getElementById('toggleLoginPassword').addEventListener('click', function() {
        const passwordInput = document.getElementById('login_password');
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        this.querySelector('i').classList.toggle('fa-eye-slash');
        this.querySelector('i').classList.toggle('fa-eye');
    });
</script>


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

<?php include('footer.php') ?>