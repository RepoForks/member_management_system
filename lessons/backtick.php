<html>
	<head>
		<title>backtick</title>
	</head>
	<body>
		<pre>
			<?php
			$ls = `/bin/ls -l /etc`;
			print $ls;
			?>
		</pre>
	</body>
</html>