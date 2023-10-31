<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href = "<?php echo URLROOT; ?>/css/schedulers/dashboard.css">




<div class="item1"> <h3>schedule the seamless bus</h3></div>
<br>
<img src="<?php echo URLROOT; ?>/img/bus_schedule3.avif" alt="Background Image" width="500px" height="400px" />
<img src="<?php echo URLROOT; ?>/img/bus_shedule2.jpg" alt="Background Image" width="500px" height="400px" />
<img src="<?php echo URLROOT; ?>/img/bus_timeslots.jpg" alt="Background Image" width="500px" height="400px" />

<br>
<div class="item3">
    <div class="item2">
        <button class="item" type="button"><a href="<?php echo URLROOT; ?>index1.php"> Verify conductors</a></button>
        <button class="item" type="button"> <a href="<?php echo URLROOT; ?> index2.php">Verify bus</a></button>
        <button class="item" type="button"> <a href="<?php echo URLROOT; ?>index3.php"> Edit schedule</a></button>
        <button class="item" type="button"> <a href="<?php echo URLROOT; ?>index4.php"> Add busses timeslots</a></button>
        <button class="item" type="button"> <a href="<?php echo URLROOT; ?>index5.php"> All booking list </a></button>
       
    </div>
    </div>
    

<?php require APPROOT . '/views/inc/footer.php'; ?>