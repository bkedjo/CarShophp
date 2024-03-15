<?php

require_once ROOT."app/database/connexion.php";

abstract class Model{
    protected $sql;
    protected $table;
   

    public function __construct(){
        
    }

        public function getLines($params = [], $estUneligne = false)
    {
        global $oPDO;
        $stmt = $oPDO->prepare($this->sql);
        foreach ($params as $paramKey => $paramValue) {
            $stmt->bindValue(":" . trim($paramKey), trim($paramValue));
        }
        // insert, update, delete
        $result = $stmt->execute();
        if ($estUneligne === null) {
            return $result;
        }
        return $estUneligne ?
            $stmt->fetch(PDO::FETCH_OBJ) :
            $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getAll(){
        $this->sql="SELECT * FROM $this->table";
        return $this->getLines();
        
    }

}


?>