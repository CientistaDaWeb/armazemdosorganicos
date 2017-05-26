<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

    protected function _initDoctype() {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->setEncoding('UTF-8');
        $view->doctype('XHTML1_STRICT');
    }

    protected function _initAutoLoader() {
        $autoloader = Zend_Loader_Autoloader::getInstance ();
        $autoloader->registerNamespace('WS');
        $autoloader->registerNamespace('Phpmailer');
        $autoloader->registerNamespace('Noumenal');
        $autoloader->setFallbackAutoloader(true);
    }

    public function _initConfigs() {
        $configs = new Zend_Config_Ini(APPLICATION_PATH . '/configs/config.ini', 'webscientist');
        Zend_Registry::set('configs', $configs);
    }

    protected function _initJquery() {
        $view = new Zend_View();
        $view->addHelperPath("ZendX/JQuery/View/Helper", "ZendX_JQuery_View_Helper");

        $viewRender = new Zend_Controller_Action_Helper_ViewRenderer($view);
        Zend_Controller_Action_HelperBroker::addHelper($viewRender);
    }

    public function _initRotes() {
        $this->controller = Zend_Controller_Front::getInstance();
        $this->router = $this->controller->getRouter();
        $this->router->addRoute('noticia', new Zend_Controller_Router_Route('noticia/:slug', array(
                    'controller' => 'noticias',
                    'action' => 'interna',
                    'slug' => '')));
        $this->router->addRoute('enquete', new Zend_Controller_Router_Route('enquete', array(
                    'controller' => 'index',
                    'action' => 'enquete')));
        $this->router->addRoute('grupo', new Zend_Controller_Router_Route('grupo', array(
                    'controller' => 'index',
                    'action' => 'grupo')));
    }

    public function _initTranslate() {
        $translate = new Zend_Translate('Gettext', APPLICATION_PATH . '/translates/validate/pt_BR.mo');
        Zend_Validate_Abstract::setDefaultTranslator($translate);
    }

    public function _initRedirect() {
        $configs = Zend_Registry::get('configs');

        //Configura os PATH
        defined('IMAGE_PATH') || define('IMAGE_PATH', '/images/');
        //defined('IMAGE_PATH') || define('IMAGE_PATH', 'http://images.weentigra.com.br/'.$configs->cliente->dominio.'/');

        if($_SERVER['SERVER_ADDR'] == $configs->cliente->ip) {
            if($_SERVER['HTTP_HOST'] == $configs->cliente->dominio) {
                $url = $_SERVER['REQUEST_URI'];
                header('HTTP/1.1 301 Moved Permanently');
                header('Location: http://www.'.$configs->cliente->dominio.$url);
            }
        }
    }

    public function _initHelpers() {
        $this->view->addHelperPath(LIBRARY_PATH.'/Noumenal/View/Helper','Noumenal_View_Helper');
    }
    function run() {
        $this->_initHelpers();
        parent::run();
    }

}