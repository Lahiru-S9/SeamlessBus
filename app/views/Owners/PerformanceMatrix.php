<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/Owners/PerformanceMatrix.css">

<div class = "container">
    <h1>Performance Matrix</h1>

    <div class="summary">
        <div class="metric">
            <h3>Total Revenue</h3>
            <?php foreach($data['revenue_data'] as $revenue): ?>
            <p class="<?php echo ($revenue->total_revenue >= 10000) ? 'good' : (($revenue->total_revenue >= 5000) ? 'average' : 'poor'); ?>">
                <?php echo $revenue->total_revenue; ?>

            </p>
            <?php endforeach ; ?>
        
    </div>
 
    
    <!-- Add more performance metrics -->
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


