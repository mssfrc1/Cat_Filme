<div class="container">
    <br>
    <div class="cardFilmes row">
        <?php foreach ($filmes as $filme): ?>
            <div class="col-md-3">
                <div class="card h-100">
                    <?= $this->Html->image('../media/filmes/'.$filme['Filme']['capa'], ['alt' => 'Foto Filme', 'class' => 'card-img-top img-fluid', 'style' => 'height: 400px; object-fit: cover;']) ?>
                    <div class="card-body">
                        <h5 class="card-title"><?= h($filme['Filme']['titulo']) ?></h5>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#filmeModal<?= $filme['Filme']['id'] ?>">Visualizar</a>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="filmeModal<?= $filme['Filme']['id'] ?>" tabindex="-1" aria-labelledby="filmeModalLabel<?= $filme['Filme']['id'] ?>" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="filmeModalLabel<?= $filme['Filme']['id'] ?>">Detalhes do Filme</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                        </div>
                        <div class="modal-body">
                            <h6>Título: <?= h($filme['Filme']['titulo']) ?></h6>
                            <p>Categoria: <?= h($filme['Categoria']['nome']) ?></p>
                            <p>Sinopse: <?= h($filme['Filme']['sinopse']) ?></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
    </div>

    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center mt-3">
            <?= $this->Paginator->numbers(['class' => 'page-item', 'currentClass' => 'active', 'separator' => '', 'class' => 'page-link']) ?>
        </ul>
    </nav>
</div>


