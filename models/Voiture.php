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
                        VALUE (:brand, :model, :car_year, :price, :short_description, :long_description, :quantite)";
        return $this->getLines($data, null);
    }

    public function getVoitures()
    {
        $this->sql = "select c.*, i.chemin_image from " . $this->table . " 
        c left JOIN image i on c.id_car = i.id_car;";
        return $this->getLines();
    }

    public function supprimer($data)
    {
        $this->sql = "delete from " . $this->table . " where id_car = :id_car";
        return $this->getLines($data, null);
    }

    public function getOneById($data)
    {
        $this->sql = "select c.*,i.chemin_image from " . $this->table . " 
        c left JOIN image i on c.id_car = i.id_car where c.id_car = :id_car";

        return $this->getLines($data, true);
    }
    public function modifier($data)
    {
            $this->sql = "UPDATE " . $this->table . " 
                            SET 
                                brand = :brand,
                                model = :model,
                                car_year = :car_year,
                                price = :price,
                                short_description = :short_description,
                                long_description = :long_description,
                                quantite = :quantite
                            WHERE id_car = :id_car";
            return $this->getLines($data, null);
    }

    public function search_year($car_year)
    {
        $this->sql = "SELECT * FROM " . $this->table . " WHERE car_year = :car_year";
        return $this->getLines(["car_year" => $car_year]);
    }


}