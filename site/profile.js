function modifyProfile() {
	document.getElementById("nametext").style.visibility = 'visible';
	document.getElementById("emailtext").style.visibility = 'visible';
	document.getElementById("agetext").style.visibility = 'visible';
	document.getElementById("gendertext").style.visibility = 'visible';
	document.getElementById("sumbit").style.visibility = 'visible';
	document.getElementById("mod").style.visibility = 'hidden';
}

function submitToDb() {
	var name = document.getElementById("nametext").value;
	if (name != "") {
		updateName(name);
	}
	var email = document.getElementById("emailtext").value;
	if (email != "") {
		updateEmail(email);
	}
	var age = document.getElementById("agetext").value;
	if (age != "" && age.length <= 3) {
		updateAge(age);
	}
	var gender = document.getElementById("gendertext").value;
	if (gender.length == 1) {
		updateGender(gender);
	}

	document.getElementById("nametext").style.visibility = 'hidden';
	document.getElementById("emailtext").style.visibility = 'hidden';
	document.getElementById("agetext").style.visibility = 'hidden';
	document.getElementById("gendertext").style.visibility = 'hidden';
	document.getElementById("sumbit").style.visibility = 'hidden';
	document.getElementById("mod").style.visibility = 'visible';

	document.getElementById("sumbit").style.visibility = "hidden";
}

function updateName(n) {
	$.ajax({
		url : "torrentBack.php",
		type : 'POST',
		data : "name="+n+"&uid="+uid,
		datatype : 'xml',
		success : function(data) {
			var d = (data === 'true');
			ans = d;
		},
		complete : function() {
			return "Woo!";
		}

	});
}

function updateEmail(n) {
	$.ajax({
		url : "torrentBack.php",
		type : 'POST',
		data : "email="+n+"&uid="+uid,
		datatype : 'xml',
		success : function(data) {
			var d = (data === 'true');
			ans = d;
		},
		complete : function() {
			return "Woo!";
		}

	});
}

function updateAge(n) {
	$.ajax({
		url : "torrentBack.php",
		type : 'POST',
		data : "age="+n+"&uid="+uid,
		datatype : 'xml',
		success : function(data) {
			var d = (data === 'true');
			ans = d;
		},
		complete : function() {
			return "Woo!";
		}

	});
}

function updateGender(n) {
	$.ajax({
		url : "torrentBack.php",
		type : 'POST',
		data : "gender="+n+"&uid="+uid,
		datatype : 'xml',
		success : function(data) {
			var d = (data === 'true');
			ans = d;
		},
		complete : function() {
			return "Woo!";
		}

	});
}