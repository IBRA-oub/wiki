<?php


require_once(dirname(dirname(__FILE__)) .'/Interface/LoginInterface.php');
require_once('../../config/DataBase.php');

class LoginImp  extends DataBase implements LoginInteface{
    
    public function fetch($username){
        $pdo = $this->connection();

        $sql = "SELECT * FROM user WHERE username = :username";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username',$username);
        
        $stmt->execute();
        $fetchUsername = $stmt->fetch(PDO::FETCH_ASSOC);

        return  $fetchUsername;
    }
   

}



?>