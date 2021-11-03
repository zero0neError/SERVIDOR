<?php

    Class Alumno{
        
        private $nombre;
        private $primerApellido;
        private $segundoApellido;
        private $dni;
        private $fechaNacimiento;
        private $correoElectronico;
        private $url;

        function __construct($n,$p,$s,$d,$f,$c,$u){

            setNombre($n);
            setPrimerApellido($p);
            setSegundoApellido($s);
            setDni($d);
            setFechaNacimiento($f);
            setCorreoElectronico($c);
            setUrl($u);
        }

        function __destruct();

        //SETTERS AND GETTERS






        public function setNombre($n){

            this->nombre = $n; 
        }

        public function setPrimerApellido($p){

            this->primerApellido = $p; 
        }

        public function setSegundoApellido($s){

            this->segundoApellido = $s; 
        }

        public function setDni($d){

            if(validaDni($d)){

                this->dni = $d;
            }
        }
        public function setFechaNacimiento($f){

            this->fechaNacimiento = $f; 
        }

        public function setCorreoElectronico($c){

            this->correoElectronico = $c; 
        }

        public function setUrl($u){

            this->url = $u; 
        }

        public function getNombre($n){

            return this->nombre; 
        }

        public function getPrimerApellido($p){

            return this->primerApellido; 
        }

        public function getSegundoApellido($s){

            return this->segundoApellido; 
        }

        public function getDni($d){

            return this->dni;

        }
        public function getFechaNacimiento($f){

            return this->fechaNacimiento; 
        }

        public function getCorreoElectronico($c){

            return this->correoElectronico; 
        }

        public function getUrl($u){

            return this->url; 
        }

        public function __get($p){if(property_exists($this,$p)return this->$p;)}

        public function __set($p,$v){if(property_exists($this,$p)return this->$p = $v;)}
        //METODOS FUNCIONALES DE ALUMNO


        public function muestra(){

            return this->dni." - ".this->nombre.", ".this->primerApellido." ".this->segundoApellido
        }

        public function getNombreCompleto(){

            return this->nombre.", ".this->primerApellido." ".this->segundoApellido;
        }

        private function validaDni($dni){

            $letraDni = substr($dni,-1);
            $indexLetra =substr($dni,0,-1)%23;
            $letrasValidas="TRWAGMYFPDXBNJZSQVHLCKE";
        
            return $letrasValidas[$indexLetra]==$letraDni;
            
        }
    }
?>