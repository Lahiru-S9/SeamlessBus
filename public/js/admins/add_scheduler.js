
// Toggle function to show/hide the dropdown content
function toggleStations(schedulerId, event) {
    event.stopPropagation();

    if (event.target.closest('.popup')) {
        return;
      }

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

  closePopup();
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

let popup = document.getElementById("popup");

function editScheduler(schedulerId, event) {
  event.stopPropagation();
  popup.classList.add("open-popup");
  console.log("Edit scheduler with ID: " + schedulerId);
}


function closePopup(event) {
  event.stopPropagation();
  popup.classList.remove("open-popup");
}

const searchBox = document.querySelector('.search-box'); 
const options = document.querySelectorAll('.options li'); 
const selectedOption = document.querySelector('.selected-option'); 
const clearButton = document.getElementById('clear-button'); 
  
// Check if search country present in menu list 
searchBox.addEventListener('input', () => { 
    const searchTerm = searchBox.value.toLowerCase(); 
  
    options.forEach(option => { 
        const text = option.textContent.toLowerCase(); 
        if (text.includes(searchTerm)) { 
            option.style.display = 'block'; 
        } else { 
            option.style.display = 'none'; 
        } 
    }); 
}); 
  
// Iterating and printing the selected country name 
for (const option of options) { 
    option.addEventListener('click', () => { 
        const value = option.getAttribute('data-value'); 
        selectedOption.textContent =  
            "You have chosen " + option.textContent; 
        searchBox.value = ''; 
        for (const opt of options) { 
            opt.style.display = 'block'; 
        } 
    }); 
} 
  
clearButton.addEventListener('click', function () { 
    selectedOption.textContent = 'Select an option'; 
    searchBox.value = ''; 
    options.forEach(option => { 
        option.style.display = 'block'; 
    }); 
});

