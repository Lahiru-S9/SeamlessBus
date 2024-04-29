<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href = "<?php echo URLROOT; ?>/css/admins/addScheduler.css">

<table style="margin-top: 80px;">
    <thead>
        <tr>
            <th>Stations</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['stations'] as $station): ?>
            <tr>
                <td><?php echo $station->station; ?></td>
                <td>
                    <form action="<?php echo URLROOT; ?>/admins/deleteStation" method="post">
                        <input type="hidden" name="station_id" value="<?php echo $station->id; ?>">
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<form action="<?php echo URLROOT; ?>/admins/addStation" method="post">
    <input type="text" name="station" placeholder="<?php echo $data['station_err'];?>">
    <input type="submit" value="Add Station">

<?php require APPROOT . '/views/inc/footer.php'; ?>