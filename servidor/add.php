<?

function datefn() {
	$x = date("Y-m-d");
	$w = date("H");
	$w = ($w<6)?$w + 18:$w-6;
	$y = date(":i:s");
	$z = $x." ".$w.$y;

	return $z;
}

if($_POST['submit']){
	$title 	= $_POST['title'];
	$src	= $_POST['src'];
	$type	= $_POST['type'];
	$fecha	= datefn();

	if($title&&$src&&$type){
		//conectar
		require('connect.php');
		$u = substr($type, 0, 1);
		$url = "../../url/?m=$type&sort=".$u;

		mysql_query("INSERT INTO `mystuff` (`id`, `title`, `src`, `type`, `datetime`) VALUES (NULL, '$title', '$src', '$type', '$fecha')");
		header("Location: $url");
	} else {
		Header("Location: ../../url/?m=e");
	}


} else {
	Header("Location: ../../url/?m=e");
}



?>