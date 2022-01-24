<?php

namespace app\controller;

use app\core\Controller;

class PagesController extends Controller {

    public function home(){
        $this->load('home/main');
    }
    public function produto(){
        $this->load('produto/main',[
            'nome' => 'RRVC'
        ]);
    }
    public function quemSomos(){
        $this->load('quem-somos/main',[
            'nome' => 'RRVC'
        ]);
    }
    public function contato(){
        $this->load('contato/main',[
            'nome' => 'RRVC'
        ]);
    }
}