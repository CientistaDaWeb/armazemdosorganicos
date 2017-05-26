<?php

class ProdutoCategoria extends Zend_Db_Table_Abstract {

    protected $_name = 'produtos_categorias';
    protected $_dependentTables = array('Produto');

}

