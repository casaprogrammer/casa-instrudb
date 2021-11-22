<?php
$_SESSION['menu'] = 2;
$_SESSION['page_title'] = "Instruments Database";
include 'templates/parts/Header.php';
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-4">
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
                <div class="col-lg-2">
                    <div class="main-sidebar">
                        <nav class="mt-2">
                            <ul class="nav nav-pills nav-sidebar flex-column" role="menu">
                                <li class="nav-header">Quick Menu</li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link custom-link-color" id="instruments-link">
                                        <i class="fas fa-database nav-icon"></i>
                                        <p>Instruments</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link custom-link-color" id="categories-link">
                                        <i class="fas fa-clipboard-list nav-icon"></i>
                                        <p>Categories</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link custom-link-color" id="locations-link">
                                        <i class="fas fa-compass nav-icon"></i>
                                        <p>Locations</p>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>


                <div class="col-lg-10">
                    <!-- INSTRUMENTS DIV -->
                    <div class="card" id="instruments-div">
                        <div class="card-header border-0">
                            <h3 class="card-title">Instruments</h3>
                            <div class="card-tools">
                                <button class="btn btn-tool btn-sm" data-toggle="modal" data-target="#modal-new-instrument"><i class="fas fa-plus"></i> Add New Instrument</button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-hover dt-responsive nowrap" style="width:100%;" id="tblInstruments">
                                <thead style="white-space:nowrap">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Tag Name</th>
                                        <th>Brand</th>
                                        <th>Model</th>
                                        <th>Serial #</th>
                                        <th>Location</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Exhaust Steam Flow Transmitter</td>
                                        <td>INS-1234</td>
                                        <td>Yokogawa</td>
                                        <td>EJX-430A</td>
                                        <td>N/A</td>
                                        <td>Boiler</td>
                                        <td style="width: 12%;">
                                            <button class="btn btn-block btn-xs btn-secondary"><i class="fas fa-search"></i> More</button>
                                            <button class="btn btn-block btn-xs btn-info"><i class="fas fa-history"></i> History</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Shredder Steam Flow Transmitter</td>
                                        <td>INS-6789</td>
                                        <td>Yokogawa</td>
                                        <td>EJX-110A</td>
                                        <td>N/A</td>
                                        <td>Shredder</td>
                                        <td style="width: 12%;">
                                            <button class="btn btn-block btn-xs btn-secondary"><i class="fas fa-search"></i> More</button>
                                            <button class="btn btn-block btn-xs btn-info"><i class="fas fa-history"></i> History</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>A-Molasses Flowmeter</td>
                                        <td>INS-4142</td>
                                        <td>Siemens Sitran FM magflo</td>
                                        <td>7ME631-4PC13-1AA0-Z+Y17</td>
                                        <td>7ME631 244736T 236</td>
                                        <td>Process House</td>
                                        <td style="width: 12%;">
                                            <button class="btn btn-block btn-xs btn-secondary"><i class="fas fa-search"></i> More</button>
                                            <button class="btn btn-block btn-xs btn-info"><i class="fas fa-history"></i> History</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /. INSTRUMENTS DIV -->

                    <!-- CATEGORIES DIV -->
                    <div class="card" id="categories-div" hidden>
                        <div class="card-header border-0">
                            <h3 class="card-title">Instrument Categories</h3>
                            <div class="card-tools">
                                <button class="btn btn-tool btn-sm"><i class="fas fa-plus"></i> Add New Category</button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-hover dt-responsive nowrap" style="width:100%;" id="tblInstruments">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Transmitter</td>
                                        <td style="width: 12%;">
                                            <button class="btn btn-block btn-xs btn-secondary"><i class="fas fa-search"></i> More</button>
                                            <button class="btn btn-block btn-xs btn-secondary"><i class="fas fa-edit"></i> Update</button>
                                            <button class="btn btn-block btn-xs btn-info"><i class="fas fa-history"></i> History</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Flowmeter</td>
                                        <td style="width: 12%;">
                                            <button class="btn btn-block btn-xs btn-secondary"><i class="fas fa-search"></i> More</button>
                                            <button class="btn btn-block btn-xs btn-secondary"><i class="fas fa-edit"></i> Update</button>
                                            <button class="btn btn-block btn-xs btn-info"><i class="fas fa-history"></i> History</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /. CATEGORIES DIV -->

                    <!-- LOCATIONS DIV -->
                    <div class="card" id="locations-div" hidden>
                        <div class="card-header border-0">
                            <h3 class="card-title">Instrument Locations</h3>
                            <div class="card-tools">
                                <button class="btn btn-tool btn-sm"><i class="fas fa-plus"></i> Add New Location</button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-hover dt-responsive nowrap" style="width:100%;" id="tblInstruments">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Boiler</td>
                                        <td style="width: 12%;">
                                            <button class="btn btn-block btn-xs btn-secondary"><i class="fas fa-edit"></i> Update</button>
                                            <button class="btn btn-block btn-xs btn-info"><i class="fas fa-history"></i> History</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Mills</td>
                                        <td style="width: 12%;">
                                            <button class="btn btn-block btn-xs btn-secondary"><i class="fas fa-edit"></i> Update</button>
                                            <button class="btn btn-block btn-xs btn-info"><i class="fas fa-history"></i> History</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /. LOCATIONS DIV -->
                </div>

                <!-- Modals-->
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
                                                        <label for="inputName">Name</label>
                                                        <input type="text" id="inputName" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputDescription">Brand</label>
                                                        <input type="text" id="inputName" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputClientCompany">Model</label>
                                                        <input type="text" id="inputClientCompany" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputProjectLeader">Serial Number</label>
                                                        <input type="text" id="inputProjectLeader" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputStatus">Location</label>
                                                        <select class="form-control custom-select">
                                                            <option selected="" disabled="">Select one</option>
                                                            <option>Boiler</option>
                                                            <option>Mills</option>
                                                            <option>Powerhouse</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputStatus">Instrument Category</label>
                                                        <select class="form-control custom-select">
                                                            <option selected="" disabled="">Select one</option>
                                                            <option>Transmitter</option>
                                                            <option>Flowmeter</option>
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
                                        <button type="button" class="btn btn-success">Save</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->

                </section>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php
include 'templates/parts/Footer.php';
