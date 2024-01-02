<?php 
require_once '../models/function.php';
    //session_start();
    if(isset($_GET['Userid'])){
        $User_ID = $_GET['Userid'];
        
        $status = DeleteUsers($User_ID);
        if($status){
            header('location: ../views/Deletenewuser.php'); 
        }else{
            echo "DB error, try again";
        }
}
    
?>
