<?php

    require_once "ConfigGeneral.php";

    class Conexion{

        //Parametros para a Conexion
        private $driver = "pgsql";
        private $host = "localhost";
        private $dbname = "taller";
        private $user = "postgres";
        private $password = "jd1234";


        public function Conectar(){

                $conexion = new PDO("$this->driver:host=$this->host; dbname=$this->dbname", $this->user, $this->password);
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                return $conexion;
        }

        public function ConsultaSimple($sql){
            try{
                $consulta = Conexion::Conectar()->prepare($sql);
                $consulta->execute();
                return $consulta;
            } catch (Exception $ex) {
                die($ex->getMessage());
            }
        }

        public function Encriptar($cadena){
            $salida=FALSE;
            $password=hash('sha256', CODIGO_PASSWORD); //Genera Valor Cifrado en base a un string
            $vectorInicializacion=substr(hash('sha256', CODIGO_VECTOR), 0, 16);
            $salida=openssl_encrypt($cadena, METODO, $password, 0, $vectorInicializacion);
            $salida=base64_encode($salida);

            return $salida;
        }

        public function Desencriptar($cadena){
            $password=hash('sha256', CODIGO_PASSWORD);
            $vectorInicializacion=substr(hash('sha256', CODIGO_VECTOR), 0, 16);
            $salida=openssl_decrypt(base64_decode($cadena), METODO, $password , 0, $vectorInicializacion);

            return $salida;
        }

        public function LimpiaCadena($cadena){
            $cadena=trim($cadena); //Elimina espacios al inicio y al final de la cadena
            $cadena=stripcslashes($cadena); //Elimina Barras Invertidas de la cadena
            $cadena=str_replace('<script>', '', $cadena);
            $cadena=str_replace('</script>', '', $cadena);
            $cadena=str_replace('<script src', '', $cadena);
            $cadena=str_replace('<script type', '', $cadena);
            $cadena=str_replace('SELECT * FROM', '', $cadena);
            $cadena=str_replace('DELETE FROM', '', $cadena);
            $cadena=str_replace('INSERT INTO', '', $cadena);
            $cadena=str_replace('--', '', $cadena);
            $cadena=str_replace('^', '', $cadena);
            $cadena=str_replace('(', '', $cadena);
            $cadena=str_replace(')', '', $cadena);
            $cadena=str_replace('[', '', $cadena);
            $cadena=str_replace(']', '', $cadena);
            $cadena=str_replace('{', '', $cadena);
            $cadena=str_replace('}', '', $cadena);
            $cadena=str_replace('==', '', $cadena);

            return $cadena;
        }

        public function ObtenerObjeto($sql){
            try{
                $consulta= self::Conectar()->prepare($sql);

                $consulta->execute();
                $objeto = $consulta->fetch(PDO::FETCH_OBJ);

                return $objeto;
            } catch (Exception $ex) {
                die($ex->getMessage());
            }
        }

        public function ObtenerObjetos($sql){
            try{
                $consulta= self::Conectar()->prepare($sql);

                $consulta->execute();
                $objeto = $consulta->fetchAll(PDO::FETCH_OBJ);

                return $objeto;
            } catch (Exception $ex) {
                die($ex->getMessage());
            }
        }

        public function Alerta($alerta){
            if($alerta['alerta']== "simple"){
                   $aviso= "<script>swal('".$alerta['titulo']."','".$alerta['texto']."','".$alerta['tipo']."')</script>";
               }
               return $aviso;
        }

        public function CodigoAleatorio($letra, $logitud, $numero){
            $acum = NULL;
            for($i=0 ; $i<$logitud; $i++){
                $num = rand(0, 9);

                $acum .= $num;
            }

            return $letra.$acum.$numero;
        }

        public function GenerarPDF($html){

        }

    }
