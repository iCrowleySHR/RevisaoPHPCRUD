<?php

class Carro {
    public $publico = 10;
    public static $publicostatico = 10;
    private $private = 10;
    protected $protected = 10;

    public function getPrivate() {
        return $this->private;
    }
}

$carro1 = new Carro();
$carro2 = new Carro();

print_r($carro->publico); // so da para chamar o publico, caso queira outro, deve usar a função

echo Carro::$publico; // Só funciona se a variavel for static