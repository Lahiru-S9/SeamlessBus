<?php require APPROOT . '/views/inc/header.php'; ?>

<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/schedulers/dashbord.css">


<div class="container">
    <div class="dashboard-content">
        <h1 class="dashboard-title">What's on your mind?</h1>
        <p class="dashboard-description">Enhancing your Travel Experience</p>
    </div>
</div>
        
<?php require APPROOT . '/views/schedulers/importDashboard.php' ; ?>


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
    



<?php require APPROOT . '/views/inc/footer.php'; ?>
