<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href = "<?php echo URLROOT; ?>/css/regPassengers/dashboard.css">
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
            <p class="action-label">My QR</p>
        </a>

        <!-- Add more dashboard actions as needed -->
        <a href="<?php echo URLROOT?>/RegPassengers/profile" class="dashboard-action">
            <div class="action-icon" style="background: #62D9CC;">
                <img src="<?php echo URLROOT; ?>/img/Group.png" alt="QR">
            </div>
            <p class="action-label">Profile and bookings</p>
        </a>
    </div>

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php echo URLROOT; ?>/js/qrcode.js"></script> 
<script src="<?php echo URLROOT; ?>/js/regPassengers/QR.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>
