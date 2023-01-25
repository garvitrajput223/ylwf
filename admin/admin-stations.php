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
                        <li class="breadcrumb-item active">Add New Police Stations</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            Add New Police Station
                            <h4 />
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" id="addPoliceStations">
                            <form action="create_police_station.php" id="addPoliceStation" method="post">
                                <label for="name">Name:</label>
                                <input type="text" id="name" name="name" required>
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" required>
                                <label for="phone">Phone:</label>
                                <input type="tel" id="phone" name="phone" required>
                                <label for="pincode">Pincode:</label>
                                <input type="text" id="pincode" name="pincode" required>
                                <input type="submit" value="Create Police Station">
                            </form>

                        </div>
                    </div>
                </div>
            </div>
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

<script src="assets/php/js/users.js"></script>