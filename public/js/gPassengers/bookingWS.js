const ticketPriceElement = document.getElementById("ticketPrice");
const seatshmElement = document.getElementById("seatshm");
const ticketPrice = ticketPriceElement.dataset.price;
const nameElement = document.getElementById("name");
const nicElement = document.getElementById("nic");
const phoneElement = document.getElementById("phone");
const scheduleIdElement = document.getElementById("scheduleId");

function paymentGateWay(event) {
  event.preventDefault();
  var totalAmount = ticketPrice * seatshmElement.value;
  console.log(totalAmount);
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
      "&seatshm=" +
      seatshmElement.value +
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
