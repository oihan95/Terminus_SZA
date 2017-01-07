<?php
$xmlDoc=new DOMDocument();
$xmlDoc->load("tracks.xml");
$x=$xmlDoc->getElementsByTagName('kanta');
$q=$_GET["q"];

if (strlen($q)>0) {
  $hint="";
  for($i=0; $i<($x->length); $i++) {
    $y=$x->item($i)->getElementsByTagName('titulua');
    $z=$x->item($i)->getAttribute('id');
    if ($y->item(0)->nodeType==1) { //nodoa element node bat bada
      if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q)) { //substring bat eitten da
        $t = $y->item(0)->childNodes->item(0)->nodeValue;
        if ($hint=="") {
          $hint='<a class="esteka" href=spetrack.php?gakoa='.$z.">".$t."</a>";
        }else{
          $hint=$hint.'<br> <a class="esteka" href=spetrack.php?gakoa='.$z.">".$t."</a>";
        }
      }
    }
  }
}

if ($hint=="") {
  $response="Ez dago abestirik";
} else {
  $response=$hint;
}

echo $response;
?>