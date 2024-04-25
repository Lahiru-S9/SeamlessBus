$(document).ready(function () {
  //   $("#bookingForm").submit(function (event) {
  $(document).on("submit", "[id^=bookingForm]", function (event) {
    // Prevent form submission
    event.preventDefault();

    // Get the values of the input fields
    var form = $(this);
    var name = $('.guest-info input[name="name"]').val().trim();
    var nic = $('.guest-info input[name="nic"]').val().trim();
    var phone = $('.guest-info input[name="phone"]').val().trim();

    // Check if any field is empty
    if (name === "" || nic === "" || phone === "") {
      // Display an error message
      alert("Please fill in all the fields.");
      return;
    }

    // If all fields are filled, create hidden inputs and append them to the form
    $("<input>")
      .attr({
        type: "hidden",
        name: "name",
        value: name,
      })
      .appendTo(form);

    $("<input>")
      .attr({
        type: "hidden",
        name: "nic",
        value: nic,
      })
      .appendTo(form);

    $("<input>")
      .attr({
        type: "hidden",
        name: "phone",
        value: phone,
      })
      .appendTo("form");

    form[0].submit();
  });
});
