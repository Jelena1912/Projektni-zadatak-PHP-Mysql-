<?php

# Stop Hacking attempt
define('__APP__', TRUE);

# Start session
session_start();


unset($_POST);
unset($_SESSION['user']);

$_SESSION['user']['valid'] = 'false';
$_SESSION['message'] = '<p>Odjavili ste se. <br> Vidimo se!</p>';

header("Location: index.php?menu=7");
exit;