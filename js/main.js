
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
	$('#mobilemenu').hide();
	$('#active').hide();

	if(screenWidth()<570){
		$('#menu').hide();
		$('#active').show();
		$('#menu').remove();
		$('#active').click(function(){
			$('#active').css("color", "#EBEBEB");
			$('#mobilemenu').slideDown(600);
		});
		$('#logo').click(function(){
			setTimeout(function(){
				$('#active').css("color", "#000");
			}, 400);
			$('#mobilemenu').slideUp(400);
		})
		$('#urls').click(function(){
			$('#mobilemenu').slideUp(400);
			hideAll("urls");
		});
		$('#music').click(function(){
			$('#mobilemenu').slideUp(400);
			hideAll("music");
		});
		$('#notes').click(function(){
			$('#mobilemenu').slideUp(400);
			hideAll("notes");
		});
		$('#images').click(function(){
			$('#mobilemenu').slideUp(400);
			hideAll("images");
		});

		$('#add').click(function(){
			$('#mobilemenu').slideUp(400);
			hideAll("add");
		});
	}else {



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
}
	$('#off').click(function(){
		$('#header').slideUp(400);
		$('#menu').slideUp(400);
		$('#off').hide();
		setTimeout(function(){
			$('#onn').fadeIn(400);
		}, 400);
		$('#space').animate({height: "-=20"}, 800);
	});
	$('#onn').click(function(){
		$('#space').animate({height: "+=20"}, 800);
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
	setTimeout(function(){
		$('#active').css("color", "#000");
	}, 400);

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
function del(div_id, div_tip){
	$.post("servidor/del.php", {id: div_id, deleted: "yes", tipo: div_tip}, function(data){
		if(data.message=="success")
			document.location.href='../url/?m=del&sort='+data.tipo;
		else
			document.location.href='../url/?m=e';
	}, 'json');
}

function srting (sort, item) {
	// body...
	var url = "../url/?sort="+sort+"&item="+item;
	document.location.href=url;
}


function screenWidth(){
	var winW = 630, winH = 460;
	if (document.body && document.body.offsetWidth) {
		winW = document.body.offsetWidth;
		winH = document.body.offsetHeight;
	}
	if (document.compatMode=='CSS1Compat' && document.documentElement && document.documentElement.offsetWidth ) {
	 	winW = document.documentElement.offsetWidth;
	 	winH = document.documentElement.offsetHeight;
	}
	if (window.innerWidth && window.innerHeight) {
	 	winW = window.innerWidth;
	 	winH = window.innerHeight;
	}
	return winW;
}
function screenHeight(){
	var winW = 630, winH = 460;
	if (document.body && document.body.offsetWidth) {
		winW = document.body.offsetWidth;
		winH = document.body.offsetHeight;
	}
	if (document.compatMode=='CSS1Compat' && document.documentElement && document.documentElement.offsetWidth ) {
	 	winW = document.documentElement.offsetWidth;
	 	winH = document.documentElement.offsetHeight;
	}
	if (window.innerWidth && window.innerHeight) {
	 	winW = window.innerWidth;
	 	winH = window.innerHeight;
	}
	return winH;
}




