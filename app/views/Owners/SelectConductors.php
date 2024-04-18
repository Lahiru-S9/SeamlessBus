<?php
// Database connection variables
$host = 'localhost'; // or your database host
$dbname = 'seamlessbus'; // your database name
$user = 'localhost'; // your database username
$pass = 'YES'; // your database password

// Create a new PDO instance
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Fetch buses from the database
try {
    $stmt = $pdo->query('SELECT * FROM buses');
    $buses = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

// Close connection
unset($pdo);

// Hardcoded list of conductors
$conductors = [
    'Conductor 1' => false, // false indicates not assigned
    'Conductor 2' => true,  // true indicates already assigned
    'Conductor 3' => true, // false indicates not assigned
    'Conductor 4' => true,
    'Conductor 5' => false,
    'Conductor 6' => true,
    'Conductor 7' => true, 
    'Conductor 8' => true,
    // Add more conductors as needed
];

// Function to display assignment status
function displayAssignmentStatus($isAssigned) {
    return $isAssigned ? 'Already Assigned' : 'Assign';
}

?>

<!-- HTML to display bus list -->
<div id="bus-list">
    <?php foreach ($buses as $bus): ?>
        <div class="bus">
            <span class="bus-number"><?php echo $bus['bus_number']; ?></span>
            <span class="bus-route"><?php echo $bus['route']; ?></span>
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
    <?php foreach ($conductors as $name => $isAssigned): ?>
        <div class="conductor">
            <span class="conductor-name"><?php echo $name; ?></span>
            <button class="assign-btn"><?php echo displayAssignmentStatus($isAssigned); ?></button>
            <button class="delete-btn">Delete</button>
        </div>
    <?php endforeach; ?>
</div>
