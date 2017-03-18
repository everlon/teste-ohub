<?php include "../view/template/_top.php"; ?>

    <form action="<?php echo DOMAIN; ?>/result" method="post">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group has-feedback">
                    <input id="email" type="text" name="email" class="form-control" placeholder="Digite seu e-mail" autocomplete="off" required />
                    <i id="icon-check" class="glyphicon glyphicon-envelope form-control-feedback"></i>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <input type="text" name="address" class="form-control" placeholder="Digite seu endereço comercial" autocomplete="off" required />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <input type="submit" value="Pesquisar" class="btn btn-primary col-xs-12 col-md-6">
                </div>
            </div>
        </div>
    </form>

<?php include "../view/template/_footer.php"; ?>