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

function applyFilter() {
  var form = document.querySelector("form");
  var formData = new FormData(form);

  var xhr = new XMLHttpRequest();
  xhr.open(
    "GET",
    form.action + "?" + new URLSearchParams(formData).toString(),
    true
  );

  xhr.onload = function () {
    if (xhr.status === 200) {
      var response = xhr.responseText;
      var tableContent = extractTableContent(response); // Extract table content from the response
      document.getElementById("busDetailsContainer").innerHTML = tableContent;
    } else {
      console.error("Filter request failed: " + xhr.status);
    }
  };

  xhr.send();
}

function extractTableContent(response) {
  // Extract the form and table content from the response
  var startIdx = response.indexOf("<button");
  var endIdx = response.indexOf("</button>") + "</buttton>".length;
  var formContent = response.substring(startIdx, endIdx);

  startIdx = response.indexOf("<table>");
  endIdx = response.indexOf("</table>") + "</table>".length;
  var tableContent = response.substring(startIdx, endIdx);

  return formContent + tableContent;
}

// Function to reset the filter
function resetFilter() {
  // Reload the page to reset the filter
  window.location.href = window.location.origin + window.location.pathname;
}
