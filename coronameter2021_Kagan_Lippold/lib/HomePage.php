<?php
namespace coronameter2021_Kagan_Lippold\lib;

/**
 * Base class for all Pages
 */
abstract class HomePage extends TemplateRenderer {

	protected $name;

	//Ueberschreiben
	abstract protected function body();
	abstract protected function init();

	function __construct(string $name) {
		$this->name=$name;
	}

	protected function head(){
        session_start();
		$session = false;
        if(isset($_SESSION['user']))  {
			$session = true;
		}
        if(isset($_POST['sgnbtn'])){
            header("Location: signup.html");
			exit();
        }
        if(isset($_POST['outbtn'])){
			unset($_SESSION['user']);
            header("Location: index.html");
			exit();
        }else{
		return $this->render('home.php', 'header', array('title' => $this->name, 'session' => $session));
        }
	}

	protected function tail(){
		return $this->render('home.php', 'footer');
	}

	public function display(){
		$msg = $this->init();
		echo $this->head();
		echo $msg;
		echo $this->body();
		echo $this->tail();
	}



}
?>