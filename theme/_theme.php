<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title; ?></title>

    <link rel="stylesheet" href="<?= url("/css/bootstrap.min.css"); ?>"/>
    <link rel="stylesheet" href="<?= url("/css/style.css"); ?>"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body>

<div class="container">
<nav class="navbar navbar-expand-lg <?= THEME; ?>">
  <a class="navbar-brand" href="/">
  <img src="<?= url("/img/logo.png"); ?>" class="rounded float-left" width="80" height="40" alt="Logo">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
       <h4 class="nav-link">Painel de notícias</h4>
      </li>
    </ul>

  </div>
</nav>
<?= $v->section("content"); ?>

<footer class="sticky-bottom text-center text-lg-start bg-light text-muted">

  <div class="text-center p-4 border-top">
    JAMSOFT Tecnologia © 2021
    <a class="text-reset fw-bold" href="https://jamsoft.com.br/">jamsoft.com.br</a>
  </div>
</footer>

</div>

<script src="<?= url("/js/jquery.js"); ?>"></script>
<script src="<?= url("/js/bootstrap.min.js"); ?>"></script>
<?= $v->section("js"); ?>

</body>
</html>