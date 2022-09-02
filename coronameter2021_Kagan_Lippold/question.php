<!---------------Question Template------------------>

<!---------------Question-Header------------------>
<?php $begin('question_header') ?>
<div class="pt-5 text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <h1 class="display-4"><?= $question ?></h1>
                <p class="lead"></p>
            </div>
        </div>
    </div>
</div>
<div class="text-center">
    <div class="container">
        <div class="row pt-4 justify-content-center">
<?php $end('question_header') ?>
<?php $begin('main_body_button') ?>
<div class="col-md-4">
    <div class="card mb-4 box-shadow">
        <div class="card-body">
            <form method="post">
            <button type="submit" class="btn btn-lg btn-block btn-primary custom-button" name='<?= $name ?>' value='<?= $title ?>' style="height: 250px; font-size: xx-large"><?= $title ?></button>
            </form>
        </div>
    </div>
</div>

<?php $end('main_body_button') ?>

<?php $begin('main_body_end') ?>
        </div>
    </div>
</div>
<?php $end('main_body_end') ?>
