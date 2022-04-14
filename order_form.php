<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Order Form </title>
</head>
<style>
    body {
	font-family: Helvetica, sans serif;
}

h1 {
	font-family: 'Life Savers', cursive;
	text-align: center;
	margin: 1em;
	font-size: 2.5em;
	text-shadow: 2px 2px 3px grey;
}

form {
	display: flex;
	flex-direction: column;
	background: thistle;
	margin: 0 auto 2em;
	border-radius: 1em;
	padding: 1em 0;
}

input, 
textarea {
	border: none;
	padding: .5em;
	border-radius: .25em;
}

input:focus,
input:hover,
textarea:focus,
textarea:hover {
	background: seashell;
	border-bottom: 2px solid purple;
	outline: none;
}


fieldset {
	border: none;
	margin: .5em;
}

legend {
	font-family: 'Comfortaa', cursive;
	font-size: 1.4em;
	font-weight: bold;
	padding-bottom: .5em;
}

label,
.button {
	font-family: 'Baloo Chettan 2', cursive;
}

.button {
	box-shadow: 1px 1px 3px black;
	border: none;
	background-color: #DFDBE5;
	background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='4' height='4' viewBox='0 0 4 4'%3E%3Cpath fill='%239C92AC' fill-opacity='0.4' d='M1 3h1v1H1V3zm2-2h1v1H3V1z'%3E%3C/path%3E%3C/svg%3E");
	font-size: 1em;
	align-self: center;
    padding: .7em;
	color: black;
}

.button:hover {
	cursor: pointer;
	background: radial-gradient(black, purple);
	color: white;
	box-shadow: inset 2px 2px 5px 0px rgba(0,0,0,0.75);
}

#name,
#mail,
#quantity,
textarea {
	margin: .5em 0;
	box-shadow: 1px 1px 2px grey;
}

@media (min-width: 550px) {
	form {
		max-width: 50%;
	}
}
</style>
<body>
<?php
    if (isset($_POST['name'])) {
        require "process.php";
        if ($result == "") { 
            echo "<div> ORDER RECEIVED!</div>";
        }
        else {
            echo "<div> $result </div>";
        }
    }
?>



	
<h1>Place Your Order Here!</h1>
	
<form>
		
    <fieldset>
		<legend> Your Info:</legend>
		    <label for="name">Name:</label><br>
	            <input type="text" id="name" name="name" required><br>
		    <label for="mail">Email:</label><br>
	            <input type="email" id="mail" name="email" required><br>
		    <label for="quantity">Quantity:</label><br>
                <input type="number" id="quantity" name="quantity" required>
    </fieldset>

        <input class="button" type="submit" value="Give me Food!">
</form>


</body>
</html>