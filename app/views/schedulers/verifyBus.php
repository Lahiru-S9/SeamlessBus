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
                    <button class="accept-button">Accept</button>
                    <button class="decline-button">Decline</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- footer -->
<div class="footer">
        <img id="footer-logo" src="<?php echo URLROOT; ?>/img/logo_bw.png">
        <div class="footer-subtext">
            Seamless Bus
        </div>
        <div class="footer-text">
            Enhancing your Travel Experience
        </div>

        <div class="social-media-icons">
            <a href="#" class="social-media-icon">
                <img src="<?php echo URLROOT; ?>/img/Facebook.png" alt="Facebook">
            </a>
            <a href="#" class="social-media-icon">
                <img src="<?php echo URLROOT; ?>/img/Twitter.png" alt="Twitter">
            </a>
            <a href="#" class="social-media-icon">
                <img src="<?php echo URLROOT; ?>/img/Instagram.png" alt="Instagram">
            </a>
        </div>
    
        <div class="footer-subtext">
            Developed by CS group 23
        </div>
    </div>
    
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>