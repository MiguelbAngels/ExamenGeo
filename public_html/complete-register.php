
<?php
session_start(); ?>
<!DOCTYPE html>
<html>

    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">

        <title>
            Respuesta Formulario de Registro
        </title>
        <meta charset="UTF-8">
    </head>
    <body style="background:#000;">
<?php
require 'php/pdoconnection.php';
if (isset($_POST))
{

    //CHECAR SI EL EMAIL ESTÁ DISPONIBLE Y SI EL USUARIO LO ESTÁ SI ESTO ESTÁ BIEN
      //variables
$nombre= $_POST["name"];
$correoelectronico= $_POST["email"];
$username= $_POST["username"];
$password=$_POST["password"];
$since= DATE ("Y-m-d h:i:sa");
$activitos=2;
try {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $db->prepare('SELECT COUNT(*) name FROM usuarios WHERE (active = :active) AND (email=:email OR username=:username)');
    $stmt->execute(array('active'=>$activitos, 'email'=>$correoelectronico, 'username'=>$username));
    $numdefilas = $stmt->fetchColumn();

    //$row = $stmt->fetch();
       // echo $row[1];

    }
 catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
if ($numdefilas>0)
{
    header("Location: ".$_SERVER["HTTP_REFERER"]);
    $status="<div class='alert alert-danger'>El registro no pudo proceder vuelve a intentarlo!</div>";
}
if ($numdefilas==0)
{
    //INSERTAR REGISTROS
$preactivo=1;
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$preparedStatement = $db->prepare('INSERT INTO usuarios(ID,Nombre,Correo,Password,Clase,IDExamen,Estado) values('$username','$name','$email','$password','0','12','0')');
$preparedStatement->execute(array('name'=>$nombre, 'email'=> $correoelectronico,
    'active' => $preactivo, 'since' => $since, 'password' => $password));
$status="<div class='alert alert-success'><i class='fa fa-check'></i> Gracias por registrarte nos estaremos comunicando muy pronto!</div>";
}
}
?>
<div class="container-fluid">

    <a href="index.php"><div class="col-lg-4 col-lg-offset-4 col-sm-8 col-sm-offset-2 col-xs-12">

             <?php echo $status; ?>
    </div></a>
</div>

    </body>
</html>