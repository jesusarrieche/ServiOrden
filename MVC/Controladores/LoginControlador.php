<?php

    class LoginControlador extends Conexion{
        
        public function Login(){
            require_once 'Vistas/Contenidos/Login/Login.php';
        }
        
        public function IniciarSession(){
            if(isset($_POST['usuario']) && isset($_POST['password'])){
                $usuario = $_POST['usuario'];
                $password = parent::Encriptar($_POST['password']) ;
                
                $consulta = parent::Conectar()->prepare("SELECT * FROM usuarios WHERE usuario = '$usuario' AND password = '$password'  AND estatus='ACTIVO'");
                $consulta->execute();
                
                if($consulta->rowCount() >= 1){
                    
                    $consulta2 = parent::ObtenerObjeto("SELECT * FROM usuarios WHERE usuario = '$usuario' AND password = '$password'  AND estatus='ACTIVO'");

                    session_start();

                    $_SESSION['id']= $consulta2->id;                    
                    $_SESSION['usuario'] = $consulta2->usuario;

                    header("location:?controlador=Inicio");
                } else {
                    $alerta = [
                    'alerta' => 'simple',
                    'titulo' => 'Usuario o Contraseña Incorrecta',
                    'texto' => 'Por favor verifique e intente de nuevo',
                    'tipo' => 'error'
                    ];
                    
                    $alerta = parent::Alerta($alerta);
                    
                    require_once 'Vistas/Contenidos/Login/Login.php';
                }
            }
        }
        
        public function CerrarSession(){
            session_start();
            session_destroy();
            header("location:?controlador=Login&accion=Login");
        }
    }
