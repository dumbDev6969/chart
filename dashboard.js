fetch('http://localhost/php/chart/data.php')
    .then (response => {
        if (!response.ok){
            throw new Error('err in getiting the response');
        }
        return response.json();
    })
    .then (data => {
        const label = Object.keys(data); // department
        const count = Object.values(data); // count
            const config = {
                type: 'line',
                data: {
                    labels: label,
                    datasets: [{
                        label: 'Department Count',
                        data: count, // Y-axis values (counts)
                        backgroundColor: 'aliceblue',
                        borderColor: 'navy-blue',
                        borderWidth: 1,
                        fill: true,
                    }]
    
                },
                options: {
                  plugins: {
                    title: {
                      display: true,
                      text: 'Department employee counts'
                    }
                  },
                  scales: {
                    y: {
                      stacked: true
                    }
                  }
                },
              };
              const ctx = document.getElementById('display-count');
              new Chart(ctx, config);
              //console.log(config)
        
    })
    .catch(error => {
        console.error('err: ', error)
    })