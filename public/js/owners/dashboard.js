// Get the modal
var modal = document.getElementById("modal");

// Get the <span> element that closes the modal
var closeBtn = document.getElementsByClassName("close")[0];

// When the user clicks on the close button, close the modal
closeBtn.onclick = function () {
  modal.style.display = "none";
};

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};

// Function to open the modal
function requestRoute(busNo) {
  modal.style.display = "block";
}

// Function to submit the selected route
function submitRoute() {
  var routeSelect = document.getElementById("routeSelect");
  var selectedRoute = routeSelect.value;

  // Add the selected route as a hidden input field to the form
  var form = document.getElementById("form_" + busNo);
  var hiddenInput = document.createElement("input");
  hiddenInput.type = "hidden";
  hiddenInput.name = "route";
  hiddenInput.value = selectedRoute;
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
