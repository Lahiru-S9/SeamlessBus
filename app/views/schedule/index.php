<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href = "<?php echo URLROOT; ?>/css/schedule/index.css">

<div class='row'>


    <div class="container">
        <div class="header">
            
            <div class="header-title">Bus Schedules</div>
            <div class="header-subtitle">Get updated information about bus schedules</div>
            
        </div>
    
    <?php foreach   ($data['schedule'] as $schedule) : ?>
        <div class="schedule">
            <div class="schedule-title">
                <?php echo $schedule->routeid; ?>
            </div>
            <div class="schedule-subtitle">
                <?php echo $schedule->arrival_time; ?>
            </div>
            <div class="schedule-subtitle">
                <?php echo $schedule->departure_time; ?>
            </div>
            <div class-"schedule-subtitle">
                <?php echo $schedule->busid; ?>
            </div>
        </div> 
    <?php endforeach; ?> 

        
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