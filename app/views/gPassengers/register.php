<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href = "<?php echo URLROOT; ?>/css/gpassengers/register.css">

<div class="container">
    <img src="<?php echo URLROOT; ?>/img/passenger_signup.png" alt="Background Image" />

    <div class="content">
        <div class="login-title">Making things easier</div>
        <div class="login-subtitle">Ensure convenience and ease in your workspace with just a few simple steps</div>
        <div class="subtitle">with just a few simple steps</div>
        <div class="login-title">Apply now to create an account</div>

        <form action="<?php echo URLROOT; ?>/gPassengers/register" method="POST">
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
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
