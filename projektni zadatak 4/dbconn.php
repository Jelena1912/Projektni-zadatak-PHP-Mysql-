<?php

# Stop Hacking attempt
if (!defined('__APP__')) {
    die("Hacking attempt");
}

# Connect to MySQL database

$conn = mysqli_connect("localhost", "root", "", "webprog");
if (!$conn) {
    die("Greška povezivanja s MySQL serverom." . mysqli_connect_error());
}

?>