<!-- resources/views/userchart.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Chart</title>

    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<!-- Chart Container -->
<canvas id="myChart"></canvas>

<script>
    // Data from PHP (replace this with your actual PHP code)
    var data = <?php echo json_encode($answer); ?>;

    // Extract labels and dataset from the data
    var labels = data[0];
    var datasets = data.slice(1);

    // Chart.js Configuration
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'sales',
                data: datasets[0], // Replace with your actual sales data
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

</body>
</html>
