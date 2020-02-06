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
          <br>
          <div class="card" id="menu" >
            <div class="card-header">
              <label style="margin-left:30rem;">Menu</label>
            </div>
            <div class="card-body">
              <label style="margin-left:30rem;">Catedras</label>
              <button id="registra_catedra" type="button" class="btn btn-primary btn-lg btn-block">Registrar Catedra</button>
              <button id="ver_cat" type="button" class="btn btn-primary btn-lg btn-block">Aministrar Catedras</button>
              <hr>
              <label style="margin-left:30rem;">Alumnos</label>
              <button id="reg_al" type="button" class="btn btn-primary btn-lg btn-block">Registrar Alumno</button>
              <button id="ver_al" type="button" class="btn btn-primary btn-lg btn-block">Administrar Alumnos</button>
            </div>
          </div>
          <div id="catedra_registro" style="margin-left:auto;margin-right:auto; display:none;" class="card col-8">
            <div class="card-header">
              Registrar Catedra
            </div>
            <form id="formulario_catedra" action="index.php" method="post">
              <div class="card-body">
                <div class="form-row">
                  <div class="form-group">
                    <label>Nombre Catedra</label>
                    <input name="nombre_catedra" type="text" placeholder="Nombre Catedra" class="form-control" id="validationCustom01" required>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group">
                    <label for="validationCustom04">Profesor</label>
                    <select name="select_profesor" class="custom-select" id="select_profesor" required>
                      <option selected value="">Selecciona...</option>
                      <?php
                      $archivo = @fopen("txt\profesores.txt","r");
                      while (($bufer = fgets($archivo, 4096)) !== false)
                      {
                        $profesor=explode(" " ,$bufer);
                        echo '<option  value='.$profesor["0"].' '.$profesor["1"].'>'.$profesor["0"].' '.$profesor["1"].'</option>';
                      }
                      if (!feof($archivo))
                      {
                        echo "Error: fallo inesperado de fgets()\n";
                      }
                      fclose($archivo);
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-row">
                  <button style="margin-right:1rem;" type="submit" class="btn btn-primary">Aceptar</button>
                  <button id="registro_cat_volver" class="btn btn-secondary">Volver</button>
                </div>
              </div>
            </form>
          </div>
          <div id="ver_catedras" style="display:none;" class="card shadow">
            <div class="card-header">
              Catedras
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Titular</th>
                      <th>Detalles</th>
                      <th>Operaciones</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nombre</th>
                      <th>Titular</th>
                      <th>Alumnos</th>
                      <th>Operaciones</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    $archivo = @fopen("txt\catedras.txt","r");
                    while (($bufer = fgets($archivo, 4096)) !== false)
                    {
                      $catedra=explode("/" ,$bufer);
                      echo"<tr>";
                      echo "<td>".$catedra["0"]."</td>";
                      echo "<td>".$catedra["1"]."</td>";
                      echo'<td><button type="button" class="btn btn-link">Ver Alumnos Inscriptos</button></td>';
                      echo'<td><button data-toggle="modal" data-target="#modal_inscripcion" class="btn btn-primary" type="button">
                      <i class="fas fa-edit"></i>
                      Inscribir</button></td>
                      </tr>';
                    }
                    if (!feof($archivo))
                    {
                      echo "Error: fallo inesperado de fgets()\n";
                    }
                    fclose($archivo);
                    ?>
                  </tbody>
                </table>
              </div>
              <div class="form-row">
                <button data-toggle="modal" data-target="#modal_inscripcion" class="btn btn-primary" type="button">
                <i class="fas fa-edit"></i>
                Inscribir</button>
                <button id="ver_cat_volver" type="submit" class="btn btn-secondary">Volver</button>
              </div>
            </div>
          </div>
          <div id="ver_alumnos" style="display:none;" class="card shadow">
            <div class="card-header">
              Alumnos
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nombre y Apellido</th>
                      <th>DNI</th>
                      <th>Legajo</th>
                      <th>Operaciones</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nombre y Apellido</th>
                      <th>DNI</th>
                      <th>Legajo</th>
                      <th>Operaciones</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    $archivo = @fopen("txt\alumnos.txt","r");
                    while (($bufer = fgets($archivo, 4096)) !== false)
                    {
                      $alumno=explode(" " ,$bufer);
                      echo"<tr>";
                      echo "<td>".$alumno["0"]." ".$alumno["1"];"</td>";
                      echo "<td>".$alumno["2"]."</td>";
                      echo "<td>".$alumno["3"]."</td>";
                      echo'<td><button class="btn btn-primary" type="button">
                      <i class="fas fa-edit"></i>
                      </button>
                      <button class="btn btn-primary" type="button">
                      <i class="fas fa-trash"></i>
                      </button></td>
                      </tr>';
                    }
                    if (!feof($archivo))
                    {
                      echo "Error: fallo inesperado de fgets()\n";
                    }
                    fclose($archivo);
                    ?>
                  </tbody>
                </table>
              </div>
              <div class="form-row">
                <button id="ver_alum_volver" type="submit" class="btn btn-secondary">Volver</button>
              </div>
            </div>
          </div>
          <div id="alumno_registro" style="margin-left:auto;margin-right:auto; display:none;" class="card col-8">
            <div class="card-header">
              Registrar Alumno
            </div>
            <form action="index.php" method="post">
              <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-6">
                    <label>Nombre</label>
                    <input name="nombre_alumno" placeholder="Nombre" type="text" class="form-control">
                  </div>
                  <div class="form-group col-6">
                    <label>Apellido</label>
                    <input name="apellido_alumno" placeholder="Apellido" type="text" class="form-control">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-6">
                    <label>Legajo</label>
                    <input name="legajo_alumno" placeholder="Legajo" type="text" class="form-control">
                  </div>
                  <div class="form-group col-6">
                    <label>DNI</label>
                    <input name="dni_alumno" placeholder="DNI" type="text" class="form-control">
                  </div>
                </div>
                <div class="form-row">
                  <button name="acepta_alumno" style="margin-right:1rem;" type="submit" class="btn btn-primary">Aceptar</button>
                  <button id="registro_alu_volver" type="submit" class="btn btn-secondary">Volver</button>
                </div>
              </div>
            </form>
          </div>
          <div class="modal fade" id="modal_inscripcion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <form action="index.php" method="post">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Inscribir Alumno</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="form-row">
                    <div class="form-group">
                      <label for="validationCustom04">Catedra</label>
                      <select name="catedra_inscripcion" class="custom-select" id="select_profesor" required>
                        <option selected value="">Selecciona...</option>
                        <?php
                        $archivo = @fopen("txt\catedras.txt","r");
                        while (($bufer = fgets($archivo, 4096)) !== false)
                        {
                          $catedra=explode(" " ,$bufer);
                          echo '<option  value='.$catedra["0"].' '.$catedra["1"].' '.$catedra["2"].' '.$catedra["3"].'>'.$catedra["0"].' '.$catedra["1"].' '.$catedra["2"].' '.$catedra["3"].'</option>';
                        }
                        if (!feof($archivo))
                        {
                          echo "Error: fallo inesperado de fgets()\n";
                        }
                        fclose($archivo);
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group">
                      <label for="validationCustom04">Selecciona Alumno</label>
                      <select name="inscribe_alumno" class="custom-select" id="select_profesor" required>
                        <option selected value="">Selecciona...</option>
                        <?php
                        $archivo = @fopen("txt\alumnos.txt","r");
                        while (($bufer = fgets($archivo, 4096)) !== false)
                        {
                          $alumno=explode(" " ,$bufer);
                          echo '<option  value='.$alumno["0"].' '.$alumno["1"].'>'.$alumno["0"].' '.$alumno["1"].'</option>';
                        }
                        if (!feof($archivo))
                        {
                          echo "Error: fallo inesperado de fgets()\n";
                        }
                        fclose($archivo);
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Inscribir</button>
                </div>
              </div>
            </div>
          </form>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

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
  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="plugins/jquery-tabledit-1.2.3/jquery.tabledit.min.js" charset="utf-8"></script>
  <script src="funcs\funciones.js" charset="utf-8"></script>
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
require('lib/init.php');
if (isset($_POST['nombre_alumno']) && isset($_POST['apellido_alumno']) && isset($_POST['legajo_alumno']) && isset($_POST['dni_alumno']))
{
  $nombre_alumno=$_POST['nombre_alumno'];
  $apellido_alumno=$_POST['apellido_alumno'];
  $legajo_alumno=$_POST['legajo_alumno'];
  $dni_alumno=$_POST['dni_alumno'];
  $alumno=new Alumno($nombre_alumno,$apellido_alumno,$legajo_alumno,$dni_alumno);
  $data=$alumno->getNombre()." ".$alumno->getApellido()." ".$alumno->getLegajo()." ".$alumno->getDni();
  $registro=fopen("txt\alumnos.txt","a");
  fwrite($registro,$data.PHP_EOL);
  fclose($registro);
  echo'<script type="text/javascript">
  alert("Alumno registrado exitosamente");
  </script>';
  echo'<script type="text/javascript">
  setTimeout(function(){location.href="index.php"},1000);
  </script>';
}
?>
<?php
require('lib/init.php');
if(isset($_POST['nombre_catedra']) && isset($_POST['select_profesor']))
{
  $nombre_catedra=$_POST['nombre_catedra'];
  $nombre_profesor=$_POST['select_profesor'];
  $catedra=new catedra($nombre_catedra,$nombre_profesor);
  $data=$catedra->getNombre()."/".$catedra->getProfesor();
  $registro=fopen("txt\catedras.txt","a");
  fwrite($registro,$data.PHP_EOL);
  fclose($registro);
  echo'<script type="text/javascript">
  alert("Catedra registrada exitosamente");
  </script>';
  echo'<script type="text/javascript">
  setTimeout(function(){location.href="index.php"},1000);
  </script>';
}
?>
<?php
if (isset($_POST['inscribe_alumno']))
{
  $nombre_alumno=$_POST['inscribe_alumno'];
  $registro=fopen("txt\alumnos_catedra.txt","a");
  fwrite($registro,$data.PHP_EOL);
  fclose($registro);
  echo'<script type="text/javascript">
  alert("Catedra registrada exitosamente");
  </script>';
  echo'<script type="text/javascript">
  setTimeout(function(){location.href="index.php"},1000);
  </script>';
}
?>
