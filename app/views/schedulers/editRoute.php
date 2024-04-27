<?php require APPROOT . '/views/inc/header.php'; ?>

<form style ="margin-top: 80px;" action="<?php echo URLROOT; ?>/schedulers/editRoute/<?php echo $data['route_num']; ?>" method="post">
    <h2>Edit Route</h2>
    <label for="ticketPrice">Ticket Price:</label><br>
    <input type="number" id="ticketPrice" name="ticketPrice" value="<?php echo $data['ticketPrice']; ?>" placeholder="<?php echo $data['ticketPrice_err']; ?>"><br>
    <input type="submit" value="Update">
</form>

<?php require APPROOT . '/views/inc/footer.php'; ?>
