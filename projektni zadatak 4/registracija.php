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