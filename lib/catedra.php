<?php
if( !class_exists('catedra') )
{
	Class catedra
	{
		private $_nombre;
		private $_profesor;

		public function __construct($nombre,$profesor)
		{
			$this->_nombre=$nombre;
			$this->_profesor=$profesor;
		}
		public function addProfesor(Persona $profesor)
		{
			$this->_profesor=$profesor;
		}
		public function getProfesor()
		{
			return $this->_profesor;
		}
		public function getNombre(){
			return $this->_nombre;
		}
	}
}
?>
