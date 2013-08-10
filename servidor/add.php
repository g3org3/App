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

		mysql_query("INSERT INTO `mystuff` (`id`, `title`, `src`, `type`, `datetime`) VALUES (NULL, '$title', '$src', '$type', '$fecha')");
		$type = substr($type, 0, 1);
		header("Location: ../../url/?sort=$type");
	} else {
		Header("Location: ../../url/?m=e");
	}


} else {
	Header("Location: ../../url/?m=e");
}



?>