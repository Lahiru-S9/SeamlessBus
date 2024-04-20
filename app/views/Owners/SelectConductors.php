<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href = "<?php echo URLROOT; ?>/css/owners/SelectConductors.css">


<!-- HTML to display bus list -->
<div id="bus-list">
    <?php foreach ($data['buses'] as $bus): ?>
        <div class="bus">
            <span class="bus-number"><?php echo $bus->bus_no; ?></span>
            <span class="bus-route"><?php echo $bus->route_num; ?></span>
            <button class="select-btn" onclick="showConductors()">Select</button>
        </div>
    <?php endforeach; ?>
</div>

<!-- JavaScript to handle conductor display -->
<script>
function showConductors() {
    // Logic to display conductor list with assign/delete buttons
    // This is just a placeholder, you'll need to implement the actual logic// JavaScript function to toggle the conductor list visibility
function showConductors() {
    // Assuming 'conductor-list' is the ID of the div where the conductors will be shown
    var conductorListDiv = document.getElementById('conductor-list');
    
    // Check if the conductor list is currently visible
    if (conductorListDiv.style.display === 'none') {
        // If it's not visible, make it visible
        conductorListDiv.style.display = 'block';
    } else {
        // If it's visible, hide it
        conductorListDiv.style.display = 'none';
    }
}

// JavaScript function to assign a conductor to a bus
function assignConductor(conductorName) {
    // Logic to assign the conductor
    // This could involve sending a request to the server to update the database
    // For now, we'll just log the conductor's name to the console
    console.log('Assigning', conductorName);
    
    // After assigning, you might want to update the UI to reflect the change
    // For example, disable the assign button and change its text
    var assignButton = document.querySelector(`button[data-conductor='${conductorName}']`);
    assignButton.innerText = 'Already Assigned';
    assignButton.disabled = true;
}

// JavaScript function to delete a conductor from a bus
function deleteConductor(conductorName) {
    // Logic to delete the conductor
    // This could involve sending a request to the server to update the database
    // For now, we'll just log the conductor's name to the console
    console.log('Deleting', conductorName);
    
    // After deleting, you might want to remove the conductor from the UI
    var conductorDiv = document.querySelector(`div[data-conductor='${conductorName}']`);
    conductorDiv.remove();
}

}
</script>

<!-- HTML to display conductor list -->
<div id="conductor-list" style="display:none;">
    <?php foreach ($data['conductors'] as $name => $isAssigned): ?>
        <div class="conductor">
            <span class="conductor-name"><?php echo $name; ?></span>
            <button class="assign-btn"><?php echo displayAssignmentStatus($isAssigned); ?></button>
            <button class="delete-btn">Delete</button>
        </div>
    <?php endforeach; ?>
</div>
