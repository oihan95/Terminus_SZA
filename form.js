function balidatu(){
	var erregistro=document.getElementById("erregistro");
	var titulua = erregistro.titulua.value;
	if (titulua == null || titulua == "") {
		alert("Titulua ezin da hutsik egon");
		return false;
	}
	var artista = erregistro.artista.value;
	if (artista == null || artista == "") {
		alert("Artista ezin da hutsik egon");
		return false;
	}
	var albuma = erregistro.albuma.value;
	if (albuma == null || albuma == "") {
		alert("Albuma ezin da hutsik egon");
		return false;
	}

	var urtea = erregistro.urtea.value;
	if (urtea == null || urtea == "") {
		alert("Urtea ezin da hutsik egon");
		return false;
		var oraingourtea = (new Date).getFullYear();
		if (urtea > oraingourtea || urtea < 1950) {
			alert("Urtea gaizki jarrita dago");
			return false;
		}
	}

	var diskografika = erregistro.diskografika.value;
	if (diskografika == null || diskografika == "") {
		alert("Diskografika ezin da hutsik egon");
		return false;
	}
	var igoirudi = erregistro.igoirudi.value;
	if (igoirudi == null || igoirudi == "") {
		alert("Irudia ezin da hutsik egon");
		return false;
	}

}

var irudiaikusi = function(event) {
	var reader = new FileReader();
	reader.onload = function(){
		var irudia = document.getElementById('irudia');
		irudia.src = reader.result;
	};
	reader.readAsDataURL(event.target.files[0]);
};