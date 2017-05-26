<?php

class Application_Model_DbTable_Receita extends Zend_Db_Table_Abstract {

    protected $_name = 'receitas';
    protected $_dependentTables = array('ProdutosReceitas');

}

