
function toggleStations(schedulerId, event) {
    if (event && event.target.closest('.popup')) {
        return;
    }

    var stationsDiv = document.getElementById('stations_' + schedulerId);
    var editButtonContainer = document.getElementById('scheduler-edit-button-container_' + schedulerId);
    
    // Use the correct modal ID based on schedulerId
    var modalId = 'stationModal_' + schedulerId;
    var modal = document.getElementById(modalId);

    // Check if the clicked element is the "Edit" button
    var isEditButtonClicked = event && event.target.classList.contains('btn-primary') && event.target.innerText === 'Edit';
    // Check if the clicked element is inside the modal
    var isClickedInsideModal = modal.contains(event.target);

    if (!isClickedInsideModal) {
        // If the clicked element is not inside the modal and not the "Edit" button, proceed with toggling stations
        if (!isEditButtonClicked) {
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
    }
}


function toggleSchedulers(stationId, event) {
        if (event && event.target.closest('.popup')) {
            return;
        }
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



// JavaScript function to open the modal for each scheduler
function openStationModal(schedulerId) {
    var modal = document.getElementById('stationModal_' + schedulerId);
    modal.style.display = 'block';
}

// ... existing JavaScript code ...

// When the user clicks on <span> (x), close the modal for each scheduler
var spans = document.querySelectorAll(".close");
spans.forEach(function(span) {
    span.onclick = function() {
        var modalId = this.getAttribute("data-modal-id");
        var modal = document.getElementById(modalId);
        if (modal) {
            modal.style.display = "none";
        }
    };
});

// When the user clicks anywhere outside of the modal, close it for each scheduler
window.onclick = function(event) {
    var modals = document.querySelectorAll(".modal");
    modals.forEach(function(modal) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    });
}

function updateStations(schedulerId) {
    var selectedStations = [];
    var selectElement = document.getElementById('stationSelect_' + schedulerId);
    for (var i = 0; i < selectElement.options.length; i++) {
        if (selectElement.options[i].selected) {
            selectedStations.push(selectElement.options[i].value);
        }
    }

    // You can now use AJAX or any other method to send the selected stations to the server
    // For simplicity, let's just log the selected stations to the console
    console.log('Selected Stations for Scheduler ' + schedulerId + ':', selectedStations);
    sendStationsToBackend(schedulerId, selectedStations);

    // Close the modal (you may need to modify this based on your modal implementation)
    closeModal(schedulerId);
}

function sendStationsToBackend(schedulerId, selectedStations) {
    // Create an object with the data to send
    var requestData = {
        schedulerId: schedulerId,
        selectedStations: selectedStations
    };

    // Make an AJAX request to the backend
    fetch('http://localhost/SeamlessBus/Admins/add_scheduler', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(requestData)
    })
    .then(response => response.json())
    .then(data => {
        // Handle the response from the backend if needed
        console.log('Response from backend:', data);
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function closeModal(schedulerId) {
    var modal = document.getElementById('stationModal_' + schedulerId);
    if (modal) {
        modal.style.display = 'none';
    }
}

function filterStations(schedulerId) {
    var input, filter, select, options, option, i;

    // Get the input element and the select element
    input = document.getElementById('stationSearch_' + schedulerId);
    select = document.getElementById('stationSelect_' + schedulerId);

    // Convert input value to lowercase
    filter = input.value.toLowerCase();

    // Get all options inside the select
    options = select.getElementsByTagName('option');

    // Loop through all options, and hide those that do not match the search query
    for (i = 0; i < options.length; i++) {
        option = options[i];
        if (option.textContent.toLowerCase().indexOf(filter) > -1) {
            option.style.display = '';
        } else {
            option.style.display = 'none';
        }
    }
}