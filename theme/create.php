<?php $v->layout("_theme", ["title" => "Notícias"]);?>
<br>
<div class="clearfix">
  <h4 class="float-left">Cadastrar Notícia</h4>
</div>
    <div class="ajax_load">
        <div class="ajax_load_box">
            <div class="ajax_load_box_circle"></div>
            <div class="ajax_load_box_title">Aguarde, carregando!</div>
        </div>
    </div>
    <div class="form_ajax" style="display: none"></div>
    <form class="form" action="<?= $router->route("web.store"); ?>" method="post"
          enctype="multipart/form-data" autocomplete="off">

          <div class="row">
                <div class="col-sm-5">
                    <label  class="font-weight-bold">Título</label>
                    <input type="text" name="title" class="form-control" autofocus >
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <label class="font-weight-bold">Data</label>
                    <input type="date" name="date" class="form-control" >
                </div>
                <div class="col-sm-2">
                    <label class="font-weight-bold">Hora</label>
                    <input type="time" name="hour"  class="form-control" >
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-5">
                    <label class="font-weight-bold">Descrição</label>
                    <textarea name="description" class="form-control" ></textarea>
                </div>
            </div>
            <br>
            
            <div class="btn-group">
            <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
            <div class="btn-group">
            <a href="/" class="btn btn-secondary">Voltar</a>
            </div>

  
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
                    $('form').trigger("reset");
                }

            });
        });
    })
</script>

<?php $v->end(); ?>