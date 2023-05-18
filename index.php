<?php  declare(strict_types=1);
include('header.php');
if(isset($_GET['errUser'])){
  $errUser='user is empty';
}
if(isset($_GET['errEmail'])){
  $errEmail='email is empty';
}
if(isset($_GET['errPass'])){
  $errPass='password is empty';
}
if(isset($_GET['errUploud'])){
  $errUploud='uploud  is empty';
}

?>


<?php


?>

<div class="container">
  <div class="row ">
    <div class="col-6 mx-auto mt-5">
      <?PHP  
      if(isset($_GET['isUploud'])&& $_GET['isUploud']=='false'){
        echo "<div class='alert alert-success'>آپلود فایل انجام نشد </div>";
      }
      
      ?>
      <?php if(isset($_GET['register'])){ ?>
    <div class="mt-5 alert alert-success text-center"> ثبت نام با موفقیت انجام شد </div>
    <?php  }else{?>

    <form   enctype="multipart/form-data" action="<?php echo htmlspecialchars('register.php'); ?>"  method="POST">
        
        <div class="  mt-5">
          <div class=" mt-5">
            <input type="text" placeholder="نام و نام خانوادگی"  name="username" class="form-control "<?php isset($errUser) ? 'is-invald' : ''; ?>>
            <?php echo isset($errUser) ? "<span  class=' d-block invalid-feedback'>$errUser</span>" :''; ?>
          </div>
          <div class="mt-5"> 
             <input type="email" placeholder="ایمیل" name="email" class="form-control" <?php isset($errEmail) ? 'is-invald' : ''; ?> >
             <?php echo isset($errEmail) ? "<span  class=' d-block invalid-feedback'>$errEmail</span>" :''; ?>
            </div>
          <div class=" mt-5">
            <input type="password" placeholder="پسورد"  name="password" class="form-control" <?php isset($errPass) ? 'is-invald' : ''; ?>>
          
            <?php echo isset($errPass) ? "<span  class=' d-block invalid-feedback'>$errPass</span>" :''; ?>
          </div>
        </div>
         <div class="mt-5">
         <input type="file" name="fileToUpload" id="fileToUpload" <?php isset($errUploud) ? 'is-invald' : ''; ?>>
         
         <?php echo isset($errUploud) ? "<span  class=' d-block invalid-feedback'>$errUploud</span>" :''; ?>
         </div>
          <button type="submit" target="_blank" class="btn rounded-5 btn-submit  mt-5 px-5 f-14">ارسال</button>

       
</form>
<?php  } ?>
    </div>
  </div>
</div>



<?php  include('footer.php');  ?>