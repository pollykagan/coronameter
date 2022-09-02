<?php $begin('login-head') ?>
<div class="container py-4">
    <div class="row">
        <div class="col-12 mx-auto">
            <div class="card">
                <div class="card-body">
                <h2 class="text-center"><b>Login</b></h2>
                <p class="lead"></p>

                <form action="login.html" method="post" class="mt-3 mx-4">
                    <div class="mb-4">
                        <form class="needs-validation" novalidate="">
<?php $end('login-head') ?>

<?php $begin('login-bottom') ?>
                            <div class="mb-3"> <label for="email">Email:</label>
                                <input type="email" name="email" class="form-control" id="email">
                            </div>
                            <div class="mb-3"> <label for="password">Password:</label>
                                <input type="password" name="password" class="form-control" id="password">
                            </div>
                            <hr class="mb-4">
                            <button name="lgnbtn" class="btn btn-primary btn-lg btn-block" type="submit">Enter</button>
                        </form>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $end('login-bottom') ?>

<?php $begin('error_field') ?>
  <div class="alert-danger mb-3"> Wrong e-mail or password submitted</div>
<?php $end('error_field') ?>

