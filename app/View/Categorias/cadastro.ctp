<div id="categoria">
    <h2>Cadastro de Categorias</h2>

    <?php
    echo $this->Form->create('Categoria', array('class' => 'needs-validation'));

    echo $this->Form->input('nome', array(
        'label' => 'Nome da Categoria',
        'class' => 'form-control',
        'required' => true
    ));
    echo("<br>");
    echo $this->Form->end('Salvar', array('class' => 'btn btn-primary mt-3'));
    ?>

</div>