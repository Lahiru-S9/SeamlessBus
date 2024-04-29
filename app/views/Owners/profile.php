<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/regPassengers/profile.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="main-body">
    <div class = "row gutters-sm">
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                    <h4><?php echo $_SESSION['user_name'];?></h4>
                    
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class = "col-md-8">
            <div class="card mb-3">
                <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $_SESSION['user_email'];?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $data['ownerDetails'][0]->phone;?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mobile</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $data['ownerDetails'][0]->mobile;?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $data['ownerDetails'][0]->address;?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <!-- <a class="btn btn-info " target="__blank" href="<?php echo URLROOT;?>/regPassengers/getDetails">Edit</a> -->
                        <div class="alert alert-success" role="alert" style="display: none;" id="successMessage">
                            Profile updated successfully!
                        </div>
                      <button class="btn btn-info" id="editButton">Edit</button>
                      <button class="btn btn-success" id="saveButton" style="display: none;">Save</button>
                      <button class="btn btn-danger" id="cancelButton" style="display: none;">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo URLROOT; ?>/js/owners/editDetails.js"></script> 



<?php require APPROOT . '/views/inc/footer.php'; ?>