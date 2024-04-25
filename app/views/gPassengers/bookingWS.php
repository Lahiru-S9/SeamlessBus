<?php require APPROOT . '/views/inc/header.php'; ?>
<stylesheets>
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/regPassengers/bookingWS.css">
</stylesheets>

<div class="container">

    <div class="schedule-container">
      <?php if (!empty($data['schedule'])) : ?>
      <h1>Schedule Details</h1>
      <?php $scheduleDetails = $data['schedule'][0]; ?>
      <!-- <p><strong>Schedule ID:</strong> <?php echo $scheduleDetails->schedule_id; ?></p> -->
      <p><strong>Route Number:</strong> <span id="routeNo" data-price="<?php echo $scheduleDetails->route_num; ?>"><?php echo $scheduleDetails->route_num; ?></span></p>
      <p><strong>From Station:</strong> <?php echo $scheduleDetails->from_station; ?></p>
      <p><strong>To Station:</strong> <?php echo $scheduleDetails->to_station; ?></p>
      <p><strong>Arrival Time:</strong> <?php echo $scheduleDetails->arrival_time; ?></p>
      <p><strong>Departure Time:</strong> <?php echo $scheduleDetails->departure_time; ?></p>
      <!-- <p><strong>Ticket Price:</strong> <?php echo $scheduleDetails->ticket_price; ?></p> -->
      <p><strong>Ticket Price:</strong> <span id="ticketPrice" data-price="<?php echo $scheduleDetails->ticket_price; ?>"><?php echo $scheduleDetails->ticket_price; ?></span></p>
      <p><strong>Remainig Seats:</strong> <span id="remainingSeats" data-remaining="<?php echo $data['remainingSeats']; ?>"><?php echo $data['remainingSeats']; ?></span></p>
      <?php else : ?>
          <p>No schedule found.</p>
      <?php endif; ?>
    </div>

    <form>
        <div class="row">
                <div class="col-25">
                <label for="seatshm">how many seats</label>
                </div>
                <div class="col-75">
                <input type="number" id="seatshm" name="seatshm" placeholder="Number of seats.." min="0" max="<?php echo $data['remainingSeats']; ?>">
                </div>
        </div>
        <div class="row">
            <button onclick="paymentGateWay(event);" class="checkout-button">Checkout</button>
        </div>
    </form>
</div>

<div id="scheduleId" data-schedule-id="<?php echo $scheduleDetails->id; ?>"></div>
<div id="name" data-name="<?php echo $data['name']?>"></div>
<div id="nic" data-nic="<?php echo $data['nic']?>"></div>
<div id="phone" data-phone="<?php echo $data['phone']?>"></div>

<script src="<?php echo URLROOT; ?>/js/regPassengers/bookingWS.js"></script>
<script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>

<?php require APPROOT . '/views/inc/footer.php'; ?>