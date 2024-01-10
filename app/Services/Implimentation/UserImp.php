<?php

require_once('../../config/DataBase.php');
require_once('../../Models/User.php');
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
        
        $data = $pdo->query($sql);
        $fetchUser = $data->fetchAll(PDO::FETCH_ASSOC);

        return  $fetchUser;
    }
}


?>