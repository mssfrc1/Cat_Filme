<div id="cadastro">
    <h2>Cadastro de Filmes</h2>
    <br>
    <?php
    echo $this->Form->create('Filme', array('type' => 'file', 'class' => 'needs-validation'));
    
    echo $this->Form->input('titulo', array(
        'class' => 'form-control',
        'required' => true
    ));
    
    echo $this->Form->input('sinopse', array(
        'class' => 'form-control',
        'required' => true
    ));
    
    // Mostra o nome da categoria, mas envia o ID
    echo $this->Form->input('categoria_id', array(
        'type' => 'select',
        'options' => $categorias,
        'class' => 'form-control',
        'required' => true,
        'id' => 'categoria-select'
    ));
    
    echo "<br>";
    echo $this->Form->label('capa', 'Capa', array('class' => 'form-label'));
    echo $this->Form->input('', array(
        'type' => 'file',
        'class' => 'form-control-file',
        'required' => true
    ));
    echo "<br>";

    echo $this->Form->end('Salvar', array(
        'class' => 'btn btn-primary mt-3'
    ));
    ?>
</div>



