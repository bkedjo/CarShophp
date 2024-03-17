<?php
class User extends Model{

    public function __construct()
    {
        parent::__construct();
        $this->table = "users";
    }

    public function getUsers()
    {
        $this->sql = "SELECT first_name, last_name, email, phone, date_naissance
        FROM users;";
        return $this->getLines();
    }



}

?>