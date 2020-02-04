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
          <div class="card" style="display:none;">
            <div class="card-header">
              <label style="margin-left:30rem;">Menu</label>
            </div>
            <div class="card-body">
              <label style="margin-left:30rem;">Catedras</label>
              <button type="button" class="btn btn-primary btn-lg btn-block">Registrar Catedra</button>
              <button type="button" class="btn btn-primary btn-lg btn-block">Ver Catedras</button>
              <hr>
              <label style="margin-left:30rem;">Alumnos</label>
              <button type="button" class="btn btn-primary btn-lg btn-block">Registrar Alumno</button>
              <button type="button" class="btn btn-primary btn-lg btn-block">Ver Alumnos</button>
            </div>
          </div>
          <div class="card col-8">
            <div class="card-header">
              Registrar Catedra
            </div>
            <div class="card-body">
              <div class="form-row">
                <div class="col-6">
                  <label for="validationCustom01">Nombre Catedra</label>
                  <input type="text" placeholder="Nombre Catedra" class="form-control" id="validationCustom01" required>
                </div>
              </div>
              <hr>
              <div class="form-row">
                <div class="form-group col-6">
                  <label for="validationCustom04">Nombre e ID Profesor</label>
                  <select class="custom-select" id="validationCustom04" required>
                    <option selected value="">Selecciona...</option>
                    <option>1-Gonzalo Recoulat</option>
                    <option>2-Agustin Rosales</option>
                    <option>3-Lautaro Cresut</option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputEmail4">DNI</label>
                  <input disabled placeholder="-" type="text" class="form-control">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-6">
                  <label for="inputEmail4">Legajo</label>
                  <input disabled placeholder="-" type="text" class="form-control">
                </div>
                <div class="form-group col-6">
                  <label for="inputEmail4">Cuit</label>
                  <input disabled placeholder="-" type="text" class="form-control">
                </div>
              </div>
              <hr>
              <div class="form-row">
                <div class="form-group">
                  <label>Alumnos inscriptos</label>
                </div>
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>#ID</th>
                        <th>Nombre y Apellido</th>
                        <th>DNI</th>
                        <th>Legajo</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>#ID</th>
                        <th>Nombre y Apellido</th>
                        <th>DNI</th>
                        <th>Legajo</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <tr>
                        <td>-</td>
                        <td> <select class="custom-select">
                          <option selected >Añadir alumno</option>
                          <option>1-Producto1</option>
                          <option>2-Producto2</option>
                          <option>3-Producto3</option>
                        </select>
                        </td>
                        <td>-</td>
                        <td>-</td>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>Agustin Rosales</td>
                        <td>34.555.567</td>
                        <td>13.456</td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Lautaro Cresut</td>
                        <td>34.345.423</td>
                        <td>13.434</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="form-row">
                <button type="submit" class="btn btn-primary">Aceptar</button>
              </div>
            </div>
          </div>
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
