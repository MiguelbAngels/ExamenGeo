<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Online Quiz</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style9 {
	color: #000099;
	font-weight: bold;
}
.style10 {
	color: #330066;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
}
-->
</style>
<table border="0" width="100%" cellspacing="0" cellpadding="0" background="image/topbkg.jpg">
  <tr>
    <td width="90%" valign="top">
<!--You can modify the text, color, size, number of loops and more on the flash header by editing the text file (fence.txt) included in the zip file.-->
<div align="left"></div></td>
    <td width="10%">&nbsp;</td>
  </tr>
</table>
<table border="0" width="100%" cellspacing="0" cellpadding="0" bgcolor="#000000" background="img/blackbar.jpg">
  <tr>
    <td width="100%"><img border="0" src="image/blackbar.jpg" width="89" height="15"></td>
  </tr>
</table>
<table width="100%"  border="0">
  <tr>
    <td width="89%"><span class="style9">Examen en linea</span></td>
    <td width="11%">&nbsp;</td>
  </tr>

<?php

	extract($_GET);
	
include("database.php");
$contador = 0;
$query = "SELECT * FROM reactivos WHERE IDExamen = $subid";
$query2 = "SELECT * FROM examen WHERE IDExamen = $subid";

$sql = "SELECT * From inscripcion WHERE IDAlumno='$user' and IDExamen = '$subid'";
$result = mysqli_query($con,$sql);
$result2 = mysqli_query($con,$query2);
$contador2 = 0;


	while($mostrar=(mysqli_fetch_array($result))){
	
	
	
		
    $contador2 = $contador2 + 1;
	
	
	}
	
	if ($contador2 >= 1){
	    echo "ya realizo este examen, solo se puede realizar una vez.....";
	    exit;
	}
	date_default_timezone_set('America/Hermosillo');
	while($mostrar2=(mysqli_fetch_array($result2))){
	$date = date("H:i:s");
	$dateEx = $mostrar2['HInicio'];
	$dateEx2 = $mostrar2['HFinal'];

	if ($dateEx > $date || $dateEx2 < $date ){
	     echo "aun no inicia este examen.... </br>";
	     echo "Son las: $date </br>";
	     echo "El examen inicia a las: $dateEx </br>";
	    exit;
	}
	
	}
	



$preguntas=mysqli_query($con,$query) or die(mysqli_error());
	mysqli_data_seek($preguntas,0);
$Q_1= mysqli_fetch_row($preguntas);
	mysqli_data_seek($preguntas,1);
$Q_2= mysqli_fetch_row($preguntas);
	mysqli_data_seek($preguntas,2);
$Q_3= mysqli_fetch_row($preguntas);

	
	
$query = "SELECT * FROM incisos WHERE IDReactivo = $Q_1[0]";
$resp1=mysqli_query($con,$query) or die(mysqli_error());
	mysqli_data_seek($resp1,0);
$R1_1= mysqli_fetch_row($resp1);
	mysqli_data_seek($resp1,1);
$R1_2= mysqli_fetch_row($resp1);
	


$query = "SELECT * FROM incisos WHERE IDReactivo = $Q_2[0]";
$resp2=mysqli_query($con,$query) or die(mysqli_error());
	mysqli_data_seek($resp2,0);
$R2_1= mysqli_fetch_row($resp2);
	mysqli_data_seek($resp2,1);
$R2_2= mysqli_fetch_row($resp2);
	
	
	
$query = "SELECT * FROM incisos WHERE IDReactivo = $Q_3[0]";
$resp3=mysqli_query($con,$query) or die(mysqli_error());
	mysqli_data_seek($resp3,0);
$R3_1= mysqli_fetch_row($resp3);
	mysqli_data_seek($resp3,1);
$R3_2= mysqli_fetch_row($resp3);	

	$Respuesta1 = false;
	$Respuesta2 = false;
	$Respuesta3 = false;
	

