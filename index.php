<!DOCTYPE html>
<html lang="en-US">
<!-- Sabrina Hill
	 Final 
	 Fall 2020
-->
<head>
	<title>Sabrina Hill Final Project</title>
	<meta charset= "utf-8">
	<!--<link href="styles.css" rel="stylesheet" />-->
</head>
<body>
	<h1>Hex to RGB Color Converter</h1>
		<fieldset id="contact">
		<legend>Please enter 6 digits hex color code</legend>
			<label for="titlebox">Hex color code:</label>
			<input type="text" name="x" id="x">
			<button onclick="return calc();">Convert</button>
				<p id="answer"></p>
				<script>
					//XML section came from professor Thackston's in-class lecture.
					function calc() {
						console.log("hi");
						let xval = document.getElementById('x').value;
						var xhttp = new XMLHttpRequest();
						xhttp.onreadstatechange = function() {
							if (this.readyState == 4 && this.status == 200) {
								console.log(document.getElementById('answer'));
								document.getElementById('answer').innerHTML = "Hex color code: " + this.responseText;
							}
						};
						xhttp.open("POST", 'https://us-east1-it-5236-dismob.cloudfunctions.net/function-final', true);
						xhttp.setRequestHeader("Content-Type", "application/json");
						xhttp.send(JSON.stringify({x:xval}));
						console.log("bye");
					}
				</script>
			</fieldset>
</body>
</html>