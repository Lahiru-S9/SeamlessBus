<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/Owners/SeeReport.css">

<div class="container">
    <h1>Bus Owner Reports</h1>
    
        <ul>
            <li><a href="<?php echo URLROOT?>/Owners/PerformanceMatrix" class="container">Performance Metrics</a></li>
            <li><a href="<?php echo URLROOT?>/Owners/readFeedback" class="container">Feedback</a></li>
            <li><a href="<?php echo URLROOT?>/Owners/OnGoingBus" class="container">On Going Buses </a></li>
           <!-- <li><a href="<?php echo URLROOT?>/Owners/Booking" class="container">Bookings</a></li> -->
        </ul>
    

    

        <div class="summary">
            <div class="statistic">
                <h3>Total Revenue</h3>
                <?php 
                $total_revenue=0;
                foreach($data['revenue_data'] as $revenue):
                 $total_revenue+=$revenue->total_revenue; 
                endforeach;
                ?>
               
                <p > Revenue :  <?php echo $revenue->total_revenue;?></p>
                
            </div>
            <!--<div class="statistic">
                <h3>Total Passengers</h3>
                <p>XX,XXX</p>
            </div> -->
            <!-- Add more summary statistics -->
</div>

    <section id="sales-report">
        <h2>Sales Report</h2>
        <!-- Display sales report table -->
        <table>
            <thead>
                <tr>
                    <th>Bus Number</th>
                    <th>Booking Count</th>
                    <th>Ticket Price</th>
                    <th>Total Revenue</th>
                    <!-- Add more column headers -->
                </tr>
            </thead>
            <tbody>
                <!-- Populate table rows with sales data -->
                <?php foreach ($data['revenue_data'] as $revenue):?>
                <tr> 
                        <td><?php echo $revenue->bus_no; ?></td>
                        <td><?php echo $revenue->booking_count; ?></td>
                        <td><?php echo $revenue->ticket_price; ?></td>
                        <td><?php echo $revenue->total_revenue; ?></td>


                    <!-- dummy data for reports -->
                    <!--<td>2024-04-01</td>
                    <td>Rosa</td>
                    <td>$XXX</td> -->
                    <!-- Add more columns -->
                </tr>
                <?php endforeach; ?>
                <!-- Add more rows -->
            </tbody>
        </table>
    </section>
</div>
<div class="footer">
        <img id="footer-logo" src="<?php echo URLROOT; ?>/img/logo_bw.png">
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



                
