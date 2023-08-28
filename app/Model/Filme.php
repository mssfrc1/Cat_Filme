<?php

// app/Model/Filme.php

class Filme extends AppModel {
    public $belongsTo = array(
        'Categoria' => array(
            'className' => 'Categoria',
            'foreignKey' => 'categoria_id',
        )
    );

    public $validate = array(
        'image' => array(
            'rule' => array('extension', array('jpeg', 'png', 'jpg')),
            'message' => 'Favor utilizar uma imagem no formato jpeg, png ou jpg',
            'allowEmpty' => false,
        )
    );
}

?>