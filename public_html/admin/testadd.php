<?php
session_start();
error_reporting(1);
if (!isset($_SESSION['alogin']))
{
	echo "<br><h2>No has iniciado sesión. Ingresa para acceder a esta página.</h2>";
	echo "<a href=index.php><h3 align=center>Haga clic aquí para iniciar sesión</h3></a>";
	exit();
}
?>
<link href="../quiz.css" rel="stylesheet" type="text/css">
<?php
require("../database.php");

include("header.php");


echo "<br><h2><div  class=head1>Agregar prueba</div></h2>";

?>
<SCRIPT LANGUAGE="JavaScript">
function check() {
mt=document.form1.testname.value;
if (mt.length<1) {
alert("Por favor introduzca el nombre de la prueba");
document.form1.testname.focus();
return false;
}
tt=document.form1.totque.value;
if(tt.length<1) {
alert("Por favor ingrese la pregunta total");
document.form1.totque.value;
return false;
}
lug=document.form1.lugar.value;
if(lug.length<1) {
alert("Por favor ingrese el lugar");
document.form1.lug.value;
return false;
}
date=document.form1.fecha.value;
if(date.length<1) {
alert("Por favor ingrese la fecha");
document.form1.fecha.value;
return false;
}
hi=document.form1.hinicio.value;
if(hi.length<1) {
alert("Por favor ingrese la hora de inicio");
document.form1.hinicio.value;
return false;
}
hf=document.form1.hfin.value;
if(hf.length<1) {
alert("Por favor ingrese la hora de fin");
document.form1.hfin.value;
return false;
}
psw=document.form1.passex.value;
if(psw.length<1) {
alert("Por favor ingrese la contraseñal");
document.form1.passex.value;
return false;
}
return true;
}
</script>
<form name="form1" method="post" action= "addTest.php"  onSubmit="return check();">
  <table width="58%"  border="0" align="center">
    <tr>
      
      </select>
        
    <tr>
        <td height="26"><div align="left"><strong> Introduzca el nombre de la prueba </strong></div></td>
        <td>&nbsp;</td>
	  <td><input name="testname" type="text" id="testname"></td>
    </tr>
    <tr>
      <td height="26"><div align="left"><strong>Ingrese la pregunta total </strong></div></td>
      <td>&nbsp;</td>
      <td><input name="totque" type="text" id="totque"></td>
    </tr>
    
    <tr>
      <td height="26"><div align="left"><strong>Ingrese el lugar del examen </strong></div></td>
      <td>&nbsp;</td>
      <td><input name="lugar" type="text" id="lugar"></td>
    </tr>
    <tr>
      <td height="26"><div align="left"><strong>Ingrese la fecha </strong></div></td>
      <td>&nbsp;</td>
      <td><input name="fecha" type="date" id="fecha"></td>
    </tr>
    <tr>
      <td height="26"><div align="left"><strong>Ingrese la hora de inicio </strong></div></td>
      <td>&nbsp;</td>
      <td><input name="hinicio" type="text" id="hinicio"></td>
    </tr>
    <tr>
      <td height="26"><div align="left"><strong>Ingrese la hora final del examen </strong></div></td>
      <td>&nbsp;</td>
      <td><input name="hfin" type="text" id="hfin"></td>
    </tr>
    <tr>
      <td height="26"><div align="left"><strong>Ingrese una contraseña para el examen </strong></div></td>
      <td>&nbsp;</td>
      <td><input name="passex" type="text" id="passex"></td>
    </tr>
    <tr>
      <td height="26"></td>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" value="Agregar" ></td>
    </tr>
  </table>
</form>
<p>&nbsp; </p>
