<?php require APPROOT . '/views/inc/header.php'; ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- background image -->
<div class="container">
<img src="/public/img/4.png" style="width: 65%;">
  <div>
   <!-- create button1 -->
   <button class="button1" name="logingButton1" 
      onclick="location.href='verifyConductor.php'">
      <i class="fa-solid fa-user-plus"></i>register
    
    </button>
    <!-- end button -->
<br>
          <!-- create button1 -->
   <button class="button1" name="logingButton1" 
      onclick="location.href='SeeConductorDetails.php'">
      <i class="fa-solid fa-user-plus"></i>register
    
    </button>
    <!-- end button -->
  </div>
</div>
<!-- end background image -->
<!-- import dashbord icons -->
<?php require APPROOT . '/views/schedulers/importDashboard.php' ; ?>
<!-- end dashbord icons -->

<!-- footer -->
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