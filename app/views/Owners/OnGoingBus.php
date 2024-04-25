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
                    <td> ND 6754</td>
                    <td>2024-04-01</td>
                    <td>12.30</td>
                    <td>30</td>
                </tr>
            </tbody> 
        </table>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
