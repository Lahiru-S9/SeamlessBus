<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/css/users/login.css">

<div class="container">
<div class="login-subtitle">Enter login credentials</div>
<div class="login-title">Log into your profile</div>
    <div class="login-card">
        <?php flash('register_success'); ?>
        
        
        <form action="<?php echo URLROOT; ?>/users/login" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" class="custom-input <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
                <span class="error-message"><?php echo $data['email_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="custom-input <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
                <span class="error-message"><?php echo $data['password_err']; ?></span>
            </div>
            <div class="form-group">
                <button type="submit" class="btn">Login</button>
            </div>
        </form>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
