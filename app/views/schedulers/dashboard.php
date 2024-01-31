<?php require APPROOT . '/views/inc/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/schedulers/dashboard.css">
    <title>Dashboard</title>
</head>
<body>

    <h1>What you want to do?</h1>

    <ul class="button-list">
        <li><a href="verifyConductors.php" class="text">Verify Conductors</a></li>
        <li><a href="verifyBuses.php" class="text">Verify Buses</a></li>
        <li><a href="editSchedules.php " class="text">Edit Schedules</a></li>
        <li><a href="addTimeSlots.php" class="text">Add Bus Time Slots</a></li>
        <li><a href="bookinglists.php" class="text">View Booking Lists</a></li>
    </ul>

</body>
</html>
<?php require APPROOT . '/views/inc/footer.php'; ?>