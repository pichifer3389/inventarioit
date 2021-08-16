<?php session_start();
  // Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 require_once 'dbconfig.php';

 
    $id_usuario_e=$_GET['id'];
  
    
 
    
   
            $sql="DELETE FROM inventario.usuarios WHERE id_usuarios = '$id_usuario_e';";
    
   
if (mysqli_query($conn, $sql)) {
      echo "Candidato eliminado correctamente";
      header('location:administrar_usuarios.php');
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>

