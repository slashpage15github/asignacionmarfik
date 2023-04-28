<?php   //orientado a objetos en esta clase solo se creó el objeto curso
if(class_exists('class_registro')!=true)
{
	class registro{
		protected $matricula;
		protected $nombre;
		protected $grado;
		protected $carrera;
		protected $observacion;
		protected $telefono;
		protected $email;
		protected $status;

public function __construct($matricula=NULL,$nombre=NULL,$grado=NULL,$carrera=NULL,$observacion=NULL,$telefono=NULL,$email=NULL,$status=NULL)
	{
	$this->matricula=$matricula;
	$this->nombre=$nombre;
	$this->grado=$grado;
	$this->carrera=$carrera;
	$this->observacion=$observacion;
	$this->telefono=$telefono;
	$this->email=$email;
	$this->status=$status;
			}
			/* getters y setters*/

public function setMatricula($matricula){
	$this->matricula=$matricula;
	}
	public function getMatricula(){
		return $this->matricula;
	}
public function setNombre($nombre){
	$this->nombre=$nombre;
	}
public function getNombre(){
		return $this->nombre;
	}
public function setGrado($grado){
	$this->grado=$grado;
	}
public function getGrado(){
		return $this->grado;
	}
public function setCarrera($carrera){
	$this->carrera=$carrera;
	}
	public function getCarrera(){
		return $this->carrera;
	}
public function setObservacion($observacion){
	$this->observacion=$observacion;
	}
public function getObservacion(){
		return $this->observacion;
	}
public function setTelefono($telefono){
	$this->telefono=$telefono;
	}
public function getTelefono(){
		return $this->telefono;
	}
public function setEmail($email){
	$this->email=$email;
	}
public function getEmail(){
		return $this->email;
	}
public function setStatus($status){
	$this->status=$status;
	}
public function getStatus(){
		return $this->status;
	}
}
}


?>