<?php

class IndexController extends Zend_Controller_Action {

    public function init() {

    }

    public function indexAction() {
        $DBnoticia = new Noticia();
        $noticias = $DBnoticia->select()
                        ->order('data DESC')
                        ->limit('5')
                        ->query()
                        ->fetchAll();
        $this->view->noticias = $noticias;
    }

    public function enqueteAction() {
        
    }

    public function grupoAction() {
        
    }

}

