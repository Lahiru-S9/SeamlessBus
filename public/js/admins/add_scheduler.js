// Toggle function to show/hide the dropdown content
function toggleStations(schedulerId) {
  var stationsDiv = document.getElementById('stations_' + schedulerId);
  stationsDiv.style.display = (stationsDiv.style.display === 'none' || stationsDiv.style.display === '') ? 'block' : 'none';
}

function toggleSchedulers(stationId) {
  var schedulersDiv = document.getElementById('schedulers_' + stationId);
  schedulersDiv.style.display = (schedulersDiv.style.display === 'none' || schedulersDiv.style.display === '') ? 'block' : 'none';
}