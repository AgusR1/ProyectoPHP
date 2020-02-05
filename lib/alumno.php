<?php
if( !class_exists('Alumno') )
{
	class Alumno extends Persona
	{
		private $_legajo;
		public function __construct($nombre, $apellido, $legajo ,$dni)           //constructor
		{
			$this->nombre = $nombre;
			$this->apellido=$apellido;
			$this->legajo=$legajo;
			$this->dni = $dni;
		}
		public function setLegajo($legajo)
		{
			$this->_legajo = $legajo;
		}
			public function getLegajo()
		{
			return $this->legajo;
		}
	}
}
?>
