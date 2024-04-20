<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/schedulers/seeBusDetails.css">
<!-- Filters -->
<form action="<?php echo URLROOT; ?>/schedulers/SeeBusDetails" method="GET">
    <label for="filter_type">Filter by:</label>
    <select name="filter_type" id="filter_type" onchange="updateFilterValues(this.value)">
        <option value="route_number">Route Number</option>
        <option value="to_station">To Station</option>
    </select>
    <label for="filter_value">Value:</label>
    <select name="filter_value" id="filter_value">
        <!-- Options will be populated here based on the filter_type -->
    </select>
    <input type="submit" value="Filter">
</form>


<table>
    <thead>
        <tr>
            <th>Route Number</th>
            <th>To Station</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($buses as $bus) : ?>
            <tr>
                <td><?php echo $bus['route_number']; ?></td>
                <td><?php echo $bus['to_station']; ?></td>
                <td>
                    <a href="<?php echo URLROOT; ?>/schedulers/removeBus/<?php echo $bus['id']; ?>">Remove</a>
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

<script src="<?php echo URLROOT; ?>/js/schedulers/seeBusSchedule.js"></script>

<?php require APPROOT . '/views/inc/footer.php'; ?>