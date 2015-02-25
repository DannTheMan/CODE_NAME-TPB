window.onload = function() {
	document.getElementById("logout").onclick = function() {
		$.ajax({
				url : "killYourself.php",
				type : 'POST',
				complete : function(data) {
					location.reload();
				},
				});
	}
}

