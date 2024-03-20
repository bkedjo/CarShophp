<div class="container mt-5">
    <!-- Message défilant -->
    <marquee behavior="scroll" direction="left" style="background-color: pink;">
        <h1 style="color: blue;">Bienvenue dans la liste des utilisateurs</h1>
    </marquee>

    <br />
    <br />
    <img height="300px" width="100%"
    src= "<?= URI . "assets/best-electric-car.jpg"?>" alt="Description de l'image">
    <br />
    <br />

    <!-- Tableau des utilisateurs -->
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Email</th>
                <th scope="col">Telephone</th>
                <th scope="col">Date de Naissance</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $cpt = 1;
            foreach ($users as $user) { ?>
                <tr>
                <th scope="row"><?= $cpt++; ?></th>
                    <td><?= $user->first_name; ?></td>
                    <td><?= $user->last_name; ?></td>
                    <td><?= $user->email; ?></td>
                    <td><?= $user->phone; ?></td>
                    <td><?= $user->date_naissance; ?></td>
                    <td>
                        <!-- Bouton pour supprimer la user -->
                        <a class="btn btn-sm btn-danger" href="<?= URI . 'users/supprimer/' . $user->id_user; ?>">
                            <i class="bi bi-trash3-fill"></i>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a class="btn btn-primary" href="<?= URI . "voitures/index" ?>">Voir les voitures</a>
</div>
