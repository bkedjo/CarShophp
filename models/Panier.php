<?php

class Panier
{

    public function __construct()
    {
        if (!isset($_SESSION['Paniers'])) {
            $_SESSION['Paniers'] = [];
        }
    }

    public function ajouter($id, $quantite)
    {
        $_SESSION['Paniers'][$id] = $quantite;

    }

    public function supprimer($id)
    {
        unset($_SESSION['Paniers'][$id]);
    }

    public function getAll()
    {
        $voitures = [];
        $voiture = new Voiture();
        foreach ($_SESSION['Paniers'] as $key => $quantite) {
            $data = ['id_car' => $key];

            // [0,[12,voiture]]
            $voitures[] = [$quantite, $voiture->getOneById($data)];
        }
        return $voitures;
    }


}