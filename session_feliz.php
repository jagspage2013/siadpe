<?php 
	session_start();

	if(isset($_POST['user']) & isset($_POST['type'])){
		$_SESSION['user'] = $_POST['user'];
		$_SESSION['type'] = $_POST['typex'];
		echo "saved";
	}else{
		echo json_encode(array('user' => $_SESSION['user'] ,'type' => $_SESSION['typex']));
	}
	
 ?>