
<?php
#Datebase connection
include("dbconn.php");
print '
<!DOCTYPE html>
<html>
	<head>
		
		<!-- CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- End CSS -->
    <!-- meta elements -->
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="description" content="some description">
    <meta name="keywords" content="keyword 1, keyword 2, keyword 3, keyword 4, ...">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <title> Geodezija </title>
	</head>
<body>
	<header>
		<div'; if ($_GET['menu'] > 1) { print ' class="hero-subimage"'; } else { print ' class="hero-image"'; }  print '></div>
		<nav>';
		include("menu.php");
		print'</nav>
	</header>
	<main>';

# Homepage
if (!isset($_GET['menu']) || $_GET['menu'] == 1) { include("naslovnica.php"); }

# News
else if ($_GET['menu'] == 2) { include("vijesti.php"); }

# Contact
else if ($_GET['menu'] == 3) { include("kontakt.php"); }

# About us
else if ($_GET['menu'] == 4) { include("o-nama.php"); }

print '
	</main>
	<footer>
		<p>Copyright &copy; ' . date("Y") . ' Jelena Berković. <a href="https://github.com/Jelena1912?tab=repositories"><img src="img/GitHub-Mark-Light-32px.png" title="Github" alt="Github"></a></p>
	</footer>
</body>
</html>';
?>