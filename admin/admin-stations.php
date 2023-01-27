<?php require_once 'assets/php/admin-header.php'; ?>

<head>
    <link rel="stylesheet" href="assets/css/station.css">
</head>
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="admin-dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Police Station Management</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div class="stationButtons">
            <a href="#" class="create-police-station">Create Police Station</a>
            <a href="#" class="add-users">Create Station Users</a>
            <a href="#" class="assign-pincodes">Assign Pincodes</a>
        </div>
        <br><br>

        <div class="row" style="display:none" id="addPoliceStations">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            Add New Police Station
                            <h4 />
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <form action="#" id="stnForm">
                                <div class="form-group">
                                    <select name="state" class="form-control" id="state" required>
                                        <option value="" selected disabled>Select State</option>
                                    </select> <br>
                                    <select name="district" class="form-control" id="district" required>
                                        <option value="" selected disabled>Select District</option>
                                    </select>
                                </div>
                                <label for="name">Alias</label>
                                <input type="text" id="name" name="name" required>
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" required>
                                <label for="phone">Phone</label>
                                <input type="tel" id="phone" name="phone" required>
                                <input type="submit" name="add-Stn-Btn" id="addStnBtn" value="Create Police Station">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Register Form Wrapper -->

        <div class="row" style="display:none" id="addUsersForm">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            Assign Users to Police Stations
                            <h4 />
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" id="addUsers">
                            <form action="#" id="UserAddForm">
                                
                                <input type="submit" name="add-Stn-Btn" id="addStnBtn" value="Create User">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- /Register Main Wrapper -->
        <!-- Assign Pincode to Stations -->
        <div class="row" style="display:none" id="assignNewPincode">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            Assign Pincodes to Police Stations
                            <h4 />
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" id="assignPincode">
                            <form id="pincode-form">
                                <label for="police-station">Select police station:</label>
                                <select id="policeStations" name="policeStations">
                                    <option value="" selected disabled>Select Police Station</option>
                                </select>
                                <br>
                                <label for="pincode-list">Select pincodes:</label>
                                <div id="pincode-list">
                                    <select name="pincodes" id="pincodes" multiple></select>
                                    <!-- more checkboxes -->
                                </div>
                                <br>
                                <input type="submit" value="Submit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <!-- /Assign Pincode to Stations -->
        <div id="back" style="display: none;">
            <a href="#">Go Back</a>
        </div>
    </div>
</div>
<!-- /Page Wrapper -->



<!-- jQuery -->
<script src="assets/js/jquery-3.2.1.min.js"></script>

<!-- Bootstrap Core JS -->
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- Slimscroll JS -->
<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Datatables JS -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/datatables.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<!-- Custom JS -->
<script src="assets/js/script.js"></script>

<script src="assets/php/js/create-station.js"></script>
<script src="assets/php/js/get_stations.js"></script>