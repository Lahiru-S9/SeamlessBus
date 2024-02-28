<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/Owners/profile.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container">
    <div class="main-body">
    
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Owner" class="rounded-circle" width="150">
                            <div class="mt-3">
                                <h4><?php echo $_SESSION['user_name'];?></h4>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo $_SESSION['user_email'];?>
                            </div>
                        </div>
                        
                        <hr>
                        
                        <hr>
                        
                        <h5 class="mt-4">Registration Details</h5>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo $_SESSION['user_name'];?>
                            </div>
                        </div>
                        <hr>
 
                        
                        <?php if(isset($data['AddBuses']) && is_array($data['AddBuses']) && !empty($data['AddBuses'])) : ?>
    <h5 class="mt-4">Buses Added</h5>
    <?php foreach ($data['AddBuses'] as $bus) : ?>
        <div class="card mt-3">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <strong>Bus Number:</strong> <?php echo $bus->bus_number; ?>
                </li>
                <li class="list-group-item">
                    <strong>Bus Model:</strong> <?php echo $bus->bus_model; ?>
                </li>
                <li class="list-group-item">
                    <strong>Number of Seats:</strong> <?php echo $bus->bus_seat; ?>
                </li>
                <li class="list-group-item">
                    <strong>Permit ID:</strong> <?php echo $bus->permit_id; ?>
                </li>
                <li class="list-group-item">
                    <strong>Seats Per Row:</strong> <?php echo $bus->seats_per_row; ?>
                </li>
            </ul>
        </div>
    <?php endforeach; ?>
<?php else : ?>
    <p>No buses added yet.</p>
<?php endif; ?>

                             

                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
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

                <!-- Add more sections as needed -->
            </div>
        </div>
    </div>
    
    <div class="footer">
        <img src="<?php echo URLROOT; ?>/img/logo_bw.png">
        <div class="footer-subtext">
            Seamless Bus
        </div>
        <div class="footer-text">
            Enhancing your Travel Experience
        </div>

        <div class="social-media-icons">
            <a href="#" class="social-media-icon">
                <img src="<?php echo URLROOT; ?>/img/Facebook.png" alt="Facebook">
            </a>
            <a href="#" class="social-media-icon">
                <img src="<?php echo URLROOT; ?>/img/Twitter.png" alt="Twitter">
            </a>
            <a href="#" class="social-media-icon">
                <img src="<?php echo URLROOT; ?>/img/Instagram.png" alt="Instagram">
            </a>
        </div>
    
        <div class="footer-subtext">
            Developed by CS group 23
        </div>
    </div>
</div>

<script>
    var originalTexts = {
        // Define original texts for fields if needed
    };
</script>
<script src="<?php echo URLROOT; ?>/js/owners/editDetails.js"></script>   

<?php require APPROOT . '/views/inc/footer.php'; ?>
