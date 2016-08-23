<?php $this->load->view('header');?>
    <!-- Page Content -->
    <div class="page-content logopage">
        <div class="container">		
      	<section class="main">
		<?php 
				 if($this->session->flashdata('item'))
				 {
					 $message= $this->session->flashdata('item');
					 ?>
					 <div class="success error" id="forgetpswd" role="alert">				
				<?php 
				echo $message['message'];?></div>
					 <?php
				 }
				 ?>				 
				<form class="form-2" id="formular" name="formular" method="post" action="<?php echo base_url(); ?>user/forgotpassword">
					<h1><span class="log-in">Forgot<span class="sign-up">Password</span></h1>
					<p class="float full">
						<label for="login"><i class="fa icon-user"></i>Email Id</label>
							<input type="text" name="email" placeholder="Email" class="Email">
					</p>				 
					<p class="clearfix text-center submit"> 
					<input type="submit" name="submit" value="submit"> 
					</p>
					<p><a href="<?php echo base_url();?>user/login">Login Now</a></p>
				</form>​​
			</section> 
			<div class="account text-center">
						<h2> Don' have an account? Log in with! </h2>
						<div class="span"><a href="<?php echo site_url(); ?>home/facebook_login"><img src="<?php echo theme_url();?>img/facebook.png" alt=""><i>Sign In with Facebook</i><div class="clear"></div></a></div>	
						<!--<div class="span1"><a href="#"><img src="<?php /*echo theme_url();*/?>img/twitter.png" alt=""><i>Sign In with Twitter</i><div class="clear"></div></a></div>-->
						<div class="span2"><a href="<?php echo base_url();?>home/google_login"><img src="<?php echo theme_url();?>img/gplus.png" alt=""><i>Sign In with Google+</i><div class="clear"></div></a></div>
					</div>
					</div>

	</div>
	
	
	
	<?php $this->load->view('footer'); ?>
	<script>
  $(document).ready(function(){
					setTimeout(function(){
					  $("#forgetpswd").fadeOut("slow", function () {
					  $("#forgetpswd").remove();
      }); }, 6000);
					});
  </script>