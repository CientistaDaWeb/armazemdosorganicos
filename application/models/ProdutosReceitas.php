<?php

class ProdutosReceitas extends Zend_Db_Table_Abstract {

    protected $_name = 'produtos_receitas';
    protected $_referenceMap = array(
        'Produto' => array(
            'refTableClass' => 'Produto',
            'refColumns' => 'id',
            'columns' => array('produtos_id')
        ),
        'Receita' => array(
            'refTableClass' => 'Receita',
            'refColumns' => 'id',
            'columns' => array('receitas_id')
        )
    );

}

