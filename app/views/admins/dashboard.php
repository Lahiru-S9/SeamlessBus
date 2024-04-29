<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href = "<?php echo URLROOT; ?>/css/admins/dashboard.css">
<div class="container">
    <div class="dashboard-content">
        <h1 class="dashboard-title">What's on your mind?</h1>
        <p class="dashboard-description">Enhancing your Travel Experience</p>
        
    </div>
    <div class="dashboard-actions">
        <a href="<?php echo URLROOT; ?>/Admins/add_scheduler" class="dashboard-action">
            <div class="action-icon" style="background: #62D9CC;">
                <img src="<?php echo URLROOT; ?>/img/QR.png" alt="QR">
            </div>
            <p class="action-label">Manage Schedulers</p>
        </a>

        <!-- Add more dashboard actions as needed -->
        <a href="<?php echo URLROOT; ?>/Admins/addStation" class="dashboard-action">
            <div class="action-icon" style="background: #62D9CC;">
                <img src="<?php echo URLROOT; ?>/img/Routines.png" alt="QR">
            </div>
            <p class="action-label">Add Stations</p>
        </a>

        <!-- Add more dashboard actions as needed -->
        <a href="<?php echo URLROOT?>/regPassengers/profile" class="dashboard-action">
            <div class="action-icon" style="background: #62D9CC;">
                <img src="<?php echo URLROOT; ?>/img/Group.png" alt="QR">
            </div>
            <p class="action-label">System Stats</p>
        </a>
    </div>

</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>
