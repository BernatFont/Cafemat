<?php
include_once 'config/dataBase.php';
include_once 'model/Usuario.php';
class Admin extends Usuario{
    private $nivelAcceso;

    public function __construct(){
        parent::__construct();
    }

    public function getNivelAcceso()
    {
        return $this->nivelAcceso;
    }

    public function setNivelAcceso($nivelAcceso)
    {
        $this->nivelAcceso = $nivelAcceso;
        return $this;
    }

}


?>