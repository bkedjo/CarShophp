<?php
  abstract class Controllers{
    protected $erreurs =[];
    public function render($fichier,$data = []){

        extract($data);
        ob_start();
        //echo ROOT."views/".lcfirst(get_class($this))."/".$fichier.".php";
        require_once(ROOT."views/".lcfirst(get_class($this))."/".$fichier.".php");
        $contenu=ob_get_clean();

        require_once(ROOT."views/layout/default.php");
    }
    public function __construct(){
        
    }

    public function estVide($datas){
        foreach($datas as $data){
            if(empty($data)){
                return true;
            }
        }

        return false;

    }

 }

?>