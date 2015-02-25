function upload(){
	alert("SADASD");

	var n = document.getElementById("un").value;
	var d = document.getElementById("desc").value;

	var myUrl = "uploadBack.php";

	var reader = new FileReader();
	reader.onload = function() {
		var f = reader.result;
		//console.log(reader.result)

		getData(n,myUrl,d,f);

	};
	console.log(reader.readAsBinaryString(document.getElementById("fl").files[0]));

	
	

	//var f = document.getElementById("fl").value;
	
}

function getData(n,myUrl,d,f) {
	var ans = false;

	var dataToSend = {
		name:n,
		desc:d,
		file:f
	};
	var jData = JSON.stringify(dataToSend);
	
	$.ajax({
		url : myUrl,
		type: 'POST',
		data: jData,
		datatype : 'json',
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

	/*var formData = new FormData($(this)[0]);

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
	*/
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

function gohome(inf){
	alert(inf);
	window.location.href = "landing.php";
}
