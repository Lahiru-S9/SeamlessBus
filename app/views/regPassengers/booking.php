<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/regPassengers/booking.css">

    <div class="schedule-container">
    <?php if (!empty($data['schedule'])) : ?>
    <h1>Schedule Details</h1>
    <?php $scheduleDetails = $data['schedule'][0]; ?>
    <!-- <p><strong>Schedule ID:</strong> <?php echo $scheduleDetails->schedule_id; ?></p> -->
    <p><strong>Schedule ID:</strong> <span id="scheduleId" data-price="<?php echo $scheduleDetails->schedule_id; ?>"><?php echo $scheduleDetails->schedule_id; ?></span></p>
    <p><strong>From Station:</strong> <?php echo $scheduleDetails->from_station_name; ?></p>
    <p><strong>To Station:</strong> <?php echo $scheduleDetails->to_station_name; ?></p>
    <p><strong>Arrival Time:</strong> <?php echo $scheduleDetails->arrival_time; ?></p>
    <p><strong>Departure Time:</strong> <?php echo $scheduleDetails->departure_time; ?></p>
    <!-- <p><strong>Ticket Price:</strong> <?php echo $scheduleDetails->ticket_price; ?></p> -->
    <p><strong>Ticket Price:</strong> <span id="ticketPrice" data-price="<?php echo $scheduleDetails->ticket_price; ?>"><?php echo $scheduleDetails->ticket_price; ?></span></p>
    <p><strong>Bus Model:</strong> <?php echo $scheduleDetails->bus_model; ?></p>
    <p><strong>Bus No:</strong> <?php echo $scheduleDetails->bus_no; ?></p>
<?php else : ?>
    <p>No schedule found.</p>
<?php endif; ?>


    </div>

    <ul class="showcase">
      <li>
        <div class="seat"></div>
        <small>N/A</small>
      </li>
      <li>
        <div class="seat selected"></div>
        <small>Selected</small>
      </li>
      <li>
        <div class="seat occupied"></div>
        <small>Occupied</small>
      </li>
    </ul>

    <div class="container">
      <div class="screen"></div>
        <?php
        $alphabet = range('A', 'Z');
        $seatNos= [];
        foreach($data['seats'] as $seats){
          $seatNos[] = $seats->seatno;
        }

       for($i = 0; $i <= $scheduleDetails->seats/$scheduleDetails->seats_per_row; $i++) : 
        echo '<div class = "row">';
          for($j = 1; $j <= $scheduleDetails->seats_per_row; $j++) : 
              $seatno = $alphabet[$i] . $j;
                if (in_array($seatno, $seatNos)) {
                    echo '<div class="seat occupied" data-seat-id="'.$seatno.'"></div>';
                } else {
                    echo '<div class="seat" data-seat-id="'.$seatno.'"></div>';
                }
              
          endfor;
        echo '</div>'; 
        endfor;?>

      <!-- <div class="row">
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
      </div>
      <div class="row">
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat occupied"></div>
        <div class="seat occupied"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
      </div>
      <div class="row">
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat occupied"></div>
        <div class="seat occupied"></div>
      </div>
      <div class="row">
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
      </div>
      <div class="row">
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat occupied"></div>
        <div class="seat occupied"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
      </div>
      <div class="row">
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat occupied"></div>
        <div class="seat occupied"></div>
        <div class="seat occupied"></div>
        <div class="seat"></div>
      </div> -->
    </div>

    <p class="text">
      You have selected <span id="count">0</span> seats for a price of $<span
        id="total"
        >0</span
      >
    </p>

   
    <div class="footer">
        <img src="<?php echo URLROOT; ?>/img/logo_bw.png">
        <div class="footer-subtext">
            Seamless Bus
        </div>
        <div class="footer-text">
            Enhancing your Travel Experience
        </div>

        <div class="social-media-icons">
            <a href="#" class="social-media-icon">
                <img src="<?php echo URLROOT; ?>/img/Facebook.png" alt="Facebook">
            </a>
            <a href="#" class="social-media-icon">
                <img src="<?php echo URLROOT; ?>/img/Twitter.png" alt="Twitter">
            </a>
            <a href="#" class="social-media-icon">
                <img src="<?php echo URLROOT; ?>/img/Instagram.png" alt="Instagram">
            </a>
        </div>
    
        <div class="footer-subtext">
            Developed by CS group 23
        </div>
    </div>
    
    <script src="<?php echo URLROOT; ?>/js/regPassengers/booking.js"></script>



<?php require APPROOT . '/views/inc/footer.php'; ?>