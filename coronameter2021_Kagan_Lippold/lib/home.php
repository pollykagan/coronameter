<!---------------Main Template------------------>
<?php $begin('header') ?>

<!DOCTYPE html>
<html lang="de">
	<head>
	<title><?= $title ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style/style.css" />
    <link rel="icon" href="style/favicon.ico" type="image/x-icon" />
</head>
<body>


		<header>
            <div class="header-class d-flex flex-row align-items-center p-3 mb-3 box-shadow border-bottom">
                <h5 class="my-0 mr-auto font-weight-normal"><a id="coronameter-head" href="index.html">Coronameter</a></h5>
                <input type="submit" onclick="window.location='login.html'" id="logbtn" value="Log in" class="btn btn-primary" style="width:85px; margin-right: 5px"  />
                <form method="post">
                <input type="submit" id="sgnbtn" name="sgnbtn" value="Sign up" class="btn btn-primary" style="width:85px"/>
                </form>
            </div>
		</header>
		<section>
            <script type="text/javascript">
                var logbtn = $("#logbtn");
                var sgnbtn = $("#sgnbtn");
                if (<?= $session ?>){
                $(function (){

                    var text = "Admin";
                    var text2 = "Log out";
                    var link = "window.location='admin.html'";
                    var link2 = "window.location='index.html'";
                    logbtn.attr('value', text);
                    sgnbtn.attr('value', text2);
                    logbtn.attr('onclick', link);
                    sgnbtn.removeAttr("name");
                    sgnbtn.attr('name', 'outbtn');
                    });
                }else {
                sgnbtn.removeAttr("name");
                sgnbtn.attr('name', 'sgnbtn');

                };
            </script>
<?php $end('header') ?>
<!----------------------------------------------->
<?php $begin('footer') ?>
		</section>
		<footer>
            <div class="py-3">
                <div class="container">
                    <div class="row pt-3 border-top">
                        <div class="col-12 col-md"><small class="d-block mb-3 text-muted" style="text-align: center">© 2021 by Kagan and Lippold</small> </div>
                    </div>
                </div>
            </div>
		</footer>

</body>
</html>
<?php $end('footer') ?>

