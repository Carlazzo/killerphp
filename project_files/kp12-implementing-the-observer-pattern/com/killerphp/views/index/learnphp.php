<html>
	<head>
	</head>
	<body>
		<h1>Learn PHP at Killerphp.com</h1>
		<p>The following people want to learn PHP!</p>
			<form method="post">
				<input type="text" id="searchQuery" name="searchQuery" />
				<input type="submit" value="search" />
			</form>
		<?= $this->phplearners; ?> 
	</body>
</html>