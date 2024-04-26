<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href = "<?php echo URLROOT; ?>/css/schedule/index.css">


    
    <div class="container">
        <div class="header">
            
            <div class="header-title">Bus Schedules</div>
            <div class="header-subtitle">Get updated information about bus schedules</div><br><br>
            
            <div class="guest-info">
                <?php if(!isset($_SESSION['user_id'])) : ?>
                    <input type="text" name="name" placeholder="  Name"/>
                    <input type="text" name="nic" placeholder="  NIC"/>
                    <input type="text" name="phone" placeholder="   Phone"/><br><br>
                <?php endif; ?>
            </div>


            <div class ="col-md-7">
                
                <div class="col-md-4">
                    <form action="<?php echo URLROOT ?>/Schedule/index" method="POST">
                    
                        <div class ="row">
                            <select name ="from" class="form-select">
                                <option value="" disabled selected>From</option>
                                <?php foreach   ($data['stations'] as $station) : ?>
                                    <option value="<?php echo $station->id; ?>"><?php echo $station->station; ?></option>
                                <?php endforeach; ?>
                            </select>
                        
                            <select name ="to" class="form-select">
                                <option value="" disabled selected>To</option>
                                <?php foreach   ($data['stations'] as $station) : ?>
                                    <option value="<?php echo $station->id; ?>"><?php echo $station->station; ?></option>
                                <?php endforeach; ?>
                            </select>

                            <select name="day" class="form-select">
                                <option value="" disabled selected>Day</option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                                <option value="Sunday">Sunday</option>
                            </select>

                            <input type="date" name="date" class="form-control" placeholder="Date">

                            <select name ="Route" class="form-select">
                                <option value="" disabled selected>Route Number</option>
                                <?php foreach   ($data['route_nums'] as $route_num) : ?>
                                    <option value="<?php echo $route_num->{'Route Number'}; ?>"><?php echo $route_num->{'Route Number'}; ?></option>
                                <?php endforeach; ?>
                            </select>
                            

                            <div class = "col-md-4">
                                <button type="submit" class="btn btn-primary">Search</button>
                                <a href="<?php echo URLROOT?>/Schedule/index" class="btn btn-danger">Reset</a>
                            </div>

                        </div>
                   
                        
                    </form>
                </div>
            </div>

        </div>
        <div class ="row">

           

            <table class="table table--expanded@xs tv5-position-relative tv5-z-index-1 tv5-width-100% tv5-text-sm js-table" aria-label="Table Example">
                <thead class="table__header">
                    <tr class="table__row">
                        <th class="table__cell tv5-text-left" scope="col">from</th>
                        <th class="table__cell tv5-text-left" scope="col">destination</th>
                        <th class="table__cell tv5-text-right" scope="col">Route Number</th>
                        <th class="table__cell tv5-text-right" scope="col">Day</th>
                        <th class="table__cell tv5-text-right" scope="col">Date</th>
                        <th class="table__cell tv5-text-left" scope="col">arrival time</th>
                        <th class="table__cell tv5-text-right" scope="col">departure time</th>
                        <th class="table__cell tv5-text-right" scope="col">Action</th>
                    </tr>
                </thead>

                <tbody class="table__body">
        
                    <?php foreach   ($data['schedule'] as $index => $schedule) : ?>
                        <tr class="table__row">
                            <td class="table__cell" role="cell">
                                <span class="table__label" aria-hidden="true"></span> <?php echo $schedule->from_station; ?>
                            </td>

                            <td class="table__cell" role="cell">
                                <span class="table__label" aria-hidden="true"></span> <?php echo $schedule->to_station; ?>
                            </td>

                            <td class="table__cell" role="cell">
                                <span class="table__label" aria-hidden="true"></span> <?php echo $schedule->route_num; ?>
                            </td>

                            <td class="table__cell" role="cell">
                                <span class="table__label" aria-hidden="true"></span> <?php echo $schedule->day; ?>
                            </td>

                            <td class="table__cell" role="cell">
                                <span class="table__label" aria-hidden="true"></span> <?php echo $schedule->date; ?>
                            </td>

                            <td class="table__cell" role="cell">
                                <span class="table__label" aria-hidden="true"></span>  <?php echo $schedule->arrival_time; ?>
                            </td>

                            <td class="table__cell tv5-text-right" role="cell">
                                <span class="table__label" aria-hidden="true"></span> <?php echo $schedule->departure_time; ?>
                            </td>

                            <td class="table__cell" role="cell">
                                <!-- <form action="<?php if (isset($_SESSION['usertype']) && $_SESSION['usertype'] == 'RegPassenger') {
                                                    echo URLROOT.'/RegPassengers/booking';
                                                } else {
                                                    echo URLROOT.'/Gpassengers/booking';
                                                } ?>" method="post"> 
                                    <input type="hidden" name="schedule_id" value="<?php echo $schedule->id; ?>">
                                    <button type="submit" class="btn btn-primary">Book</button>
                                </form> -->
                                <?php if (isset($_SESSION['usertype']) && $_SESSION['usertype'] == 'RegPassenger') : ?>
                                    <form  action="<?php echo URLROOT; ?>/RegPassengers/booking" method="post">
                                        <input type="hidden" name="schedule_id" value="<?php echo $schedule->id; ?>">
                                        <button type="submit" class="btn btn-primary">Book</button>
                                    </form>
                                <?php else: ?>
                                    <form id="bookingForm_<?php echo $index; ?>" action="<?php echo URLROOT; ?>/Gpassengers/booking" method="post">
                                        <input type="hidden" name="schedule_id" value="<?php echo $schedule->id; ?>">
                                        <button type="submit" class="btn btn-primary">Book</button>
                                    </form>
                                <?php endif; ?>

                            </td>
                        </tr>
            
                    <?php endforeach; ?> 
                </tbody>
            </table>
        </div>
    
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?php echo URLROOT; ?>/js/schedule/index.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>