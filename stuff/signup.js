function signup(){
	var myUrl = "security.php";
	var un = document.getElementById("un");
	var pw = document.getElementById("pw");
	var cpw = document.getElementById("cpw");
	if(pw.value!=cpw.value){
		return fail("Your password and confirmed password do not match!");
	}
	untxt = CryptoJS.Rabbit.encrypt(un.value,"paranoid");
	var secure = getData(untxt,myUrl);
	//alert(secure);
}

function getData(un,myUrl) {
	var ans = "";
	var temp = document.createElement("span");
	temp.setAttribute("class","loading");
	document.getElementById("loadingHere").appendChild(temp);
	$.ajax({
		url : myUrl,// + "?un="+un,
		type : 'POST',
		data : "un="+un+"",
		datatype : 'xml',
		success : function(data) {
			var d = data+"";
			ans = d;
			encodeAndSend(ans,un);
		},
		complete : function() {
			temp.remove;
		}
	
	});
	//return ans;
}

function fail(err){
	alert("Error: "+err);
	return false;
}

function encodeAndSend(msg,un){
	var pw = document.getElementById("un");
	var pwtxt = pw.value;
	var secure = CryptoJS.Rabbit.encrypt(pwtxt, (msg+"johny123"));//encrypt pwtxt using msg as a key
	getSignedUp(secure,"signUpBack.php",un);
}

function getSignedUp(s,myUrl,un) {
	var ans = false;
	var temp = document.createElement("span");
	temp.setAttribute("class","loading");
	document.getElementById("loadingHere").appendChild(temp);
	//var uname = document.getElementById("un").value;
	var formData = "username="+un+"&secure="+s;//{username:un,secure:s};
	$.ajax({
		url : myUrl,// + "?un="+un,
		type : 'POST',
		data : formData,//"secure="+s+"",
		datatype : 'xml',
		success : function(data) {
			var d = (data === 'true');
			ans = d;
		},
		complete : function() {
			temp.remove;
			if(!ans)return fail("There was a problem creating your account.");
			else {
				succeed();
			}
		}
	
	});
	//return ans;
}

function succeed(){
	alert("Your account has been created successfully!");
	window.location.href = "landing.php";
}