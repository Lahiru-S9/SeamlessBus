<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href = "<?php echo URLROOT; ?>/css/regPassengers/.css">

<div class="container" >
<h1>CSS-Only Floating Labels</h1>
  <div class="container">
    <div class="cta-form">
      <h2>Fill out the form!</h2> 
    <p>Check out the comments for line by line explanations. Form-related code starts on line 145.</p>
    </div>
    <form action="" class="form">
      
      <input type="text" placeholder="Name" class="form__input" id="name" />
      <label for="name" class="form__label">Name</label>

      <input type="email" placeholder="Email" class="form__input" id="email" />
      <label for="email" class="form__label">Email</label>

      <input type="text" placeholder="Subject" class="form__input" id="subject" />
      <label for="subject" class="form__label">Subject</label>
      
    </form>
  </div>
  
</div><br><br>
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
