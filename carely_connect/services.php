<?php
// services.php - This file renders the Services page for Carely Connect website
session_start();

// MySQL Database Connection
$servername = "localhost";
$username = "root";  // Replace with your DB username
$password = "";      // Replace with your DB password
$dbname = "carely_connect";  // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission for Bed Desk Alert
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['roomId']) && isset($_POST['contactNumber']) && isset($_POST['message'])) {
    $roomId = $conn->real_escape_string($_POST['roomId']);
    $contactNumber = $conn->real_escape_string($_POST['contactNumber']);
    $message = $conn->real_escape_string($_POST['message']);
    
    $sql = "INSERT INTO alerts (room_id, contact, message) VALUES ('$roomId', '$contactNumber', '$message')";
    
    if ($conn->query($sql) === TRUE) {
        $successMessage = "Your message has been sent. We will be there shortly.";
        // You can set a session or use a flag to show the popup via JS
        echo "<script>var showSuccess = true; var successText = '$successMessage';</script>";
    } else {
        echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
    }
}

// Function to handle redirection based on service type
if (isset($_GET['service'])) {
    $service = $_GET['service'];
    switch ($service) {
        case 'diabetes':
            header("Location: diabetes.php");
            exit();
        case 'blood_pressure':
            header("Location: blood_pressure.php");
            exit();
        case 'heart_disease':
            header("Location: heart_disease.php");
            exit();
        case 'elderly_day_care':
            header("Location: elderly_day_care.php");
            exit();
        case 'elderly_healthcare':
            header("Location: elderly_healthcare.php");
            exit();
        case 'call_for_help':
            header("Location: call_for_help.php");
            exit();
        case 'elderly_accommodation':
            header("Location: elderly_accommodation.php");
            exit();
        default:
            // Default action if no valid service is selected
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services - Carely Connect</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
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
.banner {
    position: relative;
    width: 100%;
    height: 400px; /* adjust height if needed */
    overflow: hidden;
}

.banner img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: brightness(90%);
    animation: zoomIn 10s ease-in-out infinite alternate;
}

/* Banner zoom animation */
@keyframes zoomIn {
    0% {
        transform: scale(1);
    }
    100% {
        transform: scale(1.1);
    }
}

.banner-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: white;
    font-weight: bold;
    font-size: 1.6rem;
    font-family: 'Poppins', sans-serif;
    width: 80%;
    line-height: 1.6;
    opacity: 0;
    animation: fadeInUp 2s ease forwards;
    animation-delay: 0.3s; /* text appears after image starts zooming */
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

        .header-buttons a {
            margin-left: 15px;
            padding: 10px 20px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 500;
            font-size: 15px;
            transition: all 0.3s ease;
        }

        .header-buttons a:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .header-buttons a:active {
            transform: translateY(0);
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }

        .login {
            background-color: #003366;
            color: #fff;
        }

        .login:hover {
            background-color: #002244;
        }

        .signup {
            background-color: #add8e6;
            color: #003366;
        }

        .signup:hover {
            background-color: #87ceeb;
        }

        .donate {
            background-color: #007bff;
            color: #fff;
        }

        .donate:hover {
            background-color: #0056b3;
        }

        /* Banner */
        .banner {
            position: relative;
            width: 100%;
            height: 400px;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .banner img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .banner-content {
            position: absolute;
            top: 50%;
            left: 20px;
            transform: translateY(-50%);
            color: #fff;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .banner-content h1 {
            font-size: 48px;
            margin: 0;
        }

        /* Sections */
        .section {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }

        .section h2 {
            color: #007bff;
            font-size: 36px;
            margin-bottom: 20px;
        }

        .section p {
            font-size: 16px;
            color: #555;
            margin-bottom: 20px;
        }

        /* Weekly Plan Table */
        .weekly-plan {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .weekly-plan div {
            padding: 10px;
            border: 1px solid #ddd;
        }

        .weekly-plan div.header {
            font-weight: 600;
            background-color: #f0f0f0;
        }

        /* Service Boxes */
        .service-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 40px;
        }

        .service-box {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: left;
            transition: transform 0.3s ease;
            cursor: pointer;
        }

        .service-box:hover {
            transform: translateY(-5px);
        }

        .service-box img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .service-box h3 {
            color: #007bff;
            font-size: 20px;
            margin: 10px 0;
        }

        .service-box p {
            font-size: 14px;
            color: #666;
        }

        .service-box a {
            display: block;
            margin-top: 10px;
            text-decoration: none;
            color: #007bff;
            font-weight: 600;
        }

        /* Lost & Found and Call for Help */
        .lost-found-grid, .call-help-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 40px;
        }

        /* Other Services */
        .other-services-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 40px;
        }

        .other-service-box {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease;
            cursor: pointer;
        }

        .other-service-box:hover {
            transform: translateY(-5px);
        }

        .other-service-box img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .other-service-box h3 {
            color: #007bff;
            font-size: 20px;
            margin: 10px 0;
        }

        .other-service-box a {
            display: inline-block;
            padding: 10px 20px;
            background: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
        }

        .other-service-box a:hover {
            background: #0056b3;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 2000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
            animation: fadeIn 0.3s ease;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: none;
            border-radius: 10px;
            width: 80%;
            max-width: 400px;
            text-align: center;
            position: relative;
            animation: slideIn 0.3s ease;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
        }

        .call-button {
            background-color: #dc3545;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }

        .call-button:hover {
            background-color: #c82333;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .send-button {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .send-button:hover {
            background-color: #218838;
        }

        .success-popup {
            display: none;
            position: fixed;
            z-index: 2500;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background-color: #d4edda;
            color: #155724;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #c3e6cb;
            text-align: center;
            animation: bounceIn 0.5s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideIn {
            from { transform: translateY(-50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        @keyframes bounceIn {
            0% { transform: translate(-50%, -50%) scale(0.3); opacity: 0; }
            50% { transform: translate(-50%, -50%) scale(1.05); }
            70% { transform: translate(-50%, -50%) scale(0.9); }
            100% { transform: translate(-50%, -50%) scale(1); opacity: 1; }
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
            width: 40px;
            height: 40px;
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

            .header-buttons {
                margin-top: 15px;
                display: flex;
                gap: 10px;
            }

            .banner {
                height: 200px;
            }

            .service-grid, .lost-found-grid, .call-help-grid, .other-services-grid {
                grid-template-columns: 1fr;
            }

            .weekly-plan {
                grid-template-columns: 1fr;
            }

            .modal-content {
                width: 90%;
                margin: 10% auto;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">Carely Connect</div>
         <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="services.php"  class="active" >Services</a></li>
                <li><a href="events.php">Events</a></li>
                <li><a href="contact_us.php">Contact Us</a></li>
            </ul>
        </nav>
        <div class="header-buttons">
            <a href="signin.php" class="login">Login</a>
            <a href="signup.php" class="signup">Sign Up</a>
            <a href="donations.php" class="donate">Donate</a>
        </div>
    </header>

<section class="banner">
    <img src="img/servc.png" alt="Events Banner - People celebrating with cake">
    <div class="banner-text">
        <h2><p>Service</p></h2
    </div>
</section>


    <section class="section">
        <h2>Elderly Nutrition Plans</h2>
        <p>At Carely, we provide nutrition plans tailored to meet the dietary needs of our residents, ensuring they receive essential vitamins and minerals. Our menus are designed to support specific health conditions such as diabetes and hypertension, promoting overall well-being.</p>
        <div class="weekly-plan">
            <div class="header">Day</div>
            <div class="header">Breakfast</div>
            <div class="header">Lunch</div>
            <div class="header">Dinner</div>
            <div>Saturday</div>
            <div>Oatmeal with fresh fruit and a glass of milk</div>
            <div>Grilled chicken with quinoa and steamed broccoli</div>
            <div>Baked salmon with mashed potatoes and green beans</div>
            <div>Sunday</div>
            <div>Whole-grain toast with avocado and a boiled egg</div>
            <div>Vegetable stir-fry with brown rice</div>
            <div>Turkey stew with carrots and peas</div>
            <div>Monday</div>
            <div>Yogurt with honey and almonds</div>
            <div>Lentil soup with whole-grain bread</div>
            <div>Roasted vegetables with lean beef</div>
            <div>Tuesday</div>
            <div>Smoothie with spinach, banana, and protein powder</div>
            <div>Chicken salad with mixed greens</div>
            <div>Fish fillets with couscous</div>
            <div>Wednesday</div>
            <div>Scrambled eggs with whole-grain muffin</div>
            <div>Beef stir-fry with bell peppers</div>
            <div>Vegetable curry with rice</div>
            <div>Thursday</div>
            <div>Fruit salad with low-fat yogurt</div>
            <div>Turkey wrap with hummus</div>
            <div>Chicken soup with noodles</div>
            <div>Friday</div>
            <div>Whole-grain pancakes with berries</div>
            <div>Grilled fish with asparagus</div>
            <div>Lentil patties with salad</div>
        </div>
    </section>

    <section class="section">
        <h2>Dietary Services</h2>
        <div class="service-grid">
            <div class="service-box" onclick="window.location.href='?service=diabetes'">
                <img src="https://via.placeholder.com/300x150?text=Diabetes" alt="Diabetes">
                <h3>Diabetes</h3>
                <p>Balanced meals that include whole grains, lean proteins, and plenty of vegetables. We control sugar options with sugar-free diets.</p>
            </div>
            <div class="service-box" onclick="window.location.href='?service=blood_pressure'">
                <img src="https://via.placeholder.com/300x150?text=Blood+Pressure" alt="Blood Pressure">
                <h3>Blood Pressure</h3>
                <p>Low-sodium diets by reducing salt intake, including bananas, spinach, and sweet potatoes.</p>
            </div>
            <div class="service-box" onclick="window.location.href='?service=heart_disease'">
                <img src="https://via.placeholder.com/300x150?text=Heart+Disease" alt="Heart Disease">
                <h3>Heart Diseases</h3>
                <p>Heart-healthy meals include salmon, oats, nuts, fruits, and vegetables.</p>
            </div>
        </div>
    </section>

    <section class="section">
        <h2>Lost & Found Board</h2>
        <div class="lost-found-grid">
            <div class="service-box">
                <h3>Lost Property</h3>
                <p>Report lost items like name, description, location, and staff can assist you.</p>
            </div>
            <div class="service-box">
                <h3>Status Updates</h3>
                <p>Track the progress with clear updates from our staff desk.</p>
            </div>
            <div class="service-box">
                <h3>Claim Request Option</h3>
                <p>Found something? Claim quickly, ensure items are returned right away.</p>
            </div>
        </div>
    </section>

    <section class="section">
        <h2>Call for Help - Smart Alert</h2>
        <div class="call-help-grid">
            <div class="service-box" onclick="openModal('emergencyModal')">
                <h3>Emergency Call</h3>
                <p>Emergency response with a single tap; staff help is always within reach.</p>
            </div>
            <div class="service-box" onclick="openModal('quickSOSModal')">
                <h3>Quick SOS</h3>
                <p>Quick-use SOS features designed for emergencies with staff available 24/7.</p>
            </div>
            <div class="service-box" onclick="openModal('bedDeskModal')">
                <h3>Button in Bed Desk</h3>
                <p>Button on bed desk for immediate alerts from residents, allowing staff to respond.</p>
            </div>
        </div>
    </section>

    <section class="section">
        <h2>Other Services</h2>
        <div class="other-services-grid">
            <div class="other-service-box" onclick="window.location.href='?service=elderly_day_care'">
                <img src="img/day.png" alt="Elderly Day Care">
                <h3>Elderly Daily Care</h3>
                <a href="?service=elderly_day_care">Click on it</a>
            </div>
            <div class="other-service-box" onclick="window.location.href='?service=elderly_healthcare'">
                <img src="img/elder.png" alt="Elderly Healthcare">
                <h3>Elderly Healthcare</h3>
                <a href="?service=elderly_healthcare">Click on it</a>
            </div>
            <div class="other-service-box" onclick="window.location.href='?service=elderly_accommodation'">
                <img src="img/acom.png" alt="Elderly Accommodation">
                <h3>Elderly Accommodation</h3>
                <a href="?service=elderly_accommodation">Click on it</a>
            </div>
        </div>
    </section>

    <!-- Emergency Call Modal -->
    <div id="emergencyModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('emergencyModal')">&times;</span>
            <h3>Emergency Call</h3>
            <p>Calling +9987 for immediate assistance.</p>
            <button class="call-button" onclick="makeCall('+9987')">Call Now</button>
        </div>
    </div>

    <!-- Quick SOS Modal -->
    <div id="quickSOSModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('quickSOSModal')">&times;</span>
            <h3>Quick SOS</h3>
            <p>Calling 999 for emergency services.</p>
            <button class="call-button" onclick="makeCall('999')">Call Now</button>
        </div>
    </div>

    <!-- Bed Desk Modal -->
    <div id="bedDeskModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('bedDeskModal')">&times;</span>
            <h3>Send Alert from Bed Desk</h3>
            <form id="alertForm" method="POST" action="">
                <div class="form-group">
                    <label for="roomId">Room ID:</label>
                    <input type="text" id="roomId" name="roomId" required>
                </div>
                <div class="form-group">
                    <label for="contactNumber">Contact Number:</label>
                    <input type="tel" id="contactNumber" name="contactNumber" required>
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="4" required></textarea>
                </div>
                <button type="submit" class="send-button">Send Alert</button>
            </form>
        </div>
    </div>

    <!-- Success Popup -->
    <div id="successPopup" class="success-popup">
        <p id="successText">Your Message has sent. We will be there shortly.</p>
    </div>
    
   <footer>
    <div class="footer-left">
        <h3>Carely Connect</h3>
        <p>Supportive and welcoming environment for seniors. We provide personalized care, kind staff, engaging activities, and healthy meals, making every resident feel respected and valued.</p>
        
        <div class="social-icons">
            <a href="https://www.facebook.com/" target="_blank">
                <img src="img/fb.png" alt="Facebook">
            <a href="https://www.instagram.com/" target="_blank">
                <img src="img/ins.png" alt="Instagram">
            </a>
            </a>
            <a href="https://twitter.com/" target="_blank">
                <img src="img/tw.png" alt="Twitter">
            </a>
            
            
        </div>
    </div>

    <div class="footer-right">
        <h3>Contact Us</h3>
        <div class="contact-items">
            <a href="tel:+8801891983888" class="contact-item">+880 1891983888</a>
            <a href="mailto:Team@CarelyConnect.Com" class="contact-item">team@carelyConnect.Com</a>
        </div>
    </div>

    <div class="copyright">
        © 2025 Web Programming Software Solutions. All Rights Reserved.
    </div>
</footer>


    <script>
        function openModal(modalId) {
            document.getElementById(modalId).style.display = 'block';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }

        function makeCall(number) {
            window.location.href = 'tel:' + number;
            closeModal('emergencyModal'); // Close the modal after initiating call
        }

        // Close modals when clicking outside
        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = 'none';
            }
        }

        // Handle PHP success message
        <?php if (isset($successMessage)): ?>
        setTimeout(() => {
            document.getElementById('successPopup').style.display = 'block';
            setTimeout(() => {
                document.getElementById('successPopup').style.display = 'none';
            }, 3000);
        }, 500);
        <?php endif; ?>

        // Fallback JS for form (but now handled by PHP POST)
        document.getElementById('alertForm').addEventListener('submit', function(e) {
            // Let form submit normally now
        });
    </script>
</body>
</html>
<?php
// Close connection
$conn->close();
?>