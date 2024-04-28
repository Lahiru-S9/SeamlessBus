<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/Owners/PerformanceMatrix.css">

<div class = "container">
    <h1>Performance Matrix</h1>

    <div>
        <canvas id="myChart"></canvas>
    </div>

 <!-- Add more performance metrics -->
</div>

    
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="<?php echo URLROOT; ?>/js/Owners/performanceMatrix.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>


