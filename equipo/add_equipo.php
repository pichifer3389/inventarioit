
        <?php
        include '../dbconfig.php';

 if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn-guardar'])) {
    $descripcion=trim($_POST['descripcion']);
    $marca=trim($_POST['marca']); 
    $modelo=trim($_POST['modelo']);
    $numero_inventario=trim($_POST['numero_inventario']); 
    $asignado=$_POST['asignado']; 
    $ip=$_POST['ip'];
    $agencia=$_POST['agencia']; 
    
    
       
    
    $res=mysqli_query($conn,"SELECT * FROM equipo WHERE numero_inventario='$numero_inventario' or ip='$ip'");
	   $row=mysqli_fetch_array($res);
	   $count = mysqli_num_rows($res); 
   
		if( $count != 0) {
			$error = true;
			$error_inventario = "Este número de inventario ya se encuentra registrado";
                        echo "<script languaje='javascript'>alert('Este número de inventario ya se encuentra registrado');"
                    . "location.href = '../oficinas.php';</script>";
                  
		} else{
                    
                     
            $sql="INSERT INTO inventario.equipo (descripcion,marca,modelo,numero_inventario,nombre,ip,agencia) VALUES ('$descripcion','$marca','$modelo',"
                    . "'$numero_inventario','$asignado','$ip','$agencia')";
            
                    $bandera=1;
                if (mysqli_query($conn, $sql)) {
                
                
                echo "<script languaje='javascript'>alert('Registro ingresado correctamente');"
                    . "location.href = '../oficinas.php';</script>";
                
                        } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            }
                   mysqli_close($conn);
    
            
                }   

    
 }
        