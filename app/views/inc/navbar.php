<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
<nav>
    <div class="navbar-container">
        <a href="<?php echo URLROOT; ?>">
            <img src="<?php echo URLROOT; ?>/img/logo_clr.png" alt="Logo" class="navbar-logo">
        </a>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <ul class="nav-links">
            <li><a href="<?php echo URLROOT; ?>">Home</a></li>
            <li><a href="<?php echo URLROOT; ?>/pages/about">About Us</a></li>
            <li><a href="#">Bus Schedules</a></li>
            <li><a href="#">Bookings</a></li>
        </ul>
        <div class="user-actions">
            <?php if(isset($_SESSION['regPassenger_id'])) : ?>
            <a href="<?php echo URLROOT; ?>/Users/logout" class="logout">Log out</a>
            <?php else : ?>
            <a href="<?php echo URLROOT; ?>/Users/register" class="signup">Sign up</a>
            <a href="<?php echo URLROOT; ?>/Users/login" class="login">Log in</a>
            <?php endif; ?>
        </div>
    </div>
</nav>
