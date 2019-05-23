<?php
session_start();
error_reporting(1);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Prueba en línea del área administrativa </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../quiz.css" rel="stylesheet" type="text/css">
   <link href="http://localhost/exam/exam/css/bootstrap.min.css" rel="stylesheet" type="text/css" /><!-- INCLUYE AL BOSSTRAP ALA WEB -->
    <link href="http://localhost/exam/exam/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
   <script src="http://localhost/exam/exam/datespicker/css/datepicker.css"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->      
<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.7.2.custom.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
<script type="text/javascript"></script>
</head>

<body>

	
<?php
$con = mysqli_connect("localhost","u442507923_udaq","1q2w3e","u442507923_udaq") or die(mysql_error());

extract($_POST);

if(!isset($_SESSION[login]))
{
	echo "<BR><BR><BR><BR><div class=head1>Usted no se ha identificado<br> Por favor <a href=index.php>Login</a><div>";
		exit;
}

?>
<p class="head1">Resultados de la prueba: </p>
<div style="margin:auto;width:90%;height:500px;box-shadow:2px 1px 2px 2px #CCCCCC;text-align:left">
<div style="margin-left:20%;padding-top:5%">
<br><td><a href= "index.php?id=<?php echo $id?>"> Regresar</a></td>
<?php

$id =$_SESSION[login];



	    
$sql = "SELECT * From inscripcion WHERE IDAlumno='$id' ";
$result = mysqli_query($con,$sql);

	while($mostrar=(mysqli_fetch_array($result))){
	    $idex = $mostrar['IDExamen'];
	    
	    $sql0 = "SELECT * From inscripcion WHERE IDAlumno='$id' and IDExamen = '$idex'";
$result0 = mysqli_query($con,$sql0);
	    
$sql2 = "SELECT * From examen WHERE IDExamen='$idex'";
$result2 = mysqli_query($con,$sql2);
$idr = $mostrar['IDRespuestas'];
$sql3 = "SELECT * From respuestas WHERE IDRes ='$idr'";
$result3 = mysqli_query($con,$sql3);
$result4 = mysqli_query($con,$sql0);

		?>
	

	


<table border = "1">
<tr>
		
		<br><br>
		<td>Nombre</td>
		<td> Fecha</td>
		<td> Preguntas</td>
		<td> Correctas</td>
		
		<br>
		
	</tr>
	<?php
	while($mostrar2=(mysqli_fetch_array($result2))){
		?>
		
	<tr>
		
		<td><?php echo $mostrar2['TestName']?></td>
		
	

	
	<?php
	}
	?>
<?php
	while($mostrar0=(mysqli_fetch_array($result0))){
		?>
		

		<td><?php echo $mostrar0['Fecha']?></td>
	    
		

	
	<?php
	}
	?>
	<?php
	while($mostrar3=(mysqli_fetch_array($result3))){
		?>
		

		<td><?php echo $mostrar3['nPreguntas']?></td>

	
	<?php
	}
	?>
	<?php
	while($mostrar4=(mysqli_fetch_array($result4))){
		?>
		

		<td><?php echo $mostrar4['RespCorrectas']?></td>
		
	
	
		
		

	
	<?php
	}
	?>
	
		</tr>
</table>
	
	<?php
	}
	?>

<p align="center" class="head1">&nbsp;</p>
</div>
</div>
</body>
</html>

