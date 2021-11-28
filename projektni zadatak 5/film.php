<?php
print '
<!DOCTYPE html>
<html lang="en">
<head>
	  <title>Pretraži IMDB</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="style.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  <style>
		p {margin: 0.5em}
	  </style>
	</head>
	<body>
		<div class="container">';

if (!isset($_POST['action']) || $_POST['action'] == '') { $_POST['action'] = FALSE; }

if ($_POST['action'] == FALSE) {
    print '
<center>
			  <h1 style="text-align:center;">Pretraži IMDB </h1>
			  
			  <form class="form-horizontal" action="" name="imdbsearch" method="POST">
				<div class="form-group">
				  <label class="control-label col-sm-2" for="title">Naslov:</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" id="title" placeholder="Naslov filma..." name="title" required>
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="year">Godina:</label>
				  <div class="col-sm-10">          
					<input type="number" class="form-control" id="year" placeholder="Godina filma..." name="year" pattern="[0-9]{4}">
				  </div>
				</div>
				<input type="hidden" name="action" value="TRUE">
				<div class="form-group">        
				  <div class="col-sm-offset-2 col-sm-10">
				  <br>
					<button type="submit" class="btn btn-default">Pošalji</button>
					<br>
				  </div>
				</div>
			  </form>
			  </center>';
}
else if ($_POST['action'] == TRUE) {
    print '
			<center>
			<h1>Rezultat pretrage</h1>';
    $key = 'be5ea402';
    if ($_POST['year'] != '') { $url = 'http://www.omdbapi.com/?apikey='.$key.'&t=' . urlencode($_POST['title']) . '&y=' . urlencode($_POST['year']); }
    else { $url = 'http://www.omdbapi.com/?apikey='.$key.'&t=' . urlencode($_POST['title']); }
    $json = file_get_contents($url);
    $_data = json_decode($json,true);

    if (isset($_data['Title']) && $_data['Title'] != '') {
        print '
				
				<div class=film style="float:left;width:20%">
					<div class="danas-govorimo-o"><p><strong>Naslov:</strong> ' . $_data['Title'] . '</p>
					<p><strong>Godina:</strong> ' . $_data['Year'] . '</p>
					<p><strong>Ocjena:</strong> ' . $_data['Rated'] . '</p>
					<p><strong>Izdano:</strong> ' . $_data['Released'] . '</p>
					<p><strong>Vrijeme trajanja:</strong> ' . $_data['Runtime'] . '</p>
					<p><strong>Žanr:</strong> ' . $_data['Genre'] . '</p>
					<p><strong>Direktor:</strong> ' . $_data['Director'] . '</p>
					<p><strong>Pisac:</strong> ' . $_data['Writer'] . '</p>
					<p><strong>Glumci:</strong> ' . $_data['Actors'] . '</p>
					<p><strong>O filmu:</strong> ' . $_data['Plot'] . '</p>
					<p><strong>Jezik:</strong> ' . $_data['Language'] . '</p>
					<p><strong>Država:</strong> ' . $_data['Country'] . '</p>
					<p><strong>Nagrade:</strong> ' . $_data['Awards'] . '</p>
					<p><strong>Ocjene:</strong> ' . $_data['Ratings'][0]['Source'] . ': ' . $_data['Ratings'][0]['Value'] . '</p>
					<p><strong>imdb ocjena:</strong> ' . $_data['imdbRating'] . '</p>
					<p><strong>Produkcija:</strong> ' . $_data['Production'] . '</p>
					<p><strong>Web stranica:</strong> <a href="' . $_data['Website'] . '">' . $_data['Website'] . '</a></p></div>
					<div class="sutra-govorimo-o"><img src="' . $_data['Poster'] . '" alt="' . $_data['Title'] . '" style="border:1px solid grey; padding: 2px; margin:0 10px 10px 0; float:left;">
				</div>
				</div>
				</center>';
    }
    else {
        echo '<p>Nešto je pošlo po zlu, moguće da ste naziv filma krivo upisali.Prvo slovo filma vam treba biti veliko.</p>';
    }
    echo '<p><a href="index.php?menu=11">Natrag</a></p>';
}
print '
		</div>
	</body>
</html>';
?>