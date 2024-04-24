// JavaScript function to toggle the conductor list visibility
function showConductors(busNumber) {
  // Assuming 'conductor-list' is the ID of the div where the conductors will be shown
  var conductorListDiv = document.getElementById("conductor-list");

  // Display the conductor list
  conductorListDiv.style.display = "block";

  // Construct HTML for conductor list
  var html = "";
  conductors.forEach((conductor) => {
    console.log("Name: " + conductor.name);
    console.log("Mobile: " + conductor.mobile);
    console.log("Address: " + conductor.address);
    console.log("Is Assigned: " + conductor.assigned_to);
    console.log("id: " + conductor.id);

    // Check if the conductor is already assigned
    var assignButton = `<button class="assign-btn conductor-${conductor.id}" onclick="assignConductor(${conductor.id},'${conductor.name}', '${busNumber}')">Select</button>
    `;
    console.log(assignButton);
    if (conductor.isAssigned) {
      assignButton =
        '<button class="assign-btn" disabled>Already Assigned</button>';
    }
    html += `
        <div class="conductor">
                        <span>Name: ${conductor.name}</span><br>
                        <span>Age: ${conductor.mobile}</span><br>
                        <span>Address: ${conductor.address}</span><br>
                        <span>Assigned: ${conductor.isAssigned}</span><br>
                        ${assignButton}
                    </div>
        `;
  });

  // Update the conductor list HTML
  conductorListDiv.innerHTML = html;
}
// JavaScript function to assign a conductor to a bus
function assignConductor(conductorId, conductorName, busNumber) {
  // Logic to assign the conductor
  // This could involve sending a request to the server to update the database
  // For now, let's assume the assignment is successful and update the UI accordingly
  console.log("Assigning conductor with ID:", conductorId);

  // Update UI to reflect the assignment
  var assignButton = document.querySelector(`.conductor-${conductorId}`);
  assignButton.innerText = "Already Assigned";
  assignButton.disabled = true;

  // Update selected bus tile with assigned conductor's information
  var busNumberu = busNumber.replace(" ", "_");
  var busTile = document.querySelector(`.bus-${busNumberu}`);
  var conductorInfo = busTile.querySelector(".currant-conductor");
  conductorInfo.innerText = "Current conductor: " + conductorName;

  $.ajax({
    url: "http://localhost/SeamlessBus/Owners/selectConductors",
    method: "POST",
    data: { conductorId: conductorId, busNumber: busNumber }, // Send any data you need to the server
    success: function (response) {
      // Handle successful response from the server if needed
      console.log("Assignment successful");
    },
    error: function (xhr, status, error) {
      // Handle errors if any
      console.error("Error assigning conductor:", error);
    },
  });
}
