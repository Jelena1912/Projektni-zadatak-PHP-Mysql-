<?php
include ("dbconn.php");
	print '
    <center>
	<h1>Registracija</h1>
	<div id="register">';

	if ($_POST['_action_'] == FALSE) {
		print '
        <p>Ispuni navedena polja!</p>
		 <form action="registracija.php" id="registration_form" name="registration_form" method="POST" >
			<input type="hidden" id="_action_" name="_action_" value="TRUE">
			
			<label for="firstname">Ime *</label>
			<input type="text" id="firstname" name="firstname" placeholder="Vaše ime.." required> 
			<label for="lastname">Prezime *</label>
			<input type="text" id="lastname" name="lastname" placeholder="Vaše prezime.." required> 
				
			<label for="email">E-mail *</label>
			<input type="email" id="email" name="email" placeholder="Vaš e-mail.." required>
			
			<label for="username">Korisničko ime:* <small>(Korisničko ime mora imati između 5 i 10 elemenata)</small></label>
			<input type="text" id="username" name="username" pattern=".{5,10}" placeholder="Korisničko ime.." required><br>
			
			
			<label for="gender">Spol</label><br>
			        <label for="male">muško</label>
					<input type="radio" id="muško" name="gender" value="muško">
					<label for="female">žensko</label>
					<input type="radio" id="žensko" name="gender" value="žensko">
							
			<br><label for="password">Lozinka:* <small>(Lozinka mora imati barem 4 elementa)</small></label>
			<input type="password" id="password" name="password" placeholder="Lozinka.." pattern=".{4,}" required>
			<label for="country">Zemlja:</label>
			<select name="country" id="country">
				<option value="">molimo odaberite</option>';
				#Select all countries from database webprog, table countries
				$query  = "SELECT * FROM countries";
				$result = @mysqli_query($conn , $query);
				while($row = @mysqli_fetch_array($result)) {
					print '<option value="' . $row['country_code'] . '">' . $row['country_name'] . '</option>';
				}
			print '
			</select>
			<input type="submit" value="Pošalji">
		</form>
		</center>';
	}
	else if ($_POST['_action_'] == TRUE) {
		
		$query  = "SELECT * FROM users";
		$query .= " WHERE email='" .  $_POST['email'] . "'";
        $result = @mysqli_query($conn, $query);
		$row = @mysqli_fetch_array($result, MYSQLI_ASSOC);

        if ($row['email'] == '' ) {

            $pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 12]);

            $query  = "INSERT INTO users (firstname, lastname, email, username, password, country, gender)";
			$query .= "VALUES ('" . $_POST['firstname'] . "', '" . $_POST['lastname'] . "', '" . $_POST['email'] . "', '" . $_POST['username'] . "', '" . $pass_hash . "', '" . $_POST['country'] . "', '" . $_POST['gender'] . "')";
			$result = @mysqli_query($conn, $query);

            print '
<head>
   <link rel="stylesheet" href="style.css">
   <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="description" content="some description">
    <meta name="keywords" content="keyword 1, keyword 2, keyword 3, keyword 4, ...">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
     <meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="Jelena Berković">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
		
	<meta name="author" content="jberkovic@tvz.hr">
<!-- favicon meta -->
<link rel="icon" href="slikica.png" type="image/x-icon"/>
<link rel="shortcut icon" href="slikica.png" type="image/x-icon"/>
<!-- end favicon meta -->
<!-- end meta elements -->
</head>
	<ul>
		<li><a href="index.php?menu=1">Naslovnica</a></li>
		<li><a href="index.php?menu=2">Vijesti</a></li>
		<li><a href="index.php?menu=3">Kontakt</a></li>
		<li><a href="index.php?menu=4">O nama</a></li>
	    <li><a href="index.php?menu=5">Galerija</a></li>
       <li><a href="index.php?menu=7">Prijava</a></li>
                </ul>';

			echo '<p>' . ucfirst(strtolower($_POST['firstname'])) . ' ' .  ucfirst(strtolower($_POST['lastname'])) . ', hvala na registraciji! </p>
			<hr>';

		}

		else {
			echo '<p>Korisnik s ovim e-mailom već postoji!</p>';
		}
	}

	print '
	</div>';
?>