
<?php $this->load->view('header');?>
<div class="subnavbar hidden-xs">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li><a href="<?php echo base_url();?>travelplans/planschedul"><i class="fa fa-dashboard"></i><span>Dashboard</span> </a> </li>
        <li><a href="<?php echo base_url();?>timelinepost/timeline"><i class="icon_clock_alt"></i><span>Timeline</span> </a> </li>
        <li class="active"><a href="<?php echo base_url();?>admin_products/add"><i class="icon_folder-add_alt"></i><span>Add Product</span> </a></li>
        <li><a href="<?php echo base_url();?>admin_products"><i class="glyphicon glyphicon-list"></i><span>My Products</span></a></li>
        <li><a href="<?php echo base_url(); ?>messages/display_name"><i class="icon_mail_alt"></i><span> My Inbox</span> </a> </li>
        <li><a href="<?php echo base_url(); ?>enquiry"><i class="fa fa-flask "></i><span>My Enquiry</span> </a> </li>
        <li><a href="<?php echo base_url();?>user/profile"><i class="fa fa-user"></i><span>My Profile</span> </a> </li>
        <li><a href="<?php echo base_url();?>user/ChangePassword"><i class="fa fa-unlock"></i><span>Change Password</span> </a> </li>
         
        
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
<!-- Page Content -->
<div class="page-content ">
    <div class="container">
    <?php if($this->session->flashdata('item')) {
         $message= $this->session->flashdata('item'); ?>
         <div class="<?php echo $message['class']; ?>" id="addproduct" role="alert">                
    <?php echo $message['message'];?></div> <?php } ?>
        <!-- full Content -->
  <!--  <?php echo form_open_multipart('admin_products/add','id="form" '); ?> -->

  <form id="form" enctype="multipart/form-data" action="<?php echo base_url().'admin_products/add' ?>"> 
        <div id="no-more-tables col-lg-12">
            <div class="col-lg-12 topdashboardForm">
                <div class="col-lg-12">             
                    <h3>Add New Product</h3>
                </div>
                <div class="row">
                <div class="form-group col-lg-4 col-sm-12 col-xs-12 something">
                    <label class="size">Country Name</label>
                    <div class="fixArea">
                        <input type="text" placeholder="Enter a Country..." name="country_name" id="country_id" value="<?php echo set_value('country_id');?>" class="form-control">                     
                    </div>
                    <div id="name_error" class="val_error"></div>
                </div>
                <div class="form-group col-lg-4 col-sm-12 col-xs-12 something">
                    <label class="size">City Name</label>
                    <div class="fixArea" >
                 <input type="text" name="city_name" id="city_id" class="form-control" placeholder="Enter City Name">       
                    </div>
                    <div id="name_error" class="val_error"></div>
                </div>
                <div class="form-group col-lg-4 col-sm-12 col-xs-12 something">
                    <label class="size">Product Name</label>
                    <div class="fixArea">
                        <input type="text" name="product_name" id="product_name" maxlength="120" value="<?php echo set_value('product_name');?>" class="textfield2 ui-autocomplete-input form-control" placeholder="Product Name" >
                        </div>
                        <div id="name_error" class="val_error"></div>
                    </div>
                    <div class="form-group col-lg-12 col-sm-12 col-xs-12 something">
                        <label class="size">Description</label>
                        <div class="fixArea">
                            <textarea class="form-control" id="description" name="description" rows="6" maxlength="1000"><?php echo set_value('description');?></textarea>
                            <div class="clearfix">
                                <p class="prodnote"><strong>Note: Max Char limit 1000</strong></p>
                            </div>
                        </div>
                        <div id="name_error" class="val_error"></div>
                    </div>
                    <div class="form-group col-lg-12 col-sm-12 col-xs-12 something">
                        <label class="control-label">Upload Your Imges</label>
                        <div class ="row">
                            <div class="col-xs-6 col-lg-6">

                        <input id="input1"  type="file" class="file" name="img1" value="<?php echo set_value('img1');?>">
                           </div>
                           <div id="name_error" class="val_error"></div>

                        

                           <div class="col-xs-6 col-lg-6">

                            <input id="input2" type="file" class="file" name="img2" value="<?php echo set_value('img2');?>">
                                         </div>
                                         <div id="name_error" class="val_error"></div>

                                         <div id="name_error" class="val_error"></div>
                                      <br><br>
                                    <div class="form-group col-lg-12 col-sm-12 col-xs-12 something">
                                        <div class="fixArea">
                                            <button title="Add Product" name="submit" class="btn btn-md btn-primary" type="submit">Add Product</button>
                                        </div>
                                    </div></div></div>
                                    </div> 
                                </div>
                            </div>
                    </div>  
               </form>                        
                         <!--  <?php echo form_close(); ?>  -->
                            <!-- full Content-->
                            <!-- /.container -->
                        </div>
                    </div>
                    <!-- Page Content -->
                    <!-- Javascript Code For Validation -->
