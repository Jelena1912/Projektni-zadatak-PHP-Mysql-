<!DOCTYPE html>
<html>
<?php
include 'head.php';
	?>

			<title>Kontakt</title>
</html>
<body>
	<header>
		<div class="hero-zaglavlje" style="height: 200px;"></div>
		<nav>
			<ul>
			  <li><a href="index.html">Naslovna</a></li>
			  <li><a href="vijesti.html">Vijesti</a></li>
			  <li><a href="kontakt.html">Kontakt</a></li>
			  <li><a href="oNama.html">O nama</a></li>
                <li><a href="galerija.html">Galerija</a></li>
			</ul>
		</nav>
	</header>
	<main>
		<h1>Kontakt forma</h1>
		<div id="contact">
            <div class="mapouter"><div class="gmap_canvas"><iframe width="900" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=He%C4%8Dimovi%C4%8Deva%20ulica%2010,%20Zagreb&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-org.net">123movies</a><br><style>.mapouter{position:relative;text-align:right;height:400px;width:900px;}</style><a href="https://www.embedgooglemap.net"></a><style>.gmap_canvas {overflow:hidden;background:none!important;height:400px;width:900px;}</style></div></div>
			<?php
				print '<p style="text-align:center; padding: 10px; background-color: #d7d6d6;border-radius: 5px;">We recieved your question. We will answer within 24 hours.</p>';
				$EmailHeaders  = "MIME-Version: 1.0\r\n";
				$EmailHeaders .= "Content-type: text/html; charset=utf-8\r\n";
				$EmailHeaders .= "From: <jberkovic@tvz.hr>\r\n";
				$EmailHeaders .= "Reply-To:<jberkovic93@gmail.com>\r\n";
				$EmailHeaders .= "X-Mailer: PHP/".phpversion();
				$EmailSubject = 'Kontakt';
				$EmailBody  = '
				<html>
				<head>
				   <title>'.$EmailSubject.'</title>
				   <style>
					body {
					  background-color: #ffffff;
						font-family: Arial, Helvetica, sans-serif;
						font-size: 16px;
						padding: 0px;
						margin: 0px auto;
						width: 500px;
						color: #000000;
					}
					p {
						font-size: 14px;
					}
					a {
						color: #00bad6;
						text-decoration: underline;
						font-size: 14px;
					}
					
				   </style>
				   </head>
				<body>
					<p>First name: ' . $_POST['firstname'] . '</p>
					<p>Last name: ' . $_POST['lastname'] . '</p>
					<p>E-mail: <a href="mailto:' . $_POST['email'] . '">' . $_POST['email'] . '</a></p>
					<p>Country: ' . $_POST['country'] . '</p>
					<p>Subject: ' . $_POST['subject'] . '</p>
				</body>
				</html>';
				print '<p>First name: ' . $_POST['firstname'] . '</p>
				<p>Last name: ' . $_POST['lastname'] . '</p>
				<p>E-mail: ' . $_POST['email'] . '</p>
				<p>Country: ' . $_POST['country'] . '</p>
				<p>Subject: ' . $_POST['subject'] . '</p>';
				mail($_POST['email'], $EmailSubject, $EmailBody, $EmailHeaders);

            include 'footer.php';
            ?>
		</div>
	</main>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-98455037-1', 'auto');
	  ga('send', 'pageview');

	</script>

</body>
</html>