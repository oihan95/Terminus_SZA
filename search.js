function showResult(str) {
  if (str.length==0) {
    document.getElementById("emaitzak").innerHTML="";
    document.getElementById("emaitzak").style.border="0px";
    return;
  }

  xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("emaitzak").innerHTML=this.responseText;
      document.getElementById("emaitzak").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}