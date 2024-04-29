<!-- Include the header file -->
<?php include_once APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href = "<?php echo URLROOT; ?>/css/schedulers/manageSchedule.css">
<div class="outer-container">
<div class="form-container" >
    <h1>Add New Schedule</h1>
    <div>
        <br>
        <form id="myForm">
        <div class="group">
            <label for="selected-tab">Select Day:</label>
            <select id="selected-tab" name="selected_tab" onchange="updateSelectedTab(this.value)">
                <option value="monday" selected>Monday</option>
                <option value="tuesday">Tuesday</option>
                <option value="wednesday">Wednesday</option>
                <option value="thursday">Thursday</option>
                <option value="friday">Friday</option>
                <option value="saturday">Saturday</option>
                <option value="sunday">Sunday</option>
            </select><br>

            
            <label for="route_num">Route Number</label>
            <div class="custom-select">
                
                <select name="route_nums" id="route-select">
                    <option value="">Select Route Number</option>
                    <?php foreach($data['routeNumbers'] as $route) : ?>
                        <option value="<?php echo $route->route_num; ?>"><?php echo $route->route_num; ?></option>
                    <?php endforeach; ?>
                    
                    
                </select>
            </div></div>
            <div class="group">
            <label for="arrival">Arrival Time:</label>
            <input type="time" id="arrival" placeholder="Enter Arrival Time" name="arrival">
            <label for="departure">Departure Time:</label>
            <input type="time" id="departure" placeholder="Enter Departure Time" name="departure">
            </div>
            <div class="group">
            <label for="from">From Station:</label>
            <div class="custom-select">
                <select name="stations" id="from-station-select"></select>
            </div>
            <label for="to">To Station:</label>
            <div class="custom-select">
                <select name="to_stations" id="to-station-select"></select>
            </div></div>
            <div class="group">
            <label for="route_id">Route ID:</label>
            <div id="route-id-display"></div><br>
            <button type="button" class="btn btn-danger" onclick="add()">Add</button>
            <button type="button" class="btn btn-secondary" onclick="reset()">Reset</button></div>
        </form>
    </div>
