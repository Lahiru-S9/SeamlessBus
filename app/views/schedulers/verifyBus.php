<?php require APPROOT . '/views/inc/header.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/schedulers/verifyBuses.css">
<!-- Table to display bus details -->
<table>
    <thead>
        <tr>
            <th>Bus Number</th>
            <th>Bus Model</th>
            <th>Permit ID</th>
            <th>Owner's Name</th>
            <th>Owner's Email</th>
            <th>Route Number</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <!-- Loop through bus requests and display each row -->
        <?php foreach ($data['busRequests'] as $busRequest): ?>
            <tr>
            <td><?php echo $busRequest->bus_no; ?></td>
            <td><?php echo $busRequest->bus_model; ?></td>
            <td><?php echo $busRequest->permitid; ?></td>
            <td><?php echo $busRequest->owner_name; ?></td>
            <td><?php echo $busRequest->owner_email; ?></td>
            <td><?php echo $busRequest->route_num; ?></td>

                <td>
                    <!-- Accept and Decline buttons -->
                    <button class="accept-button" onclick="updateBusStatus('<?php echo $busRequest->bus_no; ?>', 'accepted')">Accept</button>
                    <button class="decline-button" onclick="updateBusStatus('<?php echo $busRequest->bus_no; ?>', 'declined')">Decline</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- footer -->

    
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>;
<script src="<?php echo URLROOT; ?>/js/schedulers/verifyBus.js"></script>

<?php require APPROOT . '/views/inc/footer.php'; ?>