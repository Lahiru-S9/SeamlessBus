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
      if (data.status === "success") {
        location.reload();
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.error("AJAX request failed: ", textStatus, errorThrown);
    },
  });
}
