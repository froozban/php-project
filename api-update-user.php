<?php
session_start();
 header("Access-Control-Allow-Origin: *");
 header("Content-Type: application/json; charset=UTF-8");



require('connection.php');



if($_SERVER['REQUEST_METHOD']=="POST"){
   $params = json_decode(file_get_contents('php://input'));

  // $hash_pass = password_hash($params->pass,PASSWORD_DEFAULT);
  
  
    $q_update="update users set username ='$params->username',email ='$params->email'  where id='$params->id'";
 
    if(mysqli_query($conn,$q_update)){
       
        $response['statuse']=200;
        $response['response']="update record is success";
       $_SESSION['username']=$params->username;
        
        echo json_encode( $response);
    }else{
        $response['statuse']=400;
        $response['response']="update  record is fail";
        echo json_encode( $response);
    }
    
}else{
    $response['response']="you should be method post ";
    echo json_encode( $response);
};

mysqli_close($conn);

?>