<?php
// budget.php - This file renders the Budget And Cost page for Carely Connect website
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $medication = $_POST['medication'] ?? '';
    $salary = $_POST['salary'] ?? '';
    $doctor_fees = $_POST['doctor_fees'] ?? '';
    $donation = $_POST['donation'] ?? '';
    $utility_cost = $_POST['utility_cost'] ?? '';
    $maintenance = $_POST['maintenance'] ?? '';
    $events_cost = $_POST['events_cost'] ?? '';
    $food_cost = $_POST['food_cost'] ?? '';

    // Basic validation
    if (!empty($medication) && !empty($salary) && !empty($doctor_fees) && !empty($donation) && 
        !empty($utility_cost) && !empty($maintenance) && !empty($events_cost) && !empty($food_cost)) {
        // Prepare data to save
        $budgetData = "Medication: $medication, Salary: $salary, Doctor Fees: $doctor_fees, Donation: $donation, " .
                      "Utility Cost: $utility_cost, Maintenance: $maintenance, Events Cost: $events_cost, " .
                      "Food Cost: $food_cost, Date Added: " . date('Y-m-d H:i:s') . "\n";
        
        // Define file path
        $file = __DIR__ . '/budget_data.txt';
        
        // Ensure the directory is writable and create file if it doesn't exist
        $dir = dirname($file);
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        
        // Attempt to save data
        $success = file_put_contents($file, $budgetData, FILE_APPEND | LOCK_EX);
        
        if ($success !== false) {
            // Output JavaScript to show success popup and redirect
            echo "<script>alert('Budget data added'); window.location.href = 'budget.php';</script>";
        } else {
            echo "<script>alert('Error saving budget data. Please check permissions.'); window.location.href = 'budget.php';</script>";
        }
        exit;
    } else {
        echo "<script>alert('Please fill all required fields.'); window.location.href = 'budget.php';</script>";
    }
}

