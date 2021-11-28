<?php
include ('dbconn.php');
	print '
	<ul>
		<li><a href="index.php?menu=1">Naslovnica</a></li>
		<li><a href="index.php?menu=2">Vijesti</a></li>
		<li><a href="index.php?menu=3">Kontakt</a></li>
		<li><a href="index.php?menu=4">O nama</a></li>
	    <li><a href="index.php?menu=5">Galerija</a></li>';
if (!isset($_SESSION['user']['valid']) || $_SESSION['user']['valid'] == 'false') {
    print '
            <li><a href="index.php?menu=6">Registracija</a></li>
			<li><a href="index.php?menu=7">Prijava</a></li>';
}
else if ($_SESSION['user']['valid'] == 'true') {
    if ($_SESSION['user']['id'] == 1) {
        print '
    <li><a href="index.php?menu=8">Admin</a></li>';
    }
    else if ($_SESSION['user']['id'] == '8') {
        print '
    <li><a href="index.php?menu=9">Editor</a></li>';
    }
    else if ($_SESSION['user']['id'] >= '9') {
        print '
    <li><a href="index.php?menu=10">Dodaj vijesti</a></li>';
    }
    print'
			<li><a href="signout.php">Odjava</a></li>';
}
print '
	</ul>';
?>
