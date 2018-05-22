<?php
    require 'conexion.php';

    $where = "";

    if(!empty($_POST))
    {
        $valor = $_POST['campo'];
		$valorId = $_POST['id_cliente'];
        if(!empty($valor)){
            $where = " WHERE a.cliente_id = '$valor' or a.nombre LIKE '%$valor%' or a.telefono LIKE '%$valor%' or a.celular LIKE '%$valor%' or a.direccion LIKE '%$valor%' or e.nombre LIKE '%$valor%' ORDER BY a.cliente_id ASC";
        }
		if(!empty($valorId)){
            $where = " WHERE a.cliente_id = '$valorId' ";
        }
    }
    $sql = "select a.cliente_id, a.nombre, a.contacto1, a.contacto2, b.telefono1, b.colonia
            from clientes a
            left join dirs_clientes b on (a.cliente_id = b.cliente_id)$where";
    $resultado = ibase_query($mysqli, $sql) or exit(ibase_errmsg());

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="cssfont/fontello_ed.css">
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="c/fontello.css">
    <title>Callcenter </title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashborad.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark" >
     <img src="../img/operador-del-centro-de-llamadas%20(6).png">
     &nbsp;
      <a class="navbar-brand" href="home.php" style="font-size: 22px;">Callcenter - Home</a>
      <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">

          </li>
          <li class="nav-item">
<a class="nav-link" href="#" data-toggle="modal" data-target="#login">Settings</a>
          </li>
          <li class="nav-item">
<!--            <a class="nav-link" href="#">Profile</a>-->
          </li>
          <li class="nav-item">
<!--            <a class="nav-link" href="#">Help</a>-->
          </li>
        </ul>
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="form-inline mt-2 mt-md-0">
                    <b></b><input type="text" id="campo" name="campo" class="campo" />
                    <input type="submit" id="enviar" name="enviar" value="Buscar" class="btn btn-info"/>
              </form>
              <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="form-inline mt-2 mt-md-0">
                  <input type="text" id="id_cliente" name="id_cliente" class="campo" placeholder="Id..." style="margin-left: 20px;">
                  <input type="submit" id="enviar2" name="enviar2" value="Buscar Id" class="btn btn-info"/>
              </form>
				
      </div>
    </nav>
    <style>
        @media (max-width:1501px){
            #titulo{ font-size: 1.20rem; }
        }
/*Catalogos*/
        @media (max-width:1467px){
            #a1{ font-size: 15px; }

            #choferes{ font-size: 15px; }
            #a3{ font-size: 15px; }
            #a4{ font-size: 15px; }
        }
        @media (max-width:1270px){
            #catalogo{ font-size: 1.20rem; }
        }
/*final*/
        @media (max-width:1327px){
            #titulo{ font-size: 1.15rem; }
        }
    </style>
    <div class="container-fluid">
      <div class="row">
        <nav class="col-sm-3 col-md-1 d-none d-sm-block bg-light sidebar">
          <ul class="nav nav-pills flex-column">
           <h5 class="sub-header" id="titulo"><span class="icon-phone-circled">Call center</h5>
            <li class="nav-item">
              <a class="nav-link" href="home.php">&nbsp;<span class="icon-edit">Seguimiento</a>
            </li>

          </ul>
          <ul class="nav nav-pills flex-column">
                  <h5 class="sub-header"><span class="icon-ver-2"></span>&nbsp;Consultas</h5>
            <li class="nav-item">
              <a class="nav-link" href="FiltroPedidos.php">&nbsp;<span class="icon-edit">Pedidos</a>
            </li>
         </ul>          

          <ul class="nav nav-pills flex-column">
           <h5 class="sub-header" id="catalogo"><span class="icon-server"></span>Catalogos</h5>
            <li class="nav-item">
              <a class="nav-link active" href="clientes.php" id="a1"><span class="icon-user">&nbsp;Clientes <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="choferes.php" id="choferes"><span class="icon-users-1">&nbsp;Choferes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="vehiculos.php" id="a3"><span class="icon-truck">Vehiculos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="colonias.php" id="a4"><span class="icon-road">&nbsp;Colonias</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="zonas.php" id="a4"><span class="icon-map-2">&nbsp;Zonas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="productos_servicios.php" id="a4"><span class="icon-server">&nbsp;Productos y Servicios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ciudades.php"><span class="icon-flag-filled">Ciudad</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="estados.php"><span class="icon-Map_1">&nbsp;Estado</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="paises.php"><span class="icon-globe">&nbsp;Pais</a>
            </li>
          </ul>
  
        </nav>

        <main class="col-sm-9 ml-sm-auto col-md-11 pt-3" role="main">

          <h2>Clientes <a href="nuevo_clientes.php" class="btn btn-info">Nuevo</a> </h2>
          <div class="table-responsive">
            <table class="table table-striped  table-hover">
                    <thead>
                        <tr class="bg-info text-white">
                            <th>Cliente_id</th>
                            <th>Nombre</th>
                            <th>CONTACTO1</th>
                            <th>CONTACTO2</th>
                            <th>telefono1</th>
                            <th>colonia</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php while($row = ibase_fetch_object($resultado)) {

                            ?>

                   <tr>
                       <td><?php echo $row->CLIENTE_ID ?></td>
                       <td><?php echo $row->NOMBRE ?></td>
                       <td><?php echo $row->CONTACTO1 ?></td>
                       <td><?php echo $row->CONTACTO2 ?></td>
                       <td><?php echo $row->TELEFONO1 ?></td>
                       <td><?php echo $row->COLONIA ?></td>
                        <td><a href="modificar_clientes.php?cliente_id=<?php echo $row->CLIENTE_ID ?>"><span class="icon-pencil_1258"></span></a></td>
                        <td><a href="nuevo_cliente.php?cliente_id=<?php echo $row->CLIENTE_ID ?>"><span class="icon-basket"></span></a></td>
                   </tr>
                   <?php } ?>
                    </tbody>

                </table>
            </div>

        <!-- Modal -->
        <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Login</h4>
                    </div>

                    <div class="modal-body"><center>
                        Esta opcion esta para el administrador.
                        <form action="ValidadAdmin.php" method="post">
                        <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Nombre" style="margin-top: 5px;">
                        <input type="password" id="clave" name="clave" class="form-control" placeholder="Contraseña" style="margin-top: 5px;">
                        <input type="submit" name="nuevo" class="btn btn-default" style="margin-top: 5px;">
                        </form>
                    </div></center>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

<!--                        <a class="btn btn-danger btn-ok">Delete</a>-->
                    </div>
                    
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
                    </div>

                    <div class="modal-body">
                        Â¿Desea eliminar este registro?
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-danger btn-ok">Delete</a>
                    </div>
                </div>
            </div>
        </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
        <script>
            $('#confirm-delete').on('show.bs.modal', function(e) {
                $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

                $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
            });
        </script>
  </body>
</html>
