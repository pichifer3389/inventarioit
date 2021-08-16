<?php 
session_start();

date_default_timezone_set('America/Tegucigalpa');

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
   exit;
}
 require '../dbconfig.php';
$error=false;



 if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn-actualizar'])) {
    $secuencial_equipo=$_POST['id'];
     $descripcion_m=$_POST['descripcion'];
     $numero_inventario_m=$_POST['numero_inventario'];
     $fecha_compra=$_POST['fecha_compra'];
     $codigo_modelo=$_POST['codigo_modelo'];
    
    
    
            $sql="UPDATE inventario_it.tipo_equipo SET descripcion='$descripcion_m', numeroinventario='$numero_inventario_m',fechacompra='$fecha_compra',codigomodelo='$codigo_modelo' where SECUENCIAL='$secuencial_equipo'";
                if (mysqli_query($conn, $sql)) {
                
                
                    echo "<script languaje='javascript'>alert('El equipo $descripcion_m se actualizo correctamente');"
                    . "location.href = 'tipo_equipo.php';</script>";
                        } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            }
                   mysqli_close($conn);
    
            
                }   
 
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inventario IT</title>
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<link href="../css/font-awesome.css" rel="stylesheet" type="text/css" />
<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="../css/animate.css" rel="stylesheet" type="text/css" />
<link href="../css/admin.css" rel="stylesheet" type="text/css" />
<link href="../plugins/toggle-switch/toggles.css" rel="stylesheet" type="text/css" />
<link href="../plugins/checkbox/icheck.css" rel="stylesheet" type="text/css" />
<link href="../plugins/checkbox/minimal/blue.css" rel="stylesheet" type="text/css" />
<link href="../plugins/checkbox/minimal/green.css" rel="stylesheet" type="text/css" />
<link href="../plugins/checkbox/minimal/grey.css" rel="stylesheet" type="text/css" />
<link href="../plugins/checkbox/minimal/orange.css" rel="stylesheet" type="text/css" />
<link href="../plugins/checkbox/minimal/pink.css" rel="stylesheet" type="text/css" />
<link href="../plugins/checkbox/minimal/purple.css" rel="stylesheet" type="text/css" />
<link href="../plugins/bootstrap-fileupload/bootstrap-fileupload.min.css" rel="stylesheet">
<link href="../plugins/dropzone/dropzone.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../plugins/bootstrap-datepicker/css/datepicker.css" />
<link rel="stylesheet" type="text/css" href="../plugins/bootstrap-timepicker/compiled/timepicker.css" />
<link rel="stylesheet" type="text/css" href="../plugins/bootstrap-colorpicker/css/colorpicker.css" />
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
            <li> <a href="../perfil.php"><i class="fa fa-user"></i> Perfil</a> </li>
            <li> <a href="../cambiar_contraseña.php"><i class="fa fa-cog"></i> Contraseña</a></li>
            <li> <a href="../logout.php"><i class="fa fa-power-off"></i> Salir</a> </li>
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
          
                      
          <li class="left_nav_active theme_border" > <a href="javascript:void(0);"> <i class="fa fa-edit"></i> Equipo<span class="plus"><i class="fa fa-plus"></i></span></a>
            <ul class="opened" style="display:block">
                <li> <a href="marcas.php"> <span>&nbsp;</span> <i class="fa fa-circle "></i> <b >Marcas</b> </a> </li>
                <li> <a href="tipo_equipo.php"> <span>&nbsp;</span> <i class="fa fa-circle theme_color"></i> <b class="theme_color">Tipo</b> </a> </li>
                <li> <a href="modelos.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b >Modelo</b> </a> </li>
               <li> <a href="estado.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b >Estado</b> </a> </li>
                <li> <a href="prestamo_equipo.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b >Préstamos de equipo</b> </a> </li>
                
                
             
            </ul>
          </li>
          
          <li> <a href="javascript:void(0);"> <i class="fa fa-users icon"></i>Usuarios <span class="plus"><i class="fa fa-plus"></i></span> </a>
            <ul>
                
                <li> <a href="../usuarios/mantenimiento.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Mantenimiento</b> </a> </li>
              
              
            </ul>
          </li>
            
            <li> <a href="javascript:void(0);"> <i class="fa fa-archive icon"></i>Oficina <span class="plus"><i class="fa fa-plus"></i></span> </a>
            <ul>
                <li> <a href="../oficina/agencias.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Agencias</b> </a> </li>
                <li> <a href="../oficina/departamentos.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Departamentos</b> </a> </li>
                <li> <a href="../oficina/puestos.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Puestos</b> </a> </li>
              
              
              
            </ul>
          </li>
          
             <li> <a href="javascript:void(0);"> <i class="fa fa-user icon"></i>Empleados <span class="plus"><i class="fa fa-plus"></i></span> </a>
            <ul>
                <li> <a href="../empleados/empleados.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Administrar</b> </a> </li>
                         
              
              
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
              <li><a href="../index.php">Inicio</a></li>
            <li><a href="#">Equipo</a></li>
            <li class="active">Tipo</li>
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
              <h3 class="content-header">Modificar tipos de equipo</h3>
            </div>
         <div class="porlets-content">
             
            
             
          <div class="adv-table editable-table ">
             
                          <div class="clearfix">
                              <form role="form" method="post" class="row"> 
                                           
                                              <?php 
                                $codigo_equipo = $_GET['id'];

 

                                        $sql = "SELECT TE.*,M.NOMBRE AS NOMBREMODELO, MA.NOMBRE AS NOMBREMARCA, E.ESTADO FROM tipo_equipo te
                                                INNER JOIN MODELO M ON te.codigomodelo=m.secuencial
                                                INNER JOIN MARCA MA ON M.CODIGOMARCA=MA.SECUENCIAL
                                                INNER JOIN ESTADO E ON E.SECUENCIAL=TE.CODIGOESTADOMODELO where te.SECUENCIAL='$codigo_equipo'";
                                        $query = $conn->query($sql);

                                            $row = $query->fetch_assoc();
                                            $codigo_tipo_equipo=$row['SECUENCIAL'];
                                             $descripcion_tipo_equipo= $row['DESCRIPCION'];
                                             $numero_inventario_equipo=$row['NUMEROINVENTARIO'];
                                             $fecha_compra=$row['FECHACOMPRA'];
                                             
                                             ?>
                                                    
                                                    
                                                
                                                
                                                    
                                                     <div class="form-group col-md-6" style="margin-bottom: 35px" hidden="hidden"  >
                                                    <label>Id:</label>
                                                    <input type="text" name="id"   class="form-control" value="<?= $codigo_tipo_equipo?>" style="text-transform:uppercase;" required>
                                                    
                                                    </div>
                                                 
                                                
                                                
                                                 <div class="form-group col-md-6" style="margin-bottom: 35px"  >
                                                    <label>Descripción:</label>
                                                    <input type="text" name="descripcion"  class="form-control" value="<?= $descripcion_tipo_equipo?>" style="text-transform:uppercase;" required>
                                                    
                                                    </div>
                                  
                                                    <div class="form-group col-md-6" style="margin-bottom: 35px"  >
                                                    <label># Inventario:</label>
                                                    <input type="text" name="numero_inventario"  class="form-control" value="<?= $numero_inventario_equipo?>" style="text-transform:uppercase;" required>
                                                    
                                                    </div>
                                  
                                                    <div class="form-group col-md-6" style="margin-bottom: 35px"  >
                                                    <label>Fecha compra:</label>
                                                    <input type="date" name="fecha_compra"  class="form-control" value="<?= $fecha_compra?>"  required>
                                                    
                                                    </div>
                                  
                                                    <div class="form-group col-md-6" style="margin-bottom: 35px"  >
                                                    <label>Modelo:</label>
                                                    <select name="codigo_modelo" class="form-control" required>
                                                        <option value="">Seleccionar Modelo</option>

                                                        <?php  $sql1 = "SELECT m.secuencial AS SECUENCIAL,m.nombre AS NOMBRE ,m.codigomarca AS CODIGOMARCA,mc.nombre AS NOMBREMARCA FROM inventario_it.modelo m
                                                                        INNER JOIN inventario_it.marca mc on m.codigomarca=mc.secuencial";
                                                            $query1 = $conn->query($sql1);

                                                            while($row = $query1->fetch_assoc()){
                                                             ?>

                                                        <option value="<?= $row['SECUENCIAL']?>"><?= $row['NOMBREMARCA']?> <?= $row['NOMBRE']?> </option>

                                                            <?php }?>

                                                    </select>
                                                    
                                                    </div>
                                                       
                                           
                                                 
                                                 <div class="col-lg-12 controls" text-align center>
                                      <button id="btn-actualizar" name="btn-actualizar" class="btn  btn-primary btn-lg " type="submit" name="btn-actualizar">Actualizar <i class="fa fa-refresh"></i></button>
                                      <a id="btn-cancelar" class="btn btn-danger btn-lg " href="tipo_equipo.php" name="btn-cancelar">Cancelar <i class="fa fa-times"></i></a>		
										
                                    </div>
                                                        
                                                      
                                                </form> 
                            
                          </div>
                          <div class="margin-top-10"></div>
                        
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
   



     









  














   



