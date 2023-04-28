<?php
if(class_exists('usuarios') != true)
{
class usuarios{
	protected $usuario;
	protected $clave;

		public function __construct($usuario=NULL,$clave=NULL)
  		{
    		$this->usuario=$usuario;
			$this->clave=$clave;
  		}

	//Getters & Setters
	public function setUsuario($usuario){$this->usuario=$usuario;}
	public function getUsuario(){return $this->usuario;}

	public function setClave($clave){$this->clave=$clave;}
	public function getclave(){return $this->clave;}

	}
}
?>