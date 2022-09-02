<!---------------Question Template------------------>

<!---------------Question-Header------------------>
<?php $begin('question_header') ?>
<style>

</style>
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
<form method="post">
<div class="text-center">
    <div class="container">
        <div class="row pt-4 justify-content-center">
<?php $end('question_header') ?>

<?php $begin('main_body_button') ?>
<div class="col-md-4">
    <div class="card mb-4 box-shadow">
        <div class="card-body">
                <label class="checkbox-btn custom-button" id="checkbox-btn">
                    <input type="checkbox" name='<?= $name ?>' value='<?=$title ?>'>
                    <span><?= $title ?></span>
                </label>
        </div>
    </div>
</div>

<?php $end('main_body_button') ?>


<?php $begin('main_body_end') ?>
            <div class="container">
            <input type="submit"  value="vote" name="vote" class="btn btn-primary btn-lg btn-block"/>
            </div>
        </div>
    </div>
</div>
</form>
<?php $end('main_body_end') ?>
