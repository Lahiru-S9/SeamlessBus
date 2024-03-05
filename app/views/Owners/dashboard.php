<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href = "<?php echo URLROOT; ?>/css/regPassengers/dashboard.css">
<div class="container">
    <div class="dashboard-content">
        <h1 class="dashboard-title">What's on your mind?</h1>
        <p class="dashboard-description">Enhancing your Travel Experience</p>
        <?php flash('bus_added'); ?>
    </div>
    <div class="dashboard-actions">
        <a href="<?php echo URLROOT?>/Owners/selectConductor" class="dashboard-action">
            <div class="action-icon" style="background: #62D9CC;">
                <img src="<?php echo URLROOT; ?>/img/cartoon_conductor.png" alt="QR">
            </div>
            <p class="action-label">Select Conductors</p>
        </a>

        <!-- Add more dashboard actions as needed -->
        <a href="<?php echo URLROOT?>/Owners/AddBuses" class="dashboard-action">
            <div class="action-icon" style="background: #62D9CC;">
                <img src="<?php echo URLROOT; ?>/img/Routines.png" alt="QR">
            </div>
            <p class="action-label">Add Buses</p>
        </a>

        <!-- Add more dashboard actions as needed -->
        <a href="<?php echo URLROOT?>/Owners/profile" class="dashboard-action">
            <div class="action-icon" style="background: #62D9CC;">
                <img src="<?php echo URLROOT; ?>/img/payment.png" alt="QR">
            </div>
            <p class="action-label">Profile info</p>
        </a>

        <!-- Add more dashboard actions as needed -->
        <a href="#" class="dashboard-action">
            <div class="action-icon" style="background: #62D9CC;">
                <img src="<?php echo URLROOT; ?>/img/abc.png" alt="QR">
            </div>
            <p class="action-label">See Reports</p>
        </a>
    

    <!--add more dashboard actions as needed -->
    <a href="<?php echo URLROOT?>/Owners/AddFeedback" class="dashboard-action">
        <div class="action-icon" style="background: #62D9CC ;">
            <img src="<?php echo URLROOT;?>/img/feedback 02.jpg" alt ="Feedback">
        </div>
        <p class="action-label">Add Feedback</p>
        </a>
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


<?php require APPROOT . '/views/inc/footer.php'; ?>
