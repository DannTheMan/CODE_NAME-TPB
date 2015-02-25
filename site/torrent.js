window.onload = function () {
	document.getElementById("submitComment").onclick = function() {
		if (document.getElementById("userComment").value.length > 0) {
			var ans = "";
			$.ajax({
				url : "torrentBack.php",
				torrent : torrentID,
				type : 'POST',
				data : "comment="+document.getElementById("userComment").value+"",
				datatype : 'xml',
				success : function(data) {
					var d = (data === 'true');
					ans = d;
				},
				complete : function() {
					if(!ans) {
						return fail("There was a problem logging in to your account.");
					} else {
						succeed();
					}
				}
		
				});

		} else {
			alert("Error:  No comment entered.");
		}
	};
}

function fail(err) {
	alert("Error: " + err);
	return false;
}

function succeed() {
	window.location.href = "torrent.php?torrent=" + torrentID;
}