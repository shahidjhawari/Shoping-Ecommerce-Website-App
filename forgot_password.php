<?php
require('top.php');
if (isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN'] == 'yes') {
?>
    <script>
        window.location.href = 'my_order.php';
    </script>
<?php
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Include Bootstrap CSS -->
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <h2>Forgot Password</h2>

                <form id="login-form" method="post">
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
                        <span class="field_error" id="login_email_error"></span>
                    </div>
                    <button type="button" class="btn btn-primary mybtn" onclick="forgot_password()" id="btn_submit">Submit</button>
                </form>
                <div class="form-output login_msg">
                    <p class="form-messege field_error"></p>
                </div>
            </div>
        </div>
    </div>


    </div>
    </div>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
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
</body>

</html>



<?php include('footer.php') ?>