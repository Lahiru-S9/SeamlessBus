<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href = "<?php echo URLROOT; ?>/css/admins/add_scheduler.css">

<div class="main-container">
    <div class="container" id="scheduler-container">
        <h2>Schedulers</h2>
        <div id="scheduler-list">
            <?php if (isset($data['schedulers']) && is_array($data['schedulers'])) : ?>
                <!-- <h2>Schedulers</h2> -->
                    <?php foreach ($data['schedulers'] as $scheduler) : ?>
                        <div class="scheduler-container" onclick="toggleStations(<?php echo $scheduler->id; ?>)">
                            <?php echo "Scheduler name: " . ($scheduler->scheduler_name ?? "NULL"); ?>
                            <br>
                            <?php echo "Scheduler id: " . ($scheduler->id ?? "NULL"); ?>
                            <div class="assigned-stations" id="stations_<?php echo $scheduler->id; ?>">
                                <?php echo "Assigned Station: " . ($scheduler->station ?? "NULL"); ?>
                                <br>
                                <?php echo "Assigned Station id: " . ($scheduler->station_id ?? "NULL"); ?>
                            </div>
                            <div class="edit-button-container" id="scheduler-edit-button-container_<?php echo $scheduler->id; ?>" style="display: none;">
                            <button class="edit-button btn btn-primary" onclick="editScheduler(<?php echo $scheduler->id; ?>)">Edit</button>
                            </div>
                        </div>
                    <?php endforeach; ?>
            <?php else : ?>
                <p>No schedulers found.</p>
            <?php endif; ?>
        </div>
    </div>

    <div class="container" id="stations-container">
        <h2>Stations</h2>
        <div id="stations-list">
            <?php if (isset($data['stations']) && is_array($data['stations'])) : ?>
                <!-- <h2>Stations</h2> -->
                    <?php foreach ($data['stations'] as $station) : ?>
                        <div class="stations-container" onclick="toggleSchedulers(<?php echo $station->station_id; ?>)">
                            <?php echo "station name: ". ($station->station ?? "NULL"); ?>
                            <br>
                            <?php echo "Station id: " . ($station->station_id ?? "NULL"); ?>
                            <div class="assigned-schedulers" id="schedulers_<?php echo $station->station_id; ?>">
                                <?php echo "Assigned Scheduler: " . ($station->scheduler_name ?? "NULL"); ?>
                                <br>
                                <?php echo "Assigned Scheduler id: " .($station->scheduler_id ?? "NULL"); ?>
                            </div>
                            <div class="edit-button-container" id="station-edit-button-container_<?php echo $station->station_id; ?>" style="display: none;">
                            <button class="edit-button btn btn-primary" onclick="editStation(<?php echo $station->station_id; ?>)">Edit</button>
                        </div>
                        </div>
                    <?php endforeach; ?>
            <?php else : ?>
                <p>No stations found.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src = "<?php echo URLROOT; ?>/js/admins/add_scheduler.js"></script>


<?php require APPROOT . '/views/inc/footer.php'; ?>