<!---------------Welcome Template------------------>

<!---------------Welcome-Header------------------>
<?php $begin('signup_header') ?>
    <div class="container py-4">
        <div class="row">
            <div class="mx-auto col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center mt-2 mb-4">
                            <h2><b>Sign up</b></h2>
                        </div>

        
        <form method="post" class="mx-4">
                    <div class="order-1">
                        <div class="mb-3"> <label for="name">Name</label>
                            <input type="name" name="name" class="form-control" id="name">
                        </div>
                        <div class="mb-3"> <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email">

                        </div>
                        <div class="mb-3"> <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password">
                        </div>
                    <hr class="mb-4">
<?php $end('signup_header') ?>

        <!---------------Button------------------>
        <?php $begin('main_body_button') ?>
<button name="sgn1btn" class="btn btn-primary btn-lg btn-block" type="submit">Send</button>
                </div>
            </div>
                </div>
</div>
</div>
</form>
</div>
<?php $end('main_body_button') ?>

<?php $begin('error_field') ?>
        <div class="alert-danger mb-3"><p><?= $msg ?></p></div>
<?php $end('error_field') ?>