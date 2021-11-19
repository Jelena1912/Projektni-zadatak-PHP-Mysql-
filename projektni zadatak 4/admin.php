<?php 
	if ($_SESSION['user']['valid'] == 'true') {
		if (!isset($action)) { $action = 1; }
		print '
		<h1>Administration</h1>
		<div id="admin">
			<ul>
				<li><a href="index.php?menu=8&amp;action=1">Korisnici</a></li>
				<li><a href="index.php?menu=8&amp;action=2">Vijesti</a></li>
			</ul>';
			# Admin Users
			if ($action == 1) { include("admin/users.php"); }
			
			# Admin News
			else if ($action == 2) { include("admin/vijesti.php"); }
		print '
		</div>';
	}
	else {
		$_SESSION['message'] = '<p>Molimo registrirajte se!</p>';
		header("Location: index.php?menu=7");
	}
?>