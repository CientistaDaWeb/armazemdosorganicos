<?php

class MidiasController extends Zend_Controller_Action {

    public function indexAction() {
        $this->view->headScript()->appendFile('/js/jquery.lightbox-0.5.pack.js');
        $this->view->headLink()->appendStylesheet('/css/jquery.lightbox-0.5.css');
    }

}

