<?php session_start();
  // Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 require_once 'dbconfig.php';

 
    $id_equipo_e=$_GET['id'];
  
    
 
    
   
            $sql="DELETE FROM inventario.equipo WHERE id_equipo = '$id_equipo_e';";
    
   
if (mysqli_query($conn, $sql)) {
      echo "Candidato eliminado correctamente";
      header('location:administracion.php');
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>

