<?php
session_start();
$arr=[];
if(isset($_POST)){
    $data=file_get_contents("php://input");

    $user=json_decode($data, true);
    
    if(is_array($user)){
        foreach($user as $value){
              array_push($arr,$value);   
            }
        } 
        $_SESSION['arr']=$arr;     
    }

else
echo"no";
echo "Array from session: " . implode(", ", $arr);
?>