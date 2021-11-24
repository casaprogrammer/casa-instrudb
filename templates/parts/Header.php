<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en" style="height: auto;">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" type="image/png" sizes="32x32" href="public/images/favicon.png">
    <title>InstruDB | <?php echo $_SESSION['page_title'] ?></title>

    <!-- Theme style -->
    <link rel="stylesheet" href="vendors/AdminLTE-3.0.5/dist/css/adminlte.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="vendors/AdminLTE-3.0.5/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="vendors/AdminLTE-3.0.5/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Datatables Button -->
    <link rel="stylesheet" href="vendors/Datatables/Buttons-1.6.5/css/buttons.bootstrap.min.css">
    <link rel="stylesheet" href="vendors/Datatables/Buttons-1.6.5/css/buttons.dataTables.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="vendors/AdminLTE-3.0.5/plugins/fontawesome-free/css/all.min.css">
    <!-- Custom css -->
    <link rel="stylesheet" href="public/css/mystyle.css">
    <!-- <link rel="stylesheet" href="public/css/googleFonts.min.css"> -->
</head>

<body class="hold-transition layout-top-nav" style="height: auto; min-height:100%">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="Home.php" class="navbar-brand">
                    <img src="public/images/casa_logo.png" alt="CASA Logo" class="brand-image" style="opacity: .8">
                    <span class="brand-text font-weight-light">InstruDB</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <?php if ($_SESSION['menu'] == 1) : ?>
                        <!-- SEARCH FORM -->
                        <form class="form-inline ml-0 ml-md-3">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search Instrument" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    <?php else : ?>
                        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                            <!-- Left navbar links -->
                            <ul class="navbar-nav">
                                <?php if ($_SESSION['menu'] != 1) : ?>
                                    <li class="nav-item">
                                        <a href="Home.php" class="nav-link">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="InstrumentsDatabase.php" class="nav-link">Instruments</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="Logbook.php" class="nav-link">Logbook</a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
        <!-- /.navbar -->