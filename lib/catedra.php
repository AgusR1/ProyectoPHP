<?php
if( !class_exists('catedra') )
{
	Class catedra
	{
		private $_materia;
		private $_archivo='archivo.txt';
		private $_alumnos=array();
		private $_profesor;

		public function __construct($materia,$archivo,$alumnos,$profesor)
		{
			$this->_materia=$materia;
			$this->_archivo=$archivo;
			$this->_alumnos=$alumnos;
			$this->_profesor=$profesor;
		}

		public function addAlumno(Persona $alumno)
		{
			array_push($this->alumnos,$alumno);
		}

		public function addProfesor(Persona $profesor)
		{
			$this->_profesor=$profesor;
		}

		public function guardarCatedra()
		{
			$manejador=fopen($_archivo,"w");
			fwrite($manejador,"serialize" .PHP_EQL);
			fclose($manejador);
		}

		public function recuperarCatedra()
		{
			$manejador=fopen(self::$_archivo,"r");
			$catedra=(object)unserialize(fgets($manejador));
			$this->_materia=$catedra->_materia;
			$this->_profesor=$catedra->_profesor;
			$this->_alumnos=$catedra->_alumnos;
			fclose($manejador);
		}

		public function getArchivo(){
			return $this->_archivo;
		}

		public function getProfesor(){
			return $this->profesor;
		}

		public function getMateria(){
			return $this->materia;
		}

		public function getAlumnos(){
			return $this->alumnos;
		}

	}
}
?>
