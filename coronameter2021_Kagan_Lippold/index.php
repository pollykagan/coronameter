<?php 
namespace coronameter2021_Kagan_Lippold;

/**
 * Autoload php files
 */

spl_autoload_register(function ($className) {
$fileName = dirname(__DIR__) .'/'.str_replace("\\", "/", $className).".php";
 
	if (file_exists($fileName)) {
		require_once $fileName;
	}
});

/**
 * Dispatcher: Selects the individual pages according to the parameter p 
 */
if (isset($_GET['p'])){
switch ($_GET['p']) {
	case 'admin':	$p=new AdminPage('Admin');	break;
	case 'login':	$p=new LoginPage('Login');	break;
    case 'question' :	$p=new QuestionPage('Question');	break; //SINGLE
    case 'question2' :	$p=new QuestionPage2('Question2');	break;  //MULTIPLE
    case 'result' :	$p=new ResultPage('Result');	break;  //BARS
    case 'result2' :	$p=new ResultPage2('Result2');	break;  //DONUT
    case 'signup' :	$p=new SignupPage('Signup');	break;
    case 'new' :	$p=new NewPage('New survey');	break;
    case 'functions' :	$p=new FunctionsPage('Functions');	break;
    case 'edit' :	$p=new EditPage('Edit');	break;
	default:	$p=new HelloPage('Hello');

}	
}
else {
	$p=new HelloPage('Hello');
}
$p->display();
?>