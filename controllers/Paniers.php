<?php

class Paniers extends Controllers
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $panier = new Panier();
        $voitures = $panier->getAll();
        $this->render('index', compact('voitures'));

    }
    public function commander()
    {
        $panier = new Panier();
        $voitures = $panier->getAll();
        $this->render('commander', compact('voitures'));

    }

    public function ajouter($id_car)
    {
        if (is_numeric($id_car)) {
            $panier = new Panier();
            $panier->ajouter($id_car, 1);
        }
        header('Location: ' . URI . 'voitures/index');
    }

    public function modifier($id_car)
    {
        if (is_numeric($id_car)) {
            $quantite = $_POST['quantite'];
            if (is_numeric($quantite)) {
                $panier = new Panier();
                $panier->ajouter($id_car, $quantite);
            }
        }
        header("Location: " . URI . "paniers/index");

    }

    public function supprimer($id_car)
    {
        if (is_numeric($id_car)) {
            $panier = new Panier();
            $panier->supprimer($id_car);
        }
        header("Location: " . URI . "paniers/index");
    }

}