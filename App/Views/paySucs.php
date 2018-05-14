<?php 
echo $header; 
?>

<div class="hed-pt2 row justify-content-center pt-4 ">
     <form class="p-4 col-10 home-form" id="home-form" action="<?php echo url('/pay/sucs')?>" method="POST" data-res="trail-res">
         <input type="text" name="time_paied" style="display:none;" value="<?php echo $time_paied; ?>">
         <input type="text" name="ext_time_paied" style="display:none !important;" value="<?php echo $ext_time_paied; ?>">
         <h4 class="text-center">Thank you for your online Payment</h4>
         <p class="dscr text-center">Please fill this form, so that we can send the information to the correct person</p>
         <div class="form-group">
            <label  class="col3">Email to recive your IPTV code*</label>
            <input type='email'
                   id="email"
                   class="form-control" 
                   pattern=".{4,30}"
                   name= "email" 
                   required
                   placeholder="Email">
         </div> 
         
         <div class="form-group">
            <label  class="col3">Your full Name*</label>
            <input type="text" 
                   id="full_name"
                   class="form-control" 
                   pattern=".{3,20}"
                   name= "full_name" 
                   required
                   placeholder="full name">
         </div> 
         <div class="form-group">
            <label  class="col3">Device*</label>
            <input type="text" 
                   id="full_name"
                   class="form-control" 
                   pattern=".{3,20}"
                   name= "device" 
                   required
                   placeholder="Device Name">
         </div>
         <div class="form-group row">
             <div class="col-12 col-md-3">
            <label  class="col3">how match you have paied*</label>
            <input type="text" 
                   id="paied_num"
                   class="form-control" 
                   pattern=".{1,4}"
                   name= "many-match" 
                   required
                   placeholder="Number 10, 20...">
             </div>
             <div class="col-12 col-md-4 row p-2 mt-4 justify-content-center">
                <div class="custom-control custom-radio mr-3">
                    <input type="radio" id="hnr11" name="many_type" checked class="custom-control-input radio" value="€">
                    <label class="custom-control-label" for="hnr11">€</label>
                </div>
                <div class="custom-control custom-radio mr-3">
                    <input type="radio" id="hnr22" name="many_type" class="custom-control-input radio" value="$">
                    <label class="custom-control-label" for="hnr22" >$</label>
                </div>
            </div>
         </div>         
         <div class="justify-content-center row">
             <input type="submit" class="btn  w-100 rounded col-6 col-md-3 b-col2 coldscr2" value="send the data to Best IPTV Admin">
         </div>
         <div class="d-none justify-content-center mt-2"><p class="col0 rounded b-col2 p-2" id="trail-res"></p></div>
     </form>

  </div><!--end request form header-->


<!--Thank you you will receive the code in the next few hours-->
<!--Best regards,
Best IPTV 4k Admin-->
            
<?php echo $footer; ?>