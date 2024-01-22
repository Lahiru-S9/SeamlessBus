// Toggle function to show/hide the dropdown content
function toggleStations(schedulerId) {
  var stationsDiv = document.getElementById('stations_' + schedulerId);
  var editButtonContainer = document.getElementById('scheduler-edit-button-container_' + schedulerId);

  if (stationsDiv.style.display === 'none' || stationsDiv.style.display === '') {
      // If stations are hidden, show them and the edit button container
      stationsDiv.style.display = 'block';
      editButtonContainer.style.display = 'block';
  } else {
      // If stations are visible, hide them and the edit button container
      stationsDiv.style.display = 'none';
      editButtonContainer.style.display = 'none';
  }
}

function toggleSchedulers(stationId) {
  var schedulersDiv = document.getElementById('schedulers_' + stationId);
  var editButtonContainer = document.getElementById('station-edit-button-container_' + stationId);

  if (schedulersDiv.style.display === 'none' || schedulersDiv.style.display === '') {
    // If stations are hidden, show them and the edit button container
    schedulersDiv.style.display = 'block';
    editButtonContainer.style.display = 'block';
} else {
    // If stations are visible, hide them and the edit button container
    schedulersDiv.style.display = 'none';
    editButtonContainer.style.display = 'none';
}
}

function editScheduler(schedulerId) {
  // Implement your edit logic here
  // You can open a modal or redirect to an edit page, for example
  console.log("Edit scheduler with ID: " + schedulerId);
}

function editStation(stationId) {
  // Implement your edit logic here
  // You can open a modal or redirect to an edit page, for example
  console.log("Edit station with ID: " + stationId);
} 