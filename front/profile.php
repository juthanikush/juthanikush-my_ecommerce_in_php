<?php require('top.php');
	if(!isset($_SESSION['USER_ID'])){
        ?>
            <script type="text/javascript">
                window.location.href='login.php';
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
                                  <span class="breadcrumb-item active">Profile </span>
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
									<h2 class="title__line--6">Profile</h2>
								</div>
							</div>
							<div class="col-xs-12">
								<form id="login-form" method="post">
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="name" id="name" placeholder="Your Name*" style="width:100%" value="<?php echo $_SESSION['USER_NAME']; ?>">
										</div>
										<span class="filed_error" id="name_error"></span>
									</div>
									
									<div class="contact-btn">
										<button type="button" id="btn_submit" class="fv-btn" onclick="update_profile()">Update</button>
									</div>
								</form>
								
							</div>
						</div> 
                </div>
				<div class="col-md-6">
						<div class="login-form-wrap mt--60">
							<div class="col-xs-12">
								<div class="contact-title">
									<h2 class="title__line--6">Change Password</h2>
								</div>
							</div>
							<div class="col-xs-12">
								<form id="frmPassword" method="post">
									<div class="single-contact-form">
										<label class="password_label">Current Password</label>
										<div class="contact-box ">
											<input type="password" name="current_password" id="current_password" >
										</div>
										<span class="filed_error" id="current_password_error"></span>
									</div>
									<div class="single-contact-form">
										<label class="password_label">New Password</label>
										<div class="contact-box ">
											<input type="password" name="new_password" id="new_password" >
										</div>
										<span class="filed_error" id="new_password_error"></span>
									</div>
									<div class="single-contact-form">
										<label class="password_label">Confrom New Password</label>
										<div class="contact-box ">
											<input type="password" name="confrom_new_password" id="confrom_new_password" >
										</div>
										<span class="filed_error" id="confrom_new_password_error"></span>
									</div>
									<div class="contact-btn">
										<button type="button" id="btn_update_password" class="fv-btn" onclick="update_password()">Update</button>
									</div>
								</form>
								
							</div>
						</div> 
                </div>
			</div>
			
        </section>
    <input type="hidden" id="is_email_verified">
<script type="text/javascript">
	function update_profile(){
		jQuery('.filed_error').html('');
		var name=jQuery('#name').val();
		if(name==''){
			jQuery('#name_error').html('Place Enter the Name');
		}else{
			jQuery('#btn_submit').html('Place Wait..');
			jQuery('#btn_submit').attr('disabled',true);
			jQuery.ajax({
				url:'update_profile.php',
				type:'post',
				data:'name='+name,
				success:function(result){
					jQuery('#name_error').html(result);
					jQuery('#btn_submit').html('Update');
					jQuery('#btn_submit').attr('disabled',false);
				}
			})	
		}
	}
	function update_password(){
		jQuery('.filed_error').html('');
		var current_password=jQuery('#current_password').val();
		var new_password=jQuery('#new_password').val();
		var confrom_new_password=jQuery('#confrom_new_password').val();
		var is_error='';
		if(current_password==''){
			jQuery('#current_password_error').html('Place Enter old  Password');
			is_error='yes';
		}if(new_password==''){
			jQuery('#new_password_error').html('Place Enter New Password');
			is_error='yes';
		}
		if(confrom_new_password==''){
			jQuery('#confrom_new_password_error').html('Place Enter Confrom Password');
			is_error='yes';
		}

		if(new_password!=''  && confrom_new_password!='' && new_password!=confrom_new_password){
			jQuery('#confrom_new_password_error').html('Place Enter Same Password');
			is_error='yes';
		}

		if(is_error==''){
			jQuery('#btn_update_password').html('Place Wait..');
			jQuery('#btn_update_password').attr('disabled',true);
			jQuery.ajax({
				url:'update_password.php',
				type:'post',
				data:'current_password='+current_password+'&new_password='+new_password,
				success:function(result){
					jQuery('#current_password_error').html(result);
					jQuery('#btn_update_password').html('Update');
					jQuery('#btn_update_password').attr('disabled',false);
					jQuery('#frmPassword')[0].reset();
				}
			})	
		}
	}
</script>      
<?php require('footer.php');?>