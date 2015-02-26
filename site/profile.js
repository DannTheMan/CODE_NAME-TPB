function modifyProfile() {
	document.getElementById("nametext").style.display = 'inline-block';
	document.getElementById("emailtext").style.display = 'inline-block';
	document.getElementById("agetext").style.display = 'inline-block';
	document.getElementById("gendertext").style.display = 'inline-block';
	document.getElementById("submit").style.display = 'inline-block';
	document.getElementById("mod").style.display = 'none';
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
	if (age != null && age != "" && age.length <= 3) {
		updateAge(age);
	}
	var gender = document.getElementById("gendertext").value;
	if (gender != null && gender.length == 1) {
		updateGender(gender);
	}

	document.getElementById("nametext").style.display = 'none';
	document.getElementById("emailtext").style.display = 'none';
	document.getElementById("agetext").style.display = 'none';
	document.getElementById("gendertext").style.display = 'none';
	document.getElementById("submit").style.display = 'none';
	document.getElementById("mod").style.display = 'inline-block';

	document.getElementById("submit").style.display = 'none';
}

function updateName(n) {
	$.ajax({
		url : "profileBack.php",
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
		url : "profileBack.php",
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
		url : "profileBack.php",
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
		url : "profileBack.php",
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