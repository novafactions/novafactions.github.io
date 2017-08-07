<!DOCTYPE html>
<html class="js">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Portal Page</title>
	<link href='https://fonts.googleapis.com/css?family=Oswald:300,400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="assets/css/venobox.css">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<div class="preloader animate">
	    <div class="cube">
	      <span></span>
	      <span></span>
	      <span></span>
	    </div>
	    <div class="cube">
	      <span></span>
	      <span></span>
	      <span></span>
	    </div>
	  </div>
	<div class="container">
		<img src="assets/img/logo.png" class="animated infinite swing" alt="Factions Lab" id="logo" />
		<div id="buttons">
			<a class="home" href="#" title=""></a>
			<a class="forums" href="#" title=""></a>
			<a class="vote venobox" data-title="Minecraftservers.org" data-gall="voting" data-type="iframe" href="#"></a>
			<div style="display:none;">
				<a class="venobox" data-title="TITLE HERE" data-gall="voting" data-type="iframe" href="#"></a>
				<a class="venobox" data-title="TITLE HERE" data-gall="voting" data-type="iframe" href="#"></a>
				<a class="venobox" data-title="TITLE HERE" data-gall="voting" data-type="iframe" href="#"></a>
			</div>
			<a class="shop" href="http://shop.factionslab.com/" title=""></a>

		</div>
		<div id="server">
			<p>There are currently <span class="count"></span> players
			</p>
			<button id="copy-button" data-clipboard-text="you.ip.here" title="Click to copy me.">Copy to Clipboard</button>
		</div>
	</div>
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="assets/js/clipboard.min.js"></script>
<script src="assets/js/venobox.min.js"></script>
<script>
$(document).ready(function() {

	var clipboard = new Clipboard('#copy-button');
	$('#copy-button').click( function(e) {
		$(this).html('copied!');
		$(this).addClass("copied");
	});

	$(window).load(function(){
		$('.preloader').fadeOut('slow',function(){$(this).remove();});
	});

	$('.venobox').venobox({
        titleattr: 'data-title',
        numeratio: true,
        infinigall: true
    });

    function loadStatus() {
		$.ajax({
			type: 'GET',url: 'http://api.syfaro.net/server/status',data: {ip: 'serverip:25565', keepUpdated: true}
		}).done(function(status) {$(".count").text(status.players.now);});
	}
	loadStatus();
	setInterval(function() {
    	loadStatus();
	},5000)
});
</script>
</body>
</html>