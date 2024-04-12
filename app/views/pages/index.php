<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href = "<?php echo URLROOT; ?>/css/pages/index.css">
<link rel="stylesheet" href = "<?php echo URLROOT; ?>/css/style.css">
      <!-- Main content -->
      <div class="main-content">
      <img src="<?php echo URLROOT; ?>/img/home.png" alt="Background Image">

        <!-- Text content -->
        <div class="text-content">
            <div class="header-text">
                <div class="header-text-line1">For an Enhanced Travel Experience</div>
                <div class="header-text-line2"><?php echo $data['description']; ?></div>
            </div>

            <div class="middle-text">
                <div class="middle-text-line1">Bus seat booking made easier</div>
                <a class="cta-button" id="direct-btn" href="<?php echo URLROOT; ?>/schedule/index">Book your seats in just a few easy steps</a><br><br>
            </div>
        </div>


        <!-- Call to action buttons -->
        <div class="cta-buttons">
            <div>
                <div class="button-text">Don’t have an account ?</div>
                <center><img src="<?php echo URLROOT; ?>/img/passenger.png" alt="Apply Now"></center>
                <a href="<?php echo URLROOT; ?>/GPassengers/register" class="cta-button">Apply Now!</a>
            </div>
            <div>
                <div class="button-text">Are you a conductor ?</div>
                <center><img src="<?php echo URLROOT; ?>/img/cartoon_conductor.png" alt="Join Us"></center>
                <a href="<?php echo URLROOT; ?>/Users/register" class="cta-button">Join Us!</a>
            </div>
            <div>
                <div class="button-text">Are you a bus owner ?</div>
                <center><img src="<?php echo URLROOT; ?>/img/owner.png" alt="Get Started"></center>
                <a href="<?php echo URLROOT; ?>/Owners/register" class="cta-button">Get Started!</a>
            </div>
        </div><br><br><br>

        <!-- Footer -->
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
<?php require APPROOT . '/views/inc/footer.php'; ?>

