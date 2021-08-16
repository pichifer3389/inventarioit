<?php 




include 'header.php';
 
?>



  <div class="inner">
    <!--\\\\\\\ inner start \\\\\\--><div class="left_nav">

      <!--\\\\\\\left_nav start \\\\\\-->
      <div class="search_bar"> <i class="fa fa-search"></i>
        <input name="" type="text" class="search" placeholder="Buscar" />
      </div>
      <div class="left_nav_slidebar">
        <ul>
          
          <li class="left_nav_active theme_border"> <a href="javascript:void(0);"> <i class="fa fa-edit"></i> Equipo <span class="left_nav_pointer"></span> <span class="plus"><i class="fa fa-plus"></i></span></a>
            <ul class="opened" style="display:block">
             <li> <a href="administracion.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b class="theme_color">Administración</b> </a> </li>
             
            </ul>
          </li>
          
          <li> <a href="javascript:void(0);"> <i class="fa fa-users icon"></i>Usuarios <span class="plus"><i class="fa fa-plus"></i></span> </a>
            <ul>
              <li> <a href="administrar_usuarios.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Mantenimiento</b> </a> </li>
              
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
              <li><a href="administracion.php">Inicio</a></li>
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
             <?php if(isset($GLOBALS[$error_inventario])) { ?>
			        <div role="alert" class="alert  alert-danger  text-center">
						<?php 
							if(isset($GLOBALS[$error_inventario])) { echo $GLOBALS[$error_inventario]; }  
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
                                  <th>ID</th>
                                  <th>Descripción</th>
                                  <th>Marca</th>
                                  <th>Modelo</th>
                                  <th>No. Inventario</th>
                                  <th>Asignado a</th>
                                  <th>IP</th>
                                  <th>Agencia</th>
                                  <th>Editar</th>
                                  <th>Eliminar</th>
                              </tr>
                              </thead>
                              <tbody>
                                  
                              <tr class="">
                                  <?php
                     
                    $sql = "SELECT * FROM equipo";
                    $query = $conn->query($sql);
                    
              
                     
                    while($row = $query->fetch_assoc()){
                      ?>
                                      
                                                    
                                                    
                                                    
                                  <td><?= $row['id_equipo'];?></td>
                                  <td><?= $row['descripcion'];?></td>
                                  <td><?= $row['marca'];?></td>
                                  <td><?= $row['modelo'];?></td>
                                  <td><?= $row['numero_inventario'];?></td>
                                  <td><?= $row['nombre'];?></td>
                                  <td><?= $row['ip'];?></td>
                                  <td><?= $row['agencia'];?></td>
                                                                  
                                  <td><a class="btn btn-info" href="modificar_equipo.php?id=<?= $row['id_equipo'] ?>" >Editar</a></td>
                                  <td><a class="btn btn-danger" onclick="return confirm('Desea eliminar el registro?')" href="eliminar_equipo.php?id=<?= $row['id_equipo'] ?>">Eliminar</a></td>
                              </tr>
                                         <?php  }
                                                  
                     ?> 
                          
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
          <form method="post" action="./equipo/add_equipo.php" id="Q_A">
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

<?php include 'footer.php'; ?>





  














   





