<h1 class="my-3">My Wordpress Statistics</h1>
<div class="row container p-0">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="card bg-info">
            <div class="inner">
                <h3>150</h3>

                <p>Total Posts</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="card bg-success">
            <div class="inner">
                <h3>53</h3>

                <p>Total Comments</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="card bg-warning">
            <div class="inner">
                <h3>44</h3>

                <p>Total Media</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="card bg-danger">
            <div class="inner">
                <h3>65</h3>

                <p>Total Visitors</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
</div>


<div class="px-2 pt-4">
    <h3 class="py-2">Graphical Analytics</h3>
    <select>
        <option value="today">Today</option>
    </select>
    <canvas id="myChart" height="120"></canvas>
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['views', 'comments', 'posts', 'media', 'users'],
                datasets: [{
                    label: '# of Votes',
                    data: [3, 2, 3, 5, 2],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
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
</div>