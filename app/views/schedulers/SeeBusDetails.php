<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/schedulers/seeBusDetails.css">
<!-- Filters -->

<div id="busDetailsContainer">
    <form action="<?php echo URLROOT; ?>/schedulers/applyFilter" method="GET">
        <label for="filter_type">Filter by:</label>
        <select name="filter_type" id="filter_type" onchange="updateFilterValues(this.value)">
            <option value="route_number">Route Number</option>
            <option value="to_station">To Station</option>
            <option value="from_station">From Station</option>
        </select>
        <label for="filter_value">Value:</label>
        <select name="filter_value" id="filter_value">
            <!-- Options will be populated here based on the filter_type -->
        </select>
        <input type="button" value="Filter" onclick="applyFilter()">
    </form>

    <button onclick="resetFilter()">Reset Filter</button>

    <table>
        <thead>
            <tr>
                <th>Bus Number</th>
                <th>Bus Model</th>
                <th>Permit ID</th>
                <th>Route Number</th>
                <th>Owner Name</th>
                <th>From Station</th>
                <th>To Station</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['buses'] as $bus) : ?>
                <tr>
                    <td><?php echo $bus->bus_no; ?></td>
                    <td><?php echo $bus->bus_model; ?></td>
                    <td><?php echo $bus->permitid; ?></td>
                    <td><?php echo $bus->route_num; ?></td>
                    <td><?php echo $bus->name; ?></td>
                    <td><?php echo $bus->from_station; ?></td>
                    <td><?php echo $bus->to_station; ?></td>
                    <td><?php echo $bus->status; ?></td>
                    
                    <td>
                        <a href="<?php echo URLROOT; ?>/schedulers/removeBus/<?php echo $bus->bus_no; ?>" class="btn-danger">Remove</a>
                        <?php if ($bus->status == 'accepted') : ?>
                            <a href="<?php echo URLROOT; ?>/schedulers/pauseBus/<?php echo $bus->bus_no; ?>" class="btn-secondary">Pause</a>
                        <?php elseif ($bus->status == 'paused') : ?>
                            <a href="<?php echo URLROOT; ?>/schedulers/resumeBus/<?php echo $bus->bus_no; ?>" class="btn btn-primary" style="padding: 10px 20px; border-radius: 5px; border: 1px solid #d9534f; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; cursor: pointer;">Resume</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>


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

<script src="<?php echo URLROOT; ?>/js/schedulers/seeBusDetails.js"></script>

<?php require APPROOT . '/views/inc/footer.php'; ?>