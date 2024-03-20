<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    <title>Vente des voitures</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>

                <?php
                if (!isset($_SESSION['users'])) {

                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href=<?= URI . "auths/connexion" ?>>Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=<?= URI . "auths/inscription" ?>>Inscription</a>
                    </li>
                    <?php
                } else {

                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=<?= URI . "auths/deconnexion" ?>>Deconnexion</a>
                    </li>
                    <?php
                }

                ?>
                <li>
                    <a class="btn btn-primary" href=<?= URI . "paniers/index" ?>><i class="bi bi-cart3"><?=
                            (isset($_SESSION['Paniers'])) ?
                                count($_SESSION['Paniers'])
                                : 0;

                            ?></i></a>
                </li>

            </ul>
                <form class="d-flex" action="<?= URI . 'voitures/search_year' ?>" method="POST">
                    <input class="form-control me-2" type="search" placeholder="Anneé recherché" aria-label="Search" name="year">
                    <button class="btn btn-outline-success" type="submit" name="search_year">Rechercher</button>
                </form>

        </div>
    </div>
</nav>