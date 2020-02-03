<?php 
if( !class_exists('Usuario') )
{	
	class Usuario extends Persona 
	{
		private $_nick;
		private $_pass;
		private $_level;
		private $_registrados=array();
			
		public function __construct($nombre,$dni)           //constructor
		{
			parent::__construct($nombre,$dni);
		}
		public function getNick()
		{
			return $this->_nick;
		}
		public function setNick($nick)
		{
			$this->_nick=$nick;
		}
		public function getPass()
		{
			return $this->_pass;
		}
		public function setPass($pass)
		{
			$this->_pass=$pass;
		}
		public function validarAcceso($nivel)
		{
		}
		public function guardarSesion()
		{
		}
		public function recuperarSesion()
		{
		}
		public function guardarCookie()
		{
		}
		public function recuperarCookie()
		{
		}
	}
}
?>