// Hardcoded data for budget stats (based on image)
$medication = 7500;
$salary = 35000;
$doctor_fees = 55000;
$donation = 128000;
$utility_cost = 15000;
$maintenance = 20000;
$events_cost = 8000;
$food_cost = 8000;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budget And Cost - Carely Connect</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
    <style>
        /* Global styles */
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
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Form Container */
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 30px;
            background: linear-gradient(135deg, #ffffff 0%, #f0f4f8 100%);
            border: 2px solid #007bff;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: stretch;
        }

        .form-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            font-weight: 500;
            margin-bottom: 8px;
            color: #003366;
        }

        .form-group input[type="number"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #007bff;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s ease;
            box-sizing: border-box;
        }

        .form-group input[type="number"]:focus {
            border-color: #0056b3;
            outline: none;
        }

        .form-group button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            margin-top: 10px;
        }

        .form-group button:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        .form-group button:active {
            transform: translateY(0);
            background-color: #003366;
        }

        /* Footer */
        footer {
            background-color: #e9f7ef;
            padding: 40px 40px 20px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;
            max-width: 1200px;
            margin: 0 auto;
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
            transition: transform 0.2s ease;
        }

        .social-icons img:hover {
            transform: scale(1.1);
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

        .footer-right .contact-items {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
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
            width: fit-content;
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

            .form-container {
                max-width: 100%;
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <header>
        <a href="home.php" class="logo">Carely Connect</a>
        <nav>
            <ul>
                <li><a href="dashad.php">Home</a></li>
                <li><a href="memadd.php">Members</a></li>
                <li><a href="addstaf.php">Staffs</a></li>
                <li><a href="add_event.php">Events</a></li>
                <li><a href="msg.php">Messages</a></li>
                <li><a href="budget.php" class="active">Budget</a></li>
            </ul>
        </nav>
        <div class="header-right">
            <div class="user-profile">&#128100;</div>
            <a href="signin.php" class="logout-btn">Logout</a>
        </div>
    </header>

    <div class="main-content">
        <h1>Budget And Cost</h1>

        <div class="form-container">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-group">
                    <label for="medication">Medication Cost</label>
                    <input type="number" id="medication" name="medication" placeholder="Enter Medication Cost" required>
                </div>
                <div class="form-group">
                    <label for="salary">Staff Salary</label>
                    <input type="number" id="salary" name="salary" placeholder="Enter Staff Salary" required>
                </div>
                <div class="form-group">
                    <label for="doctor_fees">Doctor Fees</label>
                    <input type="number" id="doctor_fees" name="doctor_fees" placeholder="Enter Doctor Fees" required>
                </div>
                <div class="form-group">
                    <label for="donation">Total Donation</label>
                    <input type="number" id="donation" name="donation" placeholder="Enter Total Donation" required>
                </div>
                <div class="form-group">
                    <label for="utility_cost">Utility Cost</label>
                    <input type="number" id="utility_cost" name="utility_cost" placeholder="Enter Utility Cost" required>
                </div>
                <div class="form-group">
                    <label for="maintenance">Maintenance Cost</label>
                    <input type="number" id="maintenance" name="maintenance" placeholder="Enter Maintenance Cost" required>
                </div>
                <div class="form-group">
                    <label for="events_cost">Events Cost</label>
                    <input type="number" id="events_cost" name="events_cost" placeholder="Enter Events Cost" required>
                </div>
                <div class="form-group">
                    <label for="food_cost">Food Cost</label>
                    <input type="number" id="food_cost" name="food_cost" placeholder="Enter Food Cost" required>
                </div>
                <div class="form-group">
                    <button type="submit">Add Budget Data</button>
                </div>
            </form>
        </div>

        <div class="dashboard-stats">
            <div class="stat-card">
                <div class="stat-icon red"><i class="fas fa-pills"></i></div>
                <div class="stat-number"><?php echo number_format($medication); ?></div>
                <div class="stat-label">Medication</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon green"><i class="fas fa-dollar-sign"></i></div>
                <div class="stat-number"><?php echo number_format($salary); ?></div>
                <div class="stat-label">Salary</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon red"><i class="fas fa-stethoscope"></i></div>
                <div class="stat-number"><?php echo number_format($doctor_fees); ?></div>
                <div class="stat-label">Doctor Fees</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon green"><i class="fas fa-donate"></i></div>
                <div class="stat-number"><?php echo number_format($donation); ?></div>
                <div class="stat-label">Total Donation</div>
            </div>
        </div>

        <div class="dashboard-stats">
            <div class="stat-card">
                <div class="stat-icon green"><i class="fas fa-bolt"></i></div>
                <div class="stat-number"><?php echo number_format($utility_cost); ?></div>
                <div class="stat-label">Utility Cost</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon green"><i class="fas fa-tools"></i></div>
                <div class="stat-number"><?php echo number_format($maintenance); ?></div>
                <div class="stat-label">Maintenance</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon green"><i class="fas fa-calendar-check"></i></div>
                <div class="stat-number"><?php echo number_format($events_cost); ?></div>
                <div class="stat-label">Events cost</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon green"><i class="fas fa-utensils"></i></div>
                <div class="stat-number"><?php echo number_format($food_cost); ?></div>
                <div class="stat-label">Food Cost</div>
            </div>
        </div>

        <div class="chart-container">
            <h2>Budget Allocation</h2>
            <canvas id="budgetPie" height="200"></canvas>
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
        // Register the datalabels plugin
        Chart.register(ChartDataLabels);

        // Budget Pie Chart
        const budgetCtx = document.getElementById('budgetPie').getContext('2d');
        new Chart(budgetCtx, {
            type: 'pie',
            data: {
                labels: [
                    'Staff salary',
                    'Medication cost',
                    'Doctor Fees',
                    'Utility cost/Electricity/water/gas',
                    'Maintenance cost',
                    'Food cost',
                    'Events cost'
                ],
                datasets: [{
                    data: [45, 18, 13.5, 9, 4.7, 4.5, 2.7],
                    backgroundColor: [
                        '#007bff', // blue
                        '#fd7e14', // orange
                        '#28a745', // green
                        '#6f42c1', // purple
                        '#8b4513', // brown
                        '#dc3545', // red
                        '#e83e8c'  // pink
                    ]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'right'
                    },
                    datalabels: {
                        color: '#fff',
                        formatter: (value) => value + '%',
                        font: {
                            weight: 'bold'
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>