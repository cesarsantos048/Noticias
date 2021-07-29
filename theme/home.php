<?php $v->layout("_theme", ["title" => "Notícias"]); ?>

    <br>
    <div class="clearfix">
        <a href="/create" class="btn btn-outline-secondary col-sm-2 float-right" >Cadastrar</a>
        <h5 class="float-left">Notícias Cadastradas</h5>
    </div>
    <br>
    <table class="table">

        <thead class="thead-dark">
        <?php if (!empty($noticies)):?>
        <tr>
            <th scope="col">Código</th>
            <th scope="col">Título</th>
            <th scope="col">Data/Hora</th>
            <th scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($noticies as $notice): ?>
            <tr>
                <th scope="row"><?= $notice->id; ?></th>
                <td><?= ucfirst($notice->title); ?></td>
                <td><?= date("d/m/Y", strtotime($notice->date)) ?> <?= date("H:i", strtotime($notice->hour)) ?></td>
                <td>
                    <a href="/edit/<?= $notice->id; ?>" ><i class="bi bi-pencil"></i></a>
                    <a class="" data-toggle="modal" data-target="#my-modal"><i class="bi bi-trash"></i></a>


                </td>
            </tr>
            <div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content border-0">
                        <div class="modal-body p-0">
                            <div class="card border-0 p-sm-3 p-2 justify-content-center">
                                <div class="card-header pb-0 bg-white border-0 ">
                                    <div class="row">
                                        <div class="col ml-auto"><button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>
                                    </div>
                                    <p class="font-weight-bold mb-2">Deseja remover?</p>

                                </div>
                                <div class="card-body px-sm-4 mb-2 pt-1 pb-0">
                                    <div class="row justify-content-end no-gutters">
                                        <div class="col-auto"><button type="button" class="btn btn-danger px-4"data-action="<?= $router->route("web.destroy"); ?>" data-id="<?= $notice->id; ?>" data-dismiss="modal">Sim</button></div>
                                        <div class="col-auto"><button type="button" class="btn btn-light text-muted" data-dismiss="modal">Não</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; else: ?>
            <div class="alert alert-warning">Ainda não existe notícia cadastrada</div>
        <?php endif; ?>
        </tbody>

    </table>
<?php $v->start("js"); ?>
    <script>
        $(function () {
            $("body").on("click", "[data-action]", function (e) {
                e.preventDefault();
                let data = $(this).data();

                $.post(data.action, data, function () {
                    location.reload();
                }, "json")
                    .fail(function () {
                        alert("Erro ao processar");
                    });
            });
        })
    </script>

<?php $v->end(); ?>