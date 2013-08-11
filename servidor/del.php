<?



if($_POST['deleted']){
	
	$id 	= $_POST['id'];
	$type 	= $_POST['type'];

	require('connect.php');

	if($q = mysql_query("DELETE FROM `mystuff` WHERE `id` = '$id'"))
		$data['message']= "success";
		$data['tipo']	= $type;
		echo json_encode($data);
	else
		$data['message']= "fail";
		$data['tipo']	= "none";
		echo json_encode($data);


} else {
	Header("Location: ../../url");
}





?>