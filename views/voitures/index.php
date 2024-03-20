<div class="container mt-5">
    <!-- Message défilant -->
    <marquee behavior="scroll" direction="left" style="background-color: pink;">
        <h1 style="color: blue;">Bienvenue sur le site de vente et de location de voitures électriques</h1>
    </marquee>

    <br />
    <br />
    <img height="400px" width="100%"
    src= "<?= URI . "assets/best-electric-car.jpg"?>" alt="Description de l'image">
    <br />
        
    <br />

    <!-- Bouton pour ajouter une voiture -->
    
    <div class="button-container">
        <a class="btn btn-primary" href="<?= URI . "voitures/ajouter" ?>">Ajouter une voiture</a>
        <a class="btn btn-primary" href="<?= URI . "users/index" ?>">Voir les Utilisateurs</a>
        <a class="btn btn-primary" href="<?= URI . "voitures/consulter" ?>">Voir les Administrateurs</a>
    </div>
    <br />
        <h1>Liste des voitures en Vente:</h1>
    <br />

    <!-- Tableau des voitures -->
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Marque</th>
                <th scope="col">Modèle</th>
                <th scope="col">Année</th>
                <th scope="col">Prix</th>
                <th scope="col">Petite Description</th>
                <th scope="col">Description</th>
                <th scope="col">Quantité</th> <!-- Ajout de la colonne Quantité -->
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $cpt = 1;
            foreach ($voitures as $voiture) { ?>
                <tr>
                    <th scope="row"><?= $cpt++; ?></th>
                    <td>
                        <img height="100px" width="150px"
                            src="<?= 
                            (isset($voiture->chemin_image)) ? 
                            URI . $voiture->chemin_image : 
                            URI . 'assets/best-electric-car.jpg'; 
                            ?>
                        ">
                    </td>
                    <td><?= $voiture->brand; ?></td>
                    <td><?= $voiture->model; ?></td>
                    <td><?= $voiture->car_year; ?></td>
                    <td><?= $voiture->price; ?></td>
                    <td><?= $voiture->short_description; ?></td>
                    <td><?= $voiture->long_description; ?></td>
                    <td><?= $voiture->quantite; ?></td> <!-- Affichage de la quantité -->
                    <td>
                        <!-- Bouton pour ajouter au panier -->
                        <a class="btn btn-sm btn-success" href="<?= URI . 'paniers/ajouter/' . $voiture->id_car; ?>">
                            Add card
                        </a>
                        <!-- Bouton pour modifier la voiture -->
                        <a class="btn btn-sm btn-warning" href="<?= URI . 'voitures/modifier/' . $voiture->id_car; ?>">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <!-- Bouton pour supprimer la voiture -->
                        <a class="btn btn-sm btn-danger" href="<?= URI . 'voitures/supprimer/' . $voiture->id_car; ?>">
                            <i class="bi bi-trash3-fill"></i>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
