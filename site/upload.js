function upload(){
	alert("SADASD");
	var myUrl = "uploadBack.php";
	var n = document.getElementById("un").value;
	var d = document.getElementById("desc").value;
	var f = document.getElementById("fl").files;//value;
	getData(n,myUrl,d,f);
}

function getData(n,myUrl,d,f) {
	var ans = false;
	/*$.ajax({
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
		}*/
	
	var formData = new FormData($(this)[0]);

    $.ajax({
        url: myUrl,
        type: 'POST',
        data: formData,
        success : function(data) {
        	console.log("GOG");
        	alert("ajk");
			var d = true;//(data === 'true');
			console.log(data+" :KKK");
			ans = d;
		},
		complete : function() {
			if(!ans)return fail("There was a problem uploading the file.");
			else {
				//succeed();
			}},
        cache: false,
        contentType: false,
        processData: false
	
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

