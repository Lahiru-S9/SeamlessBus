<?php require APPROOT . '/views/inc/header.php'; ?>
<div style="margin-top: 80px;">
    <label for="nic">NIC:</label>
    <input type="text" id="nic" name="nic">
</div>


<table>
    <thead>
        <tr>
            <th>Booking ID</th>
            <th>Booking Date</th>
            <th>From</th>
            <th>To</th>
            <th>Arrival Time</th>
            <th>Departure Time</th>
            <th>Bus No</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($data['bookings'])) : ?>
        <tr>
            <td colspan="7"><?php echo $data['message'];?></td>
        </tr>
        <?php else : ?>
        <?php foreach ($data['bookings'] as $booking) : ?>
            <tr>
            <td><?php echo $booking->id; ?></td>
            <td><?php echo $booking->booking_date; ?></td>
            <td><?php echo $booking->from; ?></td>
            <td><?php echo $booking->to; ?></td>
            <td><?php echo $booking->arrival_time; ?></td>
            <td><?php echo $booking->departure_time; ?></td>
            <td><?php echo $booking->bus_no; ?></td>
            </tr>
        <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

<?php require APPROOT . '/views/inc/footer.php' ; ?>