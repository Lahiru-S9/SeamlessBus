<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href = "<?php echo URLROOT; ?>/css/owners/readFeedback.css">


<div class="container">
    <h1>Feedback</h1>
    <div class="feedback-list">
        <?php foreach ($data['feedback'] as $feedback): ?>
            <div class="feedback-item">
                <p>Message: <?php echo $feedback->messages; ?></p>
                <p>Category: <?php echo $feedback->category; ?></p>
                <p>Submitted by: <?php echo $feedback->user_id; ?></p>
                <!-- Add more feedback details as needed -->
            </div>
        <?php endforeach; ?>
    </div>
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

<?php require APPROOT . '/views/inc/footer.php'; ?>
