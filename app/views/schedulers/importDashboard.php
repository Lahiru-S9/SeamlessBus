<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/schedulers/dashboard.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/schedulers/importDashboard.css">
    <title>Document</title>
</head>
<body>
    <div class="dashboard-actions">
        
        <a href="<?php echo URLROOT ?>/Schedulers/conductors" class="dashboard-action">
            <div class="action-icon" style="background: #62D9CC;">
                <img src="<?php echo URLROOT; ?>/img/cartoon_conductor.png" alt="QR">
            </div>
            <p class="action-label">Conductors</p>
        </a>

        <!-- go to busses dashboard -->
        <a href="<?php echo URLROOT ?>/Schedulers/buses" class="dashboard-action">
            <div class="action-icon" style="background: #62D9CC;">
                <img src="<?php echo URLROOT; ?>/img/buses.png" alt="QR">
            </div>
            <p class="action-label">Buses</p>
        </a>

        <!-- go to schedulers dashboard -->
        <a href="<?php echo URLROOT ?>/Schedulers/manageSchedule" class="dashboard-action">
            <div class="action-icon" style="background: #62D9CC;">
                <img src="<?php echo URLROOT; ?>/img/owner.png" alt="QR">
            </div>
            <p class="action-label">Manage Schedule</p>
        </a>

        <!-- go to booking dashboard -->
        <a id="booking-lists-dashboard" class="dashboard-action">
            <div class="action-icon" style="background: #62D9CC;">
                <img src="<?php echo URLROOT; ?>/img/bus booking.webp" alt="QR">
            </div>
            <p class="action-label">Booking Lists</p>
        </a>

        <!-- go to feedbackform -->
        <a href="<?php echo URLROOT ?>/Schedulers/feedbackForm" class="dashboard-action"> class="dashboard-action">
            <div class="action-icon" style="background: #62D9CC;">
                <img src="<?php echo URLROOT; ?>/img/feedbacks.jpg" alt="QR">
            </div>
            <p class="action-label">Feedback</p>
        </a>
    </div>

   
</body>
</html>
