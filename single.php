<?php
 include('header.php');
require('connection.php');
$id_post = $_GET['p'];
$q_select_post="select * from posts where id='$id_post'";
$res=mysqli_query($conn,$q_select_post);
$response=mysqli_fetch_assoc($res);


?>



<div class="container my-5 py-5">
  <div class="row  ">
  <div class="col-lg-12 mt_5 mb-5">
    <div class="card cardItem">
       <div class="card-body">
        <h3 class="text-danger"><?= $response['title']?> <h3>

          <p class="f-16"><?= $response['body']?></p>
          <p class="f-16 text-warning reg-date"><?= $response['date_post']?></p>
       </div>
    </div>
  </div>

</div>
</div>




<?php include('footer.php');?>