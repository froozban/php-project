<!DOCTYPE html>
<html lang="en">
<?php

session_start();

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/all.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">


</head>


<body  onload="getData()">
  <!--header-->

  <nav class="navbar   navbar-expand-lg navbar-dark fixed-top ">
    <div class="container-fluid">
      
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#myoffcanvas" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse order-2 order-lg-1" >
        <ul class="navbar-nav  mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="home.php">خانه</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">لینک</a>
          </li>
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              محصولات
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item text-center" href="#">عکاسی</a></li>
          <li><a class="dropdown-item text-center" href="#">مجله</a></li>
          <li><hr class="dropdown-divider text-center"></li>
          <li><a class="dropdown-item text-center" href="#">روزنامه</a></li>
            </ul>
            <li><a class="nav-link active" aria-current="page" href="news.php"> اخبار</a></li>
          </li>
          
           <?php
           if(!isset($_SESSION['username']) ){

          ?>
          
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php"> ثبت نام </a>
          </li>
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="login.php">ورود </a>
          </li>

          <?php }else{?>

            <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="profile.php"><?php  echo $_SESSION['username'];?> </a>
          </li>
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="logout.php">خروج </a>
          </li>


          <?php }?>
        </ul>
        
      </div>
      <a class="navbar-brand order-1 order-lg-2" href="#">
        <img src="assets/img/logo.png">
      </a>
    </div>
  </nav>