<?php $this->load->view('footer');?> 


<script  type="text/javascript">                    
    $(document).ready(function(){
    $("body").prepend('<div id="overlay" class="ui-widget-overlay" style="z-index: 1001; display: none;"></div>');
    $("body").prepend("<div id='PleaseWait' style='display: none;'><img src='<?php echo theme_url(); ?>img/loading.gif'/></div>");
    $('#form').submit(function() {
                    var pass = true;
                    //some validations
                    if(pass == false){
                        return false;
                    }
                    $("#overlay, #PleaseWait").show();
                    return true;
                }); 
        setTimeout(function(){
        $("#addproduct").fadeOut("slow", function () {
        $("#addproduct").remove();
    }); }, 9000);
    /* form validation */

 
    var frmvalidator = new Validator("form");
        frmvalidator.addValidation("country","req","Please Select Your Country Name");

        frmvalidator.addValidation("cities","dontselect=0","Please Select Your City Name");
        frmvalidator.addValidation("product_name","req","Please Enter Your Product Name");
        frmvalidator.addValidation("product_name","maxlen=120",
        "Max length for Product Name is 120");
        frmvalidator.addValidation("description","req","Please Enter Your Description");
        frmvalidator.addValidation("description","maxlen=1000");
    });
    /*google places for country */
    google.maps.event.addDomListener(window, 'load', function () {
        var places = new google.maps.places.Autocomplete(document.getElementById('country_id',{types: ['(cities)'],region:['(country)']}));
            google.maps.event.addListener(places, 'place_changed', function () {
        var place = places.getPlace();
        var address = place.formatted_address;
        });
    }); 
    
    /* google places for city */
    google.maps.event.addDomListener(window, 'load', function () {
        var places = new google.maps.places.Autocomplete(document.getElementById('city_id',{types: ['(cities)'],region:['(country)']}));
            google.maps.event.addListener(places, 'place_changed', function () {
        var place = places.getPlace();
        var address = place.formatted_address;              
        });
    });
    </script>



    <script>

     var country= document.getElementById("country_id").value;

      var city= parseInt(document.getElementById("city_id").value);
     var productnm= document.getElementById("product_name").value;
     var  description=document.getElementById("description").value;
     var input_1=document.getElementById("input1").value;
     var input_2=document.getElementById("input2").value;


var country_error=document.getElementById("country_error");

var city_error=document.getElementById("city_error");

var product_error=document.getElementById("product_error");

var descrip_error=document.getElementById("descrip_error");

var inp1_error=document.getElementById("inp1_error");

var inp2_error=document.getElementById("inp2_error");

  

function FormValidate ()

    {

      /* /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i
     */ if(document.getElementById("country_id").value=="")

      { 
        // name.style.border="1px solid red";
       country_error.innerHTML ="Country is required";
       
     }
        

       if(document.getElementById("city_id").value=="")

      {
           /* email.style.border="1px solid red";*/
        city_error.innerHTML ="City is required";
      

       } 


     if (document.getElementById("product_name").value=="")
        {

              
               product_error.innerHTML ="Product Name is required";
              
        }
              
    if (document.getElementById("description").value=="")
        {

              
              descrip_error.innerHTML ="Description is required";
              
        } else

        if(description<=15 && description>=100)
               {
            /*     age.style.border="1px solid red";*/
                 age_error.innerHTML ="Description should have min. 12 and  max. 100 Characters";
                
               }
              


      if(document.getElementById("input1").value=="")
            {
               /*age.style.border="1px solid red";*/
        inp1_error.innerHTML ="You Can't Skip this Field";
       

        }
       
                

        if (document.getElementById("input2").value=="")
        {
            /*contact.style.border="1px solid red";*/
       inp2_error.innerHTML ="You Can't Skip this Field";
        

       }
                 
        

        }
//on keypress events start

    function myFunction1()
    {
         document.getElementById("country_error").innerHTML ="";

    }

    function myFunction2()
    {
      document.getElementById("city_error").innerHTML ="";
    }

    function myFunction3()
    {
         document.getElementById("product_error").innerHTML = "";
    }

    function myFunction4()
    {
        
         document.getElementById("descrip_error").innerHTML ="";
    }

    function myFunction5()
    {
       document.getElementById("inp1_error").innerHTML ="";
    }

     function myFunction5()
    {
       document.getElementById("inp2_error").innerHTML ="";
    }

    //on keypress events end


    //events

   

</script>
