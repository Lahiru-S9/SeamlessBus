const container = document.querySelector('.container');
const seats = document.querySelectorAll('.row .seat:not(.occupied)');
const count = document.getElementById('count');
const total = document.getElementById('total');
const ticketPriceElement = document.getElementById('ticketPrice');
const scheduleIdElement = document.getElementById('scheduleId');

populateUI();

const ticketPrice = ticketPriceElement.dataset.price; // Fetching the ticket price from the data-price attribute

// Save selected movie index and price
function setMovieData(scheduleId, ticketPrice) {
  localStorage.setItem('selectedScheduleId', scheduleId);
  localStorage.setItem('selectedTicketPrice', ticketPrice);
}

// Update total and count
function updateSelectedCount() {
  const selectedSeats = document.querySelectorAll('.row .seat.selected');

  const seatsIds = Array.from(selectedSeats).map(seat => seat.dataset.seatId);

  localStorage.setItem('selectedSeats', JSON.stringify(seatsIds));

  const selectedSeatsCount = selectedSeats.length;

  count.innerText = selectedSeatsCount;
  total.innerText = selectedSeatsCount * ticketPrice;
  
  setScheduleData(scheduleIdElement.value, ticketPrice);
}

// Get data from localstorage and populate UI
function populateUI() {
  const selectedSeats = JSON.parse(localStorage.getItem('selectedSeats'));

  if (selectedSeats !== null && selectedSeats.length > 0) {
    seats.forEach((seat, index) => {
      if (selectedSeats.indexOf(index) > -1) {
        seat.classList.add('selected');
      }
    });
  }

  const selectedScheduleId = localStorage.getItem('selectedScheduleId');
  const selectedTicketPrice = localStorage.getItem('selectedTicketPrice');


  // if (selectedScheduleId !== null) {
  //   movieSelect.selectedIndex = selectedMovieIndex;
  // }
}

// Movie select event
// movieSelect.addEventListener('change', e => {
//     ticketPrice = +e.target.value;
//     setMovieData(e.target.selectedIndex, e.target.value);
//     updateSelectedCount();
//   });
  
  // Seat click event
  container.addEventListener('click', e => {
    if (
      e.target.classList.contains('seat') &&
      !e.target.classList.contains('occupied')
    ) {
      e.target.classList.toggle('selected');
  
      updateSelectedCount();
    }
  });
  
  // Initial count and total set
  updateSelectedCount();