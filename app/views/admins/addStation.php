<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href = "<?php echo URLROOT; ?>/css/admins/addScheduler.css">

<table>
    <thead>
        <tr>
            <th>Stations</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['stations'] as $station): ?>
            <tr>
                <td><?php echo $station->station; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<form action="<?php echo URLROOT; ?>/admins/addStation" method="post">
    <input type="text" name="station" placeholder="<?php echo $data['station_err'];?>">
    <input type="submit" value="Add Station">

<?php require APPROOT . '/views/inc/footer.php'; ?>