<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href = "<?php echo URLROOT; ?>/css/regPassengers/dashboard.css">

<div class="container">
    <div class="title">What's on your mind?</div>
    <div class="card-container">
        <div id="scheduler-card" class="card" onclick="window.location.href='<?php echo URLROOT; ?>/Admins/add_scheduler'">Schedulers</div>
        <div id="stations-card" class="card" onclick="window.location.href='<?php echo URLROOT; ?>/Admins/addStation'">Stations</div>
        <div id="feedback-card" class="card" onclick="window.location.href='<?php echo URLROOT?>/Owners/AddFeedback'">Feedback</div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>




