<?php
session_start();
error_reporting(1);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Área administrativa </title>

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
?>

<center><p class="head1" > <font   size=5 color=black>Bienvenido al área administrativa</font></center></p>
<div style="margin:auto;width:95%;height:600px;box-shadow:2px 1px 2px 2px #CCCCCC;text-align:left">
<div style="margin-left:20%;padding-top:5%">

<p class="style7"><a href="alumnos_gestion.php"><font  size=6>Alumnos registrados</font></a></p>
<p class="style7"><a href="admins_gestion.php"><font  size=6>Administradores</font></a></p>
<p class="style7"><a href="alumnosp_gestion.php"><font   size=6>Solicitudes de registro</font></a></p>
<p class="style7"><a href="gestion_examen.php"><font   size=6>Gestión de examenes</font></a></p>
<p class="style7"><a href="gestion_resultados.php"><font   size=6>Resultados (examenes)</font></a></p>

<p align="center" class="head1">&nbsp;</p>
</div>
</div>
</body>
</html>


