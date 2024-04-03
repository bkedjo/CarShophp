<form action="<?= URI . 'voitures/modifier/' . $voiture->id_car; ?>" method="POST">
<h1>Modifier Voiture:</h1>
    <div class="mb-3">
        <label for="brand" class="form-label">Marque</label>
        <input type="text" class="form-control" id="brand" name="brand" value="<?= $voiture->brand ?>" required>
    </div>
    <div class="mb-3">
        <label for="model" class="form-label">Modèle</label>
        <input type="text" class="form-control" id="model" name="model" value="<?= $voiture->model ?>" required>
    </div>
    <div class="mb-3">
        <label for="car_year" class="form-label">Année</label>
        <input type="number" class="form-control" id="car_year" name="car_year" value="<?= $voiture->car_year ?>" required>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Prix</label>
        <input type="number" class="form-control" id="price" name="price" value="<?= $voiture->price ?>" required>
    </div>
    <div class="mb-3">
        <label for="short_description" class="form-label">Description courte</label>
        <textarea class="form-control" id="short_description" name="short_description" rows="3"><?= $voiture->short_description ?></textarea>
    </div>
    <div class="mb-3">
        <label for="long_description" class="form-label">Description longue</label>
        <textarea class="form-control" id="long_description" name="long_description" rows="5"><?= $voiture->long_description ?></textarea>
    </div>
    <div class="mb-3">
        <label for="quantite" class="form-label">Quantité</label>
        <input type="number" class="form-control" id="quantite" name="quantite" value="<?= $voiture->quantite ?>" required>
    </div>
    <div class="form-group">
            <label for="image" class="form-label">Choisir une Image :</label>
            <input type="file" name="image" id="image" />
        </div>
    <button type="submit" class="btn btn-primary" name="submit">Modifier</button>
</form>
