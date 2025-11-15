<?php
// memadd.php - This file renders the Add New Member page for Carely Connect website
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Member - Carely Connect</title>
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
        .form-group input[type="number"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #007bff;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s ease;
            box-sizing: border-box;
        }

        .form-group input[type="text"]:focus,
        .form-group input[type="number"]:focus {
            border-color: #0056b3;
            outline: none;
        }

        .selection-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-bottom: 20px;
            text-align: left;
        }

        .custom-radio,
        .custom-checkbox {
            display: flex;
            align-items: center;
            margin: 5px 0;
            cursor: pointer;
        }

        .custom-radio input[type="radio"],
        .custom-checkbox input[type="checkbox"] {
            display: none;
        }

        .custom-radio label,
        .custom-checkbox label {
            margin-left: 8px;
            cursor: pointer;
            user-select: none;
        }

        .custom-radio span,
        .custom-checkbox span {
            width: 18px;
            height: 18px;
            border: 2px solid #007bff;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            position: relative;
            transition: background-color 0.3s ease;
            flex-shrink: 0;
        }

        .custom-checkbox span {
            border-radius: 4px;
        }

        .custom-radio input[type="radio"]:checked + span,
        .custom-checkbox input[type="checkbox"]:checked + span {
            background-color: #007bff;
        }

        .custom-radio input[type="radio"]:checked + span::after,
        .custom-checkbox input[type="checkbox"]:checked + span::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .custom-radio input[type="radio"]:checked + span::after {
            width: 8px;
            height: 8px;
            background-color: #fff;
            border-radius: 50%;
        }

        .custom-checkbox input[type="checkbox"]:checked + span::after {
            width: 6px;
            height: 10px;
            border: solid #fff;
            border-width: 0 2px 2px 0;
            transform: translate(-50%, -60%) rotate(45deg);
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
                <li><a href="memadd.php" class="active">Members</a></li>
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
        <h1>Add New Elder Member</h1>
        <div class="form-container">
            <form>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" placeholder="Enter Name" required>
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" id="age" placeholder="Enter Age" required>
                </div>
                <div class="form-group">
                    <label>Gender</label>
                    <div class="selection-group">
                        <div class="custom-radio">
                            <input type="radio" id="male" name="gender" value="male" required>
                            <span></span>
                            <label for="male">Male</label>
                        </div>
                        <div class="custom-radio">
                            <input type="radio" id="female" name="gender" value="female">
                            <span></span>
                            <label for="female">Female</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="emergency-contact">Emergency Contact</label>
                    <input type="text" id="emergency-contact" placeholder="Enter Contact" required>
                </div>
                <div class="form-group">
                    <label for="room-no">Room No</label>
                    <input type="text" id="room-no" placeholder="Enter Room No" required>
                </div>
                <div class="form-group">
                    <label>Room Type</label>
                    <div class="selection-group">
                        <div class="custom-radio">
                            <input type="radio" id="single" name="room-type" value="single" required>
                            <span></span>
                            <label for="single">Single</label>
                        </div>
                        <div class="custom-radio">
                            <input type="radio" id="shared" name="room-type" value="shared">
                            <span></span>
                            <label for="shared">Shared</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Disease</label>
                    <div class="selection-group">
                        <div class="custom-checkbox">
                            <input type="checkbox" id="diabetes" name="disease[]" value="diabetes">
                            <span></span>
                            <label for="diabetes">Diabetes</label>
                        </div>
                        <div class="custom-checkbox">
                            <input type="checkbox" id="hypertension" name="disease[]" value="hypertension">
                            <span></span>
                            <label for="hypertension">Hypertension</label>
                        </div>
                        <div class="custom-checkbox">
                            <input type="checkbox" id="dieting" name="disease[]" value="dieting">
                            <span></span>
                            <label for="dieting">Dieting</label>
                        </div>
                        <div class="custom-checkbox">
                            <input type="checkbox" id="heart-disease" name="disease[]" value="heart-disease">
                            <span></span>
                            <label for="heart-disease">Heart Disease</label>
                        </div>
                        <div class="custom-checkbox">
                            <input type="checkbox" id="cholesterol" name="disease[]" value="cholesterol">
                            <span></span>
                            <label for="cholesterol">Cholesterol</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="care-id">Assign Care Giver ID</label>
                    <input type="text" id="care-id" placeholder="Enter ID" required>
                </div>
                <div class="form-group">
                    <button type="submit">Add Member</button>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            form.addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent form submission
                alert('Member added successfully'); // Show popup message
            });
        });
    </script>
</body>
</html>