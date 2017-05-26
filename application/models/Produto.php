<?php

class Produto extends Zend_Db_Table_Abstract {

    protected $_name = 'produtos';
    protected $_referenceMap = array(
        'Categoria' => array(
            'refTableClass' => 'ProdutoCategoria',
            'refColumns' => 'id',
            'columns' => array('produtos_categorias_id')
        )
    );
    protected $_dependentTables = array('ProdutosReceitas');

}

