<?php
/**
 * Export to PHP Array plugin for PHPMyAdmin
 * @version 4.8.5
 */

/**
 * Database `examengeo`
 */

/* `examengeo`.`examen` */
$examen = array(
  array('ID Examen' => '300419','Nombre Examen' => 'Examen 30/04/19','ID Maestro' => '197202294','Lugar' => 'Bulevard solidaridad','Fecha' => '2019-04-30','Hr. Inicio' => '1400','Hr. Final' => '1600','Contraseña Examen' => '17161514')
);

/* `examengeo`.`incisos` */
$incisos = array(
  array('ID Inciso' => '10001','Inciso' => 'El planeta explota','ID Reactivo' => '20002'),
  array('ID Inciso' => '10002','Inciso' => 'Si y solo si hay queso','ID Reactivo' => '20001'),
  array('ID Inciso' => '10003','Inciso' => 'De quien quiera','ID Reactivo' => '20003'),
  array('ID Inciso' => '10004','Inciso' => 'De quien la trabaje','ID Reactivo' => '20003'),
  array('ID Inciso' => '10005','Inciso' => 'Dif. de minerales y apl.','ID Reactivo' => '20002'),
  array('ID Inciso' => '10006','Inciso' => 'Tierra solida y dura','ID Reactivo' => '20001')
);

/* `examengeo`.`inscripcion` */
$inscripcion = array(
  array('ID Inscripcion' => '19191919','ID Alumno' => '217202294','ID Examen' => '300419','ID Maestro' => '197202294','Fecha Aplicada' => '2019-04-30','ID Respuestas' => '20193004')
);

/* `examengeo`.`reactivos` */
$reactivos = array(
  array('ID Reactivo' => '20001','Pregunta' => '¿Que es una roca?','ID Respuesta Correcta' => '10001','ID Examen' => '300419'),
  array('ID Reactivo' => '20002','Pregunta' => '¿Diferencia entre tierra y arena?','ID Respuesta Correcta' => '10002','ID Examen' => '300419'),
  array('ID Reactivo' => '20003','Pregunta' => '¿De quien es la tierra?','ID Respuesta Correcta' => '10003','ID Examen' => '300419')
);

/* `examengeo`.`respuestas` */
$respuestas = array(
  array('ID Respuestas' => '20193004','# Preguntas' => '5','1' => '1','2' => '0','3' => '1','4' => '0','5' => '1','6' => '0','7' => '0','8' => '0','9' => '0','10' => '0')
);

/* `examengeo`.`usuarios` */
$usuarios = array(
  array('ID' => '197202294','Nombre' => 'José Doroteo Arango Arámbula','Correo' => 'PanchoVillaEsElPatron@gmail.com','Password' => 'ElPatron','Clase' => '0','ID Examen' => '0'),
  array('ID' => '217202294','Nombre' => 'Miguel Angel Bernal Sanchez','Correo' => 'miguel15bs@gmail.com','Password' => '290419','Clase' => '1','ID Examen' => '300419')
);
