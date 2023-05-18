<?php  declare(strict_types=1);
include('header.php');
if(isset($_GET['errUser'])){
  $errUser='user is empty';
}

if(isset($_GET['errPass'])){
  $errPass='password is empty';
}


?>


<div class="container">
  <div class="row ">
    <div class="col-6 mx-auto mt-5">
        <?php
        if(isset($_GET['errPasslog'])){
            echo "<div class=' col-5 alert alert-danger mt-5'>رمز عبور صحیح نیست</div>";
        }
        if(isset($_GET['errUserlog'])){
            echo "<div class='alert  col-5 alert-danger mt-5'>نام کاربری صحیح نیست </div>";
        }
        
        ?>

    <form   action="<?php echo htmlspecialchars('log.php'); ?>" onsubmit="return validate()" method="post" class="mt-5 formlogin">
        
           <div class="row">
            <div class="col-10 mt-5">
            <input type="text" class="form-control name add-username "  name="username" placeholder=" نام کاربری" id="Inputuser"<?php isset($errUser) ? 'is-invald' : ''; ?>>
            <?php echo isset($errUser) ? "<span  class=' d-block invalid-feedback'>$errUser</span>" :''; ?>
            <p class="invalid-feedback d-none errname "> نام کاربری را وارد کنید</p>

        </div>
    </div>
       
        
        <div class="row mt-5">
            <div class="col-10 password-field">
                
            <input type="password" class="form-control password add-password " name="password" id="Inputpass" placeholder="رمز ورود"<?php isset($errPass) ? 'is-invald' : ''; ?> >
            <?php echo isset($errPass) ? "<span  class=' d-block invalid-feedback'>$errPass</span>" :''; ?>
            <p class="invalid-feedback d-none errpassword ">رمز ورود را وارد کنید</p>
            <p class="invalid-feedback d-none errpasswordRgex "> رمز ورود باید حداقل 8 کاراکتر و شامل یک حرف بزرگ باشد </p>
            
          
        </div></div>
            
       
       
          <div class="mt-5 " > <button type="submit" value="aSubmit" target="_blank" class="btn btn-primary  me-4 float-end"   >ورود</button></div>
       
        
    </form>

</div>
</div>
</div>


    <?php  include('footer.php');  ?>