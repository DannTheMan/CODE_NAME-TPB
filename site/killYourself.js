function killYourself() {
	$.ajax({
		url : "killYourself.php",
		type : 'POST',
		success : function(data) {
			location.reload();
		},
	});
}

