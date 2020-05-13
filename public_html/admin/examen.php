<?php
session_start();
error_reporting(1);
if (!isset($_SESSION['alogin']))
{
	echo "<br><h2>No has iniciado sesión. Ingresa para acceder a esta página.</h2>";
	echo "<a href=../index.php><h3 align=center>Haga clic aquí para iniciar sesión</h3></a>";
	exit();
}
?>
<link href="../quiz.css" rel="stylesheet" type="text/css">
<?php
require("../database.php");

include("header.php");


echo "<br><h2><div  class=head1>Agregar prueba</div></h2>";

{
extract($_POST);
$query3="insert into examen(IDExamen,TestName,AdminID,Lugar,HInicio,HFinal,PassExamen) values ('12','$testname','12','$lugar','$fecha','$hinicio','$hfin','$passex')";
$rs3=mysqli_query($con,$query3)or die("no se registro error error");
echo "<p align=center>Test <b>\"$testname\"</b> Agregado exitosamente.</p>";

unset($_POST);
}
?>