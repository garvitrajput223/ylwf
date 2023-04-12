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
                        <li class="breadcrumb-item active">List Found Items</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div class="stationButtons">
            <a href="#" class="list-new">List New Item</a>
            <a href="#" class="view-all">View all</a>
            <!-- <a href="#" class="assign-pincodes">Assign Pincodes</a> -->
        </div>
        <br><br>
        <div class="row" id="allItems">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">list of found items</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" id="showFoundItems">
                            <h4 class="text-center text-lead mt-2">Please Wait...</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="ListFoundItems" style="display: none;">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            List Found Items
                        <h4 />
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <form action="#" id="foundItemForm" method="post">
                                <div class="form-group">
                                    <label for="item-name">
                                        Item Name
                                    </label>
                                    <input type="text" name="itemName" id="itemName">
                                    <label for="itemDescription">
                                        Description
                                    </label>
                                    <label for="itemDescription">
                                        Description
                                    </label>
                                    <input type="text" name="itemDescription" id="itemDescription">
                                    <label for="Location">
                                        Location
                                    </label>
                                    <input type="text" name="location" id="location">
                                    <fieldset>
                                        <legend>Person Details(Who found item.)</legend>
                                        <label for="fname">Full Name:</label>
                                        <input type="text" id="pname" name="pname">
                                        <label for="email">Email:</label>
                                        <input type="email" id="pemail" name="pemail">
                                        <label for="phone">Phone:</label>
                                        <input type="number" id="phone" name="phone">
                                        <label for="address">Address</label>
                                        <input type="text" name="paddress" id="paddress">
                                    </fieldset>
                                    <input type="submit" value="Save Details" id="saveFoundItemDetails">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
<script src="assets/php/js/list-found-item.js"></script>