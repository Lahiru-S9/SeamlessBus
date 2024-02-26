function login() {
    alert('Login button clicked');
    // Add your login logic here
}

function register() {
    alert('Register button clicked');
    // Add your registration logic here
}

$(document).ready(function() {
    // Attach an event listener to the route select dropdown
    $('#route-select').on('change', function() {
        // Get the selected route number
        var selectedRoute = $(this).val();
        
        // Make an AJAX request to the server to get stations based on the selected route
        $.ajax({
            url: 'http://localhost/SeamlessBus/Schedulers/manageSchedule', // Update the URL to your actual route
            method: 'POST', // Use POST or GET based on your server-side implementation
            data: { route_num: selectedRoute },
            dataType: 'json',
            success: function(data) {
                // Update the station select dropdown with the fetched stations
                var fromStationSelect = $('#from-station-select');
                var toStationSelect = $('#to-station-select');

                fromStationSelect.empty(); // Clear previous options
                toStationSelect.empty(); // Clear previous options

                // Append new options based on the fetched data
                $.each(data.stations, function (index, station) {
                    // Append options to "From Station" dropdown
                    fromStationSelect.append('<option value="' + station.from_station + '">' + station.from_station + '</option>');

                    // Append options to "To Station" dropdown
                    toStationSelect.append('<option value="' + station.to_station + '">' + station.to_station + '</option>');
                });
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
});