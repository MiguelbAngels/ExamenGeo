<html>
<head>
<script language="javascript">
function comprobar()
{
   var nombre = document.formu.nombre.value;
   var edad = document.formu.edad.value;

   if (nombre.length > 30)
   {
      alert("Tu nombre es demasiado grande. Redúcelo.");
      return false;
   }
   
   if (edad >= 20 && edad <= 40)
   {
      alert("Si tienes entre 20 y 40 años, no puedes usar este programa.");
      return false;
   }
   
   return true;
}
</script>
</head>
<body>
<form action="prog.php" method="post" name="formu" id="formu" 
      onsubmit="return comprobar()">
   Tu nombre: <input type="text" name="nombre" value=""><br>
   Tu edad:   <input type="text" name="edad" value="" size="2" maxlength="2"><br>
              <input type="submit" value="   Enviar   ">
</form>
</body>
</html>