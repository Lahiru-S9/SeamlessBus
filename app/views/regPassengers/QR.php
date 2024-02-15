<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/regPassengers/QR.css">

<input id="text" type="hidden" value= "<?php echo $data['encrypted_data'];?>" style="width:80%" /><br />
<div id="qrcode"></div>




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
<script src="<?php echo URLROOT; ?>/js/qrcode.js"></script> 
<script src="<?php echo URLROOT; ?>/js/regPassengers/QR.js"></script>
         
    

<?php require APPROOT . '/views/inc/footer.php'; ?>
