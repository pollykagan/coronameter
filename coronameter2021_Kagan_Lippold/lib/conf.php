<?php

/** 
 * Global confogurations: Database connection, root password, salt 
 */

namespace coronameter2021_Kagan_Lippold\lib;

function conf(){
	return [
	'driver'	=>	'mysql',
	'host'		=> 	'localhost',
	'user'		=> 	'web',
	'pass'		=> 	'sta2022',
	'database'	=> 	'web',
	'engine'	=>	'InnoDB',
	];
}
function admins(){
	return [ //SHA-256: Generate with salt
		'admin' => '40acd2fde1d45860ee81ef9581607fe9c3c5e893cbb11343eaac1fd66d69209d',
		'root'	=> '9f2da3c18ab446c0bd8d5fd1ef146530b8e664b89aee5f922989031f46fdd509'
	];
}

//Please customize
function salt(){
	return '@OTH-AW++K_L';
}
?>
