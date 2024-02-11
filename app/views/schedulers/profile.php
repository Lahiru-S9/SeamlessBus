<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/profile.css">



<div class="container">
    <div class="profile">
        <h1>Profile Details</h1>
        <div class="profile-info">
            <div class="profile-item">
                <strong>Name:</strong>
                <?php echo $_SESSION['user_name']; ?>
            </div>
            <div class="profile-item">
                <strong>Email:</strong>
                <?php echo $_SESSION['user_email']; ?>
            </div>
            <!-- Add more profile details here -->
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
