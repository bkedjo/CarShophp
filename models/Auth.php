<?php

class Auth extends Model
{
    const ADMIN = "admin";
    const CLIENT = "client";

    public function __construct()
    {
        parent::__construct();
        $this->table = "users";
    }

    public function inscription($data)
    {

        $this->sql = "INSERT INTO $this->table (first_name,last_name,email,phone,date_naissance,mot_de_passe,id_role)
        VALUES (:first_name,:last_name,:email,:phone,:date_naissance,:mot_de_passe,:id_role)";
        return $this->getLines($data, null);


    }

    public function findUserByEmail($data)
    {
        $this->sql = "select u.*,r.description from " . $this->table . "  
        u join Role r on u.id_role = r.id_role where email = :email";
        return $this->getLines($data, true);
    }

}

?>