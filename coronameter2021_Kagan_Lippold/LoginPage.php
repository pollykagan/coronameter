<?php
namespace coronameter2021_Kagan_Lippold;
/**
 * Login page to enter the name and password
 */
final class LoginPage extends lib\HomePage {
    use lib\DataBase;


	protected function init(){
	}

	/*
	 * Output
	 */
	protected function body(){
		$result="";
		$result .= $this->render('login.php', 'login-head');
		if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["lgnbtn"])){//Login?
			$email=trim($_POST["email"]);
			$pass= hash('sha256', trim($_POST["password"]).lib\salt());
			if ($email!='' && $pass!=''){
			$user = self::query('select * from coronameter2021_kagan_lippold_users where mail=:mail AND password=:password', array(':mail' => $email, ':password'=>$pass));
			if ($user[0]['mail'] == $email) {
				$_SESSION['user']=$user[0]['name'];
				header("Location: admin.html");
				exit();
			}else{
				$result .= $this->render('login.php', 'error_field');
			}} else{
				$result .= $this->render('login.php', 'error_field');
			}

		}
		$result .= $this->render('login.php', 'login-bottom');
		return $result;
	}
}
?>
