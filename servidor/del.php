<?



if($_POST['deleted']){
	$id = $_POST['id'];
	$t	= $_POST['t'];
	require('connect.php');

	if($q = mysql_query("DELETE FROM `mystuff` WHERE `id` = '$id'"))
		$data['message'] = "success";
		$data['typee']	 = $t;
		echo json_encode($data);
	else
		$data['message'] = "fail";
		$data['typee']	 = "none";
		echo json_encode($data);

} else {
	Header("Location: ../../url");
}





?>