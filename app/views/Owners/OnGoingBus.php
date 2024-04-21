<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/owners/OnGoingBus.css">

<div class="container">
    <h1>OnGoing Bus</h1>
    <div class="bus-list">
        <!-- dummy data -->
        <table>
            <thead>
           <tr>
            <th>Bus No</th>
            <th>Date</th>
            <th>Time</th>
            <th>No Of Seats</th>
           </tr>
            </thead>
            <tbody>
                <tr>
                    <th> ND 6754</th>
                    <th>2024-04-01</th>
                    <th>12.30</th>
                    <th>30</th>
                </tr>
            </tbody> 
        </table>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
