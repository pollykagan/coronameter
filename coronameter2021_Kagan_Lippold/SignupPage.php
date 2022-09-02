<?php 
namespace coronameter2021_Kagan_Lippold;



final class SignupPage extends lib\HomePage {
	use lib\DataBase;



    protected function init(){

    }       

	protected function body(){
        $result = '';
        $result .= $this->render('signup.php', 'signup_header');

        if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["sgn1btn"])){
			$email=trim($_POST["email"]);
			$name=trim($_POST["name"]);
			$pass= hash('sha256', trim($_POST["password"]).lib\salt());//With Salt
            if ($email=='' || $name=='' || $pass==''){
                $msg = "Please fill in all fields!";
                $result .= $this->render('signup.php', 'error_field', array('msg'=>$msg));
            }else if ($email!='' && $name!='' && $pass!=''){
            $boolean = self::query("SELECT EXISTS(SELECT * from coronameter2021_kagan_lippold_users WHERE name=:name or mail=:mail)", array(':name'=> $name,':mail'=>$email));
            if ($boolean[0][0] == 1) {
                $msg = "Username <b>$name</b> or <b>$email</b> is already taken!";
                $result .= $this->render('signup.php', 'error_field', array('msg'=>$msg));
            } else{
                $query = self::query('insert into coronameter2021_kagan_lippold_users values (:name, :password, :mail)', array(':name'=>$name,':password'=>$pass, ':mail'=>$email));
                header("Location: login.html");
				//exit();
            }
            }

        }
        $result .= $this->render('signup.php', 'main_body_button');
        return $result;
    }
}
?>