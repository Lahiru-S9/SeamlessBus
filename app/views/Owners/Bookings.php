<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/owners/Bookings.css">

<div class="container">
    <h1>Bookings</h1>
    <div class="booking-list">
        <?php foreach ($data['bookings'] as $booking): ?>
            <div class="booking-item">
                <p><?php echo $bookings->?></p>
                <!-- Add more booking details as needed -->
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
