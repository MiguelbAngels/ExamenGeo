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
$idex = $_REQUEST['idex'];


echo "<br><h2><div  class=head1>Agregar reactivos</div></h2>";

?>
<SCRIPT LANGUAGE="JavaScript">
function check() {
preg=document.form1.preg.value;
if (preg.length<1) {
alert("Por favor introduzca la pregunta");
document.form1.preg.focus();
bool = 0;
return false;
}
a=document.form1.a.value;
if(a.length<1) {
alert("Por favor ingrese inciso a");
document.form1.a.value;
return false;
}
b=document.form1.b.value;
if(b.length<1) {
alert("Por favor ingrese inciso b");
document.form1.b.value;

return false;
}
n=document.form1.n.value;
if(n.length<1) {
alert("Por favor ingrese la fecha1");
document.form1.n.value;

return false;
}
preg=document.form1.preg2.value;
if (preg.length<1) {
alert("Por favor introduzca la pregunta");
document.form1.preg.focus();
bool = 0;
return false;
}
a=document.form1.a2.value;
if(a.length<1) {
alert("Por favor ingrese inciso a");
document.form1.a2.value;
return false;
}
b=document.form1.b2.value;
if(b.length<1) {
alert("Por favor ingrese inciso b");
document.form1.b.value;

return false;
}
n=document.form1.n2.value;
if(n.length<1) {
alert("Por favor ingrese la fecha2");
document.form1.n.value;
return false;
}
preg=document.form1.preg3.value;
if (preg.length<1) {
alert("Por favor introduzca la pregunta");
document.form1.preg.focus();
return false;
}
a=document.form1.a3.value;
if(a.length<1) {
alert("Por favor ingrese inciso a");
document.form1.a.value;
return false;
}
b=document.form1.b3.value;
if(b.length<1) {
alert("Por favor ingrese inciso b");
document.form1.b.value;

return false;
}
n=document.form1.n3.value;
if(n.length<1) {
alert("Por favor ingrese la fecha3");
document.form1.n.value;

return false;
}




return true;
}



</script>
<form action = "pregunta_nueva.php?idex=<?php echo $idex ?>" name="form1" method="post"   onSubmit="return check()">
  <table width="58%"  border="1" align="center">
    <tr>
      
      </select>
     
     
      
        
    <tr>
        <td  ><div align="left"><strong> Introduzca la pregunta 1</strong></div></td>
        <td>&nbsp;</td>
	  <td><textarea name="preg" cols="60" rows="2" id="preg" ></textarea></td>
    </tr>
    <tr>
      <td height="26"><div align="left"><strong>Ingrese el inciso a </strong></div></td>
      <td>&nbsp;</td>
      <td><input name="a" type="text" id="a" size="85" maxlength="85"></td>
    </tr>
    
    <tr>
      <td height="26"><div align="left"><strong>Ingrese el inciso b </strong></div></td>
      <td>&nbsp;</td>
      <td><input name="b" type="text" id="b" size="85" maxlength="85"></td>
    </tr>
    <tr>
      <td height="26"><div align="left"><strong>Ingrese el número de inciso correcto (1-a,2-b,...) </strong></div></td>
      <td>&nbsp;</td>
      <td><input name="n" type="text" id="n"></td>
    </tr>

 </table>
  </br>
    </br>
     <table width="58%"  border="2" align="center">
        
    <tr>
        <td height="29"><div align="left"><strong> Introduzca la pregunta 2 </strong></div></td>
        <td>&nbsp;</td>
	  <td><input name="preg2" type="text" id="preg2"></td>
    </tr>
    <tr>
      <td height="26"><div align="left"><strong>Ingrese el inciso a </strong></div></td>
      <td>&nbsp;</td>
      <td><input name="a2" type="text" id="a2" size="85" maxlength="85"></td>
    </tr>
    
    <tr>
      <td height="26"><div align="left"><strong>Ingrese el inciso b </strong></div></td>
      <td>&nbsp;</td>
      <td><input name="b2" type="text" id="b2" size="85" maxlength="85"></td>
    </tr>
    <tr>
      <td height="26"><div align="left"><strong>Ingrese el número de inciso correcto (1-a,2-b,...) </strong></div></td>
      <td>&nbsp;</td>
      <td><input name="n2" type="text" id="n2"></td>
    </tr>
     </table>
     </br>
    </br>
   
          <table width="58%"  border="2" align="center">
    <tr>
        <td height="29"><div align="left"><strong> Introduzca la pregunta 3 </strong></div></td>
        <td>&nbsp;</td>
	  <td><input name="preg3" type="text" id="preg3"></td>
    </tr>
    <tr>
      <td height="26"><div align="left"><strong>Ingrese el inciso a </strong></div></td>
      <td>&nbsp;</td>
      <td><input name="a3" type="text" id="a3" size="85" maxlength="85"></td>
    </tr>
    
    <tr>
      <td height="26"><div align="left"><strong>Ingrese el inciso b </strong></div></td>
      <td>&nbsp;</td>
      <td><input name="b3" type="text" id="b3" size="85" maxlength="85"></td>
    </tr>
    <tr>
      <td height="26"><div align="left"><strong>Ingrese el número de inciso correcto (1-a,2-b,...) </strong></div></td>
      <td>&nbsp;</td>
      <td><input name="n3" type="text" id="n3"></td>
    </tr>

   
    <tr>
      <td height="26"></td>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" value="Agregar" ></td>
    </tr>
  </table>
 
     

</form>
<p>&nbsp; </p>
