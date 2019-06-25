<html>
	<head>
		<style type="text/css">
			label
			{
				display: block;
			}
		</style>
	</head>
	<body>
		<h1>I'm in the default action of Index Controller!</h1>
		<form method="post">
			<label>First Name</label>
			<input type="text" name="firstName" id="firstName" />
			<label>Last Name</label>
			<input type="text" name="lastName" id="lastName" />
			<label>Address</label>
			<input type="text" name="address" id="address" />
			
			<input type="submit" />
		</form>
		<h2>The Following Keys Were Set:</h2>
			<?= $this->keysSet; ?>
	</body>
</html>