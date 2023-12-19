<?php
include_once 'config/dataBase.php';

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