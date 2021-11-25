<?php
session_start();

$_SESSION['menu'] = 2;
$_SESSION['page_title'] = "Instruments Database";

include 'templates/parts/Header.php';
include 'src/Classes/Database.php';
include 'src/Classes/Locations.php';
include 'src/Classes/Categories.php';

$database = new Database();
$locations = new Locations($database->DatabaseConnection());
$categories = new Categories($database->DatabaseConnection());
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-1">
                <div class="col-sm-6">
                    <h1 class="m-0 text-muted" style="font-weight:lighter">Instruments Database</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="card card-success card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active custom-link-color" id="custom-tabs-two-instruments-tab" data-toggle="pill" href="#custom-tabs-two-instruments" role="tab" aria-controls="custom-tabs-two-instruments" aria-selected="true">Instruments</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link custom-link-color" id="custom-tabs-two-categories-tab" data-toggle="pill" href="#custom-tabs-two-categories" role="tab" aria-controls="custom-tabs-two-categories" aria-selected="false">Categories</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link custom-link-color" id="custom-tabs-two-locations-tab" data-toggle="pill" href="#custom-tabs-two-locations" role="tab" aria-controls="custom-tabs-two-locations" aria-selected="false">Locations</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link custom-link-color" id="custom-tabs-two-archive-tab" data-toggle="pill" href="#custom-tabs-two-archive" role="tab" aria-controls="custom-tabs-two-archive" aria-selected="false">Archive</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-two-tabContent">
                                <!--Instruments-->
                                <div class="tab-pane fade show active" id="custom-tabs-two-instruments" role="tabpanel" aria-labelledby="custom-tabs-two-instruments-tab">
                                    <table class="table table-hover dt-responsive table-responsive-sm" style="width:100%;" id="tblInstruments">
                                        <caption>List of Instruments</caption>
                                        <thead class="thead-light" style="white-space:nowrap">
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Tag Name</th>
                                                <th>Brand</th>
                                                <th>Model</th>
                                                <th>Serial #</th>
                                                <th>Type</th>
                                                <th>Location</th>
                                                <th>Category ID</th>
                                                <th>Location ID</th>
                                                <th style="width: 8%;"></th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                                <!--Categories-->
                                <div class="tab-pane fade" id="custom-tabs-two-categories" role="tabpanel" aria-labelledby="custom-tabs-two-categories-tab">
                                    <table class="table table-hover dt-responsive nowrap" style="width:100%;" id="">
                                        <thead style="white-space:nowrap;">
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                                <!--Locations-->
                                <div class="tab-pane fade" id="custom-tabs-two-locations" role="tabpanel" aria-labelledby="custom-tabs-two-locations-tab">
                                    <table class="table table-hover dt-responsive nowrap" style="width:100%;" id="">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                                <!--Archive-->
                                <div class="tab-pane fade" id="custom-tabs-two-archive" role="tabpanel" aria-labelledby="custom-tabs-two-archive-tab">
                                    This is the archive table
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

                <!-- Add New Modal-->
                <section class="content">
                    <div class="modal fade" id="modal-new-instrument" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Add New Instrument</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card card-success">
                                                <div class="card-header">
                                                    <h3 class="card-title">Instrument General Details</h3>

                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                            <i class="fas fa-minus"></i></button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="instrumentName">Name</label>
                                                        <input type="text" id="inputName" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tagName">Tag Name</label>
                                                        <input type="text" id="inputTagName" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="brand">Brand</label>
                                                        <input type="text" id="inputBrand" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="model">Model</label>
                                                        <input type="text" id="inputModel" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="serialNumber">Serial Number</label>
                                                        <input type="text" id="inputSerialNumber" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputStatus">Instrument Type</label>
                                                        <select class="form-control custom-select" id="selectCategory">
                                                            <option value="0" selected="" disabled="">Select one</option>
                                                            <?php foreach ($categories->GetAllCategories() as $category) : ?>
                                                                <option value="<?php echo $category['id']; ?>"><?php echo $category['category_name']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="location">Location</label>
                                                        <select class="form-control custom-select" id="selectLocation">
                                                            <option value="0" selected="" disabled="">Select one</option>
                                                            <?php foreach ($locations->GetLocations() as $location) : ?>
                                                                <option value="<?php echo $location['id']; ?>"><?php echo $location['location_name'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card card-secondary">
                                                <div class="card-header">
                                                    <h3 class="card-title">Parameters</h3>

                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                            <i class="fas fa-minus"></i></button>
                                                    </div>
                                                </div>
                                                <form class="form-horizontal">
                                                    <div class="card-body">
                                                        <div id="divParameters">

                                                        </div>
                                                    </div>
                                                    <!-- /.card-body -->
                                                </form>
                                                <div class="card-footer">
                                                    <button type="button" class="btn btn-success" id="addParameter">
                                                        <i class="fas fa-plus"></i>
                                                        Add Parameter
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                    </div>

                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-success" id="buttonSaveNewInstrument"><i class="fa fa-save"></i> Save</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    </div>
                </section>
                <!-- /.Add New Modal -->

                <!-- Instrument Detail -->
                <section class="content">
                    <div class="modal fade" id="modal-instrument-details" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="detailsTitle"></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Instrument Details Card -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card card-info">
                                                <div class="card-header">
                                                    <h3 class="card-title">Instrument General Details</h3>

                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                            <i class="fas fa-minus"></i></button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="instrumentName">Name</label>
                                                        <input type="text" id="instrumentName" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tagName">Tag Name</label>
                                                        <input type="text" id="instrumentTagName" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="brand">Brand</label>
                                                        <input type="text" id="instrumentBrand" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="model">Model</label>
                                                        <input type="text" id="instrumentModel" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="serialNumber">Serial Number</label>
                                                        <input type="text" id="instrumentSerialNumber" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputStatus">Instrument Type</label>
                                                        <select class="form-control custom-select" id="instrumentCategory">
                                                            <option value="0" selected="" disabled="">Select one</option>
                                                            <?php foreach ($categories->GetAllCategories() as $category) : ?>
                                                                <option value="<?php echo $category['id']; ?>"><?php echo $category['category_name']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="location">Location</label>
                                                        <select class="form-control custom-select" id="instrumentLocation">
                                                            <option value="0" selected="" disabled="">Select one</option>
                                                            <?php foreach ($locations->GetLocations() as $location) : ?>
                                                                <option value="<?php echo $location['id']; ?>"><?php echo $location['location_name'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                    </div>

                                    <!-- Parameters Card -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card card-secondary">
                                                <div class="card-header">
                                                    <h3 class="card-title">Parameters</h3>

                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                            <i class="fas fa-minus"></i></button>
                                                    </div>
                                                </div>
                                                <form class="form-horizontal">
                                                    <div class="card-body">
                                                        <div id="divExistingParameters">

                                                        </div>
                                                    </div>
                                                    <!-- /.card-body -->
                                                </form>
                                                <div class="card-footer">
                                                    <button type="button" class="btn btn-secondary" id="addNewParameter">
                                                        <i class="fas fa-plus"></i>
                                                        Add Parameter
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                    </div>

                                    <!-- Action buttons -->
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <div class="button-group float-right">
                                                <button type="button" class="btn btn-warning btn-sm">
                                                    <i class="fa fa-archive"></i> Archive Instrument
                                                </button>
                                                <button type="button" class="btn btn-success btn-sm">
                                                    <i class="fa fa-file-excel"></i> Export Data
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <input type="text" id="instrumentId" hidden>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <div class="button-group">
                                        <button type="button" class="btn btn-primary" id="buttonUpdateInstrument"><i class="fa fa-save"></i> Save</button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                </section>
                <!-- /. Instrument Detail -->

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php
include 'templates/parts/Footer.php';
