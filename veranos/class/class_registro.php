<?php
if (class_exists('class_registro') != true) {
    class registro
    {
        protected $Matricula;
        protected $Nombre;
        protected $Correo;
        protected $Telefono;
        protected $Grado;
        protected $Id_carrera;
        protected $Id_materia;
        protected $Estatus;

        public function __construct($Matricula = NULL, $Nombre = NULL, $Correo = NULL, $Telefono = NULL,
                                    $Grado = NULL, $Id_carrera = NULL, $Id_materia = NULL, $Estatus = NULL)
        {
            $this->Matricula = $Matricula;
            $this->Nombre = $Nombre;
            $this->Correo = $Correo;
            $this->Telefono = $Telefono;
            $this->Grado = $Grado;
            $this->Id_carrera = $Id_carrera;
            $this->Id_materia = $Id_materia;
            $this->Estatus = $Estatus;
        }

        /*getters & setters*/

        public function setMatricula($Matricula)
        {
            $this->Matricula = $Matricula;
        }

        public function getMatricula()
        {
            return $this->Matricula;
        }

        public function setNombre($Nombre)
        {
            $this->Nombre = $Nombre;
        }

        public function getNombre()
        {
            return $this->Nombre;
        }

        public function setCorreo($Correo)
        {
            $this->Correo = $Correo;
        }

        public function getCorreo()
        {
            return $this->Correo;
        }

        public function setTelefono($Telefono)
        {
            $this->Telefono = $Telefono;
        }

        public function getTelefono()
        {
            return $this->Telefono;
        }

        public function setGrado($Grado)
        {
            $this->Grado = $Grado;
        }

        public function getGrado()
        {
            return $this->Grado;
        }

        public function setId_carrera($Id_carrera)
        {
            $this->Id_carrera = $Id_carrera;
        }

        public function getId_carrera()
        {
            return $this->Id_carrera;
        }

        public function setId_materia($Id_materia)
        {
            $this->Id_materia = $Id_materia;
        }

        public function getId_materia()
        {
            return $this->Id_materia;
        }

        public function setEstatus($Estatus)
        {
            $this->Estatus = $Estatus;
        }

        public function getEstatus()
        {
            return $this->Estatus;
        }
    }
}
?>
