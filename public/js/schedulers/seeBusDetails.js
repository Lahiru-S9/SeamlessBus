function updateFilterValues(filterType) {
  var filterValueElement = document.getElementById("filter_value");
  filterValueElement.innerHTML = ""; // Clear existing options

  // Create a new AJAX request
  var xhr = new XMLHttpRequest();

  // Configure the request
  xhr.open(
    "GET",
    "http://localhost/SeamlessBus/Schedulers/getFilterValues?filter_type=" +
      filterType,
    true
  );

  // Set up a handler for when the request finishes
  xhr.onload = function () {
    if (xhr.status === 200) {
      // The request was successful, parse the response as JSON and add the options
      var response = JSON.parse(xhr.responseText);
      response.forEach(function (obj) {
        var optionElement = document.createElement("option");
        optionElement.value = obj["Option"];
        optionElement.text = obj["Option"];
        filterValueElement.add(optionElement);
      });
    } else {
      // The request failed, handle the error
      console.error("An error occurred: " + xhr.status);
    }
  };

  // Send the request
  xhr.send();
}

// Call updateFilterValues initially to populate the dropdown
updateFilterValues(document.getElementById("filter_type").value);
