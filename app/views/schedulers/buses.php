<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href = "<?php echo URLROOT; ?>/css/schedulers/buses.css">
<!-- background image -->

<div class="container" >
<div class="image-container">
    <img src="<?php echo URLROOT; ?>/img/1.png" alt="Background Image" class="background-image">
  <div class="left">
      <div class="text-overlay">
                <h1 class="overlay-text">You Have Full Rights To Handle <br><br> buses!!</h1>
                <h4 class="text2"> Click On Your Need?<h4>
      <div class="buttons-container">
<!--1 button image -->
        <div class="clickheres">
        <a href="/app/views/schedulers/verifyBus.php"> 
        <img src="<?php echo URLROOT;?> /public/img/verify bus.png" class="image"></a>
        </div>
<!-- 1 end button image -->
<!-- 2 end button image -->
        <div class="clickheres">
        <a href="/app/views/schedulers/busdetails.php"> 
        <img src="<?php echo URLROOT;?>/public/img/seeBusDetails.png"  class="image"></a>
        </div>
        
 <!-- 2 nd button end-->

 <!-- 3 end button image -->
 <div class="clickheres">
        <a href="/app/views/schedulers/AddBusRotation.php"> 
        <img src="<?php echo URLROOT;?>/public/img/addbus rotation.png"  class="image"></a>
        </div>
        
 <!-- 3 nd button end-->

 </div><!--for button-->
</div> <!--for text-->
</div>
</div> <!--image container-->
</div>
<!-- end background image -->





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
