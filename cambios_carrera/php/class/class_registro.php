<?php
if(class_exists('class_registro') != true)
{
	class registro{
		protected $Matricula;
		protected $Nombre;
		protected $Telefono;
		protected $Correo;
		protected $Estatus;
		protected $Plan;
		protected $Plan_nuevo;
		protected $Respuesta;
		
		

public function __construct($Matricula=NULL,$Nombre=NULL,$Telefono=NULL,$Correo=NULL,$Estatus=NULL,$Plan=NULL,$Plan_nuevo=NULL,$Respuesta=NULL)
  		{
		   $this->Matricula=$Matricula;
		   $this->Nombre=$Nombre;
		   $this->Telefono=$Telefono;
		   $this->Correo=$Correo;
		   $this->Estatus=$Estatus;
		   $this->Plan=$Plan;
		   $this->Plan_nuevo=$Plan_nuevo;
		   $this->Respuesta=$Respuesta;
		   
  		}

  		/*getters & setters*/
  		
	public function setMatricula($Matricula){
		$this->Matricula=$Matricula;
	}
	
	public function getMatricula(){
		return $this->Matricula;
	}	

	public function setNombre($Nombre){
		$this->Nombre=$Nombre;
	}
	
	public function getNombre(){
		return $this->Nombre;
	}	

	public function setEstatus($Estatus){
		$this->Estatus=$Estatus;
	}
	public function getEstatus(){
		return $this->Estatus;
	}
	public function setPlan($Plan){
		$this->plan=$Plan;
		
	}
	
	public function getPlan(){
		return $this->Plan;
	}	
	public function setPlan_nuevo($Plan_nuevo){
		$this->Plan_nuevo=$Plan_nuevo;
	}
	
	public function getPlan_nuevo(){
		return $this->Plan_nuevo;
	}	
	public function setTelefono($Telefono){
		$this->Telefono=$Telefono;
	}
	public function getTelefono(){
		return $this->Telefono;
	}	

	public function setCorreo($Correo){
		$this->Correo=$Correo;
	}
	
	public function getCorreo(){
		return $this->Correo;
	}	
	public function setRespuesta($Respuesta){
		$this->Respuesta=$Respuesta;
	}
	public function getRespuesta(){
		return $this->Respuesta;
	}
	
	}
}
?>
