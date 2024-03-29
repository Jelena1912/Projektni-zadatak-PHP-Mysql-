<?php 
    include ("dbconn.php");

    # Update user profile
    if (isset($_POST['edit']) && $_POST['_action_'] == 'TRUE') {
        $query  = "UPDATE users SET firstname='" . $_POST['firstname'] . "', lastname='" . $_POST['lastname'] . "', email='" . $_POST['email'] . "', username='" . $_POST['username'] . "', country='" . $_POST['country'] . "', archive='" . $_POST['archive'] . "'";
        $query .= " WHERE id=" . (int)$_POST['edit'];
        $query .= " LIMIT 1";
        $result = @mysqli_query($conn, $query);
        # Close MySQL connection
        @mysqli_close($conn);
        
        $_SESSION['message'] = '<p>Uspješno ste promijenili profil!</p>';
        
        # Redirect
        header("Location: index.php?menu=8&action=1");
    }
    # End update user profile
    
    # Delete user profile
    if (isset($_GET['delete']) && $_GET['delete'] != '') {
    
        $query  = "DELETE FROM users";
        $query .= " WHERE id=".(int)$_GET['delete'];
        $query .= " LIMIT 1";
        $result = @mysqli_query($conn, $query);

        $_SESSION['message'] = '<p>Uspješno ste izbrisali profil</p>';
        
        # Redirect
        header("Location: index.php?menu=8&action=1");
    }
    # End delete user profile


    #Show user info
    if (isset($_GET['id']) && $_GET['id'] != '') {
        $query  = "SELECT * FROM users";
        $query .= " WHERE id=".$_GET['id'];
        $result = @mysqli_query($conn, $query);
        $row = @mysqli_fetch_array($result);
        print '
        <h2>Korisnički profil</h2>
        <p><b>Ime:</b> ' . $row['firstname'] . '</p>
        <p><b>Prezime:</b> ' . $row['lastname'] . '</p>
        <p><b>Korisničko ime:</b> ' . $row['username'] . '</p>';
        $_query  = "SELECT * FROM countries";
        $_query .= " WHERE country_code='" . $row['country'] . "'";
        $_result = @mysqli_query($conn, $_query);
        $_row = @mysqli_fetch_array($_result);
        print '
        <p><b>Country:</b> ' .$_row['country_name'] . '</p>
        <p><b>Date:</b> ' . pickerDateToMysql($row['date']) . '</p>
        <p><a href="index.php?menu='.$menu.'&amp;action='.$action.'">Natrag</a></p>';
    }
    #Edit user profile
    else if (isset($_GET['edit']) && $_GET['edit'] != '') {
        if ($_SESSION['user']['id'] == 1 || $_SESSION['user']['id'] == 1) {
            $query  = "SELECT * FROM users";
            $query .= " WHERE id=".$_GET['edit'];
            $result = @mysqli_query($conn, $query);
            $row = @mysqli_fetch_array($result);
            $checked_archive = false;
            
            print '
            <h2>Uredi korisnički profil</h2>
            <form action="" id="registration_form" name="registration_form" method="POST">
                <input type="hidden" id="_action_" name="_action_" value="TRUE">
                <input type="hidden" id="edit" name="edit" value="' . $_GET['edit'] . '">
                
                <label for="fname">Ime *</label>
                <input type="text" id="fname" name="firstname" value="' . $row['firstname'] . '" placeholder="Tvoje ime.." required>
                <label for="lname">Prezime *</label>
                <input type="text" id="lname" name="lastname" value="' . $row['lastname'] . '" placeholder="Tvoje prezime.." required>
                    
                <label for="email">Vaš e-mail *</label>
                <input type="email" id="email" name="email"  value="' . $row['email'] . '" placeholder="Tvoj e-mail.." required>
                
                <label for="username">Korisničko ime *<small>(Username must have min 5 and max 10 char)</small></label>
                <input type="text" id="username" name="username" value="' . $row['username'] . '" pattern=".{5,10}" placeholder="Username.." required><br>
                
                <label for="country">Država</label>
                <select name="country" id="country">
                    <option value="">Molim odaberite</option>';
                    #Select all countries from database webprog, table countries
                    $_query  = "SELECT * FROM countries";
                    $_result = @mysqli_query($conn, $_query);
                    while($_row = @mysqli_fetch_array($_result)) {
                        print '<option value="' . $_row['country_code'] . '"';
                        if ($row['country'] == $_row['country_code']) { print ' selected'; }
                        print '>' . $_row['country_name'] . '</option>';
                    }
                print '
                </select>
                
                <label for="archive">Spol:</label><br />
                <input type="radio" name="gender" value="muško"'; if($row['archive'] == 'muško') { echo ' checked="checked"'; $checked_archive = true; } echo ' /> YES &nbsp;&nbsp;
                <input type="radio" name="gender" value="žensko"'; if($checked_archive == false) { echo ' checked="checked"'; } echo ' /> NO
                
                <hr>
                
                <input type="submit" value="Submit">
            </form>
            <p><a href="index.php?menu='.$menu.'&amp;action='.$action.'">Natrag</a></p>';
        }
        else {
            print '<p>Zabranjeno</p>';
        }
    }
    else {
        print '
        <h2>Popis korisnika</h2>
        <div id="users">
            <table>
                <thead>
                    <tr>
                        <th width="16"></th>
                        <th width="16"></th>
                        <th width="16"></th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>E mail</th>
                        <th>Država</th>
                        <th width="16"></th>
                    </tr>
                </thead>
                <tbody>';
        $query  = "SELECT * FROM users";
        $result = @mysqli_query($conn, $query);
        while($row = @mysqli_fetch_array($result)) {
            print '
					<tr>
						<td><a href="index.php?menu='.$menu.'&amp;action='.$action.'&amp;id=' .$row['id']. '"><img src="img/user.png" alt="user"></a></td>
						<td><a href="index.php?menu='.$menu.'&amp;action='.$action.'&amp;edit=' .$row['id']. '"><img src="img/edit.png" alt="uredi"></a></td>
						<td><a href="index.php?menu='.$menu.'&amp;action='.$action.'&amp;delete=' .$row['id']. '"><img src="img/delete.png" alt="obriši"></a></td>
						<td><strong>' . $row['firstname'] . '</strong></td>
						<td><strong>' . $row['lastname'] . '</strong></td>
						<td>' . $row['email'] . '</td>
						<td>';
            $_query  = "SELECT * FROM countries";
            $_query .= " WHERE country_code='" . $row['country'] . "'";
            $_result = @mysqli_query($conn, $_query);
            $_row = @mysqli_fetch_array($_result, MYSQLI_ASSOC);
            print $_row['country_name'] . '
						</td>
						<td>';
            if ($row['gender'] == 'muško') { print '<img src="img/inactive.png" alt="" title="" />'; }
            else if ($row['gender'] == 'žensko') { print '<img src="img/active.png" alt="" title="" />'; }
            print '
						</td>
					</tr>';
        }
        print '
				</tbody>
			</table>
		</div>';
    }

# Close MySQL connection
@mysqli_close($conn);
?>