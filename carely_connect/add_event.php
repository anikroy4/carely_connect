<?php
// add_event.php - This file renders the Add New Event page for Carely Connect website
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $eventName = $_POST['event-name'] ?? '';
    $eventDate = $_POST['event-date'] ?? '';
    $eventTime = $_POST['event-time'] ?? '';
    $location = $_POST['location'] ?? '';
    $description = $_POST['description'] ?? '';

    // Basic validation
    if (!empty($eventName) && !empty($eventDate) && !empty($eventTime) && !empty($location) && !empty($description)) {
        // Prepare data to save
        $eventData = "Event Name: $eventName, Date: $eventDate, Time: $eventTime, Location: $location, Description: $description, Date Added: " . date('Y-m-d H:i:s') . "\n";
        
        // Define file path
        $file = __DIR__ . '/event_data.txt';
        
        // Ensure the directory is writable and create file if it doesn't exist
        $dir = dirname($file);
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        
        // Attempt to save data
        $success = file_put_contents($file, $eventData, FILE_APPEND | LOCK_EX);
        
        if ($success !== false) {
            // Output JavaScript to show success popup and redirect
            echo "<script>alert('Upcoming event added'); window.location.href = 'add_event.php';</script>";
        } else {
            echo "<script>alert('Error saving event data. Please check permissions.'); window.location.href = 'add_event.php';</script>";
        }
        exit;
    } else {
        echo "<script>alert('Please fill all required fields.'); window.location.href = 'add_event.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Event - Carely Connect</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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

        .form-container {
            max-width: 400px;
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

        .form-group input[type="text"],
        .form-group input[type="date"],
        .form-group input[type="time"],
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid #007bff;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s ease;
            box-sizing: border-box;
        }

        .form-group input[type="text"]:focus,
        .form-group input[type="date"]:focus,
        .form-group input[type="time"]:focus,
        .form-group textarea:focus {
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
                <li><a href="add_event.php" class="active">Events</a></li>
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
        <h1>Add New Event</h1>
        <div class="form-container">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-group">
                    <label for="event-name">Event Name</label>
                    <input type="text" id="event-name" name="event-name" placeholder="Enter Event Name" required>
                </div>
                <div class="form-group">
                    <label for="event-date">Date</label>
                    <input type="date" id="event-date" name="event-date" required>
                </div>
                <div class="form-group">
                    <label for="event-time">Time</label>
                    <input type="time" id="event-time" name="event-time" required>
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" id="location" name="location" placeholder="Enter Location" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" placeholder="Enter Description" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit">Add Event</button>
                </div>
            </form>
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
</body>
</html>