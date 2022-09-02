<?php 
namespace coronameter2021_Kagan_Lippold;



final class ResultPage2 extends lib\HomePage {
	use lib\DataBase;



    protected function init(){

    }
        


	protected function body(){
        $thread = $_GET['thread'];
        $result = '';
        $result .= $this->render('result2.php', 'result_header');


        $query = self::query("select * from coronameter2021_kagan_lippold_vote_view where code=:code", array(':code'=>$thread));
        $result .= $this->render('result.php', 'question_field', array('question' => $query[0]['question_name']));
        $result .= $this->render('result2.php', 'main_body_field');
        $sum = 0;

        foreach ($query as $row) {
            $coronameter2021_kagan_lippold_votes = $row['appearances'];
            $sum = $sum +$coronameter2021_kagan_lippold_votes;
        }


        $arr_color = array('647a70', '1c2538', '759ca7', '413440', 'd19aba', '5f547e', '587d7a');


        $data_arr=[];
        foreach ($query as $row) {
            $coronameter2021_kagan_lippold_votes = $row['appearances'];
            if($sum != 0){
            $pro = $coronameter2021_kagan_lippold_votes/$sum*100;
            }else{
                $pro = 0;
            }
            $value = round($pro, 2);
            $rand_keys = array_rand($arr_color, 1);
            $color = '#' . $arr_color[$rand_keys];
            $obj = array('name' => $row['answer'], 'value' => $value, 'color' => $color);
            array_push($data_arr, $obj);
        }
        $query = self::query("select qc.answer from coronameter2021_kagan_lippold_questionables_content qc, coronameter2021_kagan_lippold_questionables q where q.code=:code and q.qid=qc.qid", array(':code'=>$thread));
        /*foreach ($query as $row)  {
            $boolean = false;
            foreach ($obj as $o)  {
                if ($o['name'] == $row[0])  {
                    $boolean = true;
                }
            }
            if (!$boolean)  {
                $rand_keys = array_rand($arr_color, 1);
                $color = '#' . $arr_color[$rand_keys];
                $obj = array('name' => $row['answer'], 'value' => 0.00, 'color' => $color);
                array_push($data_arr, $obj);
            }
        }*/
        $data = json_encode($data_arr);

        $result .= $this->render('result2.php', 'result_template', array('data' => $data));

        $result .= $this->render('result2.php', 'main_body_end');
        return $result;
    }





}
?>