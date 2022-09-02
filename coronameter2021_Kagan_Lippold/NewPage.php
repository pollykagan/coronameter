<?php 
namespace coronameter2021_Kagan_Lippold;



final class NewPage extends LeftPage {
	use lib\DataBase;



    protected function init(){
        if(isset($_POST['save']) && isset($_POST['formDisplay']) && isset($_POST['question']) && isset($_POST['answer1']) && isset($_POST['answer2'])) {

            $admin = $_SESSION['user'];
            $question = $_POST['question'];
            $form = $_POST['formDisplay'];
            if (isset($_POST['multiple'])){
                $multiple = 'multiple';
            } else {
                $multiple = 'single';
            }
            $query = self::query("INSERT INTO coronameter2021_kagan_lippold_questionables VALUES (default,:question,:user,:type,'prepare',:visual, coronameter2021_kagan_lippold_RINT() )",
                                array(':question'=>$question, ':user'=>$admin, ':type'=>$multiple, ':visual'=>$form));
            $query = self::query("SELECT MAX(qid) FROM coronameter2021_kagan_lippold_questionables");
            $last = $query[0][0];
            for($i = 1; $i<51; $i++) {
                $name = 'answer' . $i;
                if (isset($_POST[$name]) && trim($_POST[$name])!='') {
                    $query = self::query("INSERT INTO coronameter2021_kagan_lippold_questionables_content VALUES (:qid,:answer)", array(':qid'=>$last,':answer'=>trim($_POST[$name])));
                    $query = self::query("SELECT code from coronameter2021_kagan_lippold_questionables where qid=:qid", array(':qid'=>$last));
                    $location = "Location: functions.html?thread=" . $query[0][0] . "";
                    header($location);
					//exit();
                }
            }
        }
    }
    
	protected function body(){
        $result = '';
        $result .= $this->render('new.php', 'before_button');
        $result .= $this->render('new.php', 'button');
        $result .= $this->render('new.php', 'after_button');
        return $result;
    }





}
?>