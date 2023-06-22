<?php

include_once('../../Managers/GestionType.php');
include_once('../../Managers/GestionProducts.php');



$gestionTypes = new GestionTypes();

// Trouver tous les employés depuis la base de données 
$gestionProducts = new GestionProduct();
$Products = $gestionProducts->RechercherTous();




?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Prime review</title>
  <link rel="icon" href="../assets/vendor/dist/img/OnlyLogo.png" type="image/png">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/vendor/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet"
    href="../assets/vendor/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../assets/vendor/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../assets/vendor/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/vendor/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../assets/vendor/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../assets/vendor/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../assets/vendor/plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">



<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index.php" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
                <img src="../assets/vendor/dist/img/solicodelogo.jfif" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Solicode</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../assets/vendor/dist/img/user.png" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Adnan bennasar</a>
                    </div>
                </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
   
        <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
  
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                products
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>all products</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="ajouter.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>add products</p>
                </a>
              </li>
            </ul>
          </li>

          <!--  -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                category
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../Category/index.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>all categorys</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../Category/ajouterCategory.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>add categorys</p>
                </a>
              </li>
            </ul>
          </li>
             <!--  -->
             <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Types
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../Type/Types.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>all Types</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../Type/ajouterType.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>add Type</p>
                </a>
              </li>
            </ul>
          </li>
         <!--  -->
         <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Affiliate Link
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../affiliateLink/affiliatelinks.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>all Affiliate</p>
                </a>
              </li>
         
            </ul>
          </li>
                   <!--  -->
                   <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Users
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../Users/index.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>all Users</p>
                </a>
              </li>
            </ul>
          </li>


     
        </ul>
      </nav>
      </div>
      <!-- /.sidebar -->
    </aside>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">



      <div class="card card-warning text-center">
        <div class="card-header">
          <h3 class="card-title">these all your products</h3>
        </div>
        <div class="card-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Product image</th>
                <th>Product name</th>
                <th>Brand</th>
                <th>Tag</th>
                <th>Bottom line</th>
                <th>Pros</th>
                <th>cons</th>
                <th>Date added</th>
                <th>Type ID</th>

                <th>others</th>


              </tr>
            </thead>
            <tbody>

              <?php
              foreach ($Products as $Product) {

                $type_Id = $Product->getTypeID();
                $type_Name = $gestionTypes->FetchTypeName($type_Id);
                ?>

                <tr>
                  <td>
                    <img width="100px" class="img-fluid" src="<?= $Product->getImage_URL() ?>" alt="">
                    
                  </td>
                  <td>
                    <?= $Product->getName() ?>
                  </td>          
                  <td>
                    <?= $Product->getBrand() ?>
                  </td>
                  <td>
                    <?= $Product->getTag() ?>
                  </td>
                  <td>
                    <?= $Product->getBottom_Line() ?>
                  </td>
                  <td>
                    <?= $Product->getPROS() ?>
                  </td>
                  <td>
                    <?= $Product->getCONS() ?>
                  </td>

                  <td>
                    <?= $Product->getDate_Added() ?>
                  </td>
                  <td>
                    <?= $type_Name ?>
                  </td>

                  <td>
                    <a href="editer.php?id=<?php echo $Product->getId() ?>" class="btn btn-warning">Éditer</a>
                    <a href="suprimer.php?id=<?php echo $Product->getId() ?>" class="btn btn-danger">Supprime</a>
                    <a href="../affiliateLink/ajouterAffiliate.php?id=<?php echo $Product->getId() ?>"
                      class="btn btn-success">Add affiliate link</a>

                  </td>
                </tr>
              <?php } ?>

            </tbody>
            <tfoot>
              <tr>
                <th>Product image</th>
                <th>Product name</th>
                <th>Brand</th>
                <th>Tag</th>
                <th>Bottom line</th>
                <th>Pros</th>
                <th>cons</th>
                <th>Date added</th>
                <th>Type ID</th>
                <th>others</th>
              </tr>
            </tfoot>
          </table>



        </div>
      </div>






    </div>

<!-- FOOTER -->

<footer class="main-footer">
    <strong>Copyright &copy; 2021-2023 <a href="https://solicode.co/">Solicode.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  </div>

  <script src="../assets/vendor/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="../assets/vendor/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton',$.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="../assets/vendor/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="../assets/vendor/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="../assets/vendor/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="../assets/vendor/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="../assets/vendor/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="../assets/vendor/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="../assets/vendor/plugins/moment/moment.min.js"></script>
  <script src="../assets/vendor/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="../assets/vendor/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="../assets/vendor/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="../assets/vendor/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../assets/vendor/dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="../assets/vendor/dist/js/pages/dashboard.js"></script>
</body>

</html>