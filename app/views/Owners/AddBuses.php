<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href = "<?php echo URLROOT; ?>/css/Owners/AddBuses.css">

<div class="container">
    <img src="<?php echo URLROOT; ?>/img/R.jpeg" alt="Background Image" />



    <div class="content">

        

        <div class="login-title">Add Buses</div>
        <div class="login-subtitle">Enter the bus details to add the new bus</div>
        
        <form action="<?php echo URLROOT; ?>/Owners/AddBuses" method="POST">
            <div class="form-group">
                <label for="bus_number">Bus No:  <sup>*</sup></label>
                <input type="text" class="custom-input <?php echo (!empty($data['bus_number_err'])) ? 'is-invalid' : ''; ?>" name="bus_number" value="<?php echo $data['bus_number']; ?>" >
                <span class="error-message"><?php echo $data['bus_number_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="bus_model">Bus Model: <sup>*</sup></label>
                <input type="text" class="custom-input <?php echo (!empty($data['bus_model_err'])) ? 'is-invalid' : ''; ?>" name="bus_model" value="<?php echo $data['bus_model']; ?>">
                <span class="error-message"><?php echo $data['bus_model_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="bus_seat">No of Bus Seats: <sup>*</sup></label>
                <input type="number" class="custom-input <?php echo (!empty($data['bus_seat_err'])) ? 'is-invalid' : ''; ?>" name="bus_seat" value="<?php echo $data['bus_seat']; ?>">
                <span class="error-message"><?php echo $data['bus_seat_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="permit_id">permit ID: <sup>*</sup></label>
                <input type="text" class="custom-input <?php echo (!empty($data['permit_id_err'])) ? 'is-invalid' : ''; ?>" name="permit_id" value="<?php echo $data['permit_id']; ?>">
                <span class="error-message"><?php echo $data['permit_id_err']; ?></span>
            </div>

            <div class="form-group">
                
                <input type="submit" value="Add Bus" class="btn btn-submit">
            </div>
        </form>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
