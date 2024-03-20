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
        FROM " . $this->table . ";";
        return $this->getLines();
    }
    public function supprimer($data)
    {
        $this->sql = "delete from " . $this->table . " where id_user = :id_user";
        return $this->getLines($data, null);
    }



}

?>