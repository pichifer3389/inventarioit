<?php session_start();
  // Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
}
 require_once '../dbconfig.php';

 
    $secuencial_departamento=$_GET['id'];
  
    
 
    
   
            $sql="DELETE FROM inventario_it.departamento WHERE SECUENCIAL = '$secuencial_departamento';";
    
   
if (mysqli_query($conn, $sql)) {
      echo "<script languaje='javascript'>alert('Departamento eliminado correctamente');"
                    . "location.href = 'departamentos.php';</script>";
} else {
      //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    echo "<script languaje='javascript'>alert('El departamento no se puede eliminar porque tiene vinculos con otros registors!');"
                    . "location.href = 'departamentos.php';</script>";
}
mysqli_close($conn);


