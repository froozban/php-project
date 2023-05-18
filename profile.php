<?php include('header.php');
require('connection.php');
if($_SESSION['role']=="admin"){
    $q_select_all='select* from users';
}else{
    $user = $_SESSION['username'];
    $q_select_all="select* from users where username='$user'";
   
}

$res=mysqli_query($conn,$q_select_all);

?>


<div class="container">
  <div class="row mt-5">
    <div class="col-12 py=5  mt-5">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">username</th>
      <th scope="col">email</th>
      <th scope="col">password</th>
      <th scope="col">image</th>
      <th scope="col">register date</th>
      <th scope="col">role</th>
      <th scope="col">actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if(mysqli_num_rows($res) >0){
        while($row = mysqli_fetch_assoc($res)) {
          
    

    ?>
    <tr>
      <td><?= $row ['id'] ?></td>
      <td><?= $row ['username'] ?></td>
      <td><?= $row ['email'] ?></td>
      <td><?= $row ['password'] ?></td>
      <td class="td-image"><img src="<?= $row ['image'] ?>" class="img-table"></td>
      <td  class="reg-date"><?= $row ['index_date'] ?></td>
      <td><?= $row ['role'] ?></td>
      <td>
      <button class="btn btn-danger" onclick="removeUserData(<?=$row['id']?>,this)">Remove</button>
      <a class="btn btn-warning"  href="edit_user.php?id=<?= $row['id']?>">Edit</a>
      </td>
    </tr>
   <?php  }} ?>
  </tbody>
</table>



</div>
</div>
</div>




<?php include('footer.php');?>