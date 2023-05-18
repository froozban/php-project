<?php  declare(strict_types=1);
include('header.php');
if(isset($_GET['id'])){
    $user_id=$_GET['id'];
    require_once('connection.php');
    $q_select="select * from users where id = '$user_id'";
    $res=mysqli_query($conn,$q_select);
    $response=mysqli_fetch_assoc($res);
}

?>

<div class="container">
  <div class="row ">
    <div class="col-6 mx-auto mt-5">
      
      

    
        
        <div class="  mt-5">
          <div class=" mt-5">
            <input type="text" value="<?= $response['username']?>" id="username"  placeholder="نام و نام خانوادگی"  name="username" class="form-control ">
         
          </div>
          
          <div class="mt-5"> 
             <input type="email"   value="<?= $response['email'] ?>" id="email" placeholder="ایمیل" name="email" class="form-control"  >
          
            </div>
            <?php if($_SESSION['role']=='user'):?>
          <div class=" mt-5">
            <input type="password" placeholder="پسورد"   id="pass" name="password" class="form-control" >
            
          </div>

        </div>
        <?php endif;?>
        <?php if($_SESSION['role']=='admin'):?>
          <div class=" mt-5">
            <lable > role <lable>
                <select>
                <option></option>
                    <option>user</option>
                    <option>admin</option>

                </select>
            
          </div>

        </div>
        <?php endif;?>
    
         <div class="mt-5">
         <img src="<?= $response['image']?>" class="img-table">
         <input type="file" name="fileToUpload" id="fileToUpload" >
         
         </div>
          <button type="submit" onclick="editUser(<?= $user_id?>)" class="btn rounded-5 btn-submit  mt-5 px-5 f-14">ارسال</button>

       


    </div>
  </div>
</div>



<?php  include('footer.php');  ?>