</div>
<div class="tabs-container">
    <div class="tabs">
        <div class="tab">
            <input type="radio" id="monday" name="tab-group-1" checked onchange="updateSelectedTab('monday')">
            <label for="monday">Monday</label>
            
            <div class="content">
            <!-- Your table goes here for Tab One -->
            <div class="container">
                <div class="table">
                    <div class="table-header">
                        <div class="header__item"><a id="route_num" class="filter__link filter__link--number" href="#">Route Num</a></div>
                        <div class="header__item"><a id="arrival" class="filter__link filter__link--number" href="#">Arrival Time</a></div>
                        <div class="header__item"><a id="departure" class="filter__link filter__link--number" href="#">Departure Time</a></div>
                        <div class="header__item"><a id="from" class="filter__link" href="#">From station</a></div>
                        <div class="header__item"><a id="to" class="filter__link" href="#">To station</a></div>
                        <div class="header__item"><a class="filter__link" href="#">Actions</a></div>
                    </div>
                    <div class="table-content">	
                        <?php foreach($data['monday'] as $schedule) : ?>
                            <div class="table-row" id="schedule-<?php echo $schedule->id; ?>">		
                                <div class="table-data"><?php echo $schedule->route_num; ?></div>
                                <div class="table-data"><?php echo $schedule->arrival_time; ?></div>
                                <div class="table-data"><?php echo $schedule->departure_time; ?></div>
                                <div class="table-data"><?php echo $schedule->from_station; ?></div>
                                <div class="table-data"><?php echo $schedule->to_station; ?></div>
                                <div class="table-data">
                                    <button class="btn btn-primary edit-btn" data-id="<?php echo $schedule->id;?>">Edit</button>
                                    <button class="btn btn-danger delete-btn" data-id="<?php echo $schedule->id;?>">Delete</button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>	
                </div>
            </div>

            
            </div>
        </div> 

        
        <div class="tab">
            <input type="radio" id="tuesday" name="tab-group-1" onchange="updateSelectedTab('tuesday')">
            <label for="tuesday">Tuesday</label>
            
            <div class="content">
            <!-- Your table goes here for Tab Two -->
            <div class="container">
                <div class="table">
                <div class="table-header">
                        <div class="header__item"><a id="route_num" class="filter__link filter__link--number" href="#">Route Num</a></div>
                        <div class="header__item"><a id="arrival" class="filter__link filter__link--number" href="#">Arrival Time</a></div>
                        <div class="header__item"><a id="departure" class="filter__link filter__link--number" href="#">Departure Time</a></div>
                        <div class="header__item"><a id="from" class="filter__link" href="#">From station</a></div>
                        <div class="header__item"><a id="to" class="filter__link" href="#">To station</a></div>
                        <div class="header__item"><a class="filter__link" href="#">Actions</a></div>
                    </div>
                    <div class="table-content">	
                    <?php foreach($data['tuesday'] as $schedule) : ?>
                            <div class="table-row" id="schedule-<?php echo $schedule->id; ?>">	
                                <div class="table-data"><?php echo $schedule->route_num; ?></div>
                                <div class="table-data"><?php echo $schedule->arrival_time; ?></div>
                                <div class="table-data"><?php echo $schedule->departure_time; ?></div>
                                <div class="table-data"><?php echo $schedule->from_station; ?></div>
                                <div class="table-data"><?php echo $schedule->to_station; ?></div>
                                <div class="table-data">
                                    <button class="btn btn-primary edit-btn" data-id="<?php echo $schedule->id;?>">Edit</button>
                                    <button class="btn btn-danger delete-btn" data-id="<?php echo $schedule->id;?>">Delete</button>
                                    </div>
                            </div>
                        <?php endforeach; ?>
                        
                    </div>	
                </div>
            </div>
            </div>
        </div> 

        
        <div class="tab">
            <input type="radio" id="wednesday" name="tab-group-1" onchange="updateSelectedTab('wednesday')">
            <label for="wednesday">Wednesday</label>
            
            <div class="content">
            <!-- Your table goes here for Tab Three -->
            <div class="container">
                <div class="table">
                    <div class="table-header">
                        <div class="header__item"><a id="route_num" class="filter__link filter__link--number" href="#">Route Num</a></div>
                        <div class="header__item"><a id="arrival" class="filter__link filter__link--number" href="#">Arrival Time</a></div>
                        <div class="header__item"><a id="departure" class="filter__link filter__link--number" href="#">Departure Time</a></div>
                        <div class="header__item"><a id="from" class="filter__link" href="#">From station</a></div>
                        <div class="header__item"><a id="to" class="filter__link" href="#">To station</a></div>
                        <div class="header__item"><a class="filter__link" href="#">Actions</a></div>
                    </div>
                    <div class="table-content">	
                    <?php foreach($data['wednesday'] as $schedule) : ?>
                            <div class="table-row" id="schedule-<?php echo $schedule->id; ?>">	
                                <div class="table-data"><?php echo $schedule->route_num; ?></div>
                                <div class="table-data"><?php echo $schedule->arrival_time; ?></div>
                                <div class="table-data"><?php echo $schedule->departure_time; ?></div>
                                <div class="table-data"><?php echo $schedule->from_station; ?></div>
                                <div class="table-data"><?php echo $schedule->to_station; ?></div>
                                <div class="table-data">
                                    <button class="btn btn-primary edit-btn" data-id="<?php echo $schedule->id;?>">Edit</button>
                                    <button class="btn btn-danger delete-btn" data-id="<?php echo $schedule->id;?>">Delete</button>
                                    </div>
                            </div>
                        <?php endforeach; ?>
                    </div>	
                </div>

            </div> 
            </div>
        </div>

        <div class="tab">
            <input type="radio" id="thursday" name="tab-group-1" onchange="updateSelectedTab('thursday')">
            <label for="thursday">Thursday</label>
            
            <div class="content">
            <!-- Your table goes here for Tab Three -->
            <div class="container">
                <div class="table">
                    <div class="table-header">
                        <div class="header__item"><a id="route_num" class="filter__link filter__link--number" href="#">Route Num</a></div>
                        <div class="header__item"><a id="arrival" class="filter__link filter__link--number" href="#">Arrival Time</a></div>
                        <div class="header__item"><a id="departure" class="filter__link filter__link--number" href="#">Departure Time</a></div>
                        <div class="header__item"><a id="from" class="filter__link" href="#">From station</a></div>
                        <div class="header__item"><a id="to" class="filter__link" href="#">To station</a></div>
                        <div class="header__item"><a class="filter__link" href="#">Actions</a></div>
                    </div>
                    <div class="table-content">	
                        <?php foreach($data['thursday'] as $schedule) : ?>
                            <div class="table-row" id="schedule-<?php echo $schedule->id; ?>">	
                                <div class="table-data"><?php echo $schedule->route_num; ?></div>
                                <div class="table-data"><?php echo $schedule->arrival_time; ?></div>
                                <div class="table-data"><?php echo $schedule->departure_time; ?></div>
                                <div class="table-data"><?php echo $schedule->from_station; ?></div>
                                <div class="table-data"><?php echo $schedule->to_station; ?></div>
                                <div class="table-data">
                                    <button class="btn btn-primary edit-btn" data-id="<?php echo $schedule->id;?>">Edit</button>
                                    <button class="btn btn-danger delete-btn" data-id="<?php echo $schedule->id;?>">Delete</button>
                                    </div>
                            </div>
                        <?php endforeach; ?>
                    </div>	
                </div>

            </div> 
            </div>
        </div>

        <div class="tab">
            <input type="radio" id="friday" name="tab-group-1" onchange="updateSelectedTab('friday')">
            <label for="friday">Friday</label>
            
            <div class="content">
            <!-- Your table goes here for Tab Three -->
            <div class="container">
                <div class="table">
                    <div class="table-header">
                        <div class="header__item"><a id="route_num" class="filter__link filter__link--number" href="#">Route Num</a></div>
                        <div class="header__item"><a id="arrival" class="filter__link filter__link--number" href="#">Arrival Time</a></div>
                        <div class="header__item"><a id="departure" class="filter__link filter__link--number" href="#">Departure Time</a></div>
                        <div class="header__item"><a id="from" class="filter__link" href="#">From station</a></div>
                        <div class="header__item"><a id="to" class="filter__link" href="#">To station</a></div>
                        <div class="header__item"><a class="filter__link" href="#">Actions</a></div>
                    </div>
                    <div class="table-content">	
                        <?php foreach($data['friday'] as $schedule) : ?>
                            <div class="table-row" id="schedule-<?php echo $schedule->id; ?>">	
                                <div class="table-data"><?php echo $schedule->route_num; ?></div>
                                <div class="table-data"><?php echo $schedule->arrival_time; ?></div>
                                <div class="table-data"><?php echo $schedule->departure_time; ?></div>
                                <div class="table-data"><?php echo $schedule->from_station; ?></div>
                                <div class="table-data"><?php echo $schedule->to_station; ?></div>
                                <div class="table-data">
                                    <button class="btn btn-primary edit-btn" data-id="<?php echo $schedule->id;?>">Edit</button>
                                    <button class="btn btn-danger delete-btn" data-id="<?php echo $schedule->id;?>">Delete</button>
                                    </div>
                            </div>
                        <?php endforeach; ?>
                    </div>	
                </div>

            </div> 
            </div>
        </div>

        <div class="tab">
            <input type="radio" id="saturday" name="tab-group-1" onchange="updateSelectedTab('saturday')">
            <label for="saturday">Saturday</label>
            
            <div class="content">
            <!-- Your table goes here for Tab Three -->
            <div class="container">
                <div class="table">
                    <div class="table-header">
                        <div class="header__item"><a id="route_num" class="filter__link filter__link--number" href="#">Route Num</a></div>
                        <div class="header__item"><a id="arrival" class="filter__link filter__link--number" href="#">Arrival Time</a></div>
                        <div class="header__item"><a id="departure" class="filter__link filter__link--number" href="#">Departure Time</a></div>
                        <div class="header__item"><a id="from" class="filter__link" href="#">From station</a></div>
                        <div class="header__item"><a id="to" class="filter__link" href="#">To station</a></div>
                        <div class="header__item"><a class="filter__link" href="#">Actions</a></div>
                    </div>
                    <div class="table-content">	
                    <?php foreach($data['saturday'] as $schedule) : ?>
                            <div class="table-row" id="schedule-<?php echo $schedule->id; ?>">	
                                <div class="table-data"><?php echo $schedule->route_num; ?></div>
                                <div class="table-data"><?php echo $schedule->arrival_time; ?></div>
                                <div class="table-data"><?php echo $schedule->departure_time; ?></div>
                                <div class="table-data"><?php echo $schedule->from_station; ?></div>
                                <div class="table-data"><?php echo $schedule->to_station; ?></div>
                                <div class="table-data">
                                    <button class="btn btn-primary edit-btn" data-id="<?php echo $schedule->id;?>">Edit</button>
                                    <button class="btn btn-danger delete-btn" data-id="<?php echo $schedule->id;?>">Delete</button>
                                    </div>
                            </div>
                        <?php endforeach; ?>
                    </div>	
                </div>

            </div> 
            </div>
        </div>

        <div class="tab">
            <input type="radio" id="sunday" name="tab-group-1" onchange="updateSelectedTab('sunday')">
            <label for="sunday">Sunday</label>
            
            <div class="content">
            <!-- Your table goes here for Tab Three -->
            <div class="container">
                <div class="table">
                    <div class="table-header">
                        <div class="header__item"><a id="route_num" class="filter__link filter__link--number" href="#">Route Num</a></div>
                        <div class="header__item"><a id="arrival" class="filter__link filter__link--number" href="#">Arrival Time</a></div>
                        <div class="header__item"><a id="departure" class="filter__link filter__link--number" href="#">Departure Time</a></div>
                        <div class="header__item"><a id="from" class="filter__link" href="#">From station</a></div>
                        <div class="header__item"><a id="to" class="filter__link" href="#">To station</a></div>
                        <div class="header__item"><a class="filter__link" href="#">Actions</a></div>
                    </div>
                    <div class="table-content">	
                    <?php foreach($data['sunday'] as $schedule) : ?>
                            <div class="table-row" id="schedule-<?php echo $schedule->id; ?>">	
                                <div class="table-data"><?php echo $schedule->route_num; ?></div>
                                <div class="table-data"><?php echo $schedule->arrival_time; ?></div>
                                <div class="table-data"><?php echo $schedule->departure_time; ?></div>
                                <div class="table-data"><?php echo $schedule->from_station; ?></div>
                                <div class="table-data"><?php echo $schedule->to_station; ?></div>
                                <div class="table-data">
                                    <button class="btn btn-primary edit-btn" data-id="<?php echo $schedule->id;?>" >Edit</button>
                                    <button class="btn btn-danger delete-btn" data-id="<?php echo $schedule->id;?>">Delete</button>
                                    </div>
                            </div>
                        <?php endforeach; ?>
                    </div>	
                </div>

            </div> 
            </div>
        </div>

        
    </div>
</div>



</div>

<script>
function updateSelectedTab(tab) {
    document.getElementById("selected-tab").value = tab;
    // Update the radio button selection (if needed)
    document.getElementById(tab).checked = true;
  }
</script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="<?php echo URLROOT; ?>/js/schedulers/manageSchedule.js"></script>
