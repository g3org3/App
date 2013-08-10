<? require('servidor/connect.php') ?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="apple-mobile-web-app-capable" content="yes" /> 
		<meta name="apple-mobile-web-app-status-bar-style" content="black" />
		<meta name="viewport" content="minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no" />
		<title>Utility [alpha]</title>

		<link rel="stylesheet" type="text/css" href="main.css" />
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="main.js"></script>
		<script type="text/javascript">
		$(document).ready(function(){

		<?

		if($_GET['m']=="del")
			$message = "Task Deleted!";
		else if($_GET['m']=="mp3")
			$message = "Song Added!";
		else if($_GET['m']=="notes")
			$message = "Note Added!";
		else if($_GET['m']=="url")
			$message = "Link Added!";
		else if($_GET['m']=="e")
			$message = "Error!";

		if($_GET['sort']=="m"){
			?>setTimeout(function(){
				hideAll("music");
			}, 100); <?
		} else {
			?>hideAll("urls", 1);<?
		}

		if($_GET['m']){
			?>
			$('#messages').slideDown(600);
			setTimeout(function(){
				$('#messages').slideUp(600);
			}, 1600);
			<?
		}


		?>

		});
		</script>
	</head>
	<body>
	<div id='messages'><? echo $message?></div>
	<div id='header'></div>
		<div id="nav">
			<div style="position:fixed;"><a id='off' href="#">@</a><a id='onn' href="#">@</a></div>
			<div id="menu">
				<a class='tabs' href='../url/' id='logo'>U</a><a class='tabs' href='#' id='urls'>Links</a><a class='tabs' href='#' id='music'>Music</a><a class='tabs' href='#' id='notes'>Notes</a><a class='tabs' href='#' id='images' style='text-decoration: line-through;'>Images</a><a class='tabs' href="#" id='add'>+</a><a class='tabs' href="#" id='logout'>-</a>
			</div>

			<div id="myadd">
				<form action='servidor/add.php' method='post'>
					<input name='title' class="txt" placeholder='Title' /><br>
					<input name='src' class='txt' placeholder='Link or Artist or Content' /><br>
					<select name='type'>
						<option value=''>-</option>
						<option value='url'>link</option>
						<option value='mp3'>song</option>
						<option value="notes">note</option>
						<option value='img'>image</option>
					</select>
					<input type="submit" name='submit' value="Add" />
				</form>
			</div>


			<div id="myurls">
				<?
					$qurl = mysql_query("SELECT * FROM `mystuff` WHERE `type` = 'url' ORDER BY `id` DESC");
					if(mysql_num_rows($qurl)==0)
						echo "Go to the (+) tab and add some links!";
					while ($row = mysql_fetch_assoc($qurl)) {
						$uid 	= $row['id'];
						$utitle = $row['title'];
						$usrc	= $row['src'];

						echo "
						<ul>
							<li><a class='links' href=$usrc>$utitle</a> | <a class='deleted' onclick='del($uid)' href='#'>[delete]</a></li>
						</ul>";
					}
				?>
			</div>



			<div id="mymusic">
				<table cellspacing="0">
					<tr class='d'>
						<td width="40%" onClick="srting('m','t');" style="background-image: -webkit-linear-gradient(bottom, rgb(169,76,181) 0%, rgb(234,112,250) 84%);">Song</td>
						<td width="35%" onClick="srting('m', 'a');" style="background-image: -webkit-linear-gradient(bottom, rgb(36,128,36) 0%, rgb(98,204,98) 84%);">Artist</td>
						<td width="10%" style="background-image: -webkit-linear-gradient(bottom, rgb(163,45,45) 0%, rgb(250,117,117) 84%);">Video</td>
						<td width="5%" style="background-image: -webkit-linear-gradient(bottom, rgb(31,93,143) 0%, rgb(81,164,232) 84%);">-</td>
						<td width="5%" style="background-image: -webkit-linear-gradient(bottom, rgb(34,89,82) 0%, rgb(81,164,153) 84%);">-</td>
						<td width="5%" id='del' style="background-image: -webkit-linear-gradient(bottom, rgb(191,135,52) 0%, rgb(255,185,79) 100%);">-</td>
					</tr>
					<?
						$x = 1;
						if($_GET['sort']=="m" && $_GET['item']=="t")
							$qmusic = mysql_query("SELECT * FROM `mystuff` WHERE `type` = 'mp3' ORDER BY `title` ASC");
						else if($_GET['sort']=="m" && $_GET['item']=="a")
							$qmusic = mysql_query("SELECT * FROM `mystuff` WHERE `type` = 'mp3' ORDER BY `src` ASC");
						else
							$qmusic = mysql_query("SELECT * FROM `mystuff` WHERE `type` = 'mp3' ORDER BY `id` DESC");
						
						if(mysql_num_rows($qmusic)==0)
							echo "Go to the (+) tab and add some songs!";

						while ($row = mysql_fetch_assoc($qmusic)) {
							$mid 	= $row['id'];
							$mtitle = $row['title'];
							$msrc	= $row['src'];

							$x = ($x==1)? 0: 1;
							if($x==0)
								echo "<tr style='background:#ebebeb;'>";
							else
								echo "<tr style='background:#fff;'>";
							echo "
								<td><a target='_blank' class='links' href='http://en.wikipedia.org/wiki/Special:Search?search=".$mtitle."&go=Go'>$mtitle</a></td>
								<td><a target='_blank' class='links' href='http://en.wikipedia.org/wiki/Special:Search?search=".$msrc."&go=Go'>$msrc</a></td>
								<td class='c'><a target='_blank' href='http://www.youtube.com/results?search_query=$mtitle+$msrc'><img class='songs' src='images/youtube.jpg' /></a></td>
								<td class='c'><a target='_blank' href='https://www.google.com/#q=$mtitle+$msrc+download'><img height='16px' class='songs' src='images/google.jpg' /></a></td>
								<td class='c'><a target='_blank' href='http://mp3skull.com/mp3/".$msrc."_".$mtitle.".html'><img height='16px' class='songs' src='images/skull.png' /></a></td>
								<td class='c'><a class='deleted' onclick='del($mid);' href='#'>X</a></td>
							</tr>
							";
						}
					?>
				</table>
			</div>




			<div id="mynotes">
				<?
						$qnotes = mysql_query("SELECT * FROM `mystuff` WHERE `type` = 'notes' ORDER BY `id` DESC");
						if(mysql_num_rows($qnotes)==0)
							echo "Go to the (+) tab and add some notes!";
						while ($row = mysql_fetch_assoc($qnotes)) {
							$nid 	= $row['id'];
							$ntitle = $row['title'];
							$nsrc	= $row['src'];
							$fecha 	= $row['datetime'];
							$fecha 	= substr($fecha, 0, 10);

							echo "
							<div class='notesTitle' id='txt$nid'>
							<div class='ntstitle' onclick='display($nid);'>$ntitle </div><div class='ntshide' onclick='away($nid)'>[hide]</div><div class='ntsdel' onclick='del($nid)'>[delete]</div><div onclick='display($nid);' class='ntsdate'>$fecha</div>
							</div>
							<div class='notesContent' id='txt".$nid."content' style='visibility: hidden; height:0px;'>$nsrc</div>
							";
						}
					?>
				
			</div>


			<div id="myimages">
				<?
						$qimages = mysql_query("SELECT * FROM `mystuff` WHERE `type` = 'img'");
						while ($row = mysql_fetch_assoc($qimages)) {
							$iid 	= $row['id'];
							$ititle = $row['title'];
							$isrc	= $row['src'];

							//echo "
							//<img style='max-height:100px;' alt=".$ititle." src='data/".$isrc."' />
							//";
						}
					?>
					<p>not available.
			</div>
		</div>
	</body>
</html>