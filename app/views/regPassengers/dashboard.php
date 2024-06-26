<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href = "<?php echo URLROOT; ?>/css/regPassengers/dashboard.css">

<div class="container">
    <div class="title">What's on your mind?</div>
    <div class="card-container">
    <div id="qr-card" class="card" onclick = "togglePopup()"><input id="text" type="hidden" value= "<?php echo $data['encrypted_data'];?>" style="width:80%"/>My QR</div>
    <div id="profile-card" class="card" onclick="window.location.href='<?php echo URLROOT?>/RegPassengers/profile'">My profile</div>
    <div id="feedback-card" class="card" onclick="window.location.href='<?php echo URLROOT ?>/RegPassengers/feedbackForm'">Feedback</div>
    </div>
    <div class = "popup" id = "popup-1">
            <div class = "content">
             <div class = "close-btn" onclick = "togglePopup()">&times;</div>
                <h1>My QR</h1><br>
                <div id="qrcode"></div>
            </div>
        </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php echo URLROOT; ?>/js/qrcode.js"></script> 
<script src="<?php echo URLROOT; ?>/js/regPassengers/QR.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>
