<?php
if(class_exists('class_materias') != true)
{
	class materias{
		public $clave;
		public $materia;

public function __construct($clave=NULL,$materia=NULL)
  		{
		   $this->clave=$clave;
		   $this->materia=$materia;
  		}

  		/*getters & setters - no se ocupan al ser propiedades publicas*/
  		
	}
}
?>