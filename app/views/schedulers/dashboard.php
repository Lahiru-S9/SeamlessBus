<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href = "<?php echo URLROOT; ?>/css/regPassengers/dashboard.css">

<!-- Your HTML content -->
<?php if (!empty($data['message'])): ?>
    <div><?php echo $data['message']; ?></div>
<?php endif; ?>

<div class="container">
    <div class="title">What's on your mind?</div>
    <div class="card-container">
        <div id="bus-card" class="card" onclick="window.location.href='<?php echo URLROOT ?>/Schedulers/buses'">Busses</div>
        <div id="schedule-card" class="card" onclick="window.location.href='<?php echo URLROOT ?>/Schedulers/manageSchedule'">Schedules</div>
        <div id="addRoute-card" class="card" onclick="window.location.href='<?php echo URLROOT ?>/Schedulers/addRoute'">Routes</div>
        
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
