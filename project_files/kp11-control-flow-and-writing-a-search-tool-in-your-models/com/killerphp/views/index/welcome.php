<html>
	<head>
	</head>
	<body>
		<h1>Welcome to my KillerPHP application!</h1>

		<?php if ($this->usersExist): ?>
			<h3><?= $this->usercount; ?></h3>
		<?php else: ?>
			<p>uh oh, we don't know who you are! please <a href="/">register</a>
		
		<?php endif; ?>
		<p>welcome.php</p>
	</body>
</html>