<?php
if(class_exists('class_carreras') != true)
{
	class carreras{
		public $cve_plan;
		public $nombre_carera;

public function __construct($cve_plan=NULL,$nombre_carera=NULL)
  		{
		   $this->cve_plan=$cve_plan;
		   $this->nombre_carera=$nombre_carera;
  		}

  		/*getters & setters - no se ocupan al ser propiedades publicas*/
  		
	}
}
?>