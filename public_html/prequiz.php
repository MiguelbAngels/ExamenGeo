<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Prueba en línea - Lista de prueba</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
    <link href="http://localhost/exam/exam/css/style.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap -->
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
	extract($_GET);
  extract($_POST);
include("database.php");


if(isset($submit))
  {
      $sql = "SELECT * FROM examen WHERE IDExamen=$subid and PassExamen='$pass'";
      

    $rs=mysqli_query($con,$sql);
    $row = mysqli_fetch_array($rs,MYSQLI_ASSOC);
    


    $count = mysqli_num_rows($rs);
  
  
    if($count<1 )
    {
      $found="N";
    }
    else
    {
      header("Location:quiz2.php?subid=$subid");
    }
  }

  $sql1 = "SELECT IDExamen from usuarios where ID=$_SESSION[login]";
  $rs = mysqli_query($con,$sql1);
  $row = mysqli_fetch_array($rs,MYSQL_ASSOC);
  $row=mysqli_fetch_row($rs);


  $sql2 = "SELECT * FROM examen where IDExamen=$subid";
	$rs=mysqli_query($con,$sql2);
  $row = mysqli_fetch_array($rs,MYSQL_ASSOC);
    $count = mysqli_num_rows($rs);
    $row=mysqli_fetch_row($rs)
?>

  <center>
    <table width="304"  border="0" align=center>
      <tr>
      
      <div class="wrap-login100">
        <form class="login100-form validate-form" name="form1" method="post" action="">
          <?php
          echo "<span class=login100-form-title> Examen: $row[1] </span>";
          echo "<span align=right class=login100-form-title > Fecha del examen: $row[4] </span>";
          echo "<span class=login100-form-title align=right> Hora de apertura: $row[5] </span>";
          echo "<span class=login100-form-title align=right> Hora de cierre: $row[6] </span>";
          echo "<span class=login100-form-title> Ingrese la clave del examen para comenzar. </span>";
          ?>
          <div class="wrap-input100 validate-input" data-validate = "Ingresar Contraseña">
            <input class="input100" type="password" name="pass" id="pass" placeholder="Contraseña">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>

          <span class="errors">
               <?php
              if(isset($found))
              {
                echo '<center style="color:#eff502">Contraseña invalida</center>';
              }
            ?>
          </span>

          <div class="container-login100-form-btn">
            <button class="login100-form-btn" name="submit" type="submit" id="submit" value="Login">
              Ingresar a examen
            </button>
          </div>

        </form>
      </div>
      
      </tr>
    </table>
  </center>




</body>
</html>
