<?php
// dashad.php - This file renders the Admin Dashboard page for Carely Connect website
session_start();

// Hardcoded data for dashboard stats (based on image)
$total_residents = 75;
$total_staffs = 30;
$total_rooms = 45;
$donation = 128000;
$total_care_givers = 55;
$doctors = 8;
$events = 8;
$messages = 18;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Carely Connect</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Global styles (copied and adapted from addstaf.php) */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            color: #333;
            line-height: 1.6;
            background-color: #f4f7fa;
        }

        /* Header */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 40px;
            background: linear-gradient(135deg, #ffffff 0%, #e6f0fa 100%);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo {
            font-size: 28px;
            font-weight: 600;
            color: #007bff;
            letter-spacing: 1px;
            text-decoration: none;
        }

        .logo:hover {
            color: #0056b3;
        }

        nav ul {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
            gap: 20px;
        }

        nav ul li {
            position: relative;
        }

        nav ul li a {
            text-decoration: none;
            color: #003366;
            font-size: 16px;
            font-weight: 500;
            padding: 10px 15px;
            border-radius: 8px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        nav ul li a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background-color: #007bff;
            transition: width 0.3s ease;
        }

        nav ul li a:hover::after {
            width: 100%;
        }

        nav ul li a:hover {
            color: #007bff;
            transform: translateY(-2px);
            background-color: rgba(0, 123, 255, 0.1);
        }

        nav ul li a:active {
            transform: translateY(0);
            background-color: rgba(0, 123, 255, 0.2);
        }

        nav ul li .active {
            color: #007bff;
            font-weight: 600;
            background-color: rgba(0, 123, 255, 0.15);
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.3);
        }

        nav ul li .active::after {
            width: 100%;
            background-color: #007bff;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-profile {
            font-size: 24px;
            color: #003366;
            cursor: pointer;
        }

        .logout-btn {
            background-color: #dc3545;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .logout-btn:hover {
            background-color: #c82333;
        }

        /* Main Content */
        .main-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }

        .main-content h1 {
            color: #333;
            font-size: 36px;
            margin-bottom: 20px;
        }

        /* Dashboard Stats */
        .dashboard-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: #ffffff;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            font-size: 24px;
            color: #fff;
        }

        .stat-icon.red {
            background-color: #ff6b6b;
        }

        .stat-icon.green {
            background-color: #4caf50;
        }

        .stat-number {
            font-size: 32px;
            font-weight: 600;
            color: #003366;
        }

        .stat-label {
            font-size: 16px;
            color: #666;
        }

        /* Chart Sections */
        .chart-container {
            background: #ffffff;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
        }

        .pie-charts {
            display: flex;
            justify-content: center;
            gap: 40px;
            flex-wrap: wrap;
        }

        .pie-chart-item {
            text-align: center;
        }

        .pie-chart-item canvas {
            margin-bottom: 10px;
        }

        .pie-label {
            font-size: 16px;
            color: #666;
        }

        /* Footer (copied from addstaf.php) */
        footer {
            background-color: #e9f7ef;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;
            margin-top: 40px;
        }

        .footer-left {
            flex: 1;
            max-width: 400px;
        }

        .footer-left h3 {
            color: #007bff;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .footer-left p {
            font-size: 14px;
            margin-bottom: 10px;
        }

        .social-icons {
            display: flex;
            gap: 10px;
        }

        .social-icons img {
            width: 20px;
            height: 20px;
        }

        .footer-right {
            flex: 1;
            text-align: right;
        }

        .footer-right h3 {
            color: #000;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .contact-item {
            background-color: #000;
            color: #fff;
            padding: 8px 15px;
            border-radius: 20px;
            margin-bottom: 10px;
            display: inline-block;
            text-decoration: none;
            transition: transform 0.2s ease, box-shadow 0.2s ease, background-color 0.2s ease;
        }

        .contact-item:hover {
            transform: scale(1.05);
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2);
            background-color: #333;
        }

        .contact-item:active {
            transform: scale(0.95);
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3);
        }

        .copyright {
            width: 100%;
            text-align: center;
            font-size: 12px;
            color: #666;
            margin-top: 20px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            header {
                flex-direction: column;
                padding: 15px;
            }

            nav ul {
                flex-direction: column;
                gap: 10px;
                margin-top: 15px;
            }

            .header-right {
                margin-top: 10px;
            }

            .dashboard-stats {
                grid-template-columns: 1fr;
            }

            .pie-charts {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <header>
        <a href="home.php" class="logo">Carely Connect</a>
        <nav>
            <ul>
                <li><a href="dashad.php" >Home</a></li>
                <li><a href="memadd.php">Members</a></li>
                <li><a href="addstaf.php">Staffs</a></li>
                <li><a href="add_event.php">Events</a></li>
                <li><a href="msg.php">Messages</a></li>
                <li><a href="budget.php">Budget</a></li>
            </ul>
        </nav>
        <div class="header-right">
            <div class="user-profile">&#128100;</div>
            <a href="signin.php" class="logout-btn">Logout</a>
        </div>
    </header>

    <div class="main-content">
        <h1>Admin Dashboard</h1>
        
        <div class="dashboard-stats">
            <div class="stat-card">
                <div class="stat-icon red"><i class="fas fa-users"></i></div>
                <div class="stat-number"><?php echo $total_residents; ?></div>
                <div class="stat-label">Total Residents</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon green"><i class="fas fa-user-tie"></i></div>
                <div class="stat-number"><?php echo $total_staffs; ?></div>
                <div class="stat-label">Total Staffs</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon green"><i class="fas fa-door-open"></i></div>
                <div class="stat-number"><?php echo $total_rooms; ?></div>
                <div class="stat-label">Total Rooms</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon green"><i class="fas fa-hand-holding-dollar"></i></div>
                <div class="stat-number"><?php echo number_format($donation); ?></div>
                <div class="stat-label">Donation</div>
            </div>
        </div>

        <div class="dashboard-stats">
            <div class="stat-card">
                <div class="stat-icon red"><i class="fas fa-user-nurse"></i></div>
                <div class="stat-number"><?php echo $total_care_givers; ?></div>
                <div class="stat-label">Total Care Givers</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon green"><i class="fas fa-user-doctor"></i></div>
                <div class="stat-number"><?php echo $doctors; ?></div>
                <div class="stat-label">Doctors</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon green"><i class="fas fa-calendar"></i></div>
                <div class="stat-number"><?php echo $events; ?></div>
                <div class="stat-label">Events</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon green"><i class="fas fa-envelope"></i></div>
                <div class="stat-number"><?php echo $messages; ?></div>
                <div class="stat-label">Messages</div>
            </div>
        </div>

        <!-- <div class="chart-container">
            <h2>Total Revenue</h2>
            <canvas id="revenueChart" height="150"></canvas>
        </div> -->

        <div class="chart-container">
            <h2>Pie Chart</h2>
            <div class="pie-charts">
                <div class="pie-chart-item">
                    <canvas id="pieTotal" width="200" height="200"></canvas>
                    <div class="pie-label">Total Members</div>
                </div>
                <div class="pie-chart-item">
                    <canvas id="pieMale" width="200" height="200"></canvas>
                    <div class="pie-label">Male</div>
                </div>
                <div class="pie-chart-item">
                    <canvas id="pieFemale" width="200" height="200"></canvas>
                    <div class="pie-label">Female</div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="footer-left">
            <h3>Carely Connect</h3>
            <p>Supportive and welcoming environment for seniors. We provide personalized care, kind staff, engaging activities, healthy meals, making every resident feel respected and valued.</p>
            <div class="social-icons">
                <img src="https://via.placeholder.com/20x20?text=Twitter" alt="Twitter">
                <img src="https://via.placeholder.com/20x20?text=Instagram" alt="Instagram">
                <img src="https://via.placeholder.com/20x20?text=Facebook" alt="Facebook">
            </div>
        </div>
        <div class="footer-right">
            <h3>Contact Us</h3>
            <div class="contact-items">
                <a href="tel:+8801891983888" class="contact-item">+880 1891983888</a>
                <a href="mailto:Team@CarelyConnect.Com" class="contact-item">team@carelyConnect.Com</a>
            </div>
        </div>
        <div class="copyright">2025 Web Programming Software Solutions. All Rights Reserved.</div>
    </footer>

    <script>
        /* // Revenue Line Chart (commented out to avoid errors since canvas is not present)
        const revenueCtx = document.getElementById('revenueChart').getContext('2d');
        new Chart(revenueCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Blue Value',
                    data: [15, 10, 25, 15, 35, 25, 15, 25, 20, 30, 25, 20], // Approximated from image
                    borderColor: 'blue',
                    tension: 0.4
                }, {
                    label: 'Red Value',
                    data: [25, 30, 20, 38.75, 25, 35, 20, 30, 25, 20, 35, 30], // Approximated from image
                    borderColor: 'red',
                    tension: 0.4
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) { return '$' + value + 'k'; }
                        }
                    }
                }
            }
        }); */

        // Pie Charts
        new Chart(document.getElementById('pieTotal'), {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [100, 0],
                    backgroundColor: ['#ff6b6b', '#f0f0f0']
                }]
            },
            options: {
                cutout: '70%',
                plugins: { legend: { display: false } }
            }
        });

        new Chart(document.getElementById('pieMale'), {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [32, 68],
                    backgroundColor: ['#4caf50', '#f0f0f0']
                }]
            },
            options: {
                cutout: '70%',
                plugins: { legend: { display: false } }
            }
        });

        new Chart(document.getElementById('pieFemale'), {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [52, 48],
                    backgroundColor: ['#007bff', '#f0f0f0']
                }]
            },
            options: {
                cutout: '70%',
                plugins: { legend: { display: false } }
            }
        });
    </script>
</body>
</html>