<?php require('top.php');
	if(isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']=='yes'){
		?>
		<script type="text/javascript">
			window.location.href='my_order.php';
		</script>
		<?php
	}
?>
<style type="text/css">
	.filed_error{
		color: red;
	}
</style>
    <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.php">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">Forget </span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
        <!-- End Bradcaump area -->
        <!-- Start Contact Area -->
        <section class="htc__contact__area ptb--100 bg__white">
            <div class="container">
                <div class="row">
					<div class="col-md-6">
						<div class="login-form-wrap mt--60">
							<div class="col-xs-12">
								<div class="contact-title">
									<h2 class="title__line--6">Forget Password</h2>
								</div>
							</div>
							<div class="col-xs-12">
								<form id="login-form" method="post">
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="email" id="email" placeholder="Your Email*" style="width:100%">
										</div>
										<span class="filed_error" id="email_error"></span>
									</div>
									
									<div class="contact-btn">
										<button type="button" id="btn_submit" class="fv-btn" onclick="forget_password()">Submit</button>
									</div>
								</form>
								<div class="login_msg form-output">
									<p class="form-messege"></p>
								</div>
							</div>
						</div> 
                </div>
				<div class="col-md-6">
						<!--<div class="contact-form-wrap mt--60">
							<div class="col-xs-12">
								<div class="contact-title">
									<h2 class="title__line--6">Register</h2>
								</div>
							</div>
							<div class="col-xs-12">
								<form id="register-form"  method="post">
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="name" id="name" placeholder="Your Name*" style="width:100%">
										</div>
										<span class="filed_error" id="name_error"></span>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="email" name="email" id="email" placeholder="Your Email*" style="width:45%">


											<button type="button" onclick="email_sent_otp()" class="fv-btn email_sent_otp height_60px">Sent OTP</button>

											<input type="email" id="email_otp" placeholder="OTP*" style="width:45%" class="email_verify_otp">


											<button type="button" onclick="email_verify_otp()" class="fv-btn email_verify_otp height_60px">Verify OTP</button>

											<span id="email_otp_result"></span>
										</div>
										<span class="filed_error" id="email_error"></span>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="Mobile" id="mobile" placeholder="Your Mobile*" style="width:100%">
										</div>
										<span class="filed_error" id="mobile_error"></span>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="password" name="password" id="password" placeholder="Your Password*" style="width:100%">
										</div>
										<span class="filed_error" id="password_error"></span>
									</div>
									
									<div class="contact-btn">
										<button id="btn_registed" type="button" onclick="user_register()" class="fv-btn" disabled>Register</button>
									</div>
								</form>
								<div class="form-output register_msg">
									<p class="form-messege"></p>
								</div>
							</div>
						</div> -->
                </div>
			</div>
        </section>
    <input type="hidden" id="is_email_verified">
<script type="text/javascript">
	function forget_password(){
		jQuery('#email').html('');
		var email=jQuery('#email').val();
		if(email==''){
			jQuery('#email_error').html('Place Enter the Email id');
		}else{
			jQuery('#btn_submit').html('Place Wait..');
			jQuery('#btn_submit').attr('disabled',true);
			jQuery.ajax({
				url:'forgot_password_submit.php',
				type:'post',
				data:'email='+email,
				success:function(result){
					jQuery('#email').val('');
					jQuery('#email_error').html(result);
					jQuery('#btn_submit').html('Submit');
					jQuery('#btn_submit').attr('disabled',false);
				}
			})	
		}
	}
	
</script>      
<?php require('footer.php');?>