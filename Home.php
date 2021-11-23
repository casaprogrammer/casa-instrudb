<?php
session_start();

$_SESSION['menu'] = 1;
$_SESSION['page_title'] = "Home";
include 'templates/parts/Header.php';

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
        <div class="row mb-4">
                <div class="col-sm-6">
                    <h1 class="m-0 text-muted" style="font-weight:lighter">Dashboard</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <!-- small box -->
                    <div class="small-box bg-gradient-info">
                        <div class="inner">
                            <h3>Instruments Database</h3>
                            </br>
                        </div>
                        <div class="icon">
                            <i class="fas fa-database"></i>
                        </div>
                        <a href="InstrumentsDatabase.php" class="small-box-footer">View Instruments <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- small box -->
                    <div class="small-box bg-gradient-gray">
                        <div class="inner">
                            <h3>Logbook</h3>
                            </br>
                        </div>
                        <div class="icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <a href="Logbook.php" class="small-box-footer">View Logbook <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php
include 'templates/parts/Footer.php';
