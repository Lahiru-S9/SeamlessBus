<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href = "<?php echo URLROOT; ?>/css/pages/userSelect.css">
<link rel="stylesheet" href = "<?php echo URLROOT; ?>/css/pages/index.css">

<div class="container-user-select">
    <div class="card-user-select">
        <div class="card-header-user-select">
            <h2 class="text-center">Choose Your Role</h2>
        </div>
        <div class="card-body-user-select">
            <div class="form-group-user-select">
                <button onclick="window.location.href = '<?php echo URLROOT; ?>/GPassengers/register';" class="btn btn-primary btn-user-select btn-block">Passenger</button>
            </div>
            <div class="form-group-user-select">
                <button onclick="window.location.href = '<?php echo URLROOT; ?>/users/register';" class="btn btn-primary btn-user-select btn-block">Conductor</button>
            </div>
            <div class="form-group-user-select">
                <button onclick="window.location.href = '<?php echo URLROOT; ?>/schedulers/register';" class="btn btn-primary btn-user-select btn-block">Scheduler</button>
            </div>
            <div class="form-group-user-select">
                <button onclick="window.location.href = '<?php echo URLROOT; ?>/Owners/register';" class="btn btn-primary btn-user-select btn-block">Owner</button>
            </div>
        </div>
    </div>
</div>
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

