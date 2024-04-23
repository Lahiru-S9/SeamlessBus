<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href = "<?php echo URLROOT; ?>/css/conductors/profile.css">

<div class="row">
    <div class="col-12">
        <!-- Page title -->
        <div class="my-5">
            <h3>My Profile</h3>
            <hr>
        </div>
        <!-- Display error messages if any -->
        <?php if(isset($data['error'])): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $data['error']; ?>
            </div>
        <?php endif; ?>
        <!-- Form START -->
        <form action="<?php echo URLROOT; ?>/conductors/profile" method="POST" class="file-upload">
            <div class="row mb-5 gx-5">
                <!-- Contact detail -->
                <div class="col-xxl-8 mb-5 mb-xxl-0">
                    <div class="bg-secondary-soft px-4 py-5 rounded">
                        <div class="row g-3">
                            <h4 class="mb-4 mt-0">Contact detail</h4>
                            <!-- Email -->
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Email *</label>
                                <div class="form-control"><?php echo $_SESSION["user_email"]?></div>
                            </div>
                            <!-- First Name -->
                            <div class="col-md-6">
                                <label for="inputName4" class="form-label">Name *</label>
                                <div class="form-control"><?php echo $data['conductor']->name?></div>
                            </div>
                            <!-- Last name -->
                            <div class="col-md-6">
                                <label class="form-label">Address *</label>
                                <input type="text" name = "address" class="form-control" placeholder="" aria-label="address" value="<?php echo $data['conductor']->address?>">
                            </div>
                            <!-- Mobile number -->
                            <div class="col-md-6">
                                <label class="form-label">Mobile number *</label>
                                <input type="text" name = "mobile" class="form-control" placeholder="" aria-label="Phone number" value="<?php echo $data['conductor']->mobile?>">
                            </div>
                            
                            <!-- Skype -->
                            <div class="col-md-6">
                                <label class="form-label">Working Station *</label>
                                <select name = "station" class="form-select" aria-label="Station">
                                    <option selected value = "<?php echo $data["conductor"]->station_id?>"><?php echo $data['conductor']->station?></option>
                                    <?php foreach($data['stations'] as $station): ?> 
                                        <option value="<?php echo $station->id; ?>"><?php echo $station->station; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div> <!-- Row END -->
                    </div>
                </div>
                <!-- Save button -->
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                <!-- Upload profile -->
                <div class="col-xxl-4">
                    <div class="bg-secondary-soft px-4 py-5 rounded">
                        <div class="row g-3">
                            <h4 class="mb-4 mt-0">Upload your profile photo</h4>
                            <div class="text-center">
                                <!-- Image upload -->
                                <div class="square position-relative display-2 mb-3">
                                    <i class="fas fa-fw fa-user position-absolute top-50 start-50 translate-middle text-secondary"></i>
                                </div>
                                <!-- Button -->
                                <input type="file" id="customFile" name="file" hidden="">
                                <label class="btn-success-soft btn-block" for="customFile">Upload</label>
                                <button type="button" class="btn btn-danger-soft">Remove</button>
                                <!-- Content -->
                                <p class="text-muted mt-3 mb-0"><span class="me-1">Note:</span>Minimum size 300px x 300px</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- Row END -->
        </form>
    


        <div class="footer">
            <img id="footer-logo" src="<?php echo URLROOT; ?>/img/logo_bw.png">
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
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>