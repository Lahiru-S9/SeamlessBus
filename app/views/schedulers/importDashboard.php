<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/schedulers/importDashboard.css">
    <title>Document</title>
</head>
<body>
    <div class="dashboard-actions">
        <!-- go to conductor dashboard -->
        <a id="conductor-dashboard" class="dashboard-action">
            <div class="action-icon" style="background: #62D9CC;">
                <img src="<?php echo URLROOT; ?>/img/cartoon_conductor.png" alt="QR">
            </div>
            <p class="action-label">Conductors</p>
        </a>

<<<<<<< HEAD
        <!-- go to busses dashboard -->
        <a href="<?php echo URLROOT ?>/Schedulers/buses" class="dashboard-action">
            <div class="action-icon" style="background: #62D9CC;">
                <img src="<?php echo URLROOT; ?>/img/buses.png" alt="QR">
            </div>
            <p class="action-label">Buses</p>
        </a>

        <!-- go to schedulers dashboard -->
        <a id="schedule-dashboard" class="dashboard-action">
=======
   <!-- go to schedulers dashboard -->
        <a href="<?php echo URLROOT ?>/Schedulers/manageSchedule" class="dashboard-action">
>>>>>>> f787b064a06841113bed05b5e8a4a8fb3299045d
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
        <a id="feedbacks-dashboard" class="dashboard-action">
            <div class="action-icon" style="background: #62D9CC;">
                <img src="<?php echo URLROOT; ?>/img/feedbacks.jpg" alt="QR">
            </div>
            <p class="action-label">Feedbacks</p>
        </a>
    </div>

    <!-- script file for onclick event handle -->
    <script>
        function handleDashboardAction(url) {
            window.location.href = url;
        }

        // Add event listeners for each dashboard action
        document.getElementById('conductor-dashboard').addEventListener('click', function() {
            handleDashboardAction('<?php echo URLROOT ?>/schedulers/conductors.php');
        });

        document.getElementById('busses-dashboard').addEventListener('click', function() {
            handleDashboardAction('<?php echo URLROOT ?>/schedulers/buses.php');
        });

        document.getElementById('schedule-dashboard').addEventListener('click', function() {
            handleDashboardAction('<?php echo URLROOT ?>/schedulers/shedule.php');
        });

        document.getElementById('booking-lists-dashboard').addEventListener('click', function() {
            handleDashboardAction('<?php echo URLROOT?>/schedulers/booking1.php');
        });

        document.getElementById('feedbacks-dashboard').addEventListener('click', function() {
            handleDashboardAction('<?php echo URLROOT ?>/schedulers/feedbackForm.php');
        });
    </script>
</body>
</html>
