<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Menu</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="index.php" class="navbar-brand">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Academia</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid col-lg-9">
        
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->
<div id="modalModifica" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="formulario_precios" action="index.php" method="post">
      <div class="modal-header">
        <h5 class="modal-title">Establece un cambio de precios</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="NombreClave">Por Nombre o palabra clave</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <input type="checkbox" id="check_nombre" onchange="habilitar_nombre(this.checked);" aria-label="Checkbox for following text input">
                </div>
              </div>
              <input id="nombre_clave" disabled name="nombre_clave" method="post" type="text" placeholder="Nombre o Palabra clave" class="form-control" aria-label="Text input with checkbox">
            </div>
            </div>
            <div class="form-group">
              <label for="inputTipo">Por Tipo de producto</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <input type="checkbox" id="check_tipo" onchange="habilitar_select(this.checked);" aria-label="Checkbox for following text input">
                  </div>
                </div>
                <select method="post" name="select_tipo" disabled id="inputTipo" class="form-control col-6">
                  <option value="NULL" selected>Seleccionar...</option>
                  <option value="0">Todos los productos</option>
                  <?php
                    require('database/conexion.php');
                    $sql="SELECT idCategoria, Descripcion FROM Categoria";
                    $query=mysqli_query($conexion,$sql) ;
                    while($valores=mysqli_fetch_assoc($query))
                    {
                      echo '<option value="'.$valores['idCategoria'].'">'.utf8_encode($valores['Descripcion']).'</option>';
                    }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="NombreClave">Variacion del precio</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <select method="post" name="select_signo" disabled id="select_signo" class="form-control" style="border-top-right-radius:0px; border-bottom-right-radius:0px;">
                    <option selected value="1">+</option>
                    <option value="-1">-</option>
                  </select>
                </div>
                <input method="post" name="variacion_precio" disabled id="variacion_precio" type="number" required class="form-control col-2" aria-label="Amount (to the nearest dollar)">
                <div class="input-group-append">
                  <span class="input-group-text">%</span>
                </div>
              </div>
              </div>
              <div id="div_tabla" style="display:none;">
              <label for="tabla_precios_mod">Productos afectados</label>
                <table id="tabla_precios_mod" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombre del Producto </th>
                    <th>Tipo</th>
                    <th>Precio Actual</th>
                    <th>Nuevo Precio</th>
                  </tr>
                  </thead>
                  <tbody id="tabla_afectados">

                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Nombre del Producto </th>
                      <th>Tipo</th>
                      <th>Precio Actual</th>
                      <th>Nuevo Precio</th>
                    </tr>
                  </tfoot>
                  </table>
                </div>
              </div>
      <div class="modal-footer" style="justify-content:flex-start;">
        <button disabled id="acepta_precio" method="post" name="acepta_precio" type="submit" class="btn btn-primary">Aceptar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
      </form>
      </div>
    </div>
  </div>
<div class="modal" id="modalCreaProducto" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" action="index.php">
      <div class="modal-header">
        <h5 class="modal-title">Crea un Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputname">Nombre</label>
              <input placeholder="Nombre" name="inputname" required method="POST" type="text" class="form-control" id="inputname">
            </div>
            <div class="form-group col-md-6">
              <label for="inputPrecio">Precio</label>
              <input placeholder="Precio" name="inputPrecio" required method="POST" type="number" step="any" class="form-control" id="inputPrecio">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputCategoria">Tipo</label>
              <select name="inputCategoria" required method="post" id="inputCategoria" class="form-control">
                <option selected>Seleccionar...</option>
                <?php
                  require('database/conexion.php');
                  $sql="SELECT idCategoria, Descripcion FROM Categoria";
                  $query=mysqli_query($conexion,$sql) ;
                  while($valores=mysqli_fetch_assoc($query))
                  {
                    echo '<option value="'.$valores['idCategoria'].'">'.utf8_encode($valores['Descripcion']).'</option>';
                  }
                ?>
              </select>
            </div>
            <div class="col-auto" style="margin-top:2rem;">
              <button data-toggle="modal" data-target="#modalCreaTipo" title="Agrega un tipo personalizado" type="button" class="btn btn-primary"><i class="fas fa-plus"></i></button>
            </div>
          </div>
      </div>
      <div class="modal-footer" style="justify-content:flex-start;">
        <button type="submit" class="btn btn-primary">Aceptar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
      </form>
    </div>
  </div>
