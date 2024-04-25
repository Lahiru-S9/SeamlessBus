const container = document.querySelector(".container");
const seats = document.querySelectorAll(".row .seat:not(.occupied)");
const count = document.getElementById("count");
const total = document.getElementById("total");
const ticketPriceElement = document.getElementById("ticketPrice");
const scheduleIdElement = document.getElementById("scheduleId");
const nameElement = document.getElementById("name");
const nicElement = document.getElementById("nic");
const phoneElement = document.getElementById("phone");

populateUI();

const ticketPrice = ticketPriceElement.dataset.price; // Fetching the ticket price from the data-price attribute

// function setScheduleData(scheduleId, ticketPrice, selectedSeatsCount, seatIds) {
//   localStorage.setItem("selectedScheduleId", scheduleId);
//   localStorage.setItem("selectedTicketPrice", ticketPrice);
//   localStorage.setItem("selectedSeatsCount", selectedSeatsCount);
//   localStorage.setItem("selectedSeatIds", seatIds);
// }

// Update total and count
function updateSelectedCount() {
  const selectedSeats = document.querySelectorAll(".row .seat.selected");

  const seatsIds = Array.from(selectedSeats).map((seat) => seat.dataset.seatId);

  localStorage.setItem("selectedSeats", JSON.stringify(seatsIds));

  const selectedSeatsCount = selectedSeats.length;

  count.innerText = selectedSeatsCount;
  const totalAmount = selectedSeatsCount * ticketPrice;
  total.innerText = totalAmount;

  // setScheduleData(selectedSeatsCount, seatsIds);
  return totalAmount;
}

// Get data from localstorage and populate UI
function populateUI() {
  const selectedSeats = JSON.parse(localStorage.getItem("selectedSeats"));

  if (selectedSeats !== null && selectedSeats.length > 0) {
    seats.forEach((seat, index) => {
      if (selectedSeats.indexOf(index) > -1) {
        seat.classList.add("selected");
      }
    });
  }

  const selectedScheduleId = localStorage.getItem("selectedScheduleId");
  const selectedTicketPrice = localStorage.getItem("selectedTicketPrice");

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
container.addEventListener("click", (e) => {
  if (
    e.target.classList.contains("seat") &&
    !e.target.classList.contains("occupied")
  ) {
    e.target.classList.toggle("selected");

    updateSelectedCount();
  }
});

// Initial count and total set
updateSelectedCount();

function paymentGateWay() {
  var totalAmount = updateSelectedCount();
  var selectedSeats = JSON.parse(localStorage.getItem("selectedSeats"));
  var seatIdsParam = selectedSeats.join(","); // Convert array to comma-separated string
  var scheduleId = document
    .getElementById("scheduleId")
    .getAttribute("data-schedule-id");
  var name = document.getElementById("name").getAttribute("data-name");
  var nic = document.getElementById("nic").getAttribute("data-nic");
  var phone = document.getElementById("phone").getAttribute("data-phone");

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = () => {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      alert(xhttp.responseText);
      var obj = JSON.parse(xhttp.responseText);

      // Payment completed. It can be a successful failure.
      payhere.onCompleted = function onCompleted(orderId) {
        console.log("Payment completed. OrderID:" + orderId);
        // Note: validate the payment and show success or failure page to the customer
      };

      // Payment window closed
      payhere.onDismissed = function onDismissed() {
        // Note: Prompt user to pay again or show an error page
        console.log("Payment dismissed");
      };

      // Error occurred
      payhere.onError = function onError(error) {
        // Note: show an error page
        console.log("Error:" + error);
      };

      // Put the payment variables here
      var payment = {
        sandbox: true,
        merchant_id: "1226529", // Replace your Merchant ID
        return_url: "http://localhost/SeamlessBus/GPassengers/booking", // Important
        cancel_url: "http://localhost/SeamlessBus/GPassengers/booking", // Important
        notify_url: "http://localhost/SeamlessBus/GPassengers/payment",
        order_id: obj["order_id"],
        items: obj["item_name"],
        amount: obj["amount"],
        currency: obj["currency"],
        hash: obj["hash"],
        first_name: obj["first_name"],
        last_name: obj["last_name"],
        email: obj["email"],
        phone: obj["phone"],
        address: obj["address"],
        city: obj["city"],
        country: "Sri Lanka",
        delivery_address: "No. 46, Galle road, Kalutara South",
        delivery_city: "Kalutara",
        delivery_country: "Sri Lanka",
        custom_1: "",
        custom_2: "",
      };

      payhere.startPayment(payment);
    }
  };
  xhttp.open(
    "GET",
    "http://localhost/SeamlessBus/GPassengers/payment?totalAmount=" +
      totalAmount +
      "&selectedSeats=" +
      seatIdsParam +
      "&scheduleId=" +
      scheduleId +
      "&name=" +
      name +
      "&nic=" +
      nic +
      "&phone=" +
      phone,
    true
  );
  xhttp.send();
}
