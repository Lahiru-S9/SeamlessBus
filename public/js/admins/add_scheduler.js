



function toggleStations(schedulerId, event) {
    if (event && event.target.closest('.popup')) {
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

closePopup();
}

let stationsPopup = document.getElementById("stations-popup");
const stationsSearchBox = stationsPopup.querySelector('.search-box');
const stationsOptions = stationsPopup.querySelectorAll('.options li');
const stationsSelectedOption = stationsPopup.querySelector('.selected-option');
const stationsClearButton = stationsPopup.querySelector('#stations-clear-button');

let schedulersPopup = document.getElementById("schedulers-popup");
const schedulersSearchBox = schedulersPopup.querySelector('.search-box');
const schedulersOptions = schedulersPopup.querySelectorAll('.options li');
const schedulersSelectedOption = schedulersPopup.querySelector('.selected-option');
const schedulersClearButton = schedulersPopup.querySelector('#schedulers-clear-button');

function editScheduler(schedulerId, event) {

if (event) {
    event.stopPropagation();
}
  stationsPopup.classList.add("open-popup");
  console.log("Edit scheduler with ID: " + schedulerId);
}

function editStation(stationId, event) {
    
    if (event) {
        event.stopPropagation();
    }
    schedulersPopup.classList.add("open-popup");
    console.log("Edit station with ID: " + stationId);
}


function closePopup(event) {
    if (event) {
        event.stopPropagation();
    }
    stationsPopup.classList.remove("open-popup");
    if (schedulersPopup) {
        schedulersPopup.classList.remove("open-popup");
    }
}


  
// Check if search country present in menu list 
stationsSearchBox.addEventListener('input', () => { 
    const searchTerm = stationsSearchBox.value.toLowerCase(); 
  
    stationsOptions.forEach(option => { 
        const text = option.textContent.toLowerCase(); 
        if (text.includes(searchTerm)) { 
            option.style.display = 'block'; 
        } else { 
            option.style.display = 'none'; 
        } 
    }); 
}); 

schedulersSearchBox.addEventListener('input', () => {
    const searchTerm = schedulersSearchBox.value.toLowerCase(); 
  
    schedulersOptions.forEach(option => { 
        const text = option.textContent.toLowerCase(); 
        if (text.includes(searchTerm)) { 
            option.style.display = 'block'; 
        } else { 
            option.style.display = 'none'; 
        } 
    }); 
});
  
// Iterating and printing the selected country name 
for (const option of stationsOptions) { 
    option.addEventListener('click', () => { 
        const value = option.getAttribute('data-value'); 
        stationsSelectedOption.textContent =  
            "You have chosen " + option.textContent; 
        stationsSearchBox.value = ''; 
        for (const opt of stationsOptions) { 
            opt.style.display = 'block'; 
        } 
    }); 
} 

for (const option of schedulersOptions) { 
    option.addEventListener('click', () => { 
        const value = option.getAttribute('data-value'); 
        schedulersSelectedOption.textContent =  
            "You have chosen " + option.textContent; 
        schedulersSearchBox.value = ''; 
        for (const opt of schedulersOptions) { 
            opt.style.display = 'block'; 
        } 
    }); 
}
  
stationsClearButton.addEventListener('click', function () { 
    stationsSelectedOption.textContent = 'Select an option'; 
    stationsSearchBox.value = ''; 
    stationsOptions.forEach(option => { 
        option.style.display = 'block'; 
    }); 
});

schedulersClearButton.addEventListener('click', function () { 
    schedulersSelectedOption.textContent = 'Select an option'; 
    schedulersSearchBox.value = ''; 
    schedulersOptions.forEach(option => { 
        option.style.display = 'block'; 
    }); 
});

