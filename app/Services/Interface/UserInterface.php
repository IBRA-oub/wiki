<?php
 interface UserInterface
{
    public function addUser(User $user);
    public function displayUser();
    public function fetchUser($id);
}

?>