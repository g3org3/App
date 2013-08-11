<?



if($_POST['deleted']){
	
	$id 	= $_POST['id'];
	$tipo	= $_POST['tipo'];

	require('connect.php');

	if($q = mysql_query("DELETE FROM `mystuff` WHERE `id` = '$id'")){
		$data['message']= "success";
		$data['tipo']	= $tipo;
	} else{
		$data['message']= "fail";
		$data['tipo']	= "none";
	}

	echo json_encode($data);


} else {
	Header("Location: ../../url");
}





?>