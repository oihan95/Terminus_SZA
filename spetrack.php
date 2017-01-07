<?php
?>
<!DOCTYPE html>
<html>
	<head>
    	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title>Terminus - Kanta</title>
    	<link rel='stylesheet' type='text/css' href='styles/style.css' />
    	<link rel="stylesheet" type="text/css" href="styles/shapes.css">
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
			<div class="box">
				<?php
					session_start();

					if(isset($_GET['gakoa'])){
						$_SESSION['link']=$_GET['gakoa'];
						$gakoa = $_GET['gakoa'];

						$FILE='tracks.xml';

						if(!file_exists($FILE)){
							echo('<p>Kanta lista hutsik dago.');
						} elseif (!($bl=simplexml_load_file($FILE))) {
							echo('<p>Errore bat gertatu datu kanta lista irakurtzean. Barkatu eragozpenak</p>');
						} else {
							foreach($bl->kanta as $kanta) {
								if (strcmp($gakoa, $kanta['id']) == 0) {
									echo('<br>');
									echo('<img src="'.$kanta->irudia.'" width="350">');
									echo('<br>');
									echo('<br>');
									echo('<p>Titulua:'.$kanta->titulua.'</p>');
									echo('<p>Artista:'.$kanta->artista.'</p>');
									echo('<p>Album:'.$kanta->album.'</p>');
									echo('<p>Generoa:'.$kanta->generoa.'</p>');
									echo('<p>Urtea:'.$kanta->urtea.'</p>');
									echo('<p>Diskografika:'.$kanta->diskografika.'</p>');
									echo('<br>');
								}
							}
						}
					}
				?>
			</div>
		</div>
	</body>
</html>