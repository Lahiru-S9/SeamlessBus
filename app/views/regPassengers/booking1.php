<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/regPassengers/booking.css">

<?php
function generateSeatRows($bookedSeats)
{
    $totalSeats = 54;
    $seatsPerRow = 5;
    $rows = ceil($totalSeats / $seatsPerRow);
    $alphabet = range('A', 'Z');
    $counter = 0;

    for ($i = 1; $i <= $rows; $i++) {
        echo '<li class="row row--' . $i . '">';
        echo '<ol class="seats" type="A">';
        for ($j = 0; $j < $seatsPerRow; $j++) {
            $seat = $alphabet[$j] . $i;
            $seatId = str_replace([' ', '/'], '', $seat);
            $isOccupied = (in_array($seat, $bookedSeats)) ? 'disabled' : '';
            
            echo '<li class="seat">';
            echo '<input type="checkbox" id="' . $seatId . '" ' . $isOccupied . ' />';
            echo '<label for="' . $seatId . '">' . $seat . '</label>';
            echo '</li>';
            $counter++;
            if ($counter >= $totalSeats) {
                break;
            }
        }
        echo '</ol>';
        echo '</li>';
    }
}
?>

<div class="plane">
    <div class="cockpit">
        <h1>Please select a seat</h1>
    </div>
    <div class="exit exit--front fuselage">
    </div>

    <ol class="cabin fuselage">
        <?php generateSeatRows($data['seats']); ?>
    </ol>

    <div class="exit exit--back fuselage">
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
