<div class="container mt-5">
    <h2>Page d'Ajout des Vehicules</h2>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="productName">Marque :</label>
            <input
                type="text"
                class="form-control"
                id="brand"
                name="brand"
                required
            />
        </div>
        <div class="form-group">
            <label for="productName">Modele :</label>
            <input
                type="text"
                class="form-control"
                id="model"
                name="model"
                required
            />
        </div>
        <div class="form-group">
            <label for="productName">Annee de fabrication :</label>
            <input
                type="text"
                class="form-control"
                id="car_year"
                name="car_year"
                required
            />
        </div>
        <div class="form-group">
            <label for="productPrice">Prix de vente : </label>
            <input
                type="text"
                class="form-control"
                id="price"
                name="price"
                required
            />
        </div>
        <div class="form-group">
            <label for="productPrice">Courte Description : </label>
            <input
                type="text"
                class="form-control"
                id="short_description"
                name="short_description"
                required
            />
        </div>
        <div class="form-group">
            <label for="productName">Description :</label>
            <input
                type="text"
                class="form-control"
                id="long_description"
                name="long_description"
                required
            />
        </div>
        <div class="form-group">
            <label for="productName">Quantite :</label>
            <input
                type="text"
                class="form-control"
                id="quantite"
                name="quantite"
                required
            />
        </div>
        <div class="form-group">
            <label for="image" class="form-label">Choisir une Image :</label>
            <input type="file" name="image" id="image" />
        </div>
        <input type="submit" name="submit" class="btn btn-primary" value="Add Car">

    </form>
</div>