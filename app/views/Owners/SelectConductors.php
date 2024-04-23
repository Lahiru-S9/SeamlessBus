<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href = "<?php echo URLROOT; ?>/css/owners/SelectConductors.css">


<!-- HTML to display bus list -->
<div id="bus-list">
    <?php foreach ($data['buses'] as $bus): ?>
        <div class="bus">
            <span class="bus-number"><?php echo $bus->bus_no; ?></span><br>
            <span class="bus-ownerid">Bus No: <?php echo $bus->bus_no; ?></span><br>
            <span class="bus-model">Bus Model: <?php echo $bus->bus_model; ?></span><br>
            <span class="bus-route">Bus Route: <?php echo $bus->route_num; ?></span>
            <button class="select-btn" onclick="showConductors()">Select</button>
        </div>
    <?php endforeach; ?>
</div>
    

<script>
    // JavaScript function to toggle the conductor list visibility
    function showConductors(busNo) {
        // Assuming 'conductor-list' is the ID of the div where the conductors will be shown
        var conductorListDiv = document.getElementById('conductor-list');
        
        // Display the conductor list
        conductorListDiv.style.display = 'block';

        // Dummy conductor data (replace with actual data)
        var conductors = [
            { name: 'John Doe', age:30, yearsOfExperience: 8,isAssigned: false },
            { name: 'Jane Smith', age:28,yearsOfExperience: 5,isAssigned: true },
            { name: 'John Doe', age:30, yearsOfExperience: 8,isAssigned: false },
            { name: 'John Doe', age:30, yearsOfExperience: 8,isAssigned: false },
            { name: 'John Doe', age:30, yearsOfExperience: 8,isAssigned: false },
            { name: 'John Doe', age:30, yearsOfExperience: 8,isAssigned: false },
           
        
            // Add more conductor objects as needed
        ];

        // Construct HTML for conductor list
        var html = '';
        conductors.forEach(conductor => {
            console.log("Name: " + conductor.name); 
            console.log("Age: " + conductor.age);
            console.log("YearsOfExpereience: " + conductor.yearsOfExperience);
            console.log("Is Assigned: " + conductor.isAssigned);

            // Check if the conductor is already assigned
            var assignButton = `<button class="assign-btn" onclick="assignConductor('${conductor.name}')">Assign</button>`;
            if (conductor.isAssigned) {
                assignButton = '<button class="assign-btn" disabled>Already Assigned</button>';
            }
            html += `
            <div class="conductor">
                            <span>Name: ${conductor.name}</span><br>
                            <span>Age: ${conductor.age}</span><br>
                            <span>Years of Experience: ${conductor.yearsOfExperience}</span><br>
                            <button class="assign-btn" onclick="assignConductor('${conductor.name}')">Assign</button>
                            <button class="delete-btn" onclick="deleteConductor('${conductor.name}')">Delete</button>
                        </div>
            `;
        });

        // Update the conductor list HTML
        conductorListDiv.innerHTML = html;
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
</script>

<!-- HTML to display conductor list -->
<div id="conductor-list" style="display:none;">
    <!-- Conductor list will be dynamically populated by JavaScript -->
</div>