<?php 
namespace coronameter2021_Kagan_Lippold;



final class EditPage extends LeftPage {
	use lib\DataBase;

    protected function init(){
        if(isset($_POST['save']) && isset($_POST['question']) && isset($_POST['formDisplay'])) {
            $thread = $_GET['thread'];
            $question = trim($_POST['question']);
            $form = $_POST['formDisplay'];
            if (isset($_POST['multiple'])) {
                $multiple = 'multiple';
            } else {
                $multiple = 'single';
            }
            $query = self::query("select qid from coronameter2021_kagan_lippold_questionables where code=:code", array('code'=>$thread));
            $qid = $query[0]['qid'];
            $query = self::query("UPDATE coronameter2021_kagan_lippold_questionables SET question_name=:question,type=:multiple,visual=:form WHERE qid=:qid", array(':qid'=>$qid,':question'=>$question,':multiple'=>$multiple,':form'=>$form));
                if (isset($_POST['reset_votes'])) {
                    $query = self::query("DELETE FROM coronameter2021_kagan_lippold_votes WHERE qid=:qid",array(':qid'=>$qid));
                } // UPDATE ANSWERS
                $query = self::query("DELETE FROM coronameter2021_kagan_lippold_questionables_content WHERE qid=:qid",array(':qid'=>$qid));
                for ($i = 1; $i < 51; $i++) {
                    $name = 'answer' . $i;
                    if (isset($_POST[$name]) && trim($_POST[$name]) != '') {
                        $query = self::query("INSERT INTO coronameter2021_kagan_lippold_questionables_content VALUES (:qid,:answer)", array(':qid'=>$qid,':answer'=>trim($_POST[$name])));
                    }
                }
            header('Location: functions.html?thread=' . $thread);
			//exit();
        }
    }
        


	protected function body(){
        $result = '';
        $thread = $_GET['thread'];
        $query1 = self::query("select * from coronameter2021_kagan_lippold_questionables where code=:code", array('code'=>$thread));
        $qid = $query1[0]['qid'];
        $result .= $this->render('edit.php', 'before_button', array('old_code' => $thread, 'old_question' => $query1[0]['question_name']));
        $query2 = self::query("SELECT answer from coronameter2021_kagan_lippold_questionables_content where qid=:qid",array(':qid'=>$qid));

        $id = 1;
        foreach ($query2 as $row) {
            $result .= $this->render('edit.php', 'answer', array('old_answer' => $row['answer'], 'count' => $id++));
        }

        $result .= $this->render('edit.php', 'button', array('count' => $id));
        $checked_multiple = '';
        $checked_balken = '';
        $checked_donut = '';
        if($query1[0]['type'] == 'multiple'){
            $checked_multiple = 'checked';
        }
        if($query1[0]['visual'] == 'bars'){
            $checked_balken = 'checked';
        }
        if($query1[0]['visual'] == 'donut'){
            $checked_donut = 'checked';
        }
        $result .= $this->render('edit.php', 'after_button', array('checked_multiple' => $checked_multiple, 'checked_balken' => $checked_balken, 'checked_donut' => $checked_donut));
        return $result;
    }
}
?>