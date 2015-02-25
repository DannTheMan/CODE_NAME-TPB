$(document).ready(function(){
   document.getElementById("logout").onclick = killYourself;
});

function killYourself() {
	$.ajax({
		url : "killYourself.php",
		type : 'POST',
		success : function(data) {
			location.reload();
		},
	});
}

