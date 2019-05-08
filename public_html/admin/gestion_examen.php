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

include("header.php");
extract($_POST);

if(!isset($_SESSION[alogin]))
{
	echo "<BR><BR><BR><BR><div class=head1>Usted no se ha identificado<br> Por favor <a href=index.php>Login</a><div>";
		exit;
}

$con = mysqli_connect("localhost","u442507923_udaq","1q2w3e","u442507923_udaq") or die(mysql_error());

$sql = "SELECT * From examen";
$result = mysqli_query($con,$sql);

		?>
	
  <script type="text/javascript">
   
   function confirmar_eliminar(){ 
   if(confirm("¿Esta seguro que desea eliminar el registro?")){
           
   }else{
    window.location.href='alumnos_gestion.php';
   }
  }
  </script> 
	

<p class="head1">Gestion de alumnos </p>
<div style="margin:auto;width:90%;height:500px;box-shadow:2px 1px 2px 2px #CCCCCC;text-align:left">
<div style="margin-left:20%;padding-top:5%">
 <p class="style7"><a href="testadd.php"><font  class='text-danger' size=4>Nuevo Examen</font></a></p>
<table border = "1">
    <thead>
        <tr >
            
            <th COLSPAN = "10"><center>Lista de examenes</center></th>
            
            
        </tr>
    </thead>
    <tbody>
<tr>
	
		<td>Id</td>
		<td> Nombre</td>
		<td> <center>AdminId</center></td>
		<td><center>Lugar</center></td>
		<td><center>Fecha</center></td>
		<td><center>Hora inicio</center></td>
		<td><center>Hora fin</center></td>
		<td><center>Contraseña</center></td>
		<td COLSPAN = "2"><center>Operaciones</center></td>
		
		
	</tr>
<?php
	while($mostrar=(mysqli_fetch_array($result))){
		?>
		
	<tr>
		<td><?php echo $mostrar['IDExamen']?></td>
		<td><?php echo $mostrar['TestName']?></td>
		<td><?php echo $mostrar['AdminID']?></td>
		<td><?php echo $mostrar['Lugar']?></td>
		<td><?php echo $mostrar['Fecha']?></td>
		<td><?php echo $mostrar['HInicio']?></td>
		<td><?php echo $mostrar['HFinal']?></td>
		<td><?php echo $mostrar['PassExamen']?></td>
		<td><a href= "alumnos_inscritos.php?id=<?php echo $mostrar['IDExamen']?>"> Alumnos</a></td>
		<td><a onclick= "confirmar_eliminar(location='deleteuser.php?id=<?php echo $mostrar['IDExamen'];?>')"> Borrar</a></td>
		
		
		
	</tr>
	
	<?php
	}
	?>
	</tbody>
</table>

<p align="center" class="head1">&nbsp;</p>
</div>
</div>
</body>
</html>


