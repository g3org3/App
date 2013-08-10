<?



if($_POST['deleted']){
	$id = $_POST['id'];

	require('connect.php');

	if($q = mysql_query("DELETE FROM `mystuff` WHERE `id` = '$id'"))
		echo "success";
	else
		echo "error";


} else {
	Header("Location: ../../url");
}





?>