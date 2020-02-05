<?php
if( !class_exists('Persona') )
{
	abstract class Persona
	{
		public $nombre;
		public $apellido;
		public $dni;

		public function __construct($nombre, $apellido, $dni)
		{// constructor
			$this->nombre = $nombre;
			$this->apellido=$apellido;
			$this->dni = $dni;
		}

		public function setNombre($nombre)
		{
			$this->nombre=$nombre;
		}

		public function getNombre()
		{
			return $this->nombre;
		}

		public function setDni($dni)
		{
			$this->dni=$dni;
		}

		public function getDni()
		{
			return $this->dni;
		}
	}
}
?>
