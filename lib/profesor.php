<?php
if( !class_exists('Profesor') )
{	
	class Profesor extends Persona
	{
		public function __construct($nombre,$dni)
		{
			parent::__construct($nombre,$dni);
		}
	}
}
?>