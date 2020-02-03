<?php
if( !class_exists('Alumno') )
{	
	class Alumno extends Persona
	{
		private $_legajo;
		public function __construct($nombre,$dni)           //constructor
		{
			parent::__construct($nombre,$dni);
		}
			
		public function setLegajo($legajo)
		{
			$this->_legajo = $legajo;
		}
			public function getLegajo()
		{
			return $this->_legajo;
		}
	}
}
?>