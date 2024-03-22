<?php

class Voitures extends Controllers
{
    public function index()
    {
        $voiture = new Voiture();
        $voitures = $voiture->getVoitures();
        $this->render("index", compact('voitures'));
    }
    public function user(){
        $voiture = new Voiture;
        $voitures = $voiture->getVoitures();
        $this->render("user",compact('voitures'));
    }

    /**
     * @return void
     */
    public function ajouter()
    {
        $id_car = -1;
        if (isset($_POST['submit'])) {
            if (!$this->estVide($_POST)) {
                unset($_POST['submit']);
                $voiture = new Voiture();
                global $oPDO;
                $voiture->ajouter($_POST);
                $id_car = $oPDO->lastInsertId();
            }
            $this->telechargerImage($id_car);
            header("Location: " . URI . "voitures/index");

        }
        $this->render('ajouter');

    }

    private function telechargerImage($id_car)
    {
        if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
            $image_name = $_FILES["image"]["name"];
            $image_tmp = $_FILES["image"]["tmp_name"];
            $image_destination = "assets/images/" . basename($image_name); // Chemin de destination du fichier sur le serveur


            $image_type = strtolower(pathinfo($image_destination, PATHINFO_EXTENSION));

            if (!in_array($image_type, array("jpg", "jpeg", "png", "gif"))) {
                echo "Seules les images JPG, JPEG, PNG et GIF sont autorisées.";
                exit();
            }
            if (move_uploaded_file($image_tmp, ROOT . $image_destination)) {
                $image = new Image();
                $voitures = [
                    "id_car" => $id_car,
                    "chemin_image" => $image_destination
                ];
                $image->ajouter($voitures);
            }
        }
    }

    public function supprimer()
    {
        $params = explode("/", $_GET['p']);
        if (isset($params[2])) {
            if (is_numeric($params[2])) {
                $voiture = new Voiture();
                $voitures = ["id_car" => $params[2]];
                $voiture->supprimer($voitures);
                header('Location: ' . URI . 'voitures/index');
            }
        }
    }
    public function modifier($id_car)
    {
        // Vérifiez d'abord si le formulaire de modification a été soumis
        if (isset($_POST['submit'])) {
            // Vérifiez si les données du formulaire ne sont pas vides
            if (!$this->estVide($_POST)) {
                // Supprimez le champ 'submit' du tableau POST
                unset($_POST['submit']);
                // Créez une instance du modèle Voiture
                $voiture = new Voiture();
                // Récupérez les données de la voiture à modifier
                $voitures = $voiture->getOneById(["id_car" => $id_car]);
                // Vérifiez si la voiture existe avant de tenter de la modifier
                if ($voitures) {
                    // Mettez à jour les données de la voiture avec les données du formulaire
                    $voitures->brand = $_POST['brand'];
                    $voitures->model = $_POST['model'];
                    $voitures->car_year = $_POST['car_year'];
                    $voitures->price = $_POST['price'];
                    $voitures->short_description = $_POST['short_description'];
                    $voitures->long_description = $_POST['long_description'];
                    $voitures->quantite = $_POST['quantite'];
    
                    // Utilisez la méthode telechargerImage() pour gérer le téléchargement de la nouvelle image
                    $this->telechargerImage($id_car);
    
                    // Appelez la méthode modifier avec les données mises à jour
                    $voiture->modifier($voitures);
                } else {
                    // Gérer le cas où la voiture n'existe pas
                    echo "La voiture spécifiée n'existe pas.";
                    // Arrêtez l'exécution du script ou redirigez l'utilisateur vers une autre page selon votre besoin
                    exit();
                }
            }
            // Redirigez l'utilisateur vers la page d'index des voitures après la modification
            header("Location: " . URI . "voitures/index");
        }
        // Rendre la vue pour afficher le formulaire de modification
        $this->render('modifier', ['voiture' => $voitures]);
    }
    

    public function search_year()
    {
        if (isset($_POST['search_year']) && !empty($_POST['car_year'])) {
            $car_year = $_POST['car_year'];
            $voiture = new Voiture();
            $voitures = $voiture->search_year($car_year);
            $this->render("index", compact('voitures'));
        } else {
            // Gérer le cas où l'année n'est pas spécifiée ou vide
            echo "Veuillez entrer une année valide.";
            header("Location: " . URI . "voitures/index");
            // Arrêtez l'exécution du script ou redirigez l'utilisateur vers une autre page selon votre besoin
            exit();
        }
    }




}


?>