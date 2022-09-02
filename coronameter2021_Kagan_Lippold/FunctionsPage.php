<?php 
namespace coronameter2021_Kagan_Lippold;

final class FunctionsPage extends LeftPage {
	use lib\DataBase;




	protected function init(){
		$thread = $_GET['thread'];
		$query = self::query("select status from coronameter2021_kagan_lippold_questionables where code=:code", array(':code'=>$thread));
		if($query[0]['status'] == 'open'){
			if(isset($_POST['active'])){
				$query = self::query("UPDATE coronameter2021_kagan_lippold_questionables SET status='prepare' where code=:code", array(':code'=>$thread));
				header("Location: index.php?p=functions&thread=" . $thread);
				//exit();
			}
		}else if($query[0]['status'] != 'open'){
			if(isset($_POST['active'])){
				$query = self::query("UPDATE coronameter2021_kagan_lippold_questionables SET status='open' where code=:code", array(':code'=>$thread));
				header("Location: index.php?p=functions&thread=" . $thread);
				//exit();
			}
		}
		if(isset($_POST['delete'])){
			$query = self::query("DELETE FROM coronameter2021_kagan_lippold_questionables WHERE code=:code", array(':code'=>$thread));
			header("Location: admin.html");
			//exit();
		}
		if(isset($_POST['edit'])){
		header("Location: index.php?p=edit&thread=" . $thread);
		//exit();
	}
	}

	protected function body(){
		$thread = $_GET['thread'];
		$active = '';
		$query = self::query("select status, question_name from coronameter2021_kagan_lippold_questionables where code=:code", array(':code'=>$thread));
		$question_name = $query[0]['question_name'];
		if($query[0]['status'] == 'open'){
			$active = "Deactivate";
		}else if($query[0]['status'] != 'open'){
			$active = "Activate";
		}
		$result = '';
		$result .= $this->render('functions.php', 'functions_buttons', array('active' => $active));
		$sum = 0;
		$form = self::query("SELECT visual FROM coronameter2021_kagan_lippold_questionables WHERE code=:code", array(':code'=>$thread));

		if($form[0]['visual'] == 'bars'){

			$query = self::query("select * from coronameter2021_kagan_lippold_vote_view where code=:code", array(':code'=>$thread));
			$result .= $this->render('functions.php', 'functions_header');
			$result .= $this->render('functions.php', 'card_start');
			$result .= $this->render('result.php', 'question_field', array('question' => $question_name));
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
					if ($obj['answer'] == $row[0])  {
						$boolean = true;
					}
				}
				if (!$boolean)  {
					array_push($arr,array('answer'=>$row[0], 'coronameter2021_kagan_lippold_votes'=>0));
				}
			}
			foreach ($arr as $row) {
				if($sum != 0){
				$coronameter2021_kagan_lippold_votes = $row['coronameter2021_kagan_lippold_votes'];
				$pro = $coronameter2021_kagan_lippold_votes/$sum*100;
				$procent = round($pro, 2) .  "%";
				$result .= $this->render('functions.php', 'main_body_field', array('name' => $row['answer'], 'procent' => $procent));
				}else{
					$result .= $this->render('functions.php', 'main_body_field', array('name' => $row['answer'], 'procent' => '0%'));
				}
			}
			if ($active == "Deactivate")  {
				$link = "https://medinf.oth-aw.de/~web/coronameter2021_Kagan_Lippold/?thread=$thread";
				$result .= $this->render('functions.php', 'link', array('link'=>$link));
			}
		$result .= $this->render('functions.php', 'card_end');
		$result .= $this->render('functions.php', 'main_body_end');
		$result .= $this->render('result.php', 'result_template');



		} else if ($form[0]['visual'] == 'donut') {
			$result .= $this->render('functions.php', 'functions_header2');
			$result .= $this->render('functions.php', 'card_start');
			$query = self::query("select * from coronameter2021_kagan_lippold_vote_view where code=:code", array(':code'=>$thread));
			$result .= $this->render('result.php', 'question_field', array('question' => $question_name));
			$result .= $this->render('functions.php', 'main_body_field2');

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
			$query = self::query("select answer from coronameter2021_kagan_lippold_questionables_content where code=:code", array(':code'=>$thread));
			foreach ($query as $row)  {
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
			}
			$data = json_encode($data_arr);
				$result .= $this->render('result2.php', 'result_template', array('data' => $data));
				if ($active == "Deactivate")  {
					$link = "https://medinf.oth-aw.de/~web/coronameter2021_Kagan_Lippold/?thread=$thread";
					$result .= $this->render('functions.php', 'link', array('link'=>$link));
				}
				$result .= $this->render('functions.php', 'card_end');
				$result .= $this->render('functions.php', 'main_body_end2');
			}


	return $result;

	}
}
?>
