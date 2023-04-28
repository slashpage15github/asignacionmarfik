<?php
if (class_exists('especiales') != true) {
    class especiales
    {
        #protected $idEspecial;
        protected $matricula;
        protected $cveMateria;
        protected $email;
        protected $telefono;
        protected $estatus;
        protected $grado;
        protected $carrera;
        protected $nombre;

        /**
         * class_especiales constructor.
         * @param $idEspecial
         * @param $matricula
         * @param $cveMateria
         * @param $email
         * @param $telefono
         * @param $estatus
         * @param $grado
         * @param $carrera
         * @param $nombre
         */
        public function __construct($matricula = NULL, $cveMateria = NULL,
                                    $email = NULL, $telefono = NULL, $estatus = NULL, $grado = NULL,
                                    $carrera = NULL, $nombre = NULL)
        {
            #$this->idEspecial = $idEspecial;
            $this->matricula = $matricula;
            $this->cveMateria = $cveMateria;
            $this->email = $email;
            $this->telefono = $telefono;
            $this->estatus = $estatus;
            $this->grado = $grado;
            $this->carrera = $carrera;
            $this->nombre = $nombre;
        }

        /**
         * @return mixed
         */
        // public function getIdEspecial()
        // {
        //     return $this->idEspecial;
        // }

        // /**
        //  * @param mixed $idEspecial
        //  */
        // public function setIdEspecial($idEspecial)
        // {
        //     $this->idEspecial = $idEspecial;
        // }

        /**
         * @return mixed
         */
        public function getMatricula()
        {
            return $this->matricula;
        }

        /**
         * @param mixed $matricula
         */
        public function setMatricula($matricula)
        {
            $this->matricula = $matricula;
        }

        /**
         * @return mixed
         */
        public function getCveMateria()
        {
            return $this->cveMateria;
        }

        /**
         * @param mixed $cveMateria
         */
        public function setCveMateria($cveMateria)
        {
            $this->cveMateria = $cveMateria;
        }

        /**
         * @return mixed
         */
        public function getEmail()
        {
            return $this->email;
        }

        /**
         * @param mixed $email
         */
        public function setEmail($email)
        {
            $this->email = $email;
        }

        /**
         * @return mixed
         */
        public function getTelefono()
        {
            return $this->telefono;
        }

        /**
         * @param mixed $telefono
         */
        public function setTelefono($telefono)
        {
            $this->telefono = $telefono;
        }

        /**
         * @return mixed
         */
        public function getEstatus()
        {
            return $this->estatus;
        }

        /**
         * @param mixed $estatus
         */
        public function setEstatus($estatus)
        {
            $this->estatus = $estatus;
        }

        /**
         * @return mixed
         */
        public function getGrado()
        {
            return $this->grado;
        }

        /**
         * @param mixed $grado
         */
        public function setGrado($grado)
        {
            $this->grado = $grado;
        }

        /**
         * @return mixed
         */
        public function getCarrera()
        {
            return $this->carrera;
        }

        /**
         * @param mixed $carrera
         */
        public function setCarrera($carrera)
        {
            $this->carrera = $carrera;
        }

        /**
         * @return mixed
         */
        public function getNombre()
        {
            return $this->nombre;
        }

        /**
         * @param mixed $nombre
         */
        public function setNombre($nombre)
        {
            $this->nombre = $nombre;
        }
    }
}
