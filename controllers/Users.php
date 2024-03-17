<?php
class Users extends Controllers{

    public function index()
    {
        $user = new User();
        $users = $user->getUsers();
        $this->render("index", compact('users'));
    }
}

?>