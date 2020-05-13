<html>
    
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="..7vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
<!--===============================================================================================-->
<script type="/text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
<script type="text/javascript"></script>
<style type="text/css">
 

<!--
body {
	margin-left: 0px;
	margin-top: 0px;

}
-->
</style>
	
  <tr>
    <td width="90%" valign="top">
<!--You can modify the text, color, size, number of loops and more on the flash header by editing the text file (fence.txt) included in the zip file.-->
<div align="left">
</div></td>
    <td width="10%">
         <a href="https://time.is/Hermosillo" id="time_is_link" rel="nofollow" style="font-size:36px">Hora local en Hermosillo:</a>
<span id="Hermosillo_z13d" style="font-size:36px"></span>
<script src="//widget.time.is/t.js"></script>
<script>
time_is_widget.init({Hermosillo_z13d:{}});
</script>
     <img border="0" src="../image/escudo-med-lema.gif" width="150" height="100" align="right"></td>
  </tr>
  
</table>
<table border="0" width="100%" cellspacing="0" cellpadding="0" bgcolor="#000000" background="../image/escudo-med-lema.gif">
  
</table>
  <table width="100%">
  <tr>
    <td aling=right>
	<?php
	

	if(isset($_SESSION['alogin']))
	{
	 echo "<div align=\"right\"><strong><a href=\"login.php\">Admin Home</a>|<a href=\"signout.php\">Desconectar</a></strong></div>";
	 }
	 else
	 {
	 	echo "&nbsp;";
	 }
	?>
	</td>
  </tr>
</table>
