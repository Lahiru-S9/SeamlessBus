<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/Owners/PerformanceMatrix.css">

<div class = "container">
    <h1>Performance Matrix</h1>

    <div class="summary">
        <div class="metric">
            <h3>Total Revenue</h3>
            <?php foreach($data['revenue_data'] as $revenue): ?>
            <p class="<?php echo ($revenue->total_revenue >= 10000) ? 'good' : (($revenue->total_revenue >= 5000) ? 'average' : 'poor'); ?>">
                <?php echo $revenue->total_revenue; ?>

            </p>
            <?php endforeach ; ?>
        
    </div>
 
    
    <!-- Add more performance metrics -->
</div>

    
</div>


