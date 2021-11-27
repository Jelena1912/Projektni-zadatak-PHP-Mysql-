<?php
	if ($_SESSION['user']=='true' && $_SESSION['valid'] == 2) {
		if (!isset($action)) { $action = 2; }
		print '

<link rel="stylesheet" href="style.css">
		<h1>Editor</h1>
		<div id="admin">
			<ul>
				<li><a href="index.php?menu=8&amp;action=1">Vijesti</a></li>
				<li><a href="index.php?menu=8&amp;action=2">Odjava</a></li>
			</ul>';

			if ($action == 1) { include("editor/news.php"); }

			else if ($action == 2) { include("editor/singout.php"); }

            		print '
		</div>';
	}
	else {
		$_SESSION['message'] = '<p>Molimo registrirajte se!</p>';
		header("Location: index.php?menu=6");
	}
?>