<?php
session_start();
error_reporting(1);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Gestión de Admins</title>
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
	echo "<BR><BR><BR><BR><div class=head1>Usted no se ha identificado<br> Por favor <a href=../index.php>Login</a><div>";
		exit;
}

$con = mysqli_connect("127.0.0.1:3306","admin_dorito","dG5CmnDifX","admin_examendb") or die(mysql_error());
$sql = "SELECT * From usuarios WHERE Clase='1'";
$result = mysqli_query($con,$sql);

		?>
	
  <script type="text/javascript">
   
   function confirmar_eliminar(){ 
   if(confirm("¿Esta seguro que desea eliminar el registro?")){
           
   }else{
    window.location.href='admins_gestion.php';
   }
  }
  </script> 
	

<p class="head1">Gestión de administradores </p>
<div style="margin:auto;width:90%;height:500px;box-shadow:2px 1px 2px 2px #CCCCCC;text-align:left">
<div style="margin-left:20%;padding-top:5%">
   <p class="style7"><a href="../admin_signup.php"><font   size=4>Nuevo administrador</font></a></p>
<table border = "1">
    <thead>
        <tr >
            
            <th COLSPAN = "5"><center>Lista de alumnos</center></th>
            
            
        </tr>
    </thead>
    <tbody>
<tr>
	
		<td>Id</td>
		<td> Nombre</td>
		<td> <center>Correo</center></td>
		<td COLSPAN = "2"><center>Operaciones</center></td>
		
		
	</tr>
<?php
	while($mostrar=(mysqli_fetch_array($result))){
		?>
		
	<tr>
		<td><?php echo $mostrar['ID']?></td>
		<td><?php echo $mostrar['Nombre']?></td>
		<td><?php echo $mostrar['Correo']?></td>
		<td><a href= "modificar.php?id=<?php echo $mostrar['ID']?>"> Modificar</a></td>
		<td><a onclick= "confirmar_eliminar(location='deleteuser.php?id=<?php echo $mostrar['ID'];?>')"> Borrar</a></td>
		
		
		
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


