<?php
	print'
		<h1>Kontakt</h1>
		<div id="contact">
			<iframe src="https://www.google.ru/maps/place/He%C4%87imovi%C4%87eva+ul.,+10110,+Zagreb/@45.7912043,15.9384265,17z/data=!4m5!3m4!1s0x4765d6bcad6548df:0xd0b14719fb3a7410!8m2!3d45.7910884!4d15.9396281" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
			<form action="http://work2.eburza.hr/pwa/responzive-page/send-contact.php" id="contact_form" name="contact_form" method="POST">
				<label for="fname">Ime</label>
				<input type="text" id="fname" name="firstname" placeholder="Tvoje ime.." required>

				<label for="lname">Prezime</label>
				<input type="text" id="lname" name="lastname" placeholder="Tvoje prezime.." required>
				
				<label for="lname">E-mail</label>
				<input type="email" id="email" name="email" placeholder="Tvoj e-mail.." required>

				<div class="spol">
				<label for="gender">Spol</label>
				<div>
					<input type="radio" id="male" name="gender" value="Male">
					<label for="male">muško</label>
				</div>
				<div>
					<input type="radio" id="female" name="gender" value="Male">
					<label for="female">žensko</label>
				</div>
			</div>
			<br>

				<label for="country">Zemlja</label>
				<select id="country" name="country">
				  <option value="">Molim odaberite</option>
				  <option value="BE">BiH</option>
				  <option value="HR" selected>Hrvatska</option>
				  <option value="LU">Slovenija</option>
				  <option value="HU">Srbija</option>
				</select>

				<label for="subject">Komentar</label>
				<textarea id="subject" name="subject" placeholder="Napiši nešto.." style="height:100px"></textarea>

				<input type="submit" value="Pošalji">
			</form>
		</div>';
	?>
	