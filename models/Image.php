<?php

class Image extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function ajouter($data)
    {
        $this->sql = "insert into image(id_car, chemin_image) 
            VALUE(:id_car, :chemin_image)";
        return $this->getLines($data, null);
    }


}