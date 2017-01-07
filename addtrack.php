<?php
	$FILE='tracks.xml';

	$titulua = trim($_POST["title"]);
	$artista = trim($_POST["artist"]);
	$albuma = trim($_POST["album"]);
	$generoa = trim($_POST["genre"]);
	$urtea = trim($_POST["year"]);
	$diskografika = trim($_POST["label"]);

	$irudiz = str_replace(' ', '', $_FILES['irudia_ona']['name']);

	$dir_image = '/Applications/XAMPP/xamppfiles/htdocs/SZA_Praktika/img/covers/';
	move_uploaded_file($_FILES['irudia_ona']['tmp_name'],$dir_image.$irudiz);

	if(!file_exists($FILE)){
		$bl=new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><bisitak azkenid="0"></bisitak>');
	}else{
		$bl=simplexml_load_file($FILE);

		$id = $bl['azkenid'] + 1;

		$berria=$bl->addChild("kanta");
		$berria['id']=$id;
		$berria->addChild('titulua', $titulua);
		$berria->addChild('artista', $artista);
		$berria->addChild('album', $albuma);
		$berria->addChild('generoa', $generoa);
		$berria->addChild('urtea', $urtea);
		$berria->addChild('diskografika', $diskografika);
		$berria->addChild('irudia', 'img/covers/'.$irudiz);
		$bl['azkenid']=$id;

		$errorea = $bl->asXML($FILE);

		$bl->saveXML();
	}
?>

<!DOCTYPE html>
<html>
	<head>
    	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    	<?php
    	if(strcmp ($errorea , 'true') == 0)
    		echo '<title>Eskerrik asko zure iruzkina uzteagatik</title>';
    	else
    		echo '<title>Errorea iruzkin berria jasotzean</title>';
    	?>
    	<link rel='stylesheet' type='text/css' href='styles/style.css' />
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
		<?php
		if(strcmp ($errorea , 'true') == 0)
		{
			echo('<h3>Errore bat gertatu da kanta gehitzean.</h3>');
		}else{
			echo('<h3>Eskerrik asko kanta gehitzeagatik.</h3>');
		}
		?>
		</div>
	</body>
</html>