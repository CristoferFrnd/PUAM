<?php
    class Conexion{
        private $servidor = "bjz1ow2z07o7esnyhovd-mysql.services.clever-cloud.com";
        private $db = "bjz1ow2z07o7esnyhovd";
        private $puerto = "3306";
        private $charset = "utf8";
        private $usuario = "uvw59fuzhyiqkeos";
        private $contrasena = "2cnjrFii8ZMOdzVWiKmG";
        public $pdo = null;
        private $atributos = [PDO::ATTR_CASE=>PDO::CASE_LOWER,PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION,PDO::ATTR_ORACLE_NULLS=>PDO::NULL_EMPTY_STRING,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ];
        function __construct(){
            $this->pdo = new PDO("mysql:dbname={$this->db};host={$this->servidor};port={$this->puerto};charset={$this->charset}",$this->usuario,$this->contrasena,$this->atributos);
        }
    }
?>