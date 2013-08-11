
$(document).ready(function(){
	// code
	//hideAll("urls", 1);
	$('#messages').hide();
	$('#myurls').hide();
	$('#mymusic').hide();
	$('#mynotes').hide();
	$('#myimages').hide();
	$('#myadd').hide();
	$('#onn').hide();

	$('#urls').click(function(){
		hideAll("urls");
	});
	$('#music').click(function(){
		hideAll("music");
	});
	$('#notes').click(function(){
		hideAll("notes");
	});
	$('#images').click(function(){
		hideAll("images");
	});

	$('#add').click(function(){
		hideAll("add");
	});

	$('#off').click(function(){
		$('#header').slideUp(400);
		$('#menu').slideUp(400);
		$('#off').hide();
		setTimeout(function(){
			$('#onn').fadeIn(400);
		}, 400);
		$('#space').slideUp(800);
	});
	$('#onn').click(function(){
		$('#space').slideDown(800);
		$('#header').slideDown(400);
		$('#menu').slideDown(400);
		$('#off').show();
		$('#onn').hide();
	});

	$('#logout').click(function(){
		$.post("servidor/logout.php",{logout:"true"}, function(data){
			document.location.href='../url/';
		});
	});
});

function hideAll(div, n){

	var time = 300;
	var time2 = time+100;

	if(n==1){
		time=0;
		time2 = 0;
	}
	$('#myurls').fadeOut(time);
	$('#mymusic').fadeOut(time);
	$('#mynotes').fadeOut(time);
	$('#myimages').fadeOut(time);
	$('#myadd').fadeOut(time);

	//$('#urls').css("border-bottom","2px solid #EBEBEB");
	//$('#music').css("border-bottom","2px solid #EBEBEB");
	//$('#notes').css("border-bottom","2px solid #EBEBEB");
	//$('#images').css("border-bottom","2px solid #EBEBEB");
	//$('#add').css("border-bottom","2px solid #EBEBEB");

	var name = "#my"+div;
	div = "#"+div;
	//$(div).css("border-bottom","2px solid gray");
	setTimeout(function(){
		$(name).fadeIn(time);
	}, time2);
	
}
function display(id) {
	var name = "#txt"+id+"content";
	$(name).css("visibility", "visible");
	$(name).css("height", "auto");
}
function away(id) {
	var name = "#txt"+id+"content";
	$(name).css("visibility", "hidden");
	$(name).css("height", "0px");
}
function del(div_id, t){
	$.post("servidor/del.php", {id: div_id, deleted: "yes", type:t}, function(data){
		alert(data);
	}, json);
}

function srting (sort, item) {
	// body...
	var url = "../url/?sort="+sort+"&item="+item;
	document.location.href=url;
}








