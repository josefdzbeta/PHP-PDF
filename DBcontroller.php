<?php

    //Procedimientos php
    class DBController {
        
        //Datos del servidor 
        private $host = "localhost";
        private $user = "2DAWJoseAngel";
        private $password = "hola1234";
        private $database = "Alumnos";
        
        public $conn;
        
         
        function __construct() {
            $this->conn = $this->connectDB();
            if(!empty($this->conn)) {
                $this->selectDB();
            }
        }
        //conectamos con el servidor
        function connectDB() {
            $conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
            return $conn;
        }
        //seleccionamos la base de datos
        function selectDB() {
            mysqli_select_db($this->conn, $this->database);
        }
        //Ejecutamos la consulta
        function runQuery($query) {
            $result = mysqli_query($this->conn, $query);
            while($row=mysqli_fetch_assoc($result)) {
                $resultset[] = $row;
            }
            if(!empty($resultset))
                return $resultset;
        }
        //Comprobamos la consulta
        function numRows($query) {
            $result  = mysqli_query($this->conn, $query);
            $rowcount = mysqli_num_rows($result);
            return $rowcount;
        }
    }
?>
