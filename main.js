
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
		$('#onn').show();
	});
	$('#onn').click(function(){
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


	var name = "#my"+div;
	div = "#"+div;
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
function del(div_id, type){
	$.post("servidor/del.php", {id: div_id, deleted: "yes", t: type}, function(data){
		var url = "../url/?m=del&sort="data.typee;
		if(data.message=="success")
			document.location.href=url;
		else
			document.location.href='../url/?m=e';
	}, json);
}

function srting (sort, item) {
	// body...
	var url = "../url/?sort="+sort+"&item="+item;
	document.location.href=url;
}








