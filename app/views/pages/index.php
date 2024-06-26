<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href = "<?php echo URLROOT; ?>/css/pages/index.css">
<link rel="stylesheet" href = "<?php echo URLROOT; ?>/css/style.css">
      <!-- Main content -->
      <div class="main-content">
      <img src="<?php echo URLROOT; ?>/img/home.png" alt="Background Image">

        <!-- Text content -->
        <div class="text-content">
            <div class="header-text">
                <div class="header-text-line1">For an Enhanced Travel Experience</div>
                <div class="header-text-line2"><?php echo $data['description']; ?></div>
            </div>

            <div class="middle-text">
                <div class="middle-text-line1">Bus seat booking made easier</div>
            </div>
        </div>
        
        <?php if(!isset($_SESSION['user_id'])) : ?>
            <div onclick="showConfirmation()" class="cta-button" id="direct-btn">Book your seats in just a few easy steps</div><br><br>
            <script>
            function goToPage1() {
                window.location.href = '<?php echo URLROOT; ?>/GPassengers/register';
            }
            function goToPage2() {
                window.location.href = '<?php echo URLROOT; ?>/schedule/index';
            }
            function showConfirmation() {
                var result = confirm('Hey there!\n\nCreating an account would make it convenient for you to place bookings and save your regular routines.\n\nWould you like to create an account first?');
                if (result) {
                    goToPage1();
                } else {
                    goToPage2();
                }
            }
            </script>
        <?php else : ?>
            <a href="<?php echo URLROOT; ?>/schedule/index" class="cta-button" id="direct-btn">Book your seats in just a few easy steps</a><br><br>
        <?php endif; ?>

        <!-- Call to action buttons -->
        <div class="cta-buttons">
            <div>
                <div class="button-text">Don’t have an account ?</div>
                <center><img src="<?php echo URLROOT; ?>/img/passenger.png" alt="Apply Now"></center>
                <a href="<?php echo URLROOT; ?>/GPassengers/register" class="cta-button">Register Now!</a>
            </div>
            <div>
                <div class="button-text">Are you a conductor ?</div>
                <center><img src="<?php echo URLROOT; ?>/img/cartoon_conductor.png" alt="Join Us"></center>
                <a href="<?php echo URLROOT; ?>/Users/register" class="cta-button">Join Us!</a>
            </div>
            <div>
                <div class="button-text">Are you a bus owner ?</div>
                <center><img src="<?php echo URLROOT; ?>/img/owner.png" alt="Get Started"></center>
                <a href="<?php echo URLROOT; ?>/Owners/register" class="cta-button">Get Started!</a>
            </div>
        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>

