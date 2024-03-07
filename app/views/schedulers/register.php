<?php require APPROOT . '/views/inc/header.php'; ?>

<link rel="stylesheet" href = "<?php echo URLROOT; ?>/css/schedulers/register.css">

<div class="container" >
    <img src="<?php echo URLROOT; ?>/img/schedulers_signup.jpg" alt="Background Image" />

    <div class="content">
        <div class="login-title">Apply now to create an account</div>
        <div class="subtitle">with just a few simple steps</div><br>

        <form action="<?php echo URLROOT; ?>/Schedulers/register" method="POST">
            <div class="form-group">
                <label for="name">Name: <sup>*</sup></label>
                <input type="text" class="custom-input <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" name="name" value="<?php echo $data['name']; ?>">
                <span class="error-message"><?php echo $data['name_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="email">Email: <sup>*</sup></label>
                <input type="email" class="custom-input <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" name="email" value="<?php echo $data['email']; ?>">
                <span class="error-message"><?php echo $data['email_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="password">Password: <sup>*</sup></label>
                <input type="password" class="custom-input <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" name="password" value="<?php echo $data['password']; ?>">
                <span class="error-message"><?php echo $data['password_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password: <sup>*</sup></label>
                <input type="password" class="custom-input <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" name="confirm_password" value="<?php echo $data['confirm_password']; ?>">
                <span class="error-message"><?php echo $data['confirm_password_err']; ?></span>
            </div>

            <div class="form-group">
                <input type="reset" value="Reset" class="btn btn-reset">
                <input type="submit" value="Apply!" class="btn btn-submit">
            </div>
        </form>
    </div>
</div><br><br>
<!-- Footer -->
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

