<!---------------Result Template------------------>
<?php $begin('result_template') ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    $(() => {
        $('.balken').css({
            width: '1px',
            opacity: 0.1
        });

        $('.balken').each(function() {
            let wert = $(this).text().replace("%", "");
            let breite = "" + wert*5 + "px";

            //$(this).css({width: breite});
            $(this).animate({
                width: breite,
                opacity: 1
            }, 2000);
        });
    });
</script>
<?php $end('result_template') ?>
<!---------------Result-Header------------------>
<?php $begin('result_header') ?>
<div class="pt-4 container">
    <div class="row text-center">
        <div class="col-12 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h1 class="display-4">Thank you for voting!</h1>
<?php $end('result_header') ?>



<?php $begin('question_field') ?>
                        <h2><?= $question ?></h1>
<?php $end('question_field') ?>

<?php $begin('main_body_field') ?>
                    <p>
                    </p><p class="lead offset-2" style="text-align: left"><?= $name ?></p>
                    <div style="width: 500px; opacity: 1;" class="offset-2 balken"><?= $procent ?></div>
                    <p></p>
<?php $end('main_body_field') ?>


 <?php $begin('main_body_end') ?>
                    <form method="post">
                        <button onclick="window.location='index.html'" type="button" class="btn btn-primary mt-4">Go home</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $end('main_body_end') ?>


