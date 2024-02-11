<?php require APPROOT . '/views/inc/header.php'; ?>

<link rel="stylesheet" href = "<?php echo URLROOT; ?>/css/schedulers/dashboard.css">
<div class="container">
    <div class="dashboard-content">
        <h1 class="dashboard-title">What's on your mind?</h1>
        <p class="dashboard-description">Enhancing your Travel Experience</p>
        
    </div>
    <div class="dashboard-actions">
        
        
        
        <div class = "popup" id = "popup-1">
            <div class = "overlay"></div>
            <div class = "content">
                <div class = "close-btn" onclick = "togglePopup()">&times;</div>
                <h1>My QR</h1>
                <input id="text" type="hidden" value= "<?php echo $data['encrypted_data'];?>" style="width:80%" /><br />
                <div id="qrcode"></div>
            </div>
        </div>
        <!-- <button class="popup-button" onclick="togglePopup()">Show QR</button> -->
        <a  class="dashboard-action" onclick = "togglePopup()">
            <div class="action-icon" style="background: #62D9CC;">
                <img src="<?php echo URLROOT; ?>/img/QR.png" alt="QR">
            </div>
            <p class="action-label">Conductors</p>
        </a>
        
        <!-- Add more dashboard actions as needed -->
        <a href="#" class="dashboard-action">
            <div class="action-icon" style="background: #62D9CC;">
                <img src="<?php echo URLROOT; ?>/img/Routines.png" alt="QR">
            </div>
            <p class="action-label">Busses</p>
        </a>

        <!-- Add more dashboard actions as needed -->
        <a href="#" class="dashboard-action">
            <div class="action-icon" style="background: #62D9CC;">
                <img src="<?php echo URLROOT; ?>/img/payment.png" alt="QR">
            </div>
            <p class="action-label">Schedule</p>
        </a>

        <!-- Add more dashboard actions as needed -->
        <a href="<?php echo URLROOT?>/schedulers/profile" class="dashboard-action">
            <div class="action-icon" style="background: #62D9CC;">
                <img src="<?php echo URLROOT; ?>/img/Group.png" alt="QR">
            </div>
            <p class="action-label">booking lists</p>
        </a>

          <!-- Add more dashboard actions as needed -->
          <a href="<?php echo URLROOT?>/schedulers/profile" class="dashboard-action">
            <div class="action-icon" style="background: #62D9CC;">
                <img src="<?php echo URLROOT; ?>/img/Group.png" alt="QR">
            </div>
            <p class="action-label">feedbacks</p>
        </a>
    </div>


<div class="footer">
        <img id="footer-logo" src="<?php echo URLROOT; ?>/img/logo_bw.png">
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
