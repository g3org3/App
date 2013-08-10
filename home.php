<?


if($_POST['submit']=="Go"){
	$result = ":D";

	// CONNECTING TO DATABASE
	include('connect.php');

	$link = $_POST['link'];
	$title = $_POST['title'];

	if($query = mysql_query("INSERT INTO text (id, title, link) VALUES (NULL, '$title', '$link')"));
	else
		die("Error <a href='index.php'>return</a>");


} else if ($_POST['submit']=="Load") {
	$result = "1";
} else if ($_POST['submit']=="Delete"){
	$result = ":O";

	// CONNECTING TO DATABASE
	$connect = mysql_connect($local, $root, $pass);
	$con_db = mysql_select_db($dbname);

	if($query = mysql_query("TRUNCATE TABLE `text`"));
	else
		die("Error <a href='index.php'>return</a>");
} else {
	$result = "";
}

?>

<html>
<head>
	<title>Url m to pc</title>
	<style type="text/css">
	body {
		text-align: center;
	}
	#output {
		margin: 0px auto;
		width: 500px;
		text-align: left;
	}
	#crear:link, #crear2:link, #crear:visited, #crear2:visited {
		text-decoration: none;
		color: brown;
		background: #ccc;
		padding: 1px 5px 1px 5px;
		border: 1px solid brown;
		font-family: lucida sans unicode;
	}
	</style>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$('#crear2').hide();

		$('#crear').click(function(){
			$('#input').slideUp(400);
			$('#crear').hide();
			$('#crear2').show();
		});

		$('#crear2').click(function(){
			$('#input').slideDown(400);
			$('#crear').show();
			$('#crear2').hide();
		});



	});

	</script>
</head>
<body style="text-align:center;">
<div id="input">
	<a href="index.php" style="font-weight:bold; text-decoration:none;">Refresh</a>
	<p>
	<form action="index.php" method="POST">
		<input type="text" name="title" placeholder="title" />
		<input type="text" name="link" placeholder="link" />
		<input type="submit" name="submit" value="Go" />
	</form></p>
</div>
<hr>
<div id="output">
	<div style="text-align:center;">
	<form action="index.php" method="POST"><input type="button" id='crear' value="new"><input type='button' id='crear2' value="new" /> <select name="submit"><option>Load</option><option>Delete</option></optgroup></select><input type="submit" value="Go" /></form>
	</div>
	<div id="data">
		<?
		if ($result=="1"){
			// CONNECTING TO DATABASE
			require('connect.php');

			$query = mysql_query("SELECT * FROM text ORDER BY id ASC");


			echo "<hr style='width:100%;border:none; height:1px; background:#999;'><h2>LINKS</h2><hr style='width:100%;border:none; height:1px; background:#999;'><ul>";
			while ($row = mysql_fetch_assoc($query)) {
				$title = $row['title'];
				$src = $row['link'];

				echo "<li><a class='links' href=".$src.">".$title."</a></li>";
			}
			echo "</ul>";
		} else
			echo $result;

		?>
	</div>
</div>
</body>
</html>