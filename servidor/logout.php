<?php

session_start(1);

if($_POST['logout']){
	session_destroy();
	Header("Location: ../../url/?m=out");
	echo "si";

} else {
	Header("Location: ../../url");
	echo "noe";
}





?>