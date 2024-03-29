<?php

require_once(__DIR__.'/../../config/DataBase.php');
require_once(__DIR__.'/../../Models/User.php');
require_once(dirname(dirname(__FILE__)) .'/Interface/UserInterface.php');

class UserImp extends DataBase implements UserInterface{
    public function addUser(User $user){
        $pdo = $this->connection();
        
        $fullName = $user->getFullName();
        $username = $user->getUsername();
        $email = $user->getEmail();
        $password = $user->getPassword();
        $pictureUser = $user->getPictureUser();

       

        $sql = "INSERT INTO user (fullName,username,email,password,pictureUser,role) VALUES (:fullName,:username,:email,:password,:pictureUser,'author');";
        
        $stmt = $pdo->prepare($sql);
        
        $stmt->bindParam(':fullName',$fullName);
        $stmt->bindParam(':username',$username);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':password',$password);
        $stmt->bindParam(':pictureUser',$pictureUser);

        $stmt->execute();
        
    }
   
    public function fetchUser($id){

        $pdo = $this->connection();

        $sql = "SELECT * FROM user WHERE idUser = :idUser";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':idUser',$id);
        
        $stmt->execute();
        $fetchUser = $stmt->fetch(PDO::FETCH_ASSOC);

        return  $fetchUser;
        
    }

    public function countUser(){
        $pdo = $this->connection();

        $sql = "SELECT count(*) AS count FROM user WHERE role = 'author'";
        
        $data = $pdo->query($sql);
        $countUser = $data->fetch(PDO::FETCH_ASSOC);

        return  $countUser;
    }
}


?>