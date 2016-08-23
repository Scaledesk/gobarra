 <?php $this->load->view('header'); ?>
 <!-- Page Content -->
    <div class="registerbg">    
	<div class="page-content logopage">
        <div class="container ">
      	<section class="main">
		<?php echo validation_errors(); ?>
		<form class="form-2 register" id="createform" name="createform" method="post" action="<?php echo base_url(); ?>user/create_member">				
					<h1 class=" text-center"><span class="log-in">Register With Gobarra</span></h1>
					<p class="float"> 
						<input type="text" name="first_name" placeholder="First Name" id="fname">
						 
					</p>
					<p class="float"> 
						<input type="text" name="last_name" placeholder="Last Name" id="lname">
					</p>
					<p class="float full"> 
					
						<input type="text" name="email" placeholder="Email ID" id="useremail">
						 
					</p>
					<p class="float"> 
						<input type="password" name="password" placeholder="password" id="password">
						 
					</p>
					<p class="float">
					<span id='message' class="hidemsg"></span>	
						<input type="password" name="cpassword" placeholder="Re-enter Password" id="cpassword">
						 
					</p>
					<p class="float"> 
						 <input type="text" name="country_name" placeholder="Enter Country" id="country" title="Select Your Country">						   
					</p>
					<p class="float"> 
					 <input type="text" name="city_name" id="cities" placeholder="Enter City">                            
					</p>
					<p class="float full"> 
							 <select class="textfield2 marginBottomNone" name="occupation" id="occupation">
                            <option value="">Select Occupation</option>
											<option value="Student">Student</option>
                                            <option value="Business"> Business</option>
                                            <option value="Employee"> Employee</option>
<option value="Other">Other</option>
                                                        </select> 
														</p>
					<p class="float full"> 
						<div class="form-group">
                                    <label class="">Gender</label>
                                    <label class="">
            <input type="radio" class="required" name="gender" id="gender1" value="1" checked> Male
                                    </label>
                                    <label class="">
                                        <input type="radio" class="required" name="gender" id="gender2" value="2"> Female
                                    </label>
                                </div> 
					
					</p> 
					<p class="clearfix text-center submit"> 
						 <input type="submit" name="submit" value="REGISTER "> 
					</p>
					
					 	<div class="clearfix"></div>
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
	<?php $this->load->view('footer'); ?>
	 <script>
  $(document).ready(function(){
		  var frmvalidator = new Validator("createform");
					frmvalidator.addValidation("fname","req","Please Enter Your First Name");
					frmvalidator.addValidation("lname","req","Please Enter Your Last Name");
					frmvalidator.addValidation("useremail","req","Please Enter Your Email");
					frmvalidator.addValidation("password","req","Please Enter Your Password");
					frmvalidator.addValidation("password","maxlen=16","Password Lenght 16 Charecter");	
					frmvalidator.addValidation("cpassword","req","Please Enter Your Confirm Password");
					frmvalidator.addValidation("cpassword","maxlen=16","Password Lenght 16 Charecter");
					frmvalidator.addValidation("country","req","Please Select Your Country");
					frmvalidator.addValidation("cities","dontselect=0","Please Select Your City Name");

					$('#cpassword').on('keyup', function () {
					if ($(this).val() == $('#password').val()) {
						$('#message').html('Password Match').css('color', 'green');
					} else $('#message').html('Password Not Match').css('color', 'red');
				});
					});	 	
</script>  
      <script type="text/javascript">
        google.maps.event.addDomListener(window, 'load', function () {
            var places = new google.maps.places.Autocomplete(document.getElementById('country'));
            google.maps.event.addListener(places, 'place_changed', function () {
                var place = places.getPlace();
                var address = place.formatted_address;
            });
        });
    </script>
      <script type="text/javascript">
        google.maps.event.addDomListener(window, 'load', function () {
            var places = new google.maps.places.Autocomplete(document.getElementById('cities'));
            google.maps.event.addListener(places, 'place_changed', function () {
                var place = places.getPlace();
                var address = place.formatted_address;
            });
        });
    </script>