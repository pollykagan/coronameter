<?php $begin('left_die') ?>
<div id='meldung'>Please log in!</div>
<?php $end('left_die') ?>
<!----------------------------------------------->

<?php $begin('left_header') ?>

<?php $end('left_header') ?>
<!----------------------------------------------->

<?php $begin('left_surveys') ?>

<div class="">
    <div class="container">
        <div class="row">
            <div class="col-md-3 order-1 order-md-0">
<?php $end('left_surveys') ?>
<?php $begin('left_header_a') ?>
                <h5 class="lead text-center"> <b>My active surveys</b></h5>
                <ul class="list-group">
<?php $end('left_header_a') ?>
<?php $begin('left_active') ?>
                    <li  class="list-group-item d-flex justify-content-between">
                        <div>
                            <a href="index.php?p=functions&thread=<?= $code_a ?>"  class="my-0"><b><?= $question_a ?></b></a>
                        </div> <span class="text-muted"></span>
                    </li>
<?php $end('left_active') ?>
<?php $begin('left_footer_a') ?>
                </ul>
<?php $end('left_footer_a') ?>
<?php $begin('left_header_de') ?>
            <p></p>
                <h5 class="lead text-center"> <b>My dectivated surveys</b></h5>
                <ul class="list-group">
<?php $end('left_header_de') ?>
<?php $begin('left_deactivated') ?>
                    <li class="list-group-item d-flex justify-content-between">
                        <div>
                            <a href="index.php?p=functions&thread=<?= $code_de ?>" class="my-0"><b><?= $question_de ?></b></a>

                        </div> <span class="text-muted"></span>
                    </li>
<?php $end('left_deactivated') ?>
<?php $begin('left_footer_de') ?>
                </ul>
<?php $end('left_footer_de') ?>
<?php $begin('left_surveys2') ?>
                <form class="card p-2 my-4">
                    <div class="list-group">
                        <input type="button" onclick="window.location='new.html'" value="Create new" class="btn btn-primary btn-block"/>
                    </div>
                </form>
            </div>
<?php $end('left_surveys2') ?>