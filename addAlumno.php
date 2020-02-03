<?php
require_once('lib/init.php');

define("ANADIR",'Añadir');
$nombre = $_POST['nombre'];
$dni = $_POST['dni'];
$legajo = $_POST['legajo'];
$error = 0;

if (isset($_GET['archivo'])) 
{
	$catedra = new catedra(null, null, $_GET['archivo'], null);
	$catedra->recuperarCatedra();
	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['operacion'])) 
	{
		if ($_POST['operacion'] === ANADIR) {
			
			if (empty($nombre)  || empty($dni) || empty($legajo)) 
			{
				$error = 1;
			}
			else 
			{
				$catedra->addAlumno(new alumno($nombre, $dni, $legajo));
				$catedra->guardarCatedra();
			}
		}
	}

	$alumnos = $catedra->getAlumnos();
	foreach($alumnos as $alumno) {
		$datos[] = ['nombre' => $alumno->getNombre()  , 'dni' => $alumno->getDni(), 'legajo' => $alumno->getLegajo() ];
	}
}

$body = '
	<a href="Index.php">Volver</a>
	
	<br /><br />
	
	<h3>'.$catedra->getMateria().'</h3>
	
	<h3>Nuevo alumno</h3>
	
    <FORM method="post" name="formulario" autocomplete="off">
    Nombre: <input type="text" name="nombre" id="nombre">
	<br /><br />
	DNI: <input type="text" name="dni" id="dni">
	<br /><br />
	Legajo: <input type="text" name="legaojo" id="legajo">
    <br /><br />
    <input type="submit" value="' . ANADIR . '" name="operacion">
    </FORM>';
	
if (isset($error) && $error == 1) 
{
	$body.= '<br />Complete todos los campos <br /><br />';
}

if (!empty($datos)) 
{
	$body.= '
        <br />
		<h3>Listado de alumnos</h3>
        <table align=center border="1" width=50%>
            <tr>
                <th>Nombre</th>
				<th>DNI</th>
				<th>Legajo</th>
            </tr>
    ';
	foreach($datos as $elemento) {
		$body.= '
            <tr><td>' . $elemento['legajo'] . '</td><td>' . $elemento['nombre'] . '</td><td>' . $elemento['dni'] . '</td></tr>
        ';
	}

	$body.= '</table>';
}
else {
	$body.= '<h3>No hay alumnos inscriptos</h3>';
}

$body.= ';
    </body>
    </html>';
echo $body;
?>