<script src="../js/jquery.sparkline.js"></script>
<script src="../js/sparkline-chart.js"></script>
<script src="../js/graph.js"></script>
<script src="../js/edit-graph.js"></script>
<script src="../plugins/kalendar/kalendar.js" type="text/javascript"></script>
<script src="../plugins/kalendar/edit-kalendar.js" type="text/javascript"></script>

<script src="../plugins/sparkline/jquery.sparkline.js" type="text/javascript"></script>
<script src="../plugins/sparkline/jquery.customSelect.min.js" ></script> 
<script src="../plugins/sparkline/sparkline-chart.js"></script> 
<script src="../plugins/sparkline/easy-pie-chart.js"></script>
<script src="../plugins/morris/morris.min.js" type="text/javascript"></script> 
<script src="../plugins/morris/raphael-min.js" type="text/javascript"></script>  
<script src="../plugins/morris/morris-script.js"></script> 





<script src="../plugins/demo-slider/demo-slider.js"></script>
<script src="../plugins/knob/jquery.knob.min.js"></script> 




<script src="../js/jPushMenu.js"></script> 
<script src="../js/side-chats.js"></script>
<script src="../js/jquery.slimscroll.min.js"></script>
<script src="../plugins/scroll/jquery.nanoscroller.js"></script>

<script src="../js/jquery-2.1.0.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/common-script.js"></script>
<script src="../js/jquery.slimscroll.min.js"></script>
<script src="../plugins/data-tables/jquery.dataTables.js"></script>
<script src="../plugins/data-tables/DT_bootstrap.js"></script>
<script src="../plugins/data-tables/dynamic_table_init.js"></script>
<script src="../plugins/edit-table/edit-table.js"></script>

 <script>
          jQuery(document).ready(function() {
              EditableTable.init();
          });
 </script>
<script>
            $(document).ready(function() {
                $('#editable-sample').DataTable({
                        responsive: true
                });
            });
        </script>
 <script src="../js/jPushMenu.js"></script> 
<script src="../js/side-chats.js"></script>

</body>
</html>


