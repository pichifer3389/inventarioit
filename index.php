<?php 
session_start();
$bandera=0;
date_default_timezone_set('America/Tegucigalpa');

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
   exit;
}
 require 'dbconfig.php';
$error=false;



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
			$error_inventario = "Este número de inventario y/o ip ya se encuentra registrado";
                        $bandera=0;
                  
		} else{
                    
                     
            $sql="INSERT INTO inventario.equipo (descripcion,marca,modelo,numero_inventario,nombre,ip,agencia) VALUES ('$descripcion','$marca','$modelo',"
                    . "'$numero_inventario','$asignado','$ip','$agencia')";
            
                    $bandera=1;
                if (mysqli_query($conn, $sql)) {
                
                //header('location:administracion.php');
                echo "<script languaje='javascript'>alert('Registro ingresado correctamente');"
                    . "location.href = 'administracion.php';</script>";
                
                        } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            }
                   mysqli_close($conn);
    
            
                }   

    
 }
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inventario IT</title>
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/animate.css" rel="stylesheet" type="text/css" />
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<link href="plugins/toggle-switch/toggles.css" rel="stylesheet" type="text/css" />
<link href="plugins/checkbox/icheck.css" rel="stylesheet" type="text/css" />
<link href="plugins/checkbox/minimal/blue.css" rel="stylesheet" type="text/css" />
<link href="plugins/checkbox/minimal/green.css" rel="stylesheet" type="text/css" />
<link href="plugins/checkbox/minimal/grey.css" rel="stylesheet" type="text/css" />
<link href="plugins/checkbox/minimal/orange.css" rel="stylesheet" type="text/css" />
<link href="plugins/checkbox/minimal/pink.css" rel="stylesheet" type="text/css" />
<link href="plugins/checkbox/minimal/purple.css" rel="stylesheet" type="text/css" />
<link href="plugins/bootstrap-fileupload/bootstrap-fileupload.min.css" rel="stylesheet">
<link href="plugins/dropzone/dropzone.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="plugins/bootstrap-datepicker/css/datepicker.css" />
<link rel="stylesheet" type="text/css" href="plugins/bootstrap-timepicker/compiled/timepicker.css" />
<link rel="stylesheet" type="text/css" href="plugins/bootstrap-colorpicker/css/colorpicker.css" />
</head>
<body class="light_theme  fixed_header left_nav_fixed">
<div class="wrapper">
  <!--\\\\\\\ wrapper Start \\\\\\-->
  <div class="header_bar">
    <!--\\\\\\\ header Start \\\\\\-->
    <div class="brand">
      <!--\\\\\\\ brand Start \\\\\\-->
      <div class="logo" style="display:block"><span class="theme_color">Inventario</span> IT</div>
      <div class="small_logo" style="display:none"><img src="images/s-logo.png" width="50" height="47" alt="s-logo" /> <img src="images/r-logo.png" width="122" height="20" alt="r-logo" /></div>
    </div>
    <!--\\\\\\\ brand end \\\\\\-->
    <div class="header_top_bar">
      <!--\\\\\\\ header top bar start \\\\\\-->
      <a href="javascript:void(0);" class="menutoggle"> <i class="fa fa-bars"></i> </a>
      <div class="top_left">
        <div class="top_left_menu">
            <ul>
          
            </ul>
        </div>
      </div>
      <!--\<a href="javascript:void(0);" class="add_user" data-toggle="modal" data-target="#myModal"> <i class="fa fa-plus-square"></i> <span> New Task</span> </a>\-->
      <div class="top_right_bar">
        <div class="top_right">
          <div class="top_right_menu">
            <ul>
              
              
             
            </ul>
          </div>
        </div>
        <div class="user_admin dropdown"> <a href="javascript:void(0);" data-toggle="dropdown"><?php echo $_SESSION['nombre']; ?><span class="user_adminname"></span> <b class="caret"></b> </a>
          <ul class="dropdown-menu">
            <div class="top_pointer"></div>
            <li> <a href="perfil.php"><i class="fa fa-user"></i> Perfil</a> </li>
            <li> <a href="cambiar_contraseña.php"><i class="fa fa-cog"></i> Contraseña</a></li>
            <li> <a href="logout.php"><i class="fa fa-power-off"></i> Salir</a> </li>
          </ul>
        </div>

        <!--\<a href="javascript:;" class="toggle-menu menu-right push-body jPushMenuBtn rightbar-switch"><i class="fa fa-comment chat"></i></a>\-->
        
      </div>
    </div>
    <!--\\\\\\\ header top bar end \\\\\\-->
  </div>
  <!--\\\\\\\ header end \\\\\\-->
  <div class="inner">
    <!--\\\\\\\ inner start \\\\\\--><div class="left_nav">

      <!--\\\\\\\left_nav start \\\\\\-->
      
      
      <div class="left_nav_slidebar">
          
        <ul>
          
                      
          <li > <a href="javascript:void(0);"> <i class="fa fa-edit"></i> Equipo  <span class="plus"><i class="fa fa-plus"></i></span></a>
            <ul >
                <li> <a href="./equipo/marcas.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b >Marcas</b> </a> </li>
                <li> <a href="./equipo/tipo_equipo.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b >Tipo</b> </a> </li>
                <li> <a href="./equipo/modelos.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b >Modelo</b> </a> </li>
                <li> <a href="./equipo/estado.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b >Estado</b> </a> </li>
                <li> <a href="./equipo/prestamo.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b >Préstamos de equipo</b> </a> </li>
                
                
             
            </ul>
          </li>
          
          <li> <a href="javascript:void(0);"> <i class="fa fa-users icon"></i>Usuarios <span class="plus"><i class="fa fa-plus"></i></span> </a>
            <ul>
              
                <li> <a href="./usuarios/mantenimiento.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Mantenimiento</b> </a> </li>
              
              
            </ul>
          </li>
            
            <li> <a href="javascript:void(0);"> <i class="fa fa-archive icon"></i>Oficina <span class="plus"><i class="fa fa-plus"></i></span> </a>
            <ul>
                <li> <a href="./oficina/agencias.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Agencias</b> </a> </li>
              <li> <a href="./oficina/departamentos.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Departamentos</b> </a> </li>
              <li> <a href="./oficina/puestos.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Puestos</b> </a> </li>
              
              
              
            </ul>
          </li>
          
             <li> <a href="javascript:void(0);"> <i class="fa fa-user icon"></i>Empleados <span class="plus"><i class="fa fa-plus"></i></span> </a>
            <ul>
                <li> <a href="./empleados/empleados.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Administrar</b> </a> </li>
                         
              
              
            </ul>
          </li>
          
          
          
        </ul>
          
          
          
      </div>
    </div>
    <!--\\\\\\\left_nav end \\\\\\-->
    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>Vision Fund HN</h1>
          
        </div>
        <div class="pull-right">
          <ol class="breadcrumb">
              <li><a href="index.php">Inicio</a></li>
            <li><a href="#">Equipo</a></li>
            <li class="active">Administración</li>
          </ol>
        </div>
      </div>
      <div class="container clear_both padding_fix">
        <!--\\\\\\\ container  start \\\\\\-->
    
        
        <div class="row">
        <div class="col-md-12">
               
          <div class="block-web">
            <div class="header">
              <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a> <a class="refresh" href="#"><i class="fa fa-repeat"></i></a> <a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
              <h3 class="content-header">Información de equipos</h3>
            </div>
         <div class="porlets-content">
             <?php if(isset($error_inventario)) { ?>
			        <div role="alert" class="alert  alert-danger  text-center">
						<?php 
							if(isset($error_inventario)) { echo $error_inventario; }  
													?>
					</div>
                        <?php }                            
                            ?> 
            
             
             
          <div class="adv-table editable-table ">
             
                          <div class="clearfix">
                              <div class="btn-group">
                                  <a  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"">
                                      Agregar <i class="fa fa-plus"></i>
                                  </a>
                              </div>
                              <div class="btn-group pull-right">
                                  <button class="btn dropdown-toggle" data-toggle="dropdown">Herramientas <i class="fa fa-angle-down"></i>
                                  </button>
                                  <ul class="dropdown-menu pull-right">
                                      <li><a href="administracion_pdf.php">Guardar como PDF</a></li>
                                      <li><a href="administracion_excel">Exportar a Excel</a></li>
                                  </ul>
                              </div>
                          </div>
                          <div class="margin-top-10"></div>
                          <table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                                  <th>Código</th>
                                  <th>Nombre</th>
                                  <th>Editar</th>
                                  <th>Eliminar</th>
                              </tr>
                              </thead>
                              <tbody>
                                  
                              <tr class="">
                                  
                                      
                                                    
                                                    
                                                    
                                  <td></td>
                                  <td></td>
                                  
                                  
                                  
                                                                  
                                  <td><a class="btn btn-info" href="modificar_equipo.php?id=<?= $row['id_equipo'] ?>" >Editar</a></td>
                                  <td><a class="btn btn-danger" onclick="return confirm('Desea eliminar el registro?')" href="eliminar_equipo.php?id=<?= $row['id_equipo'] ?>">Eliminar</a></td>
                              </tr>
                                         
                                                  
                    
                          
                              </tbody>
                          </table>
                      </div>
 
            </div><!--/porlets-content-->  
          </div><!--/block-web--> 
        </div><!--/col-md-12--> 
      </div><!--/row-->
        
        
     
        
 
        
      </div>
      <!--\\\\\\\ container  end \\\\\\-->
    </div>
    <!--\\\\\\\ content panel end \\\\\\-->
  </div>
  <!--\\\\\\\ inner end\\\\\\-->
