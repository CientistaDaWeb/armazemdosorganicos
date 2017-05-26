<?php

class ProdutosController extends Zend_Controller_Action {

    public function init() {

    }

    public function indexAction() {
        $DBprodutocategoria = new ProdutoCategoria();
        $categorias = $DBprodutocategoria->fetchAll();
        $this->view->categorias = $categorias;
    }

}

