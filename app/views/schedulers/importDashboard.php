<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href = "<?php echo URLROOT; ?>/css/schedulers/importDashboard.css">
    <title>Document</title>
</head>
<body>
    

<div class="dashboard-actions">
        
      
      <!-- go to conductor dashboard -->
      <a href="<?php echo URLROOT ?>/schedulers/conductors.php" class="dashboard-action">
       <div class="action-icon" style="background: #62D9CC;">
        <img src="<?php echo URLROOT; ?>/img/cartoon_conductor.png" alt="QR">
       </div>
       <p class="action-label">Conductors</p>
      </a>

        
        <!-- go to busses dashboard -->
        <a href="<?php echo URLROOT ?>/schedulers/buses.php" class="dashboard-action">
            <div class="action-icon" style="background: #62D9CC;">
            <img src="<?php echo URLROOT; ?>/img/buses.png" alt="QR">
            </div>
            <p class="action-label">Busses</p>
        </a>

   <!-- go to schedulers dashboard -->
        <a href="<?php echo URLROOT ?>/Schedulers/manageSchedule" class="dashboard-action">
            <div class="action-icon" style="background: #62D9CC;">
                <img src="<?php echo URLROOT; ?>/img/owner.png" alt="QR">
            </div>
            <p class="action-label">Manage Schedule</p>
        </a>

      <!-- go to booking  dashboard -->
        <a href="<?php echo URLROOT?>/schedulers/booking1.php" class="dashboard-action">
            <div class="action-icon" style="background: #62D9CC;">
                <img src="<?php echo URLROOT; ?>/img/bus booking.webp" alt="QR">
            </div>
            <p class="action-label">booking lists</p>
        </a>

          <!-- go to feedbackform -->
          <a href="<?php echo URLROOT ?>/schedulers/feedbackForm.php" class="dashboard-action">
            <div class="action-icon" style="background: #62D9CC;">
                <img src="<?php echo URLROOT; ?>/img/feedbacks.jpg" alt="QR">
            </div>
            <p class="action-label">feedbacks</p>
        </a>
    </div>

    </body>
</html>