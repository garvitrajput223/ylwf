<?php require_once 'assets/php/admin-header.php'; ?>
<head>
    <link rel="stylesheet" href="assets/css/station.css">
</head>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row" id="ListFoundItems">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                    List Found Items
                                <h4 />
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form action="#" id="foundItemForm" method="post>
                                        <div class="form-group">
                                            <label for="item-name">
                                                Item Name
                                            </label>
                                            <input type="text" name="itemName" id="itemName">
                                            <label for="itemDescription">
                                                Description
                                            </label>
                                            <input type="text" name="itemDescription" id="itemDescription">
                                            <label for="Attributes">
                                                Attributes
                                            </label>
                                            <input type="text" name="attributes" id="attributes">
                                            <label for="Attributes">
                                            <fieldset>
                                                    <legend>Person Details(Who found item.)</legend>
                                                    <label for="fname">Full Name:</label>
                                                    <input type="text" id="fname" name="fname">
                                                    <label for="email">Email:</label>
                                                    <input type="email" id="email" name="email">
                                                    <label for="birthday">Phone:</label>
                                                    <input type="number" id="phone" name="phone">
                                                    <label for="address">Address</label>
                                                    <input type="text" name="address" id="address">
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