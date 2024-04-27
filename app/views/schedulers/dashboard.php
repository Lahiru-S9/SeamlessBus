<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href = "<?php echo URLROOT; ?>/css/regPassengers/dashboard.css">

<div class="container">
    <div class="title">What's on your mind?</div>
    <div class="card-container">
        <div id="bus-card" class="card" onclick="window.location.href='<?php echo URLROOT ?>/Schedulers/buses'">Busses</div>
        <div id="schedule-card" class="card" onclick="window.location.href='<?php echo URLROOT ?>/Schedulers/manageSchedule'">Schedules</div>
        <div id="feedback-card" class="card" onclick="window.location.href='<?php echo URLROOT ?>/Schedulers/feedbackForm'">Feedback</div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
