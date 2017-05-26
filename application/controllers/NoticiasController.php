<?php

class NoticiasController extends Zend_Controller_Action {

    public function init() {

    }

    public function indexAction() {
        $DBnoticia = new Noticia();
        $this->view->noticias = $DBnoticia->select()->order('data DESC')->query()->fetchAll();
    }

    public function internaAction() {
        $slug = $this->_request->getParam('slug');
        $DBnoticia = new Noticia();
        $noticia = $DBnoticia->select()->where('slug=?', $slug)->query()->fetch();
        $this->view->noticia = $noticia;
    }

}

