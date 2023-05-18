<?php 
include('header.php');
require('connection.php');
$per_page = 9;
 $q_select_post="select * from posts";
 $res=mysqli_query($conn,$q_select_post);
$count_record = mysqli_num_rows($res);
if(isset($_GET['page'])){
  $page = $_GET['page'];
}else{
  $page =1;
}
$page_nav = ceil($count_record/$per_page);
$offset =($page -1)* $per_page;
$q = "select * from posts ORDER BY id DESC LIMIT $offset , $per_page";
$res=mysqli_query($conn,$q);

?>


<div class="container my-5 py-5">
  <div class="row  ">
 <?php  while($row = mysqli_fetch_assoc($res)): ?>
  <div class="col-lg-4  mt_5 mb-5">
    <div class="card cardItem">
       <div class="card-body">
<a class="a-card" href="single.php?p=<?=$row['id']?>">
        <h3 class="text-danger"><?= $row['title']?> <h3>
 </a>
          <p class="f-14"><?= $row['body']?></p>
          <p class=" f-14 text-warning reg-date"><?= $row['date_post']?></p>
       </div>
    </div>
  </div>
  <?php endwhile; ?>
</div>
<div class="row ">
  <div class="col-12 page-post">
    <nav>
      <ul class="pagination justify-content-center">
        <li class="page-item <?php echo $page == 1 ? 'disabled' : '' ; ?>"><a class="page-link" href="news.php?page=<?php echo $page-1; ?>">previous</a></li>
        <?php  for($i=1; $i <= $page_nav; $i++) {
           $active = $i == $page ? 'active' :  '';
          
          ?>
        
        
        <li class="page-item <?php echo $active; ?>"><a class="page-link" href="news.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
<?php  } ?>
        <li class="page-item <?php echo $page == $page_nav ? 'disabled' : '' ; ?>"><a class="page-link" href="news.php?page=<?php echo $page+1; ?>">Next</a></li>
       
      </ul>
    </nav>
  </div>

</div>

</div>








<?php include('footer.php');?>