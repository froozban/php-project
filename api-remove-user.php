<?php
// header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json; charset=UTF-8");


?>
<?php

require('connection.php');


if($_SERVER['REQUEST_METHOD']=="POST"){
    $id_user = json_decode(file_get_contents('php://input'));
    $q_delete="DELETE from users where id ='$id_user->id'";
    if(mysqli_query($conn,$q_delete)){
        $response=array();
$respons['statuse']=200;
$response['response']="delete record is success";
echo json_encode( $respons);
    }else{
        $respons['statuse']=400;
        $response['response']="delete record is fail";
        echo json_encode( $respons);
    }
    
}else{
    $response['response']="you should be method post ";
    echo json_encode( $respons);
};

mysqli_close($conn);

?>