<?php

namespace MyApp\Controllers;

class Home{
    protected $container;
    protected $view;
    public function __construct($view){
        $this->view = $view;
    }
    public function index($request, $response){
        // acessando recursos do container pimple
        //$r = $this->container->get('View');
        echo '<pre>';
        print_r($this->view);
        echo '</pre>';
        // aqui não podemos usar $this para acessar recursos do slim
        return $response->write('teste index');
    }
}