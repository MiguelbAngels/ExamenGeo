<?php
session_start();
error_reporting(1);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
   
<title>New user signup </title>
<script language="javascript">

function check()
{
 if(document.form1.lid.value=="")
  {
    alert("Ingrese un expediente");
	document.form1.lid.focus();
	return false;
  }
 
  if(document.form1.name.value=="")
  {
    alert("Por favor, escriba su nombre");
	document.form1.name.focus();
	return false;
  }
 
  if(document.form1.email.value=="")
  {
    alert("Por favor, introduzca su dirección de correo electrónico");
	document.form1.email.focus();
	return false;
  }
  e=document.form1.email.value;
		f1=e.indexOf('@');
		f2=e.indexOf('@',f1+1);
		e1=e.indexOf('.');
		e2=e.indexOf('.',e1+1);
		n=e.length;
		if(!(f1>0 && f2==-1 && e1>0 && e2==-1 && f1!=e1+1 && e1!=f1+1 && f1!=n-1 && e1!=n-1))
		{
			alert("Por favor introduzca un correo electrónico válido");
			document.form1.email.focus();
			return false;
		}
   <?php>
   $pass = password_hash($_POST[´pass´],PASSWORD_BCRYPT);
   ?>
  return true;
  }
  
</script>
    <script>
    
        
      $(document).ready(function () {
   $("#lid").keyup(checarExpediente);
});
 
 
     $(document).ready(function () {
   $("#lid").change(checarExpediente);
});
$(document).ready(function () {
   $("#name").keyup(checarUsuarios);
});
 
 
     $(document).ready(function () {
   $("#name").change(checarUsuarios);
});
     $(document).ready(function () {
   $("#email").keyup(checarEmails);
});
 
 
     $(document).ready(function () {
   $("#email").change(checarEmails);
});
function checarExpediente() {
    
var lid= document.getElementById('lid').value;
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
if (xhttp.readyState == 4 && xhttp.status == 200) {
document.getElementById("checkexp").innerHTML = xhttp.responseText;
expresponsed = document.getElementById('expchecker').value;
if (expresponsed=="1")
{
   
   if (emailresponsed)
   {
      emailresponsed=document.getElementById('emailchecker').value;
      if (emailresponsed=="1"){
          if (usernameresponsed)
            {
               usernameresponsed=document.getElementById('usernamechecker').value;
               if (usernameresponsed=="1"){
                   document.getElementById("thesubmitBoton").disabled = false; 
                             }
            } 
       }
   }
}
else if (expresponsed=="0")
{
    document.getElementById("thesubmitBoton").disabled = true;
}
}
};
}
function checarUsuarios() {
    
var name= document.getElementById('name').value;
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
if (xhttp.readyState == 4 && xhttp.status == 200) {
document.getElementById("checkusername").innerHTML = xhttp.responseText;
usernameresponsed = document.getElementById('usernamechecker').value;
if (usernameresponsed=="1")
{
   
   if (emailresponsed)
   {
      emailresponsed=document.getElementById('emailchecker').value;
      if (emailresponsed=="1"){
          if (expresponsed)
            {
               expresponsed=document.getElementById('expchecker').value;
               if (expchecker=="1"){
                   document.getElementById("thesubmitBoton").disabled = false; 
                             }
            } 
       }
   }
}
else if (usernameresponsed=="0")
{
    document.getElementById("thesubmitBoton").disabled = true;
}
}
};
}
function checarEmails() {
    
var email= document.getElementById('email').value;
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
if (xhttp.readyState == 4 && xhttp.status == 200) {
document.getElementById("checkemailresponse").innerHTML = xhttp.responseText;
emailresponsed = document.getElementById('emailchecker').value;
if (emailresponsed=="1")
{
   
   if (usernameresponsed)
   {
      emailresponsed=document.getElementById('usernamechecker').value;
      if (usernameresponsed=="1"){
          if (expresponsed)
            {
               expresponsed=document.getElementById('expchecker').value;
               if (expchecker=="1"){
                   document.getElementById("thesubmitBoton").disabled = false; 
                             }
            } 
       }
   }
}
else if (emailresponsed=="0")
{
    document.getElementById("thesubmitBoton").disabled = true;
}
}
};
}

</script>

<link href="quiz.css" rel="stylesheet" type="text/css">
</head>
<body>
     <?php


if(!isset($_SESSION[alogin]))
{
	echo "<BR><BR><BR><BR><div class=head1>Usted no se ha identificado<br> Por favor <a href=index.php>Login</a><div>";
		exit;
}

?>

<?php
		$con = mysqli_connect("localhost","u442507923_udaq","1q2w3e","u442507923_udaq") or die(mysql_error());

		$id = $_REQUEST['id'];
		$sql = "SELECT * From usuarios WHERE ID='$id'";
		$result = mysqli_query($con,$sql);
		$mostrar=(mysqli_fetch_array($result))
  ?>

 <table width="100%" border="0">
   <tr>
     <td width="132" rowspan="2" valign="top"><span class="style8"><img src="../images/connected_multiple_big.jpg" width="131" height="155"></span></td>
     <td width="468" height="57"><h1 align="center"><span class="style8">Nuevo registro de usuario</span></h1></td>
   </tr>
   <tr>
     <td><form name="form1" method="post" action="modificaruser.php?id=<?php echo $mostrar['ID']?>" onSubmit="return check();">
	 
       <table width="301" border="0" align="left">
         <tr>
           <td><div align="left" class="style7">Expediente </div></td>
           <td><input required="" type="text" name="lid" id="lid" value="<?php echo $mostrar['ID']?>"></td>
            <div id="checkexp" class=""></div>
         </tr>
         
         
         <tr>
           <td class="style7">Nombre</td>
           <td><input required="" name="name" type="text" id="name" value="<?php echo $mostrar['Nombre']?> "></td>
            <div id="checkusername" class=""></div>
         </tr>
         
           <td valign="top" class="style7">Email</td>
           <td><input required="" name="email" type="email" id="email" value = "<?php echo $mostrar['Correo']?>"></td>
           <div id="checkemailresponse"></div>
         </tr>
         <tr>
           <td>&nbsp;</td>
           
           <td><input type="submit" name="Submit" value="Registrar" id="thesubmitBoton">
           </td>
         </tr>
       </table>
     </form></td>
   </tr>
 </table>
 <p>&nbsp; </p>
 
</body>
</html>
