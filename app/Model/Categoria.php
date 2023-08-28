<?php
class Categoria extends AppModel {

    public $validate = array(
        'titulo' => array(
            'rule' => 'notEmpty',
            'message' => 'Favor, inserir o titulo.'
        ),
        'sinopse' => array(
            'rule' => 'notEmpty',
            'message' => 'Favor, inserir o sinopse.'
        ),
        'categoria_id' => array(
            'rule' => 'numeric',
            'message' => 'Favor, inserir a categoria.'
        )
    );

}
?>