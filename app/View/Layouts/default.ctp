<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
    Filmes Online
	</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
	<?php
    echo($this->Html->css("bootstrap.css"));
    echo($this->Html->css("css.css")); 
    echo($this->Html->script("bootstrap.js"));
    echo($this->Html->script("jquery-3.7.0.min.js"));
	?>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Filmes Site</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/filmes">Catálogo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/filmes/edicao">Edição</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="cadastroDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Cadastro
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="cadastroDropdown">
                        <li><a class="dropdown-item" href="/filmes/cadastro">Filmes</a></li>
                        <li><a class="dropdown-item" href="/categorias/cadastro">Categorias</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
</body>
<div class="container">
<br>
<?php echo $this->Flash->render(); ?>

<?php echo $this->fetch('content'); ?>

</div>