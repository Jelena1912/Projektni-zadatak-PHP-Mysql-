<?php 
	# Stop Hacking attempt
	define('__APP__', TRUE);
	
	# Start session
    session_start();
	
	# Database connection
	include 'dbconn.php';

    include 'head.php';
	
	# Variables MUST BE INTEGERS
    if(isset($_GET['menu'])) { $menu   = (int)$_GET['menu']; }
	if(isset($_GET['action'])) { $action   = (int)$_GET['action']; }
	
	# Variables MUST BE STRINGS A-Z
    if(!isset($_POST['_action_']))  { $_POST['_action_'] = FALSE;  }
	
	if (!isset($menu)) { $menu = 1; }
	
	# Classes & Functions
    include_once("funkcije.php");
	
print '
<!DOCTYPE html>
	<header>
		<div'; if ($menu > 1) { print ' class="zaglavlje" '; } else { print ' class="hero-zaglavlje"'; }  print '></div>
		<nav>';
			include 'menu.php';
		print '</nav>
	</header>
	<main>';
		if (isset($_SESSION['message'])) {
			print $_SESSION['message'];
			unset($_SESSION['message']);
		}
	
	# Homepage
	if (!isset($_GET['menu']) || $_GET['menu'] == 1) { include("home.php"); }
	
	# News
	else if ($_GET['menu'] == 2)  { include("vijesti.php"); }
	
	# Contact
	else if ($_GET['menu'] == 3) { include("kontakt.php"); }
	
	# About us
	else if ($_GET['menu'] == 4) { include("oNama.php"); }

	# About us
	else if ($_GET['menu'] == 5) { include("galerija.php"); }

	# Register
	else if ($_GET['menu'] == 6) { include("registracija.php"); }
	
	# Signin
	else if ($_GET['menu'] == 7) { include("signin.php"); }
	
	# Admin webpage
	else if ($_GET['menu'] == 8) { include("admin.php"); }

     include 'footer.php';
?>