<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href = "<?php echo URLROOT; ?>/css/pages/userSelect.css">
<link rel="stylesheet" href = "<?php echo URLROOT; ?>/css/pages/index.css">

<center><div class="user-select-text">Create your account now!</div></center>
<div class="card-container">
    <div class="card" id="passenger-card">
        <div class="card-front"><img src="<?php echo URLROOT; ?>/img/passenger-card.jpg"/>
        </div>
        <div class="card-back"><img src="<?php echo URLROOT; ?>/img/passenger-card-back.png"/>
        </div>
    </div>
    <div class="card" id="conductor-card">
    <div class="card-front"><img src="<?php echo URLROOT; ?>/img/conductor-card.jpg"/>
    </div>
        <div class="card-back"><img src="<?php echo URLROOT; ?>/img/conductor-card-back.png"/>
        </div>
    </div>
    <div class="card" id="scheduler-card">
    <div class="card-front"><img src="<?php echo URLROOT; ?>/img/scheduler-card.jpg"/>
    </div>
        <div class="card-back"><img src="<?php echo URLROOT; ?>/img/scheduler-card-back.png"/>
        </div>
    </div>
    <div class="card" id="owner-card">
    <div class="card-front"><img src="<?php echo URLROOT; ?>/img/owner-card.jpg"/>
    </div>
        <div class="card-back"><img src="<?php echo URLROOT; ?>/img/owner-card-back.png"/>
        </div>
    </div>
</div><br><br><br><br><br><br><br><br><br><br><br><br>

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

<script>
            document.getElementById("passenger-card").addEventListener("click", function() {
            window.location.href = "<?php echo URLROOT; ?>/GPassengers/register";});

            document.getElementById("conductor-card").addEventListener("click", function() {
            window.location.href = "<?php echo URLROOT; ?>/Conductors/register";});

            document.getElementById("scheduler-card").addEventListener("click", function() {
            window.location.href = "<?php echo URLROOT; ?>/schedulers/register";});

            document.getElementById("owner-card").addEventListener("click", function() {
            window.location.href = "<?php echo URLROOT; ?>/Owners/register";});
</script>