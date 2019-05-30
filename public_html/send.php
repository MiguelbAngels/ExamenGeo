<?php
//Definimos la codificación de la cabecera.
header('Content-Type: text/html; charset=utf-8');
//Guarda los valores de los campos en variables, siempre y cuando se haya enviado el formulario, sino se guardará null.
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
$apellido = isset($_POST['apellido']) ? $_POST['apellido'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$mensaje = isset($_POST['mensaje']) ? $_POST['mensaje'] : null;
//Este array guardará los errores de validación que surjan.
$errores = array();
//Pregunta si está llegando una petición por POST, lo que significa que el usuario envió el formulario.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Verifica si ha encontrado errores y de no haber redirige a la página con el mensaje de que pasó la validación.
    if(!$errores){
		$header = 'From: ' . $email . " \r\n";
		$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
		$header .= "Mime-Version: 1.0 \r\n";
		$header .= "Content-Type: text/plain";

		$mensaje = "Este mensaje fue enviado por: " . $nombre . " " . $apellido. " \r\n";
		$mensaje .= "Su e-mail es: " . $email . " \r\n";
		$mensaje .= "Mensaje: " . $_POST['mensaje'] . " \r\n";

		$para = 'darkmax48@gmail.com';
		$asunto = 'Mensaje de la pagina Wacha Anime';

		mail($para, $asunto, utf8_decode($mensaje), $header);

		header("Location:index.html");

		exit;
    }
}
?>