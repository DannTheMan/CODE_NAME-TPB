window.onload = function() {
	document.getElementById("logout").onclick = function() {
		$.ajax({
				url : "killYourself.php",
				type : 'POST',
				success : function(data) {
					location.reload();
				},
				});
	}
}

