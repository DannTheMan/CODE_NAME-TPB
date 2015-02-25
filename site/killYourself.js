$(document).ready(function(){
   document.getElementById("logout").onclick = killYourself;
});

function killYourself() {
	$.ajax({
		url : "killYourself.php",
		type : 'POST',
		success : function(data) {
			window.location.href = ("landing.php");//location.reload();
		},
	});
}

