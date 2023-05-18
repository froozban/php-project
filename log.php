<?php
session_start();
$user=$pass='';
$errors=array();

function validData($data){
  $data=trim($data);
  $data=stripslashes($data);
  $data=htmlspecialchars($data);
  return $data;

}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  
  if(empty($_POST['username'])){
    array_push($errors,'errUser=true');
  }
      
  if(empty($_POST['password'])){
    array_push($errors,'errPass=true');
  }
  if(count($errors)==0){
    $user=validData($_POST['username']);
    $pass=validData($_POST['password']);

require('connection.php');

$q_select="SELECT * from users where username='$user'";
$res=mysqli_query($conn,$q_select);


if(mysqli_num_rows($res) >0){
$get_user=mysqli_fetch_assoc($res);

if(password_verify($pass,$get_user['password'])){
  $_SESSION['username']=$get_user['username'];
  $_SESSION['role']=$get_user['role'];
//header('location:login.php?login=true');
header('location:home.php');
}else{
    header('location:login.php?errPasslog=true');
}
}else{
    header('location:login.php?errUserlog=true');
}
mysqli_close($conn);
  }else{
    header('Location:login.php?'.implode('&',$errors));
  }
}  




?>