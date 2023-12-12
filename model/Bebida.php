<?php

class Bebida extends Producto {
    private $mililitros;

    public function __construct() {
    
    }

    /**
     * Set the value of mililitros
     *
     * @return  self
     */ 
    public function setMililitros($mililitros)
    {
        $this->mililitros = $mililitros;

        return $this;
    }

    /**
     * Get the value of mililitros
     */ 
    public function getMililitros()
    {
        return $this->mililitros;
    }
}


?>