<?
session_start(1);
if($_SESSION['name'])
	include('pages/content.php');
else {
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="apple-mobile-web-app-capable" content="yes" /> 
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="viewport" content="minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no" />
	<title>Utility [alpha]</title>
	<style type="text/css">
	input#txt {
		border: 1px solid #ccc;
		padding: 5px;
		font-family: lucida sans unicode;
		font-size: 20px;
		outline: none;
	}
	</style>
</head>
<body style="text-align:center">
	<form action="servidor/login.php" method="POST">
		<input id='txt' placeholder="User" type="text" name="user" /><input id='txt' placeholder="Password" type="password" name="pass" /><input type="submit" value="login" name="login" />
	</form>
</body>
</html>



<? }?>