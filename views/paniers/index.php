<div class="container mt-5">
    <h1>Liste d'articles dans mon panier</h1>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Marque</th>
            <th scope="col">Modele</th>
            <th scope="col">Année</th>
            <th scope="col">Prix</th>
            <th scope="col">Courte Description</th>
            <th scope="col">Quantite</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $cmpt = 1;
        foreach ($voitures as $key => $valueVoiture) {
            $voiture = $valueVoiture[1];
            $quantite = $valueVoiture[0];
            ?>
            <form action="<?= URI . 'paniers/modifier/' . $voiture->id_car; ?>" method="post">
                <tr>
                    <th scope="row"><?= $cmpt++; ?></th>
                    <td>
                        <img height="100px" width="150px"
                             src=<?=
                        (isset($voiture->chemin_image)) ?
                            URI . $voiture->chemin_image :
                            URI . 'assets/best-electric-car.jpeg';

                        ?>></td>
                    <td><?= $voiture->brand; ?></td>
                    <td><?= $voiture->model; ?></td>
                    <td><?= $voiture->car_year; ?></td>
                    <td><?= $voiture->price; ?></td>
                    <td><?= $voiture->short_description; ?></td>
                    
                    <td><input name="quantite" min="0" max="<?= $voiture->quantite; ?>" value="<?php
                        if ($voiture->quantite < $quantite) {
                            $quantite = $voiture->quantite;
                            $panier = new Panier();
                            $panier->ajouter($voiture->id_car, $quantite);
                            echo $quantite;
                        } else {
                            echo $quantite;
                        }

                        ?>"
                               type="number">
                    </td>
                    <td class="row">
                        <button type="submit" class="btn btn-sm btn-warning col">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <!--    ajouter bouton acheter et louer      <div class="col"></div>-->
                        <a class="btn btn-sm btn-danger col" href=<?= URI . 'paniers/supprimer/' . $voiture->id_car; ?>>
                            <i class="bi bi-trash3-fill"></i>
                        </a>
                    </td>
                </tr>
            </form>
        <?php } ?>
        </tbody>
    </table>
</div>
