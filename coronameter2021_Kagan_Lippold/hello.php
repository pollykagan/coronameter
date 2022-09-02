<!---------------Welcome Template------------------>

<!---------------Welcome-Header------------------>
<?php $begin('welcome_header') ?>
    <div class="pt-5 text-center">
        <div class="container">
            <div class="row">
                <div class="col-12 mx-auto">
                    <div class="card">
                        <div class="card-body">
                    <h1 class="display-4">Hi!</h1>
                    <p class="lead">Make Corona-time happier!</p>
                    <p class="lead"><label for="code">Enter a valid code:</label></p>
            <form method="post" class="mt-2">
            <div class="text-center">
<?php $end('welcome_header') ?>

<!---------------Main-Body-Form------------------>
<?php $begin('main_body_field') ?>
        <div class="mb-3">
            <input class="form-control" name="code" id="code">
        </div>
            <button name="codebtn" id="codebtn" type="submit" class="btn btn-lg btn-block btn-primary">Go</button>
            </div>
        </form>
            </div>
            </div>
            </div>
</div>
</div>
</div>
<?php $end('main_body_field') ?>

<?php $begin('error_field') ?>
        <div class="alert-danger mb-3"><?= $msg ?></div>
<?php $end('error_field') ?>