</div>
<!--\\\\\\\ wrapper end\\\\\\-->
<!-- Modal -->
   
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar</h5>
        
      </div>
      <div class="modal-body">
          <form method="post" action="" id="Q_A">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Descripción:</label>
             <input type="text" name="descripcion" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Marca:</label>
             <input type="text" name="marca" class="form-control" required>
          </div>  
              
              <div class="form-group">
            <label for="recipient-name" class="col-form-label">Modelo:</label>
             <input type="text" name="modelo" class="form-control" required>
          </div>
              
          <div class="form-group">
           <label for="recipient-name" class="col-form-label">No. Inventario:</label>
             <input type="text" name="numero_inventario" class="form-control" required>
          </div>
              
           <div class="form-group">
           <label for="recipient-name" class="col-form-label">Asignado a:</label>
             <input type="text" name="asignado" class="form-control" required>
          </div> 
              
              <div class="form-group">
           <label for="recipient-name" class="col-form-label">IP:</label>
             <input type="text" name="ip" class="form-control" required>
          </div>
              
              <div class="form-group">
           <label for="recipient-name" class="col-form-label">Agencia:</label>
             <input type="text" name="agencia" class="form-control" required>
          </div>
      
              <button type="submit" name="btn-guardar" class="btn btn-primary" >Guardar</button>
           <button type="button" id="mod_cls" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        
        </form>
      </div>
      
    </div>
  </div>
