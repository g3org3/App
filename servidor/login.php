<?php



if($_POST['login']){
	$user = $_POST['user'];
	$pass = $_POST['pass'];

	if($user=="george"&&$pass=='holis'){
		session_start(1);
		$_SESSION['name'] = "George";
		$_SESSION['admin'] = "true";
		Header("Location: ../../url/");
	} else {
		Header("Location: ../../url");
	}


} else {
	Header("Location: ../../url");
}





?>