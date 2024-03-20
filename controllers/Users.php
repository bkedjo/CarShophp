<?php
class Users extends Controllers{

    public function index()
    {
        $user = new User();
        $users = $user->getUsers();
        $this->render("index", compact('users'));
    }
    public function supprimer()
    {
        $params = explode("/", $_GET['p']);
        if (isset($params[2])) {
            if (is_numeric($params[2])) {
                $user = new User();
                $data = ["id_user" => $params[2]];
                $user->supprimer($data);
                header('Location: ' . URI . 'users/index');
            }
        }


    }
}

?>