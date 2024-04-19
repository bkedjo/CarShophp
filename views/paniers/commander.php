<div class="container mt-5">
    <h1>Liste Commande</h1>

    <div class="row row-cols-1 row-cols-md-2 g-4">
        <?php foreach ($voitures as $key => $valueVoiture) { 
            $voiture = $valueVoiture[1];
            $quantite = $valueVoiture[0];
        ?>
            <form action="<?= URI . 'paniers/modifier/' . $voiture->id_car; ?>" method="post">
                <div class="col">
                    <div class="card h-100">
                        <img src="<?= (isset($voiture->chemin_image)) ? URI . $voiture->chemin_image : URI . 'assets/best-electric-car.jpeg'; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $voiture->brand; " ". $voiture->model; " ". $voiture->car_year;?></h5>
                            <p class="card-text"><?= $voiture->price; ?></p>
                            <p class="card-text"><?= $voiture->short_description; ?></p>
                            <p class="card-text"><?= $voiture->quantite; ?></p>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between align-items-center">
                                <!-- Bouton Commander -->
                                <a class="btn btn-sm btn-success" href="<?= URI . 'paniers/paiement/' . $voiture->id_car; ?>">
                                    Acheter
                                </a>
                                <a class="btn btn-sm btn-success" href="<?= URI . 'paniers/paiement/' . $voiture->id_car; ?>">
                                    Louer
                                </a>
                                <a class="btn btn-sm btn-danger" href="<?= URI . 'paniers/supprimer/' . $voiture->id_car; ?>">
                                    <i class="bi bi-trash3-fill"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        <?php } ?>
    </div>
</div>
