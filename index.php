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
			<input type="text" name="hex" id="hexbox">
			<button onclick="return calc();">Convert</button>
				<p id="answer"></p>
				<script>
					function calc() {
						console.log("hi");
						let xval1 = document.getElementById('x1').value;
						var xhttp = new XMLHttpRequest();
						xhttp.onreadstatechange = function() {
							if (this.readyState == 4 && this.status == 200) {
								console.log(document.getElementById('answer'));
								document.getElementById('answer').innerHTML = "Hex color code: " + this.responseText;
							}
						};
						xhttp.open("POST", 'https://us-east1-it-5236-dismob.cloudfunctions.net/function-final', true);
						xhttp.setRequestHeader("Content-type", "application/json");
						xhttp.send(JSON.stringify({x1:xval1}));
						console.log("bye");
					}
				</script>
			</fieldset>
		<?php
        if(isset($_POST['submit'])) {
            //https://cloud.google.com/appengine/docs/standard/php/issue-requests#gae-url-requests-php-curl
            $url = 'https://us-east1-capable-arbor-286903.cloudfunctions.net/function-final';
            $data = json_encode(['x1' => $_POST["x1"], 'y1' => $_POST["y1"], 'x2' => $_POST["x2"], 'y2' => $_POST["y2"]]);
            $headers = [
                'Accept: */*',
                'Content-Type: application/x-www-form-urlencoded',
                'Custom-Header: custom-value',
                'Custom-Header-Two: custom-value-2'
            ];
            
            // open the connection
            $ch = curl_init();

            // set the curl options
            $options = [
                CURLOPT_URL => $url,
                CURLOPT_POST => count($data),
                CURLOPT_POSTFIELDS => http_build_query($data),
                CURLOPT_HTTPHEADER => $headers,
                CURLOPT_RETURNTRANSFER => true,
            ];
            curl_setopt_array($ch, $options);
            json_encode($ch);
            // execute
            $result = curl_exec($ch);
            // close the connection
            curl_close($ch);
            echo $result;
        }
        ?>
	</form>
</body>
</html>