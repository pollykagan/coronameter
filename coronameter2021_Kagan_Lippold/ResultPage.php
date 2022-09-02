<?php 
namespace coronameter2021_Kagan_Lippold;



final class ResultPage extends lib\HomePage {
	use lib\DataBase;



    protected function init(){

    }
        


	protected function body(){
        $thread = $_GET['thread'];
        $result = '';
        $result .= $this->render('result.php', 'result_header');

        $query = self::query("select * from coronameter2021_kagan_lippold_vote_view where code=:code", array(':code'=>$thread));
        $result .= $this->render('result.php', 'question_field', array('question' => $query[0]['question_name']));
        $sum = 0;
        $arr = [];
        foreach ($query as $row) {
            $coronameter2021_kagan_lippold_votes = $row['appearances'];
            array_push($arr,array('answer'=>$row['answer'], 'coronameter2021_kagan_lippold_votes'=>$coronameter2021_kagan_lippold_votes));
            $sum = $sum +$coronameter2021_kagan_lippold_votes;
        }

        $query2 = self::query("select qc.answer from coronameter2021_kagan_lippold_questionables_content qc, coronameter2021_kagan_lippold_questionables q where q.code=:code and q.qid=qc.qid", array(':code'=>$thread));
        foreach ($query2 as $row)  {
            $boolean = false;
            foreach($arr as $obj)  {
                if ($obj['answer'] == $row['answer'])  {
                    $boolean = true;
                }
            }
            if (!$boolean)  {
                array_push($arr,array('answer'=>$row[0], 'coronameter2021_kagan_lippold_votes'=>0));
            }
        }

        foreach ($arr as $obj) {
            if($sum != 0){
            $coronameter2021_kagan_lippold_votes = $obj['coronameter2021_kagan_lippold_votes'];
            $pro = $coronameter2021_kagan_lippold_votes/$sum*100;
            $procent = round($pro, 2) .  "%";
            $result .= $this->render('result.php', 'main_body_field', array('name' => $obj['answer'], 'procent' => $procent));
            }else{
                $result .= $this->render('result.php', 'main_body_field', array('name' => $obj['answer'], 'procent' => '0%'));
            }
        }

        $result .= $this->render('result.php', 'main_body_end');
        $result .= $this->render('result.php', 'result_template');

        return $result;
    }





}
?>