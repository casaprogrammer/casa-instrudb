<?php
$_SESSION['menu'] = 3;
$_SESSION['page_title'] = "Logbook";
include 'templates/parts/Header.php';
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-1">
                <div class="col-sm-6">
                    <h1 class="m-0 text-muted" style="font-weight:lighter">Logbook</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover dt-responsive table-responsive-sm" style="width:100%;" id="tblLogRecords">
                                <thead class="thead-light" style="white-space:nowrap">
                                    <tr>
                                        <th>ID</th>
                                        <th>Instrument</th>
                                        <th>Details</th>
                                        <th>Type</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

                <!-- New Log-->
                <section class="content">
                    <div class="modal fade" id="modal-edit-log" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="modalLogTitle"></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card card-secondary">
                                                <div class="card-header">
                                                    <h3 class="card-title">Log Details</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="logtType">Log Type</label>
                                                        <input type="text" id="logTypeRecorded" class="form-control" placeholder="Enter log type">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="date">Date</label>
                                                        <input type="date" id="dateLogRecorded" class="form-control" placeholder="Enter log type">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Details</label>
                                                        <textarea class="form-control" id="logDetailsRecorded" name="logDetails" rows="5" placeholder="Details ..." spellcheck="false"></textarea>
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <input type="text" id="logId" hidden>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success" id="buttonSaveEditedLog"><i class="fa fa-save"></i> Save</button>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    </div>
                </section>
                <!-- /.New Log Modal -->

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php
include 'templates/parts/Footer.php';
