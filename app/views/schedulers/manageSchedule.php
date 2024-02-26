<!-- Include the header file -->
<?php include_once APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href = "<?php echo URLROOT; ?>/css/schedulers/manageSchedule.css">

<div class="tabs-container">

    <div class="tabs">
        <div class="tab">
            <input type="radio" id="tab-1" name="tab-group-1" checked>
            <label for="tab-1">Monday</label>
            
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
                            <div class="table-row">		
                                <div class="table-data"><?php echo $schedule->route_num; ?></div>
                                <div class="table-data"><?php echo $schedule->arrival_time; ?></div>
                                <div class="table-data"><?php echo $schedule->departure_time; ?></div>
                                <div class="table-data"><?php echo $schedule->from_station; ?></div>
                                <div class="table-data"><?php echo $schedule->to_station; ?></div>
                                <div class="table-data">
                                    <a href="<?php echo URLROOT; ?>/schedulers/editSchedule/<?php echo $schedule->id; ?>" class="btn btn-primary">Edit</a>
                                    <a href="<?php echo URLROOT; ?>/schedulers/deleteSchedule/<?php echo $schedule->id; ?>" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>	
                </div>
            </div>

            
            </div>
        </div> 

        
        <div class="tab">
            <input type="radio" id="tab-2" name="tab-group-1">
            <label for="tab-2">Tuesday</label>
            
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
                            <div class="table-row">		
                                <div class="table-data"><?php echo $schedule->route_num; ?></div>
                                <div class="table-data"><?php echo $schedule->arrival_time; ?></div>
                                <div class="table-data"><?php echo $schedule->departure_time; ?></div>
                                <div class="table-data"><?php echo $schedule->from_station; ?></div>
                                <div class="table-data"><?php echo $schedule->to_station; ?></div>
                                <div class="table-data">
                                    <a href="<?php echo URLROOT; ?>/schedulers/editSchedule/<?php echo $schedule->id; ?>" class="btn btn-primary">Edit</a>
                                    <a href="<?php echo URLROOT; ?>/schedulers/deleteSchedule/<?php echo $schedule->id; ?>" class="btn btn-danger">Delete</a>
                                    </div>
                            </div>
                        <?php endforeach; ?>
                        
                    </div>	
                </div>
            </div>
            </div>
        </div> 

        
        <div class="tab">
            <input type="radio" id="tab-3" name="tab-group-1">
            <label for="tab-3">Wednesday</label>
            
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
                            <div class="table-row">		
                                <div class="table-data"><?php echo $schedule->route_num; ?></div>
                                <div class="table-data"><?php echo $schedule->arrival_time; ?></div>
                                <div class="table-data"><?php echo $schedule->departure_time; ?></div>
                                <div class="table-data"><?php echo $schedule->from_station; ?></div>
                                <div class="table-data"><?php echo $schedule->to_station; ?></div>
                                <div class="table-data">
                                    <a href="<?php echo URLROOT; ?>/schedulers/editSchedule/<?php echo $schedule->id; ?>" class="btn btn-primary">Edit</a>
                                    <a href="<?php echo URLROOT; ?>/schedulers/deleteSchedule/<?php echo $schedule->id; ?>" class="btn btn-danger">Delete</a>
                                    </div>
                            </div>
                        <?php endforeach; ?>
                    </div>	
                </div>

            </div> 
            </div>
        </div>

        <div class="tab">
            <input type="radio" id="tab-4" name="tab-group-1">
            <label for="tab-4">Thursday</label>
            
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
                            <div class="table-row">		
                                <div class="table-data"><?php echo $schedule->route_num; ?></div>
                                <div class="table-data"><?php echo $schedule->arrival_time; ?></div>
                                <div class="table-data"><?php echo $schedule->departure_time; ?></div>
                                <div class="table-data"><?php echo $schedule->from_station; ?></div>
                                <div class="table-data"><?php echo $schedule->to_station; ?></div>
                                <div class="table-data">
                                    <a href="<?php echo URLROOT; ?>/schedulers/editSchedule/<?php echo $schedule->id; ?>" class="btn btn-primary">Edit</a>
                                    <a href="<?php echo URLROOT; ?>/schedulers/deleteSchedule/<?php echo $schedule->id; ?>" class="btn btn-danger">Delete</a>
                                    </div>
                            </div>
                        <?php endforeach; ?>
                    </div>	
                </div>

            </div> 
            </div>
        </div>

        <div class="tab">
            <input type="radio" id="tab-5" name="tab-group-1">
            <label for="tab-5">Friday</label>
            
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
                            <div class="table-row">		
                                <div class="table-data"><?php echo $schedule->route_num; ?></div>
                                <div class="table-data"><?php echo $schedule->arrival_time; ?></div>
                                <div class="table-data"><?php echo $schedule->departure_time; ?></div>
                                <div class="table-data"><?php echo $schedule->from_station; ?></div>
                                <div class="table-data"><?php echo $schedule->to_station; ?></div>
                                <div class="table-data">
                                    <a href="<?php echo URLROOT; ?>/schedulers/editSchedule/<?php echo $schedule->id; ?>" class="btn btn-primary">Edit</a>
                                    <a href="<?php echo URLROOT; ?>/schedulers/deleteSchedule/<?php echo $schedule->id; ?>" class="btn btn-danger">Delete</a>
                                    </div>
                            </div>
                        <?php endforeach; ?>
                    </div>	
                </div>

            </div> 
            </div>
        </div>

        <div class="tab">
            <input type="radio" id="tab-6" name="tab-group-1">
            <label for="tab-6">Saturday</label>
            
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
                            <div class="table-row">		
                                <div class="table-data"><?php echo $schedule->route_num; ?></div>
                                <div class="table-data"><?php echo $schedule->arrival_time; ?></div>
                                <div class="table-data"><?php echo $schedule->departure_time; ?></div>
                                <div class="table-data"><?php echo $schedule->from_station; ?></div>
                                <div class="table-data"><?php echo $schedule->to_station; ?></div>
                                <div class="table-data">
                                    <a href="<?php echo URLROOT; ?>/schedulers/editSchedule/<?php echo $schedule->id; ?>" class="btn btn-primary">Edit</a>
                                    <a href="<?php echo URLROOT; ?>/schedulers/deleteSchedule/<?php echo $schedule->id; ?>" class="btn btn-danger">Delete</a>
                                    </div>
                            </div>
                        <?php endforeach; ?>
                    </div>	
                </div>

            </div> 
            </div>
        </div>

        <div class="tab">
            <input type="radio" id="tab-7" name="tab-group-1">
            <label for="tab-7">Sunday</label>
            
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
                            <div class="table-row">		
                                <div class="table-data"><?php echo $schedule->route_num; ?></div>
                                <div class="table-data"><?php echo $schedule->arrival_time; ?></div>
                                <div class="table-data"><?php echo $schedule->departure_time; ?></div>
                                <div class="table-data"><?php echo $schedule->from_station; ?></div>
                                <div class="table-data"><?php echo $schedule->to_station; ?></div>
                                <div class="table-data">
                                    <a href="<?php echo URLROOT; ?>/schedulers/editSchedule/<?php echo $schedule->id; ?>" class="btn btn-primary">Edit</a>
                                    <a href="<?php echo URLROOT; ?>/schedulers/deleteSchedule/<?php echo $schedule->id; ?>" class="btn btn-danger">Delete</a>
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


