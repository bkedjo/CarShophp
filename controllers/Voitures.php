<?php

class Voitures extends Controllers
{
    public function index()
    {
        $voitures = new Voiture();
        $voitures = $voitures->getVoitures();
        $this->render("index", compact('voitures'));
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
                $voitures = new Voiture();
                global $oPDO;
                $voitures->ajouter($_POST);
                $id_car = $oPDO->lastInsertId();
            }
            $this->telechargerImage($id_car);
            header("Location: " . URI . "voitures/index");

        }
        $this->render('ajouter');

    }

    /**
     * @param $id_car
     * @return void
     */
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
                $data = [
                    "id_car" => $id_car,
                    "chemin_image" => $image_destination
                ];
                $image->ajouter($data);
            }
        }
    }

    public function supprimer()
    {
        $params = explode("/", $_GET['p']);
        if (isset($params[2])) {
            if (is_numeric($params[2])) {
                $voitures = new Voiture();
                $data = ["id_car" => $params[2]];
                $voitures->supprimer($data);
                header('Location: ' . URI . 'voitures/index');
            }
        }


    }
}


?>