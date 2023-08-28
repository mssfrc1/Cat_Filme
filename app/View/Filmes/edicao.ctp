<div class="container mt-4">
    <h2>Filmes Edicao</h2>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Categoria</th>
                <th>Sinopse</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($filmes as $filme): ?>
            <tr>
                <td><?= h($filme['Filme']['id']) ?></td>
                <td><?= h($filme['Filme']['titulo']) ?></td>
                <td><?= h($filme['Categoria']['nome']) ?></td>
                <td>
                    <?= substr(h($filme['Filme']['sinopse']), 0, 100); ?>
                    <?php if (strlen($filme['Filme']['sinopse']) > 100) echo '...'; ?>
                </td>
                <td>
                    <div class="btn-group" role="group">
                        <?= $this->Html->link(
                            '<i class="bi bi-pencil"></i>',
                            '#editModal-' . $filme['Filme']['id'],
                            array('escape' => false, 'class' => 'btn btn-info', 'data-bs-toggle' => 'modal')
                        ); ?>
                        <?= $this->Form->postLink(
                            '<i class="bi bi-trash"></i>',
                            array('controller' => 'filmes', 'action' => 'delete', $filme['Filme']['id']),
                            array('escape' => false, 'confirm' => 'Tem certeza que deseja remover este filme?', 'class' => 'btn btn-danger')
                        ); ?>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<?php foreach ($filmes as $filme): ?>
<div class="modal fade" id="editModal-<?= $filme['Filme']['id'] ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Editar Filme</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <?= $this->Form->create('Filme', array('url' => array('controller' => 'filmes', 'action' => 'update'))) ?>
            <div class="modal-body">
                <div class="mb-3">
                    <img src="<?= h('../media/filmes/'.$filme['Filme']['capa']) ?>" class="img-fluid rounded" alt="Capa do Filme" style="max-width: 20%; height: auto;">
                </div>
                <?= $this->Form->hidden('id', array('value' => $filme['Filme']['id'])) ?>
                <div class="mb-3">
                    <?= $this->Form->label('titulo', '', array('class' => 'form-label')) ?>
                    <?= $this->Form->input('titulo', array('required' => true, 'class' => 'form-control', 'value' => $filme['Filme']['titulo'])) ?>
                </div>
                <div class="mb-3">
                    <?= $this->Form->label('categoria_id', 'Categoria', array('class' => 'form-label')) ?>
                    <?= $this->Form->select('categoria_id', $categorias, array(
                        'required' => true,
                        'class' => 'form-select',
                        'id' => 'categoria-select',
                        'data-selected' => $filme['Filme']['categoria_id']
                    )) ?>
                    <?= $this->Form->hidden('categoria_id_hidden', array('id' => 'categoria-id-hidden', 'value' => $filme['Filme']['categoria_id'])) ?>
                </div>
                <div class="mb-3">
                    <?= $this->Form->label('sinopse', 'Sinopse', array('class' => 'form-label')) ?>
                    <?= $this->Form->textarea('sinopse', array('required' => true, 'class' => 'form-control', 'value' => $filme['Filme']['sinopse'])) ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<?php endforeach; ?>



<script>

//Altera os valores para o post, com base na categoria selecionada

$(document).ready(function() {
    $('#categoria-select').on('change', function() {
        const selectedOption = $(this).find('option:selected');
        const categoriaId = selectedOption.val();
        const categoriaName = selectedOption.text();
        $('#categoria-id-hidden').val(categoriaId);
    });

});
</script>

