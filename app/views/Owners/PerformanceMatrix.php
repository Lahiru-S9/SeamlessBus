<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/Owners/PerformanceMatrix.css">

<div class="container">
    <h1>Performance Matrix</h1>

    <div>
        <canvas id="myChart"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Convert PHP bookings data to JavaScript array
    const bookings_data = <?php echo json_encode($data['bookings_data']); ?>;

    // Extract labels and data for the chart
    const labels = bookings_data.map(item => item.route_num);
    const data = bookings_data.map(item => item.bookings);

    const ctx = document.getElementById("myChart");

    new Chart(ctx, {
        type: "bar",
        data: {
            labels: labels,
            datasets: [{
                label: "# of Bookings",
                data: data,
                borderWidth: 1,
                backgroundColor: 'rgba(54, 162, 235, 0.2)', // Set background color
                borderColor: 'rgba(54, 162, 235, 1)', // Set border color
                borderWidth: 1
            }],
        },
        options: {
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Number of Bookings'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Route Number'
                    }
                }
            },
        },
    });
</script>
<?php require APPROOT . '/views/inc/footer.php'; ?>
