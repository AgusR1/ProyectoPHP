<?php
if( !class_exists('Profesor') )
{
	class Profesor extends Persona
	{
		public $legajo;
		public $cuit;
		public function __construct($nombre,$legajo,$cuit,$dni)
		{
			parent::__construct($nombre, $legajo,$cuit,$dni);
		}
	}
}
?>
