<?php 
namespace coronameter2021_Kagan_Lippold;



final class HelloPage extends lib\HomePage {
	use lib\DataBase;



    protected function init(){
    }

	protected function body(){
        $result = '';
        $result .= $this->render('hello.php', 'welcome_header');
        if (isset($_POST['codebtn']) && isset($_POST["code"]) || isset($_GET["thread"])) {
            $trim = $_POST["code"] ?? $_GET["thread"];
            $code = trim($trim);
            if ($code != "")  {
                $query = self::query("select status, type from coronameter2021_kagan_lippold_questionables WHERE code=:code", array('code' => $code));
                if (isset($query[0]['status']))  {
                    if ($query[0]['status']=='open') {
                        if($query[0]['type'] == 'single'){
                            header("Location: index.php?p=question&thread=" . $code);
                            //exit();
                        }else if($query[0]['type'] == 'multiple'){
                            header("Location: index.php?p=question2&thread=" . $code);
                            //exit();
                        }
                    } else {
						$msg = "<b>$code</b>: This survey is deactivated or does not exist!";
						$result .= $this->render('hello.php', 'error_field', array('msg'=>$msg));
					}
                } else {
                    $msg = "<b>$code</b>: This survey is deactivated or does not exist!";
                    $result .= $this->render('hello.php', 'error_field', array('msg'=>$msg));
                }
            } else {
                $msg = "Error: No valid code given!";
                $result .= $this->render('hello.php', 'error_field', array('msg'=>$msg));
            }
        }
        $result .= $this->render('hello.php', 'main_body_field');
        return $result;
    }
}
?>