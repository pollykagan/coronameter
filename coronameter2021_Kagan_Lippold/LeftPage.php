<?php
namespace coronameter2021_Kagan_Lippold;

abstract class LeftPage extends lib\HomePage {
    use lib\DataBase;

    //abstract protected function body();
    //abstract protected function init();

    protected function heading(){
        //session_start();
        $ret='';
        if (!isset($_SESSION['user'])) {
            die ($this->render('left.php', 'left_die'));
        }
        $ret .= $this->render('left.php', 'left_header');
        $ret .= $this->render('left.php', 'left_surveys');


        return $ret;
    }

    protected function user(){
        //session_start();
        $ret = '';
        $user = $_SESSION['user'];
        $query = self::query("select question_name, code from coronameter2021_kagan_lippold_questionables where user_name=:user and status='open'", array(':user'=>$user));
        $null_a = 0;
        foreach ($query as $row) {
            if ($row['code']!= ''){
                $null_a = 1;
            }
        }
        if ($null_a == 1) {
            $ret .= $this->render('left.php', 'left_header_a');
            foreach ($query as $row) {
                $ret .= $this->render('left.php', 'left_active', array('question_a' => $row['question_name'], 'code_a' => $row['code']));
            }
            $ret .= $this->render('left.php', 'left_footer_a');
        }
        $query = self::query("select question_name, code from coronameter2021_kagan_lippold_questionables where user_name=:user and status !='open'", array(':user'=>$user));
        $null_de = 0;
        foreach ($query as $row) {
            if ($row['code']!= ''){
                $null_de = 1;
            }

        }
        if ($null_de == 1){
            $ret .= $this->render('left.php', 'left_header_de');
        foreach ($query as $row) {

            $ret .= $this->render('left.php', 'left_deactivated', array('question_de' => $row['question_name'], 'code_de' => $row['code']));

            }
            $ret .= $this->render('left.php', 'left_footer_de');

        }
        $ret .= $this->render('left.php', 'left_surveys2');


        return $ret;
    }

    public function display() {
        echo $this->head();
        echo $this->init();
        echo $this->heading();
        echo $this->user();
        echo $this->body();
        echo $this->tail();
    }
}
?>