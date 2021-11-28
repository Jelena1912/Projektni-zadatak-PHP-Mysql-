<?php
	print'
		<center>
		<h1>Kontakt</h1>
		<div class="mapouter"><div class="gmap_canvas"><iframe width="900" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=He%C4%8Dimovi%C4%8Deva%20ulica%2010,%20Zagreb&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-org.net">123movies</a><br><style>.mapouter{position:relative;text-align:right;height:400px;width:900px;}</style><a href="https://www.embedgooglemap.net"></a><style>.gmap_canvas {overflow:hidden;background:none!important;height:400px;width:900px;}</style></div></div>
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
		</div>
		</center>';
	?>
	