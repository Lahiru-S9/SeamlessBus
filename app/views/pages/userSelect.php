<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href = "<?php echo URLROOT; ?>/css/pages/userSelect.css">
<link rel="stylesheet" href = "<?php echo URLROOT; ?>/css/pages/index.css">

<center><div class="user-select-text">Create your account now!</div></center>
<div class="card-container">
<div class="card" id="passenger-card"><p>Register as a<br><p class="heading" style="color:#e1ff00;">Passenger</p></p></div>
<div class="card" id="conductor-card"><p>Register as a<br><p class="heading" style="color:#ff00b7;">Conductor</p></p></div>
<div class="card" id="scheduler-card"><p>Register as a<br><p class="heading" style="color:#00ff55;">Scheduler</p></p></div>
<div class="card" id="owner-card"><p>Register as a<br><p class="heading" style="color:#0066ff;">Bus Owner</p></p></div></div>
<!--<div class="card-container">
    <div class="card" id="passenger-card">
    <div class="card-front"><img src="<?php echo URLROOT; ?>/img/passenger-card-back.png"/></div>
    </div>
    <div class="card" id="conductor-card">
    <div class="card-front"><img src="<?php echo URLROOT; ?>/img/conductor-card-back.png"/>
    </div></div>
    <div class="card" id="scheduler-card">
    <div class="card-front"><img src="<?php echo URLROOT; ?>/img/scheduler-card-back.png"/>
    </div></div>
    <div class="card" id="owner-card">
    <div class="card-front"><img src="<?php echo URLROOT; ?>/img/owner-card-back.png"/>
    </div></div>
</div>-->

<!-- Footer -->
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