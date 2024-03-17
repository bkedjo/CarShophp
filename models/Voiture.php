<?php

class Voiture extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = "car";
    }

    public function ajouter($data)
    {
        $this->sql = "insert into " . $this->table . " (brand, model, car_year, price, short_description, long_description, quantite) 
                        VALUE (:brand, :model, :car_year, :pri :short_description, :long_description, :quantite)";
        return $this->getLines($data, null);
    }

    public function getVoitures()
    {
        $this->sql = "select f.*,i.chemin_image from " . $this->table . " 
        f left JOIN image i on f.id_car = i.id_car;";
        return $this->getLines();
    }

    public function supprimer($data)
    {
        $this->sql = "delete from " . $this->table . " where id_car = :id_car";
        return $this->getLines($data, null);
    }

    public function getOneById($data)
    {
        $this->sql = "select f.*,i.chemin_image from " . $this->table . " 
        f left JOIN image i on f.id_car = i.id_car where f.id_car = :id_car";

        return $this->getLines($data, true);
    }


}