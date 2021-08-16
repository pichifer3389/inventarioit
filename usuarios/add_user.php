<?php session_start();
date_default_timezone_set('America/Tegucigalpa');
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
   exit;
   
}
 require_once 'dbconfig.php';
$error=false;


   
    
    
 if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn-guardar'])) {
    $usuario=trim($_POST['usuario']);
    $pass=trim($_POST['password']); 
    $nombre=trim($_POST['nombre']);
    $rol=$_POST['rol']; 
    
    
    
       
    
    $res=mysqli_query($conn,"SELECT * FROM inventario_it.usuario WHERE usuario='$usuario' or nombre='$nombre'");
	   $row=mysqli_fetch_array($res);
	   $count = mysqli_num_rows($res); 
   
		if( $count != 0) {
			$error = true;
			$error_usuario = "Este usuario ya existe";
                 
		} else{
                    
            $password = hash('sha256', $pass);
            $sql="INSERT INTO inventario.usuarios (usuario, password,nombre,rol) VALUES ('$usuario','$password','$nombre','$rol')";  
            
                if (mysqli_query($conn, $sql)) {
                
                
                //header('location:administrar_usuarios.php');
                echo "<script languaje='javascript'>alert('Registro ingresado correctamente');"
                    . "location.href = 'administrar_usuarios.php';</script>";
                        } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            }
                   mysqli_close($conn);
    
            
                }   

    
 }
 
     

