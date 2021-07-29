<?php $v->layout("_theme", ["title" => "Notícias"]);?>
<br>
<div class="clearfix">
  <h4 class="float-left">Editar Notícia</h4>
</div>
    <div class="ajax_load">
        <div class="ajax_load_box">
            <div class="ajax_load_box_circle"></div>
            <div class="ajax_load_box_title">Aguarde, carregando!</div>
        </div>
    </div>
    <div class="form_ajax" style="display: none"></div>
        <form class="form" action="#" method="post"
        enctype="multipart/form-data" autocomplete="off">
            <input type="hidden" name="id"value="<?= $notice->id ?>">
            <div class="row">
                <div class="col-sm-5">
                    <label class="font-weight-bold">Título</label>
                    <input type="text" name="title" class="form-control" value="<?= $notice->title ?>" >
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <label class="font-weight-bold">Data</label>
                    <input type="date" name="date" class="form-control"value="<?= $notice->date ?>" >
                </div>
                <div class="col-sm-2">
                    <label class="font-weight-bold">Hora</label>
                    <input type="time" name="hour"  class="form-control"value="<?= $notice->hour ?>">
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-5">
                    <label class="font-weight-bold">Descrição</label>
                    <textarea name="description" class="form-control border-3" ><?= $notice->description ?> </textarea>
                </div>
            </div>
            <br>
            <button type="submit"
                    data-action="<?= $router->route("web.destroy"); ?>"data-id="<?= $notice->id ?>" class="btn btn-primary">Salvar</button>
        </form>
        <br>

<?php $v->start("js"); ?>
<script>
    $(function () {
        function load(action) {
            let load_div = $(".ajax_load");
            if(action === "open") {
                load_div.fadeIn().css("display", "flex");
            } else {
                load_div.fadeOut();
            }
        }

        $("form").submit(function (e) {
            e.preventDefault();
            let form = $(this);
            let form_ajax = $(".form_ajax");

            $.ajax({
                url: form.attr("action"),
                data: form.serialize(),
                type: "POST",
                dataType: "json",
                beforeSend: function () {
                    load("open");
                },
                success: function (callback) {
                    if(callback.message) {
                        form_ajax.html(callback.message).fadeIn();

                    } else {
                        form_ajax.fadeOut(function () {
                            $('form').trigger("reset");
                        })
                    }
                },
                complete: function () {
                    load("close");

                }

            });
        });
    })
</script>

<?php $v->end(); ?>