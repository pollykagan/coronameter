<?php 
namespace coronameter2021_Kagan_Lippold;



final class QuestionPage extends lib\HomePage
{
    use lib\DataBase;


    protected function init()
    {
    }



    protected function body(){
        $result = '';
        $thread = $_GET['thread'];
        $session = session_id();
        $query = self::query("select * from coronameter2021_kagan_lippold_questionables WHERE code=:code", array('code'=>$thread));
        $qid = $query[0]['qid'];
        $query2 = self::query("SELECT EXISTS(SELECT refferer from coronameter2021_kagan_lippold_votes WHERE qid=:qid and refferer=:session)", array(':qid'=>$qid,':session'=>$session));
        if (isset($_SESSION['q'.$thread]) || $query2[0][0]) {
            if($query[0]['visual'] == 'bars'){
                header("Location: index.php?p=result&thread=" . $thread);
				//exit();
            }else if($query[0]['visual'] == 'donut'){
                header("Location: index.php?p=result2&thread=" . $thread);
				//exit();
            }
        }

        $result .= $this->render('question.php', 'question_header', array('question' => $query[0]['question_name']));

        $query2 = self::query("select * from coronameter2021_kagan_lippold_questionables_content WHERE qid=:qid", array('qid'=>$qid));
        $i = 1;
        foreach ($query2 as $row) {
            $result .= $this->render('question.php', 'main_body_button', array('title' => $row['answer'], 'name' => 'click' . $i++));
        }
        for ($i; $i>0; $i--)  {
        foreach ($query2 as $row) {
            $answer = $row['answer'];
            if (isset($_POST['click'.$i]) && $_POST['click'.$i] == $answer) {
                $_SESSION['q'.$thread] = true;
                $query = self::query("SELECT mail from coronameter2021_kagan_lippold_users WHERE name=:user", array('user'=>$_SESSION['user']));
                $mail = $query[0][0] ?? NULL;
                $query = self::query("INSERT INTO coronameter2021_kagan_lippold_votes VALUES (default,:qid,:ref,:mail)", array(':qid'=>$qid,':ref'=>$session,':mail'=>$mail));
                $last = self::query("SELECT MAX(vid) from coronameter2021_kagan_lippold_votes");
                $query = self::query("INSERT INTO coronameter2021_kagan_lippold_vote_content VALUES (:vid,:answer)", array(':vid'=>$last[0][0], ':answer'=>$answer));
                $query = self::query("SELECT visual from coronameter2021_kagan_lippold_questionables WHERE code=:code", array('code'=>$thread));
                if($query[0]['visual'] == 'bars'){
                    header("Location: index.php?p=result&thread=" . $thread);
					//exit();
                }else if($query[0]['visual'] == 'donut'){
                    header("Location: index.php?p=result2&thread=" . $thread);
					//exit();
                }
            }
            }  
        }
        $result .= $this->render('question.php', 'main_body_end');

            return $result;
        }



}
?>