<div class="form-container" >
    <h1>Add New</h1>
    <div>
        <h4>Fill</h4>
        <br>
        <form id="myForm">
            <label for="route_num">Route Number</label>
            <div class="custom-select" style="width:200px;">
                
                <select name="route_nums" id="route-select">
                    <option value="">Select Route Number</option>
                    <?php foreach($data['routeNumbers'] as $route) : ?>
                        <option value="<?php echo $route->route_num; ?>"><?php echo $route->route_num; ?></option>
                    <?php endforeach; ?>
                    
                    
                </select>
            </div>
            <label for="arrival">Arrival Time:</label>
            <input type="time" id="arrival" placeholder="Enter Arrival Time" name="arrival">
            <label for="departure">Departure Time:</label>
            <input type="time" id="departure" placeholder="Enter Departure Time" name="departure">
            <label for="from">From Station:</label>
            <label for="from">From Station:</label>
            <div class="custom-select" style="width:200px;">
                <select name="stations" id="from-station-select"></select>
            </div>
            <label for="to">To Station:</label>
            <div class="custom-select" style="width:200px;">
                <select name="to_stations" id="to-station-select"></select>
            </div>
            <button type="button" class="btn btn-danger" onclick="add()">Add</button>
            <button type="button" class="btn btn-secondary" onclick="reset()">Reset</button>
        </form>
    </div>
</div>





<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="<?php echo URLROOT; ?>/js/schedulers/manageSchedule.js"></script>



<?php require APPROOT . '/views/inc/footer.php'; ?>
