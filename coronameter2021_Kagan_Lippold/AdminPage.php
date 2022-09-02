<?php 
namespace coronameter2021_Kagan_Lippold;

final class AdminPage extends LeftPage {
	use lib\DataBase;

	protected function init(){
		$user = $_SESSION['user'];
		if(!$user)  {
			header("Location: index.html");
			//exit();
		}
	}


	protected function body(){
		return $this->render('admin.php', 'admin_header', array('name' => $_SESSION['user']));
	}
}
?>
