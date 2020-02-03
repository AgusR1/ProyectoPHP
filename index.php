<?php
	require_once('lib/init.php');

//Declaro los textos que van a usar los botones de los submits
define("GUARDAR",'Guardar');
define("VER_CATS",'Ver cátedras');
define("OCULTAR_CATS",'Ocultar cátedras');
//Inicializo las variables que contienen los valores de los inputs a null en caso de que no se haya enviado el formulario aún
$datos = array();
$materia = ['materia'];
$profesor = ['profesor'];
$archivo = ['archivo'];
$error = 0;

$bruno = new Alumno('bruno','383838');
$nombre = $bruno->getNombre();
$dni = $bruno->getDni();
$legajo = $bruno->getLegajo();

$datos = array("Nombre" => "nombre", "Dni" => "dni", "Legajo" => "legajo");
//Si el metodo de la solicitud es un post, es decir, si se envio el formulario y la operacion tiene algun valor
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['operacion'])) {
	//Si la operacion es la de guardar:
	if ($_POST['operacion'] === GUARDAR)
	{
		if (empty($materia) || empty($profesor) || empty($archivo))
		{
			$error = 1;
		}
		else
		{
			$catedra = new catedra($materia, $profesor, $archivo, $datos);
			$catedra->guardarCatedra();
			$file = @fopen("Catedra.txt", "a");
			$archivo = implode($catedra->getArchivo());
			echo $archivo;
			fwrite($file, "$archivo" . PHP_EOL);
			fclose($file);
		}
	}
	else
	//Si la operacion es la de Cargar o ver y el archivo existe
	if (file_exists('Catedra.txt') && $_POST['operacion'] != OCULTAR_CATS )
	{
		$content = trim(file_get_contents('Catedra.txt') , PHP_EOL);
		$archivosCatedra = explode(PHP_EOL, $content);
		foreach($archivosCatedra as $archivoCatedra)
		{
			$catRecovery = new catedra(null, null, $archivoCatedra, null);
			$catRecovery->recuperarCatedra();
			$datos = ['materia' => $catRecovery->getMateria() , 'profesor' => $catRecovery->getProfesor() , 'archivo' => $catRecovery->getArchivo() , 'alumnos' => getAlumnos()];
		}
	}
}

$body = '<html>
	<body>
	<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Cátedras</title>
    <style type="text/css">
    </style>
    </head>
    <h3> Nueva cátedra </h3>
    <FORM method="post" name="formulario" autocomplete="off">
    Materia: <input type="text" name="materia" id="materia">
	<br /><br />
    Profesor: <input type="text" name="profesor" id="profesor">
	<br /><br />
	Archivo: <input type="text" name="archivo" id="archivo">

    <br /><br />
    <input type="submit" value="' . GUARDAR . '" name="operacion">
    <input type="submit" value="' . VER_CATS . '" name="operacion">
    <input type="submit" value="' . OCULTAR_CATS . '" name="operacion">

    </FORM>';

if (isset($error) && $error == 1)
{
	$body.= '<br />Complete TODOS los campos <br /><br />';
}

if (!empty($datos))
{
	$body.= '
        <br/>
		<h3>Listado de cátedras </h3>
        <table align=center border="1" width=50%>
            <tr>
                <th>Catedra</th>
                <th>Profesor</th>
				<th>Archivo</th>
				<th><img src="img/student.png" height=20px width=20px></th>
            </tr>
    ';
	foreach($datos as $elemento)
	{
		$body.= '
             <tr><td>' . $elemento['materia'] . '</td><td>' . $elemento['profesor'] . '</td><td>' . $elemento['archivo'] . '</td><td><a href="ver_alumnos.php?archivo=' . $elemento['archivo'] . '">' . "Ver alumnos" . '</a></td></tr>
        ';
	}

	$body.= '</table>';
}
echo $body;
?>
    </body>
    </html>
