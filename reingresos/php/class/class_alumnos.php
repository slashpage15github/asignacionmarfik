<?php   //orientado a objetos en esta clase solo se creó el objeto curso
if(class_exists('class_alumnos')!=true)
{
	class alumnos{
		public $matricula;
		public $alumno;
		public $grado;
		public $cve_plan;
		

public function __construct($matricula=NULL,$alumno=NULL,$grado=NULL,$cve_plan=NULL)
	{
	$this->matricula=$matricula;
	$this->alumno=$alumno;
	$this->grado=$grado;
	$this->cve_plan=$cve_plan;
	
			}
			/* getters y setters*/


}
}


?>