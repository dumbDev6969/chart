<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>User Statistics</title>
    <style>
        .container{
            height: 500px;
            width: 500px;
        }
    </style>
</head>
<body>
    <h1>User Registration Statistics</h1>
    <div class="container">
    <canvas id="userChart" width="400" height="200"></canvas>
    </div>
    <script>
        //fetch the data
fetch('http://localhost/php/chart/db.php')
    .then(response => response.json())
    .then(data => {
        // store the data
        const labels = data.dates; // X-axis labels (dates)
        const userCounts = data.userCounts.map(count => parseInt(count)); // Convert string to integer for chart

        // Create the Chart.js chart
        const ctx = document.getElementById('userChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar', // or 'bar', 'pie', etc.
            data: {
                labels: labels,
                datasets: [{
                    label: 'User Registrations',
                    data: userCounts,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    })
    .catch(error => console.error('Error fetching data:', error));

    </script>
</body>
</html>
