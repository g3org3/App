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
	@media screen and (max-width: 800px){
		div {
			position: absolute;
			top: 0px;
			left: 0px;
			width: 100%;
			text-align: center;
			background-color: white;
			white-space: pre;
		}
		input#sb {
			width: 92%;
			background-color: white;
			border: 1px solid blue;
			font-family: lucida sans unicode;
			height: 40px;
			font-size: 20px;
		}
		input#txt{
			border-color: green;
			width: 90%;
		}
	}
	</style>
</head>
<body style="text-align:center">
	<div>
	<form action="servidor/login.php" method="POST"><input id='txt' placeholder="User" type="text" name="user" />
<input id='txt' placeholder="Password" type="password" name="pass" />

<input id='sb' type="submit" value="login" name="login" />
	</form>
	</div>
</body>
</html>



<? }?>