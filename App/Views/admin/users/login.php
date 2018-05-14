<?php echo $header ?>

<div class="container-fluid log-in">
    <h1 class="text-center">Admin Login</h1>
    <div class="row justify-content-center">
        <form class="p-4 login-form col-4" action="<?php echo url('/hmzd/login/submit')?>" method="POST" data-res="admin-res">
            <div class="form-group">
               <input  type="text" 
                       class="form-control" 
                       pattern=".{3,9}"
                       name= "name" 
                       autofocus
                       required
                       placeholder=name>
            </div>
            <div class="form-group">
               <input type="password" 
                       pattern=".{2,30}"
                       name="password" 
                       required
                       class="form-control" 
                       placeholder=password>
             </div>
            <div class="form-group">
               <input type="checkbox"
                       name="remb" 
                       id = "remb" 
                       class="pl-2">
               <label for="remb">Remember me</label>
             </div>                                                            
             <input type="submit" class="btn align-self-center w-100 rounded col0 ">
             <div class="d-none justify-content-center mt-2"><p class="col0 rounded b-col2 p-2" id="admin-res"></p></div>
        </form>
    </div>
</div>

<?php echo $footer ?>