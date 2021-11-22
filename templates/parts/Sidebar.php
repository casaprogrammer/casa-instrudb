<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-1">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="<?php $_SERVER['DOCUMENT_ROOT'] . '/InstrumentsLogbook' ?>" class="nav-link <?php echo ($_SESSION['menu'] == 1) ? 'active bg-success' : '' ?>">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link <?php echo ($_SESSION['menu'] == 2) ? 'active bg-success' : '' ?>">
                        <i class="nav-icon fas fa-database"></i>
                        <p>Instruments Database</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link <?php echo ($_SESSION['menu'] == 3) ? 'active bg-success' : '' ?>">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Logbook</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>