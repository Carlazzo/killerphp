<html>
	<head>
	</head>
	<body>
		<h1>Welcome to my KillerPHP application!</h1>
		<?php if ($this->userExists): ?>
			<?= $this->user; ?>
		<?php else: ?>
			<p>uh oh, we don't know who you are! please <a href="/">register</a>
		
		<?php endif; ?>
		<p>welcome.php</p>
	</body>
</html>