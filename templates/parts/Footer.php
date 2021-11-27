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

<!-- DataTables JS -->
<!-- <script src="public/dataTables/manage-equipment-datatables.js"></script>
<script src="public/dataTables/manage-personnel-datatables.js"></script>
<script src="public/dataTables/repair-logs-datatables.js"></script>
<script src="public/dataTables/manage-department-datatables.js"></script>
<script src="public/dataTables/archive-datatables.js"></script>
<script src="public/dataTables/special-jobs-datatables.js"></script> -->

<!-- Custom JS -->
<?php if ($_SESSION['menu'] == 2) : ?>
    <script src="public/dataTables/instruments-dt.js"></script>
    <script src="public/dataTables/categories-dt.js"></script>
    <script src="public/custom-js/instruments-tab.js"></script>
    <script src="public/custom-js/categories-tab.js"></script>
<?php endif; ?>

</body>

</html>