<?php require APPROOT . '/views/inc/header.php'; ?>

<link rel="stylesheet" href = "<?php echo URLROOT; ?>/css/Owners/AddBuses.css">
<div class="background-image">
    <img src="<?php echo URLROOT; ?>/img/bus_timeslots.jpg" alt="background image">
</div>  
<div class="form-wrapper">
<div class="container">
        <h2>ADD THE BUS</h2>
        
        
        <form action="<?php echo URLROOT; ?>/Owners/AddBuses" method="POST">
            <div class="form-group">
                <label for="bus_number">Bus No:  <sup></sup></label>
                <input type="text" class="custom-input <?php echo (!empty($data['bus_number_err'])) ? 'is-invalid' : ''; ?>" name="bus_number" value="<?php echo $data['bus_number']; ?>" >
                <span class="error-message"><?php echo $data['bus_number_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="bus_model">Bus Model: <sup></sup></label>
                <input type="text" class="custom-input <?php echo (!empty($data['bus_model_err'])) ? 'is-invalid' : ''; ?>" name="bus_model" value="<?php echo $data['bus_model']; ?>">
                <span class="error-message"><?php echo $data['bus_model_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="bus_seat">No of Bus Seats: <sup></sup></label>
                <input type="number" class="custom-input <?php echo (!empty($data['bus_seat_err'])) ? 'is-invalid' : ''; ?>" name="bus_seat" value="<?php echo $data['bus_seat']; ?>">
                <span class="error-message"><?php echo $data['bus_seat_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="permit_id">Permit ID: <sup></sup></label>
                <input type="text" class="custom-input <?php echo (!empty($data['permit_id_err'])) ? 'is-invalid' : ''; ?>" name="permit_id" value="<?php echo $data['permit_id']; ?>">
                <span class="error-message"><?php echo $data['permit_id_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="seats_per_row">Seats Per Row: <sup></sup></label>
                <input type="text" class="custom-input <?php echo (!empty($data['seats_per_row_err'])) ? 'is-invalid' : ''; ?>" name="seats_per_row" value="<?php echo $data['seats_per_row']; ?>">
                <span class="error-message"><?php echo $data['seats_per_row_err']; ?></span>
            </div>

            <div class="form-group">
                <label for="request_a_route">request a route: <sup></sup></label>
                <input id="myInput" class="custom-input" onkeyup="filterFunction()" onclick="showDropdown()" name="request_a_route">
                <div id="dropdown" class="dropdown-content">
                    <?php foreach($data['route_numbers'] as $route) : ?>
                        <a href="#route<?php echo $route->{'Route Number'}; ?>" onclick = "selectValue('<?php echo $route->{'Route Number'}; ?>')"><?php echo $route->{'Route Number'}; ?></a>
                    <?php endforeach; ?>
                    <!-- Add as many routes as you need -->
                </div>
                <span class="error-message"></span>
            </div>


            <div class="form-group">
                
                <input type="submit" value="Register" class="btn btn-submit">
            </div>
        </form>
    </div>
</div>

<script src="<?php echo URLROOT; ?>/js/Owners/addBuses.js"></script>

<?php require APPROOT . '/views/inc/footer.php'; ?>
