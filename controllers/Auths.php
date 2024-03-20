<?php

class Auths extends Controllers
{
    public function inscription()
    {

        if (isset($_SESSION['users'])) {
            header("Location: " . URI . "voitures/index");
        }
        if (isset($_POST["submit"])) {
            if (!($this->estVide($_POST))) {
                if ($_POST["mot_de_passe"] === $_POST["c_mot_de_passe"]) {
                    $_POST["mot_de_passe"] = password_hash($_POST["mot_de_passe"], PASSWORD_DEFAULT);

                    unset($_POST["c_mot_de_passe"]);
                    unset($_POST["submit"]);
                    $_POST["id_role"] = 2;

                    $oAuth = new Auth();
                    $oAuth->inscription($_POST);


                }

            }

        }
        $this->render("register");
    }

    public function connexion()
    {
        if (isset($_SESSION['users'])) {
            header("Location: " . URI . "voitures/index");
        }
        if (isset($_POST['submit'])) {
            if (!$this->estVide($_POST)) {
                $mot_de_passe = $_POST["mot_de_passe"];
                unset($_POST["mot_de_passe"], $_POST["submit"]);
                $auth = new Auth();
                $user = $auth->findUserByEmail($_POST);
                if ($user) {
                    if (password_verify($mot_de_passe, $user->mot_de_passe)) {
                        $_SESSION["users"] = $user;
                        if($user->id_role === 2){
                            header("Location: ".URI."voitures/user");
                        } elseif($user->id_role === 1){
                            header("Location: ".URI."voitures/index");
                        }
                        exit();

                    } else {
                        $this->erreurs["emPass"] = "Email or password incorrect";
                        $this->render('login', $this->erreurs);

                    }
                } else {
                    $this->erreurs["emPass"] = "Email or password incorrect";
                    $this->render('login', $this->erreurs);
                }
            } else {
                $this->erreurs["emPass"] = "Email or password incorrect";
                $this->render('login', $this->erreurs);
            }

        }
        $this->render('login');
    }

    public function index()
    {
        if (!isset($_COOKIE["toto"])) {
            setcookie("toto", "Toto est là!", time() + (60 * 60 * 24));
        }
        echo "Je suis a index";

        var_dump($_SESSION["users"]);
    }

    public function deconnexion()
    {
        // fermeture de la session
        unset($_SESSION['users']);

        // retour vers la page films/index
        header("Location: " . URI . "voitures/index");
    }
}


?>