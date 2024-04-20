<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/Owners/SeeReport.css">

<div class="container">
    <h1>Bus Owner Reports</h1>
    <nav>
        <ul>
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Sales Report</a></li>
            <li><a href="#">Performance Metrics</a></li>
            <li><a href="#">Feedback</a></li>
        </ul>
    </nav>

    <section id="dashboard">
        <h2>Dashboard</h2>

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
        <!-- Display charts and graphs -->
        <div class="charts">
            <!-- Include charts here (e.g., revenue trend, passenger distribution) -->
        </div>
    </section>

    <section id="sales-report">
        <h2>Sales Report</h2>
        <!-- Display sales report table -->
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Route</th>
                    <th>Revenue</th>
                    <!-- Add more column headers -->
                </tr>
            </thead>
            <tbody>
                <!-- Populate table rows with sales data -->
                <tr>
                    <td>2024-04-01</td>
                    <td>Route A</td>
                    <td>$XXX</td>
                    <!-- Add more columns -->
                </tr>
                <!-- Add more rows -->
            </tbody>
        </table>
    </section>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
