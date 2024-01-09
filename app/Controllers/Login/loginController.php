<?php

require_once('../../Services/Interface/LoginInterface.php');
require_once('../../Services/Implimentation/LoginImp.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $logincheck = new LoginImp();
    $row = $logincheck->fetch($username);
   
  
    if($row){
        
        if(password_verify($password, $row['password'])){

            session_start();
            $_SESSION['idUser'] = $row['id'];
            
            if ( $row['role'] == "admin") {
                header('location:../../Views/adminDashboard/dashboard/dashboard.php');
                exit();
            } else {
                header('location:../../Views/author/wiki/displayWiki.php');
                // var_dump($roleRow['roleName']);
                exit();
            }
            
        }else{
            echo '<qcript>alert("password invalid")</script>';
        }
    }else{
        echo '<qcript>alert("username invalid")</script>';
    }
    
}

?>