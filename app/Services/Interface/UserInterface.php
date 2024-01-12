<?php
 interface UserInterface
{
    public function addUser(User $user);
 
    public function fetchUser($id);
    public function countUser();
}

?>