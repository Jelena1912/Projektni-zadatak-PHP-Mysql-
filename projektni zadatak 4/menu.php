<?php
include ('dbconn.php');
	print '
	<ul>
		<li><a href="index.php?menu=1">Naslovnica</a></li>
		<li><a href="index.php?menu=2">Vijesti</a></li>
		<li><a href="index.php?menu=3">Kontakt</a></li>
		<li><a href="index.php?menu=4">O nama</a></li>
	    <li><a href="index.php?menu=5">Galerija</a></li>';
		if (!isset($_SESSION['users']['valid']) || $_SESSION['users']['valid'] == 'false') {
			print '
			<li><a href="index.php?menu=6">Registracija</a></li>
			<li><a href="index.php?menu=7">Prijava</a></li>';
		}
		else if ($_SESSION['users']='true' && $_SESSION['valid'] == 1) {
			print '
			<li><a href="index.php?menu=8">Admin</a></li>
			<li><a href="index.php?menu=9">Odjava</a></li>';
		}
        else if ($_SESSION['users']='true' && $_SESSION['valid'] == 2) {
            print '
			<li><a href="index.php?menu=10">Editor</a></li>
			<li><a href="index.php?menu=9">Odjava</a></li>';
        }
		print '
	</ul>';
?>