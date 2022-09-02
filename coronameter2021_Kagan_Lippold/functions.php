
<?php $begin('functions_header') ?>
<div class="col-md-6 order-0 order-md-1">
        <div class="text-center mx-auto">
<?php $end('functions_header') ?>
<!----------------------------------------------->
<?php $begin('functions_header2') ?>
                    <div class="col-md-6 order-0 order-md-1 text-center">
<?php $end('functions_header2') ?>
<!----------------------------------------------->
<?php $begin('card_start') ?>
<h5 class="lead text-center"><b>Survey status</b></h5>
                    <div class="mb-3 card">
                        <div class="card-body">
<?php $end('card_start') ?>
<!----------------------------------------------->
    <?php $begin('main_body_field') ?>
    <p>
    </p><p class="lead" style="text-align: left"><?= $name ?></p>
    <div class="balken"><?= $procent ?></div>
    <p></p>
    <?php $end('main_body_field') ?>
<!----------------------------------------------->
<?php $begin('main_body_field2') ?>
      <p class="lead" style="text-align: left"></p>
      <main>
      <section>
      <svg viewBox="0 0 500 250"></svg>
      </section>
      </main>
      <p></p>
<?php $end('main_body_field2') ?>
<!----------------------------------------------->
<?php $begin('main_body_end') ?>
                </div>
            </div>
<?php $end('main_body_end') ?>
<!----------------------------------------------->
<?php $begin('card_end') ?>
                </div>
            </div>
<?php $end('card_end') ?>
<!----------------------------------------------->
<?php $begin('main_body_end2') ?>
</div>
<?php $end('main_body_end2') ?>
<!----------------------------------------------->
<?php $begin('functions_buttons') ?>

<div class="text-center col-md-3 order-2">
    <h5 class="lead text-center"> <b>Functions</b></h5>
    <ul class="list-group">
        <form method="post">
        <li class="list-group-item">
            <div>
                <button type="submit" class="btn btn-primary btn-block" name="active"><?= $active ?></button> <small class="text-muted"></small>
            </div> <span class="text-muted"></span>
        </li>
        <li class="list-group-item">
            <div>
                <button type="submit" class="btn btn-primary btn-block" name="delete">Delete</button> <small class="text-muted"></small>
            </div> <span class="text-muted"></span>
        </li>
        <li class="list-group-item">
            <div>
                <button type="submit" class="btn btn-primary btn-block" name="edit">Edit</button> <small class="text-muted"></small>
            </div> <span class="text-muted"></span>
        </li>
        </form>
    </ul>
</div>
<?php $end('functions_buttons') ?>
<!----------------------------------------------->
<?php $begin('link') ?>
<p class="pt-2">Copy and send the following link to your fellow participants:<br /><a id="survey-link" href="<?= $link ?>"><?= $link ?></a> </p>
<?php $end('link') ?>