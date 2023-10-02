<?php require APPROOT . '/views/inc/header.php'; ?>
      <!-- Main content -->
      <div class="main-content">
        <img src="<?php echo URLROOT; ?>/img/indexBackground.jpg" alt="Background Image">

        <!-- Text content -->
        <div class="text-content">
            <div class="header-text">
                For an Enhanced Travel Experience
            </div>
            <div class="sub-text">
                <?php echo $data['description']; ?>
            </div>
        </div>

        <!-- Call to action buttons -->
        <div class="cta-buttons">
            <div class="cta-button">
                <a href="#">Apply Now!</a>
            </div>
            <div class="cta-button">
                <a href="#">Join Us!</a>
            </div>
            <div class="cta-button">
                <a href="#">Get Started!</a>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <div class="footer-text">
                Enhancing your Travel Experience
            </div>
            <div class="footer-subtext">
                Seamless Bus
            </div>
            <div class="footer-subtext">
                Developed by CS group 23
            </div>
        </div>
    </div>
    <h1><?php echo $data['title']; ?></h1>
<?php require APPROOT . '/views/inc/footer.php'; ?>