</div>


     

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Compose New Task</h4>
      </div>
      <div class="modal-body"> content </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>







  














   



<script src="js/jquery.sparkline.js"></script>
<script src="js/sparkline-chart.js"></script>
<script src="js/graph.js"></script>
<script src="js/edit-graph.js"></script>
<script src="plugins/kalendar/kalendar.js" type="text/javascript"></script>
<script src="plugins/kalendar/edit-kalendar.js" type="text/javascript"></script>

<script src="plugins/sparkline/jquery.sparkline.js" type="text/javascript"></script>
<script src="plugins/sparkline/jquery.customSelect.min.js" ></script> 
<script src="plugins/sparkline/sparkline-chart.js"></script> 
<script src="plugins/sparkline/easy-pie-chart.js"></script>
<script src="plugins/morris/morris.min.js" type="text/javascript"></script> 
<script src="plugins/morris/raphael-min.js" type="text/javascript"></script>  
<script src="plugins/morris/morris-script.js"></script> 





<script src="plugins/demo-slider/demo-slider.js"></script>
<script src="plugins/knob/jquery.knob.min.js"></script> 




<script src="js/jPushMenu.js"></script> 
<script src="js/side-chats.js"></script>
<script src="js/jquery.slimscroll.min.js"></script>
<script src="plugins/scroll/jquery.nanoscroller.js"></script>

<script src="js/jquery-2.1.0.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/common-script.js"></script>
<script src="js/jquery.slimscroll.min.js"></script>
<script src="plugins/data-tables/jquery.dataTables.js"></script>
<script src="plugins/data-tables/DT_bootstrap.js"></script>
<script src="plugins/data-tables/dynamic_table_init.js"></script>
<script src="plugins/edit-table/edit-table.js"></script>

 <script>
          jQuery(document).ready(function() {
              EditableTable.init();
          });
 </script>
 <script src="js/jPushMenu.js"></script> 
<script src="js/side-chats.js"></script>

</body>
</html>