</div>
<div class="modal" id="modalCreaTipo" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" action="index.php">
      <div class="modal-header">
        <h5 class="modal-title">Crea un nuevo tipo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          <div class="form-group">
            <label for="NombreTipo">Nombre</label>
            <input type="text" name="NombreTipo" method="POST" class="form-control" id="NombreTipo">
          </div>
        </div>
      <div class="modal-footer" style="justify-content:flex-start;">
        <button type="submit" class="btn btn-primary">Aceptar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
      </form>
      </div>
    </div>
  </div>

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/jquery-tabledit-1.2.3/jquery.tabledit.min.js" charset="utf-8"></script>
<!-- Bootstrap 4 -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="scripts/funciones.js" charset="utf-8"></script>
</body>
</html>
<?php
require('database/conexion.php');
require('database/funcs.php');
if (isset($_POST['inputname']) && isset($_POST['inputPrecio']) && $_POST['inputCategoria']!=NULL)
{
  $conexion->set_charset('utf8');
  $nombre=$conexion->real_escape_string($_POST['inputname']);
  $precio=$conexion->real_escape_string($_POST['inputPrecio']);
  $id_tipo=$conexion->real_escape_string($_POST['inputCategoria']);
  if (isNull($nombre) || ExisteNombre($nombre) || is_numeric($nombre))
  {
    if (ExisteNombre($nombre))
    {
      echo'<script type="text/javascript">
        alert("El nombre:'.$nombre.' ya esta existe");
      </script>';
      echo'<script type="text/javascript">
        setTimeout(function(){location.href="index.php"},1000);
      </script>';
    }
    else
    {
      if (isNull($nombre))
      {
        echo'<script type="text/javascript">
          alert("No puede ingresar un campo vacio");
        </script>';
        echo'<script type="text/javascript">
          setTimeout(function(){location.href="index.php"},1000);
        </script>';
      }
      else
      {
        if (is_numeric($nombre))
        {
          echo'<script type="text/javascript">
            alert("No puede ingresar un nombre completamente numerico");
          </script>';
          echo'<script type="text/javascript">
            setTimeout(function(){location.href="index.php"},1000);
          </script>';
        }
      }
    }
  }
  else
  {
    $registro=RegistraProducto($nombre, $precio, $id_tipo);
    if($registro>0)
    {
      echo'<script type="text/javascript">
        alert("Producto registrado exitosamente");
      </script>';
      echo'<script type="text/javascript">
        setTimeout(function(){location.href="index.php"},1000);
      </script>';
      $registro=0;
    }
    else
    {
      echo'<script type="text/javascript">
        alert("Error al registrar");
      </script>';
      echo'<script type="text/javascript">
        setTimeout(function(){location.href="index.php"},1000);
      </script>';
    }
  }
}
if (isset($_POST['NombreTipo']))
{
  $conexion->set_charset('utf8');
  $nombre_tipo=$conexion->real_escape_string($_POST['NombreTipo']);
  echo $nombre_tipo;
  if (isNull($nombre_tipo))
  {
    echo'<script type="text/javascript">
      alert("No puede ingresar un campo vacio");
    </script>';
    echo'<script type="text/javascript">
      setTimeout(function(){location.href="index.php"},1000);
    </script>';
  }
  else
  {
    $registro=RegistraTipo($nombre_tipo);
    if($registro>0)
    {
      echo'<script type="text/javascript">
        alert("Tipo registrado exitosamente");
      </script>';
      echo'<script type="text/javascript">
        setTimeout(function(){location.href="index.php"},1000);
      </script>';
      $registro=0;
    }
    else
    {
      echo'<script type="text/javascript">
        alert("Error al registrar");
      </script>';
      echo'<script type="text/javascript">
        setTimeout(function(){location.href="index.php"},1000);
      </script>';
    }
  }
}
if (isset($_POST['select_signo']))
{
  $signo=$_POST['select_signo'];
}
if (isset($_POST['variacion_precio']))
{
    $variacion=$conexion->real_escape_string($_POST['variacion_precio']);
    unset($_POST['variacion_precio']);
}
else
{
  $variacion=0;
}
if (is_numeric($variacion))
{
    $variacion=$variacion/100;
}
if (isset($_POST['nombre_clave']) && !isset($_POST['select_tipo']))
{
  $palabra_clave=$conexion->real_escape_string($_POST['nombre_clave']);
  unset($_POST['nombre_clave']);
  $sql="UPDATE Producto
  SET precio=(precio+((precio*'$variacion')*'$signo'))
  WHERE Descripcion LIKE '%$palabra_clave%' ";
  mysqli_query($conexion,$sql)or die("database error:". mysqli_error($conexion));
  echo'<script type="text/javascript">
    alert("Precios modificados exitosamente");
  </script>';
  echo'<script type="text/javascript">
    setTimeout(function(){location.href="index.php"},1000);
  </script>';
}
else
{
  if (isset($_POST['select_tipo']) && !isset($_POST['nombre_clave']))
  {
    $id_tipo=$_POST['select_tipo'];
    unset($_POST['select_tipo']);
    if ($id_tipo==0)
    {
      $sql="UPDATE Producto
      SET precio=(precio+((precio*'$variacion')*'$signo'))";
      mysqli_query($conexion,$sql) or die("database error:". mysqli_error($conexion));
      echo'<script type="text/javascript">
        alert("Precios modificados exitosamente");
      </script>';
      echo'<script type="text/javascript">
        setTimeout(function(){location.href="index.php"},1000);
      </script>';
    }
    else
    {
      $sql="UPDATE Producto
      JOIN Categoria
      ON Categoria.idCategoria=Producto.idCategoria
      SET precio=(precio+((precio*'$variacion')*'$signo'))
      WHERE Categoria.idCategoria='$id_tipo'";
      mysqli_query($conexion,$sql)or die("database error:". mysqli_error($conexion));
      echo'<script type="text/javascript">
        alert("Precios modificados exitosamente");
      </script>';
      echo'<script type="text/javascript">
        setTimeout(function(){location.href="index.php"},1000);
      </script>';
    }
  }
  else
  {
    if (isset($_POST['nombre_clave']) && isset($_POST['select_tipo']))
    {
      $id_tipo=$_POST['select_tipo'];
      $palabra_clave=$_POST['nombre_clave'];
      unset($_POST['nombre_clave']);
      unset($_POST['select_tipo']);
      $sql="UPDATE Producto
      JOIN Categoria
      ON Categoria.idCategoria=Producto.idCategoria
      SET precio=(precio+((precio*'$variacion')*'$signo'))
      WHERE Categoria.idCategoria='$id_tipo' AND Producto.Descripcion LIKE '%$palabra_clave%'";
      mysqli_query($conexion,$sql) or die("database error:". mysqli_error($conexion));
      echo'<script type="text/javascript">
        alert("Precios modificados exitosamente");
      </script>';
      echo'<script type="text/javascript">
        setTimeout(function(){location.href="index.php"},1000);
      </script>';
    }
  }
}
?>
