<?



if($_POST['deleted']){
	
	$id 	= $_POST['id'];
	$type 	= $_POST['typee'];

	require('connect.php');

	if($q = mysql_query("DELETE FROM `mystuff` WHERE `id` = '$id'")){
		//$data['message'] = "success";
		//$data['tipo'] = $type;
		$data = "success";
	} else
		//$data['message'] = "fail";
		//$data['tipo']	= "none";
		$data="fail";
	}
	echo ($data);


} else {
	Header("Location: ../../url");
}





?>