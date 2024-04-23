function updateBusStatus(busId, status) {
  $.ajax({
    url: "http://localhost/SeamlessBus/Schedulers/verifyBus",
    type: "POST",
    cache: false, // Disable cache
    data: {
      busId: busId,
      status: status,
    },
    success: function (data) {
      console.log("Response Data:", data);
      if (data && data.status === "success") {
        console.log("Success:", data);
      } else {
        console.log("Error:", data);
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.error("AJAX request failed: ", textStatus, errorThrown);
    },
    complete: function () {
      // Reload the page after the request is complete
      location.reload();
    },
  });
}
