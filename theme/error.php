<?php $v->layout("_theme", ["title" => "Notícias"]); ?>

<div class="alert alert-danger">
<h1>&bull;<?= $error->code; ?>&bull;</h1>
<a class="btn btn-outline-secondary" href="<?= $error->link; ?>">Voltar</a>
</div>
