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
include("database.php");

extract($_POST);

if(!isset($_SESSION[login]))
{
	echo "<BR><BR><BR><BR><div class=head1>Usted no se ha identificado<br> Por favor <a href=index.php>Login</a><div>";
		exit;
}

$id = $_SESSION[login];
$idex = $_REQUEST['idex'];

$sql = "SELECT * From resultados WHERE IDAlumno='$id' and IDExamen = '$idex'";
$result = mysqli_query($con,$sql);
$sql2 = "SELECT * From examen WHERE IDExamen='$idex'";
$result2 = mysqli_query($con,$sql2);

$result4 = mysqli_query($con,$sql);
$sql4 = "SELECT * From usuarios WHERE ID ='$id'";
$result5 = mysqli_query($con,$sql4);

		?>
	 

<p class="head1">Resultados de la prueba: </p>
<div style="margin:auto;width:90%;height:500px;box-shadow:2px 1px 2px 2px #CCCCCC;text-align:left">
<div style="margin-left:20%;padding-top:5%">
<?php
	 echo "<br><div class=head1><a href=index.php>Regresar al inicio</a></div>";i  
?>
<table border = "1" >
<tr>
		
		<br><br>
		<td>Examen</td>
		<td> Preguntas</td>
		<td> Fecha</td>
		 
		<td> Correctas</td>
		
		<br>
		
	</tr>
		<?php
	while($mostrar5=(mysqli_fetch_array($result5))){
		?>
		
	 	<?php $email = $mostrar5['Correo']  ?>
    	<?php $mensaje = "Aspirante: ".  $mostrar5['Nombre'] . "\n"  ?>
	
	<?php
		}
	?>
	
	<?php
		while($mostrar2=(mysqli_fetch_array($result2))){
	?>
		
	<tr>
		
			<td><?php echo $mostrar2['TestName']?></td>
			<?php $mensaje .= "Nombre del examen: ".  $mostrar2['TestName'] . "\n"  ?>
			<?php $asunto = "Resultados de examen: ".  $mostrar2['TestName']  ?>
			<td><?php echo $mostrar2['nReactivos']?></td>
			<?php $mensaje .= "Preguntas: ".  $mostrar2['nReactivos'] . "\n" ?>
			</br>
	

	
	<?php
		}
	?>
<?php
	while($mostrar=(mysqli_fetch_array($result))){
?>
		

		<td><?php echo $mostrar['Fecha']?></td>
	    <?php $mensaje .= "Fecha: ".  $mostrar['Fecha'] . "\n" ?>
		</br>
		

	
	<?php
	}
	?>

	<?php
	while($mostrar4=(mysqli_fetch_array($result4))){
		?>
		<td><?php echo $mostrar4['RespCorrectas']?></td>
		
	 <?php $mensaje .= "Correctas: ".  $mostrar4['RespCorrectas'] . "\n" ?>

	<?php
	   
	}
	
	?>
	

		
	
		</tr>
</table>
<div align ="left">

</div>

<p align="center" class="head1">&nbsp;</p>
</div>
</div>
</body>
</html>

