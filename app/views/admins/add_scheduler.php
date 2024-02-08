<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href = "<?php echo URLROOT; ?>/css/admins/add_scheduler.css">

<div class="main-container">
    <div class="container" id="scheduler-container">
        <h2>Schedulers</h2>
        <div id="scheduler-list">
            <?php if (isset($data['schedulers']) && is_array($data['schedulers'])) : ?>
                <!-- <h2>Schedulers</h2> -->
                    <?php foreach ($data['schedulers'] as $scheduler) : ?>
                        <div class="scheduler-container" onclick="toggleStations(<?php echo $scheduler->scheduler_id; ?>, event)">
                            <?php echo "Scheduler name: " . ($scheduler->name ?? "NULL"); ?>
                            <br>
                            <?php echo "Scheduler id: " . ($scheduler->scheduler_id ?? "NULL"); ?>
                            <div class="assigned-stations" id="stations_<?php echo $scheduler->scheduler_id; ?>">
                                <?php echo "Assigned Station: " . ($scheduler->station_names ?? "NULL"); ?>
                                <br>
                                <?php echo "Assigned Station id: " . ($scheduler->station_ids ?? "NULL"); ?>
                            </div>
                            <div class="edit-button-container" id="scheduler-edit-button-container_<?php echo $scheduler->scheduler_id; ?>" style="display: none;">
                                <button class="btn btn-primary" onclick="openStationModal(<?php echo $scheduler->scheduler_id; ?>)">Edit</button>
                                <!-- The Modal -->
                                <div id="stationModal_<?php echo $scheduler->scheduler_id; ?>" class="modal">

                                <!-- Modal content -->
                                    <div class="modal-content">
                                        <span class="close" data-modal-id="stationModal_<?php echo $scheduler->scheduler_id; ?>" onclick="closeModal()">&times;</span>


                                        <label for="stationSelect">Select Stations:</label>
                                        <input type="text" id="stationSearch_<?php echo $scheduler->scheduler_id; ?>" oninput="filterStations(<?php echo $scheduler->scheduler_id; ?>)" placeholder="Search for stations">
                                        <select multiple id="stationSelect_<?php echo $scheduler->scheduler_id; ?>">
                                            <!-- Add options dynamically based on available stations -->
                                            <?php foreach ($data['stations'] as $station) : ?>
                                                <option value="<?php echo $station->station_id; ?>">
                                                    <?php echo $station->station; ?>
                                                </option>
                                            <?php endforeach; ?>

                                        </select>
                                        <button class="btn btn-primary" onclick="updateStations(<?php echo $scheduler->scheduler_id; ?>)">Save</button>
                                        
                                    </div>

                                </div>
                                    
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
                        <div class="stations-container" onclick="toggleSchedulers(<?php echo $station->station_id; ?>,event)">
                            <?php echo "station name: ". ($station->station ?? "NULL"); ?>
                            <br>
                            <?php echo "Station id: " . ($station->station_id ?? "NULL"); ?>
                            <div class="assigned-schedulers" id="schedulers_<?php echo $station->station_id; ?>">
                                <?php echo "Assigned Scheduler: " . ($station->scheduler_names ?? "NULL"); ?>
                                <br>
                                <?php echo "Assigned Scheduler id: " .($station->scheduler_ids ?? "NULL"); ?>
                            </div>
                            <div class="edit-button-container" id="station-edit-button-container_<?php echo $station->station_id; ?>" style="display: none;">
                            <button class="btn btn-primary" id="edit-button">Edit</button>

                            
                            

                               
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