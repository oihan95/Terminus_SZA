<?php
?>
<!DOCTYPE html>
<html>
	<head>
    	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title>Terminus - Kantak</title>
    	<link rel='stylesheet' type='text/css' href='styles/style.css' />
    	<link rel="stylesheet" type="text/css" href="styles/table.css">
    	<script type="text/javascript" src="track.js"></script>
  	</head>
  	<body>
	  	<div class = "header">
			<div id="logo">Terminus</div>
				<div class="navbar">
					<a href="index.html">Hasiera</a>
					<a href="tracks.php">Kantak</a>
					<a href="addtrack.html">Gehitu kanta</a>
					<a href="search.html">Bilatu</a>
					<a href="credits.html">Guri buruz</a>
				</div>
		</div>
		<div class="wrapper">
			<h1>Kantak</h1>
			<br>
			<?php
			$FILE='tracks.xml';

			if(!file_exists($FILE)){
				echo('<p>Bisita liburua hutsik dago.');
			} elseif (!($bl=simplexml_load_file($FILE))) {
				echo('<p>Errore bat gertatu datu bisita liburua irakurtzean. Barkatu eragozpenak</p>');
			} else {
				echo('<div class="table">');
				echo('<div class="header-row row">');
				echo('<span class="cell"></span>');
				echo('<span class="cell">Titulua</span>');
				echo('<span class="cell">Artista</span>');
				echo('<span class="cell">Album</span>');
				echo('<span class="cell">Generoa</span>');
				echo('<span class="cell">Urtea</span>');
				echo('<span class="cell">Diskografika</span>');
				echo('</div>');
				foreach($bl->kanta as $kanta) {
					echo('<div class="row">');
				    echo('<span class="cell">'."<img src=".$kanta->irudia." width="."150".">".'</span>');
				    echo('<span class="cell">'.'<a class="esteka black" href="spetrack.php?gakoa='.$kanta['id'].'">'.$kanta->titulua.'</a>'.'</span>');
				    echo('<span class="cell">'.$kanta->artista.'</span>');
				    echo('<span class="cell">'.$kanta->album.'</span>');
	    			echo('<span class="cell">'.$kanta->generoa.'</span>');
	    			echo('<span class="cell">'.$kanta->urtea.'</span>');
	    			echo('<span class="cell">'.$kanta->diskografika.'</span>');
	    			echo('</div>');
				}
				echo('</div>');
			}
			?>
		</div>
	</body>
</html>