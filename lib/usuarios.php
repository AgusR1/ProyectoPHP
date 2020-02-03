<?php
if( !class_exists('Usuarios') )
{	
	class Usuarios
	{
		static protected $_pathName;
		private $_registrados=array();
			
		public function addRegistrado(Usuario $nuevo)
		{
			$this->_registrados[]=$nuevo;
		}
		
		public function guardarArchivo()
		{
		}
		
		public function recuperarArchivo()
		{
		}
		
		public function autenticar(Usuario $login)
		{
		}
	}
}
?>