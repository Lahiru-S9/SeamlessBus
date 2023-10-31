<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href = "<?php echo URLROOT; ?>/css/schedule/index.css">




    <div class="container">
        <div class="header">
            
            <div class="header-title">Bus Schedules</div>
            <div class="header-subtitle">Get updated information about bus schedules</div><br><br>
            

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
                        <th class="table__cell tv5-text-left" scope="col">arrival time</th>
                        <th class="table__cell tv5-text-right" scope="col">departure time</th>
                    </tr>
                </thead>

                <tbody class="table__body">
        
                    <?php foreach   ($data['schedule'] as $schedule) : ?>
                        <tr class="table__row">
                            <td class="table__cell" role="cell">
                                <span class="table__label" aria-hidden="true"></span> <?php echo $schedule->from_station; ?>
                            </td>

                            <td class="table__cell" role="cell">
                                <span class="table__label" aria-hidden="true"></span> <?php echo $schedule->to_station; ?>
                            </td>

                            <td class="table__cell" role="cell">
                                <span class="table__label" aria-hidden="true"></span>  <?php echo $schedule->arrival_time; ?>
                            </td>

                            <td class="table__cell tv5-text-right" role="cell">
                                <span class="table__label" aria-hidden="true"></span> <?php echo $schedule->departure_time; ?>
                            </td>

                            <td class="table__cell" role="cell">
                                <form action="<?php if($_SESSION['usertype']=='RegPassenger'){
                                    echo URLROOT.'/RegPassenger/book';
                                }else{
                                    echo URLROOT.'/Gpassenger/book';
                                } ?>" method="post"> 
                                    <input type="hidden" name="schedule_id" value="<?php echo $schedule->id; ?>">
                                    <button type="submit" class="btn btn-primary">Book</button>
                                </form>
                            </td>
                        </tr>
            
                    <?php endforeach; ?> 
                </tbody>
            </table>
        </div>

        
    <div class="footer">
        <img src="<?php echo URLROOT; ?>/img/logo_bw.png">
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
    




<?php require APPROOT . '/views/inc/footer.php'; ?>