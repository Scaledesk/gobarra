<?php $this->load->view('header');?>
<!-- Page Content -->
    <div class="registerbg">   
	<div class="page-content logopage ">
        <div class="container">
      	<section class="main">
			<?php 
				 if($this->session->flashdata('item'))
				 {
					 $message= $this->session->flashdata('item');
					 ?>
		<div class="<?php echo $message['class']; ?>" style="text-align:center;" id="login" role="alert">				
				<?php echo $message['message'];?></div><?php } ?>
				<form class="form-2" name="formular" id="formular" method="post" action="<?php echo base_url(); ?>user/validate_credentials">
					<h1><span class="log-in">Log in</span></h1>
					<p class="float">
						<label for="login"><i class="fa icon-user"></i>Username</label>
						<input type="email" name="email" value="<?php if(get_cookie('userName')!=""){ echo get_cookie('userName'); } ?>" placeholder="Username or email" id="username">
					</p>
					<p class="float ">
						<label for="password"><i class="fa icon-lock"></i>Password</label>
						<input type="password" name="password" value="<?php if(get_cookie('pwd')!=""){ echo get_cookie('pwd'); } ?>" placeholder="Password" class="" id="password1">
					</p><input type="checkbox" name="remember" value="Y" <?php if(get_cookie('userName')!=""){ ?>checked="checked" <?php } ?>> <label for="showPassword">Remember me</label>
					<p class="clearfix text-center submit"> 
						 <input type="submit" name="submit" value="Log in"> 
					</p>
					<p><a href="<?php echo base_url();?>user/forgotpassword">Forgot password</a>/New User? <a href="<?php echo base_url();?>user/signup">Register Here</a></p>
				</form>​​
				
			</section> 
			<div class="account text-center">
						<h2> Don' have an account? Log in with! </h2>
						<div class="span"><a href="<?php echo site_url(); ?>home/facebook_login"><img src="<?php echo theme_url();?>img/facebook.png" alt=""><i>Sign In with Facebook</i><div class="clear"></div></a></div>							
						<div class="span2"><a href="<?php echo base_url();?>home/google_login"><img src="<?php echo theme_url();?>img/gplus.png" alt=""><i>Sign In with Google+</i><div class="clear"></div></a></div>
					</div>

        </div>

	</div>
		</div>
	<?php $this->load->view('footer');?>
	<script>
  $(document).ready(function(){
		  var frmvalidator = new Validator("formular");
					frmvalidator.addValidation("username","req","Please Enter Your Email");
					frmvalidator.addValidation("password","req","Please Enter Your Password");					

					setTimeout(function(){
					  $("#login").fadeOut("slow", function () {
					  $("#login").remove();
      }); }, 9000);
					});
  </script>