<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href = "<?php echo URLROOT; ?>/css/owners/readFeedback.css">


<div class="container">
    <h1>Feedback</h1>
    <div class="feedback-list">
        <?php foreach ($data['feedback'] as $feedback): ?>
            <div class="feedback-item">
                <p>Message: <?php echo $feedback->messages; ?></p>
                <p>Category: <?php echo $feedback->category; ?></p>
                <p>Submitted by: <?php echo $feedback->user_id; ?></p>
                <!-- Add more feedback details as needed -->
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
