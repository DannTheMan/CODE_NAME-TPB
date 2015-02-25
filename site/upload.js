function upload(){
	alert("SADASD");
	var myUrl = "uploadBack.php";
	var n = document.getElementById("un").value;
	var d = document.getElementById("desc").value;
	var f = document.getElementById("fl").value;
	getData(n,myUrl,d,f);
}

function getData(n,myUrl,d,f) {
	var ans = false;
	$.ajax({
		url : myUrl,
		type : 'POST',
		data : "n="+n+"&d="+d+"&f="+f,
		datatype : 'xml',
		success : function(data) {
			var d = true;//(data === 'true');
			console.log(data+"");
			ans = d;
		},
		complete : function() {
			if(!ans)return fail("There was a problem uploading the file.");
			else {
				//succeed();
			}
		}
	
	});
}

function succeed(){
	alert("File uploaded successfully!");
	window.location.href = "landing.php";
}

function fail(err){
	alert("Error: "+err);
	return false;
}

