</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="vendors/AdminLTE-3.0.5/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="vendors/AdminLTE-3.0.5/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="vendors/AdminLTE-3.0.5/dist/js/adminlte.min.js"></script>
<!-- DataTables -->
<script src="vendors/AdminLTE-3.0.5/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="vendors/AdminLTE-3.0.5/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="vendors/AdminLTE-3.0.5/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="vendors/AdminLTE-3.0.5/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- DataTables Buttons -->
<script src="vendors/Datatables/Buttons-1.6.5/js/dataTables.buttons.min.js"></script>
<script src="vendors/Datatables/Buttons-1.6.5/js/buttons.bootstrap.min.js"></script>
<script src="vendors/Datatables/Buttons-1.6.5/js/buttons.html5.min.js"></script>
<script src="vendors/Datatables/Buttons-1.6.5/js/buttons.flash.min.js"></script>
<script src="vendors/Datatables/Buttons-1.6.5/js/buttons.print.min.js"></script>
<script src="vendors/Datatables/JSZip-2.5.0/jszip.min.js"></script>

<!-- Sweetalert2 -->
<script src="vendors/AdminLTE-3.0.5/plugins/sweetalert2/sweetalert2.all.min.js"></script>


<!-- Custom JS -->
<?php if ($_SESSION['menu'] == 2) : ?>
    <!-- DataTable -->
    <script src="public/dataTables/instruments-dt.js"></script>
    <script src="public/dataTables/categories-dt.js"></script>
    <script src="public/dataTables/locations-dt.js"></script>
    <script src="public/dataTables/archive-dt.js"></script>

    <!-- Custom Scripts -->
    <script src="public/custom-js/categories-tab.js"></script>
    <script src="public/custom-js/locations-tab.js"></script>
    <script src="public/custom-js/archive-tab.js"></script>
<?php elseif ($_SESSION['menu'] == 3) : ?>
    <script src="public/dataTables/logbook-dt.js"></script>
    <script src="public/custom-js/logbook-page.js"></script>
<?php endif; ?>

<script src="public/custom-js/instruments-tab.js"></script>

</body>

</html>