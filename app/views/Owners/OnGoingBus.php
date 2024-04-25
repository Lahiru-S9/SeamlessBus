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
            <th>Booking Count</th>
            <th>No Of Seats</th>
           </tr>
            </thead>
            <tbody>
            <?php foreach ($data['revenue_data'] as $bus): ?>
                <tr>
                    <td><?php echo $bus->bus_no; ?></td>
                    <td><?php echo $bus->date; ?></td>
                    <td><?php echo $bus->time; ?></td>
                    <td><?php echo $bus->booking_count; ?></td>
                    <td><?php echo $bus->bus_seat; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody> 
        </table>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
