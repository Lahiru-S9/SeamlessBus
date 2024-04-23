<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/Owners/SeeReport.css">

<div class="container">
    <h1>Bus Owner Reports</h1>
    <nav>
        <ul>
            <li><a href="#">Performance Metrics</a></li>
            <li><a href="<?php echo URLROOT?>/Owners/readFeedback" class="container">Feedback</a></li>
            <li><a href="<?php echo URLROOT?>/Owners/OnGoingBus" class="container">On Going Buses </a></li>
            <li><a href="<?php echo URLROOT?>/Owners/Booking" class="container">Bookings</a></li>
        </ul>
    </nav>

        <div class="summary">
            <div class="statistic">
                <h3>Total Revenue</h3>
                <p>$XX,XXX</p>
            </div>
            <div class="statistic">
                <h3>Total Passengers</h3>
                <p>XX,XXX</p>
            </div>
            <!-- Add more summary statistics -->
</div>

    <section id="sales-report">
        <h2>Sales Report</h2>
        <!-- Display sales report table -->
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Bus</th>
                    <th>Revenue</th>
                    <!-- Add more column headers -->
                </tr>
            </thead>
            <tbody>
                <!-- Populate table rows with sales data -->
                <tr> 
                    <!-- dummy data for reports -->
                    <td>2024-04-01</td>
                    <td>Rosa</td>
                    <td>$XXX</td>
                    <!-- Add more columns -->
                </tr>
                <!-- Add more rows -->
            </tbody>
        </table>
    </section>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
