<?php
$user=$email=$pass='';
$isSend=true;
$errors=array();
$target_dir = "uploads/";
$target_file ='';


function validData($data){
  $data=trim($data);
  $data=stripslashes($data);
  $data=htmlspecialchars($data);
  return $data;

}



if($_SERVER['REQUEST_METHOD'] == 'POST'){
  
if(empty($_POST['username'])){
  array_push($errors,'errUser=true');
   // header('Location: index.php?errUser=true');

}
if(empty($_POST['email'])){
  array_push($errors,'errEmail=true');
   // header('Location: index.php?errEmail=true');
  
}
if(empty($_POST['password'])){
  array_push($errors,'errPass=true');
   // header('Location: index.php?errPass=true');

}
if(count($errors)==0){
  $user=validData($_POST['username']);
  $email=validData($_POST['email']);
  $pass=validData($_POST['password']);
  $pass_hash=password_hash($pass,PASSWORD_DEFAULT);

 echo  $user;
 echo $email;
  echo $pass;
  // header('Location: index.php?register');
}else{
  header('Location: index.php?'.implode('&',$errors));
}

  
  if($_FILES["fileToUpload"]["name"]==''){
      $isUpload =0;
      array_push($errors,'errUploud=true');
      header('Location: index.php?'.implode('&',$errors));
     // header('location:index.php?Uploud=empty');
  }else{
      $target_file=$target_dir.basename($_FILES["fileToUpload"]["name"]);
 
      $TypeFile=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
     
      if($check !=false){
        $isUpload = 1;
      }else{
        $isUpload = 0;
      }
     
  }
  // Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $isUpload = 0;
}else{
 
  $isUpload =1;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $isUpload = 0;
}

// Allow certain file formats
if($TypeFile != "jpg" && $TypeFile != "png" && $TypeFile != "jpeg" && $TypeFile != "gif" ) {

echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
$isUpload = 0;
}

// Check if $uploadOk is set to 0 by an error
 if( $isUpload ==0){
 
 header('locatin:index.php?isUploud=false');
 }

else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    header('Location: index.php?register');
    require('connection.php');
    $q_insert = "INSERT INTO users (username, email, password,image,role)
VALUES ('$user', '$email', '$pass_hash','$target_file','user')";

if (mysqli_query($conn, $q_insert)) {
  header('locatin:index.php?register=true');
} else {
  header('locatin:index.php?register=false');
}
    mysqli_close($conn);
   
  } else {
    header('locatin:index.php?isUploud=false');
    
  }
}


}

?>


