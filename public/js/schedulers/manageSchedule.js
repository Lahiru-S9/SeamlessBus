$(document).ready(function () {
  // Attach an event listener to the route select dropdown
  $("#route-select").on("change", function () {
    // Get the selected route number
    var selectedRoute = $(this).val();

    // Make an AJAX request to the server to get stations based on the selected route
    $.ajax({
      url: "http://localhost/SeamlessBus/Schedulers/manageSchedule", // Update the URL to your actual route
      method: "POST", // Use POST or GET based on your server-side implementation
      data: { route_num: selectedRoute },
      dataType: "json",
      success: function (data) {
        // Update the station select dropdown with the fetched stations
        var fromStationSelect = $("#from-station-select");
        var toStationSelect = $("#to-station-select");

        fromStationSelect.empty(); // Clear previous options
        toStationSelect.empty(); // Clear previous options

        // Append new options based on the fetched data
        $.each(data.stations, function (index, station) {
          // Append options to "From Station" dropdown
          fromStationSelect.append(
            '<option value="' +
              station.from_station +
              '">' +
              station.from_station +
              "</option>"
          );

          // Append options to "To Station" dropdown
          toStationSelect.append(
            '<option value="' +
              station.to_station +
              '">' +
              station.to_station +
              "</option>"
          );
        });

        fetchRouteID();
      },
      error: function (error) {
        console.log(error);
      },
    });
  });
  // Create a function to fetch route ID based on selected stations
  function fetchRouteID() {
    var fromStation = $("#from-station-select").val();
    var toStation = $("#to-station-select").val();

    // Make an AJAX request to the server to get route_id based on selected stations
    $.ajax({
      url: "http://localhost/SeamlessBus/Schedulers/manageSchedule",
      method: "POST",
      data: { from_station: fromStation, to_station: toStation },
      dataType: "json",
      success: function (data) {
        // Update the form with the fetched route_id
        var route_id_display = $("#route-id-display");
        route_id_display.empty(); // Clear previous route_id

        route_id_display.text(data.route_id.id);
      },
      error: function (error) {
        console.log(error);
      },
    });
  }

  // Attach the fetchRouteID function to the change event of station selects
  $("#from-station-select, #to-station-select").on("change", function () {
    fetchRouteID();
  });

  // Call the fetchRouteID function initially to set the route ID based on default values
  fetchRouteID();
});

// Function to update table content dynamically
function updateTable(day, newSchedule) {
  var day = newSchedule.day.toLowerCase();
  var tableContent = "";
  tableContent += '<div class="table-row">';
  tableContent += '<div class="table-data">' + newSchedule.route_num + "</div>";
  tableContent +=
    '<div class="table-data">' + newSchedule.arrival_time + "</div>";
  tableContent +=
    '<div class="table-data">' + newSchedule.departure_time + "</div>";
  tableContent +=
    '<div class="table-data">' + newSchedule.from_station + "</div>";
  tableContent +=
    '<div class="table-data">' + newSchedule.to_station + "</div>";
  tableContent += '<div class="table-data">';
  tableContent +=
    '<a href="' +
    "http://localhost/SeamlessBus/schedulers/editSchedule/" +
    newSchedule.id +
    '" class="btn btn-primary">Edit</a>';
  tableContent +=
    '<a href="' +
    "http://localhost/SeamlessBus/schedulers/editSchedule/" +
    newSchedule.id +
    '" class="btn btn-danger">Delete</a>';
  tableContent += "</div>";
  tableContent += "</div>";

  $(".tabs-container")
    .find('.tab input[name="tab-group-1"][id="' + day + '"]')
    .siblings(".content")
    .find(".table-content")
    .append(tableContent);
}

function add() {
  const form = document.querySelector("#myForm");

  var formData = JSON.stringify({
    day: form.querySelector("#selected-tab").value,
    arrival: form.querySelector("#arrival").value,
    departure: form.querySelector("#departure").value,
    route_id: form.querySelector("#route-id-display").textContent,
  });

  // console.log(formData);

  // Make an AJAX request to add the new schedule
  $.ajax({
    url: "http://localhost/SeamlessBus/Schedulers/addSchedule", // Update the URL to your actual route
    method: "POST",
    data: formData,
    dataType: "json",
    success: function (response) {
      // Assuming the response includes the newly added schedule data
      var newSchedule = response.schedule[0];
      console.log(newSchedule);
      var day = newSchedule.day.toLowerCase();
      console.log(day);

      updateTable(day, newSchedule);
      reset();

      // Update the table content for the corresponding day
      // var day = newSchedule.day.toLowerCase();
      // var tableContent = "";
      // tableContent += '<div class="table-row">';
      // tableContent +=
      //   '<div class="table-data">' + newSchedule.route_num + "</div>";
      // tableContent +=
      //   '<div class="table-data">' + newSchedule.arrival_time + "</div>";
      // tableContent +=
      //   '<div class="table-data">' + newSchedule.departure_time + "</div>";
      // tableContent +=
      //   '<div class="table-data">' + newSchedule.from_station + "</div>";
      // tableContent +=
      //   '<div class="table-data">' + newSchedule.to_station + "</div>";
      // tableContent += '<div class="table-data">';
      // tableContent +=
      //   '<a href="' +
      //   "http://localhost/SeamlessBus/schedulers/editSchedule/" +
      //   newSchedule.id +
      //   '" class="btn btn-primary">Edit</a>';
      // tableContent +=
      //   '<a href="' +
      //   "http://localhost/SeamlessBus/schedulers/editSchedule/" +
      //   newSchedule.id +
      //   '" class="btn btn-danger">Delete</a>';
      // tableContent += "</div>";
      // tableContent += "</div>";

      // $(".tabs-container")
      //   .find('.tab input[name="tab-group-1"][id="' + day + '"]')
      //   .siblings(".content")
      //   .find(".table-content")
      //   .append(tableContent);

      // Clear form fields
      // reset();
    },
    error: function (error) {
      console.log(error);
    },
  });

  function reset() {
    // Save the selected day before clearing form fields
    var selectedDay = $("#selected-tab").val();

    // Clear form fields
    $("#myForm")[0].reset();

    // Set the saved selected day back to the dropdown
    $("#selected-tab").val(selectedDay);
  }
}