if (isset($_POST['submit'])) {
	if(isset($_POST['ans1']) && isset($_POST['ans2']) && isset($_POST['ans3']))
	{
		if($_POST['ans1']==1){
		$_POST['ans1']=$R1_1[0];
	}else{
		$_POST['ans1']=$R1_2[0];
	}
	
	if($_POST['ans2']==1){
		$_POST['ans2']=$R2_1[0];
	}else{
		$_POST['ans2']=$R2_2[0];
	}
	
	if($_POST['ans3']==1){
		$_POST['ans3']=$R3_1[0];
	}else{
		$_POST['ans3']=$R3_2[0];
	}
		if($_POST['ans1']==$Q_1[2]){
			$Respuesta1=true;
			$contador = $contador + 1;
		}else{
			$Respuesta1=false;
		}
		
		if($_POST['ans2']==$Q_2[2]){
			$Respuesta2=true;
			$contador = $contador + 1;
		}else{
			$Respuesta2=false;
		}
		
		if($_POST['ans3']==$Q_3[2]){
			$Respuesta3=true;
			$contador = $contador + 1;
		}else{
			$Respuesta3=false;
		}
		
		echo "||".$_POST['ans1']."==$Q_1[2]||  ";
		echo "||".$_POST['ans2']."==$Q_2[2]||  ";
		echo "||".$_POST['ans3']."==$Q_3[2]||  ";
		$query="SELECT * FROM `respuestas` WHERE 1";
		$rss=mysqli_query($con,$query)or die("Could Not Perform the Query");
		$roww = mysqli_fetch_array($rss,MYSQLI_ASSOC);
		$idrespuestas = mysqli_num_rows($rss) + 1;
		
		$query="INSERT INTO respuestas(IDRes, nPreguntas, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`) VALUES('$idrespuestas',3,'$Respuesta1','$Respuesta2','$Respuesta3',0,0,0,0,0,0,0)";
		$rs=mysqli_query($con,$query)or die("Could Not Perform the Query");
		
		$query="SELECT * FROM `inscripcion` WHERE 1";
		$rsss=mysqli_query($con,$query)or die("Could Not Perform the Query");
		$rowww = mysqli_fetch_array($rsss,MYSQLI_ASSOC);
		$idreporte = mysqli_num_rows($rsss) + 1;
		
		$query = "SELECT AdminID FROM examen WHERE IDExamen = $subid";
		$admin=mysqli_query($con,$query) or die(mysqli_error());
		mysqli_data_seek($admin,0);
		$idadmin= mysqli_fetch_row($admin);
		$aux = getdate();
		$fecha = $aux[mday]."-".$aux[mon]."-".$aux[year];
		echo "Reporte: $idreporte \\";
		echo "Alumno: $user \\";
		echo "Examen: $testid  \\";
		echo "Maestro: $idadmin[0]  \\";
		echo "Fecha: $fecha  \\";
		echo "Respuestas: $idrespuestas  \\";
		echo "Primera : $Respuesta1\\";
		echo "Primera : $Respuesta2\\";
		echo "Primera : $Respuesta3\\";
		echo "Totales : $contador\\";
		$query="INSERT INTO inscripcion(IDInscripcion, IDAlumno, IDExamen, AdminID, Fecha, IDRespuestas,RespCorrectas) VALUES ('$idreporte','$user','$subid','$idadmin[0]','$fecha','$idrespuestas','$contador')";
		$rs=mysqli_query($con,$query)or die("Could Not Perform the Query");
		
		header("Location: result.php?id=$user&idex=$subid&idr=$idrespuestas");
		exit;
		
	}
}
$_POST['ans1']=NULL;
$_POST['ans2']=NULL;
$_POST['ans3']=NULL;
	


	

?>	

</table>
<table width="304"  border="0" align="center">
  <tr>
    <td width="298"><div align="left"><strong> 1.- 
		<?php 
		echo $Q_1[1];
		?></strong> </div></td>
  </tr>
  <tr>
    <td>
      <div align="left">
		  <form method="post" action="">
        <input type=radio name=ans1 value=1>
			 
			  
    <?php echo $R1_1[1] ?> </div></td>
		
  </tr>
  <tr>
    <td>
      <div align="left">
        <input type=radio name=ans1 value=2>
    <?php echo $R1_2[1] ?>
		</div></td>
	  
  </tr>
</table>
<p>&nbsp;</p>
<table width="304"  border="0" align="center">
  <tr>
    <td width="298"><div align="left"><strong> 2.- 
		<?php 
		echo $Q_2[1];
		?></strong> </div></td>
  </tr>
  <tr>
    <td>
      <div align="left">
        <input type=radio name=ans2 value=1>
    <?php echo $R2_1[1] ?> </div></td>
  </tr>
  <tr>
    <td>
      <div align="left">
        <input type=radio name=ans2 value=2>
    <?php echo $R2_2[1] ?></div></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="304"  border="0" align="center">
  <tr>
    <td width="298"><div align="left"><strong> 3.-
		<?php 
		echo $Q_3[1];
		?></strong></div></td>
  </tr>
  <tr>
    <td>
      <div align="left">
        <input type=radio name=ans3 value=1>
    <?php echo $R3_1[1] ?> </div></td>
  </tr>
  <tr>
    <td>
      <div align="left">
        <input type=radio name=ans3 value=2>
    <?php echo $R3_2[1] ?></div></td>
  </tr>
</table>
<p>&nbsp;</p>
<td><div align="center">
	
  		<input type=submit  name=submit value='Terminar'>
	
	</form>
</div></td>
</p>

</body>
</html>
