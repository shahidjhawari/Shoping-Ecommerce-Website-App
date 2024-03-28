function send_message() {
  var name = jQuery("#name").val();
  var email = jQuery("#email").val();
  var mobile = jQuery("#mobile").val();
  var message = jQuery("#message").val();

  if (name == "") {
    alert("Please enter name");
  } else if (email == "") {
    alert("Please enter email");
  } else if (mobile == "") {
    alert("Please enter mobile");
  } else if (message == "") {
    alert("Please enter message");
  } else {
    jQuery.ajax({
      url: "send_message.php",
      type: "post",
      data:
        "name=" +
        name +
        "&email=" +
        email +
        "&mobile=" +
        mobile +
        "&message=" +
        message,
      success: function (result) {
        alert(result);
      },
    });
  }
}

function user_register() {
  jQuery(".field_error").html("");
  var name = jQuery("#name").val();
  var email = jQuery("#email").val();
  var mobile = jQuery("#mobile").val();
  var password = jQuery("#password").val();
  var is_error = "";
  if (name == "") {
    jQuery("#name_error").html("Please enter name");
    is_error = "yes";
  }
  if (email == "") {
    jQuery("#email_error").html("Please enter email");
    is_error = "yes";
  }
  if (mobile == "") {
    jQuery("#mobile_error").html("Please enter mobile");
    is_error = "yes";
  }
  if (password == "") {
    jQuery("#password_error").html("Please enter password");
    is_error = "yes";
  }
  if (is_error == "") {
    jQuery.ajax({
      url: "register_submit.php",
      type: "post",
      data:
        "name=" +
        name +
        "&email=" +
        email +
        "&mobile=" +
        mobile +
        "&password=" +
        password,
      success: function (result) {
        if (result == "email_present") {
          jQuery("#email_error").html("Email id already present");
        }
        if (result == "mobile_present") {
          jQuery("#mobile_error").html("Mobile number already present");
        }
        if (result == "insert") {
          jQuery(".register_msg p").html(
            "Thank you for registeration, Now you can login!!"
          );
        }
      },
    });
  }
}

function user_login() {
  jQuery(".field_error").html("");
  var email = jQuery("#login_email").val();
  var password = jQuery("#login_password").val();
  var is_error = "";
  if (email == "") {
    jQuery("#login_email_error").html("Please enter email");
    is_error = "yes";
  }
  if (password == "") {
    jQuery("#login_password_error").html("Please enter password");
    is_error = "yes";
  }
  if (is_error == "") {
    jQuery.ajax({
      url: "login_submit.php",
      type: "post",
      data: "email=" + email + "&password=" + password,
      success: function (result) {
        if (result == "wrong") {
          jQuery(".login_msg p").html("Please enter valid login details");
        }
        if (result == "valid") {
          window.location.href = window.location.href;
        }
      },
    });
  }
}

function manage_cart(pid,type,is_checkout){
	if(type=='update'){
		var qty=jQuery("#"+pid+"qty").val();
	}else{
		var qty=jQuery("#qty").val();
	}
	jQuery.ajax({
		url:'manage_cart.php',
		type:'post',
		data:'pid='+pid+'&qty='+qty+'&type='+type,
		success:function(result){
			result=result.trim();
			if(type=='update' || type=='remove'){
				window.location.href=window.location.href;
			}
			if(result=='not_avaliable'){
				alert('Qty not avaliable');	
			}else{
				jQuery('.htc__qua').html(result);
				if(is_checkout=='yes'){
					window.location.href='checkout.php';
				}
			}
		}	
	});	
}

function sort_product_drop(cat_id, site_path) {
  var sort_product_id = jQuery("#sort_product_id").val();
  window.location.href =
    site_path + "categories.php?id=" + cat_id + "&sort=" + sort_product_id;
}

function wishlist_manage(pid, type) {
  jQuery.ajax({
    url: "wishlist_manage.php",
    type: "post",
    data: "pid=" + pid + "&type=" + type,
    success: function (result) {
      if (result == "not_login") {
        window.location.href = "login.php";
      } else {
        jQuery(".htc__wishlist").html(result);
      }
    },
  });
}

// // animation loading
function showContent() {
  document.getElementById('loading-animation').style.display = 'none';
  document.getElementById('page-content').style.display = 'block';
}

// Initial delay to show the loading animation for 3 seconds
setTimeout(showContent, 3000);

// Offline & online code
window.addEventListener('load', function() {
  function updateOnlineStatus(event) {
      var condition = navigator.onLine ? "online" : "offline";
      if (condition === "offline") {
          document.getElementById('page-content').style.display = 'none';
          document.getElementById('loading-animation1').style.display = 'block';
      } else {
          document.getElementById('page-content').style.display = 'block';
          document.getElementById('loading-animation1').style.display = 'none';
      }
  }
  window.addEventListener('online',  updateOnlineStatus);
  window.addEventListener('offline', updateOnlineStatus);
  updateOnlineStatus();
});

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

