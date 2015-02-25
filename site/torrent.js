window.onload = function () {
	document.getElementById("submitComment").onclick = function() {
		if (document.getElementById("userComment").innerHTML.length > 0) {
			$.ajax({
				url : "torrentBack.php",
				torrent : torrentID,
				type : 'POST',
				data : "comment="+document.getElementById("userComment").innerHTML+"",
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

function succeed() {
	window.location.href = "torrent.php?torrent=" + torrentID;
}