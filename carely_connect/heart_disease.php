<?php
// heart_disease.php - This file renders the Heart Disease Management page for Carely Connect website
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heart Disease Management - Carely Connect</title>
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
            grid-template-columns: repeat(5, 1fr);
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

        /* Crew Grid */
        .crew-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 40px;
        }

        .crew-member {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease;
        }

        .crew-member:hover {
            transform: translateY(-5px);
        }

        .crew-member img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .crew-member h3 {
            color: #007bff;
            font-size: 20px;
            margin: 10px 0;
        }

        .crew-member p {
            font-size: 14px;
            color: #666;
        }

        /* Food Menu List */
        .food-menu {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            list-style: none;
        }

        .food-menu li {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }

        /* Contact List */
        .contact-list {
            list-style: none;
            padding: 0;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .contact-list li {
            background: linear-gradient(135deg, #ffffff 0%, #e6f0fa 100%);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            align-items: center;
            gap: 15px;
            border-left: 5px solid #007bff;
        }

        .contact-list li:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .contact-list li:active {
            transform: translateY(0);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .contact-list li .icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #007bff;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 20px;
            flex-shrink: 0;
        }

        .contact-list li .contact-info {
            flex: 1;
        }

        .contact-list li .contact-info p {
            margin: 5px 0;
            font-size: 15px;
            color: #333;
        }

        .contact-list li .contact-info p strong {
            color: #007bff;
        }

        /* Patient Count Box */
        .patient-count-box {
            background: linear-gradient(135deg, #ffffff 0%, #e6f0fa 100%);
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px auto;
            max-width: 400px;
            text-align: center;
            border-left: 5px solid #007bff;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .patient-count-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .patient-count-box:active {
            transform: translateY(0);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .patient-count-box h3 {
            color: #007bff;
            font-size: 24px;
            margin: 0 0 10px;
        }

        .patient-count-box .count {
            font-size: 48px;
            font-weight: 600;
            color: #003366;
            margin: 10px 0;
        }

        .patient-count-box p {
            font-size: 16px;
            color: #555;
            margin: 0;
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

            .header-buttons {
                margin-top: 15px;
                display: flex;
                gap: 10px;
            }

            .banner {
                height: 200px;
            }

            .weekly-plan {
                grid-template-columns: 1fr;
            }

            .crew-grid {
                grid-template-columns: 1fr;
            }

            .food-menu {
                grid-template-columns: repeat(2, 1fr);
            }

            .contact-list {
                grid-template-columns: 1fr;
            }

            .patient-count-box {
                max-width: 100%;
            }
        }

        /* Enhanced Styles for Large Animated Meal Preferences Box */
        .preferences-form {
            background: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            margin: 40px auto;
            text-align: left;
            animation: slideInUpLarge 0.8s ease-out, pulse 2s infinite;
            border: 2px solid #e6f0fa;
        }

        .preferences-form h3 {
            color: #007bff;
            margin-bottom: 25px;
            text-align: center;
            font-size: 28px;
            animation: fadeInText 1s ease-in;
        }

        .checkbox-group {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }

        .checkbox-group label {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 16px;
            color: #555;
            cursor: pointer;
            padding: 10px;
            border-radius: 8px;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .checkbox-group label:hover {
            background: #e3f2fd;
            transform: translateX(5px);
        }

        .checkbox-group input[type="checkbox"] {
            width: auto;
            transform: scale(1.2);
        }

        .send-button {
            background-color: #007bff;
            color: #fff;
            padding: 15px 30px;
            border: none;
            border-radius: 30px;
            font-weight: 600;
            font-size: 18px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: block;
            margin: 30px auto;
            animation: bounce 2s infinite;
        }

        .send-button:hover {
            background-color: #0056b3;
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0, 123, 255, 0.3);
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
            background-color: rgba(0, 0, 0, 0.5);
            animation: fadeIn 0.3s ease;
        }

        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 30px;
            border-radius: 15px;
            width: 80%;
            max-width: 400px;
            text-align: center;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            animation: slideInUp 0.5s ease;
        }

        .modal-content h3 {
            color: #007bff;
            margin-bottom: 15px;
        }

        .modal-content p {
            font-size: 16px;
            color: #555;
            margin-bottom: 20px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover {
            color: #000;
        }

        /* Animations */
        @keyframes slideInUpLarge {
            from {
                opacity: 0;
                transform: translateY(100px) scale(0.9);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes pulse {
            0% { box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1); }
            50% { box-shadow: 0 8px 25px rgba(0, 123, 255, 0.2); }
            100% { box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1); }
        }

        @keyframes fadeInText {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-5px); }
            60% { transform: translateY(-3px); }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">Carely & Connect</div>
         <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="services.php">Services</a></li>
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

    <div class="banner">
        <img src="https://via.placeholder.com/1200x400?text=Heart+Disease+Management" alt="Heart Disease Banner">
        <div class="banner-content">
            <h1>Heart Disease Management Section</h1>
        </div>
    </div>

    <section class="section">
        <h2>Number of Heart Disease Patients</h2>
        <div class="patient-count-box">
            <h3>Heart Disease Patients</h3>
            <div class="count">615</div>
            <p>Patients currently managed at Carely Connect for heart disease care.</p>
        </div>
    </section>

    <section class="section">
        <h2>Food-Taking Routines for Heart Disease Relief</h2>
        <p>Our heart disease management program includes low-sodium, heart-healthy meals designed to support cardiovascular health and manage blood pressure levels. Below is a sample weekly routine for breakfast, lunch, dinner, and snacks.</p>
        <div class="weekly-plan">
            <div class="header">Day</div>
            <div class="header">Breakfast</div>
            <div class="header">Lunch</div>
            <div class="header">Dinner</div>
            <div class="header">Snacks</div>
            <div>Saturday</div>
            <div>Oatmeal with almonds and oranges</div>
            <div>Grilled salmon with carrots and boiled rice</div>
            <div>Tuna with black beans and avocado</div>
            <div>Cherries and walnuts</div>
            <div>Sunday</div>
            <div>Whole-grain bread with yogurt</div>
            <div>Lentils with tomatoes and barley</div>
            <div>Salmon with broccoli and garlic</div>
            <div>Mango</div>
            <div>Monday</div>
            <div>Yogurt with cherries</div>
            <div>Tuna salad with carrots</div>
            <div>Black beans with boiled rice</div>
            <div>Almonds</div>
            <div>Tuesday</div>
            <div>Whole-grain toast with avocado</div>
            <div>Salmon with lentils</div>
            <div>Tuna with tomatoes and grain pasta</div>
            <div>Oranges</div>
            <div>Wednesday</div>
            <div>Oatmeal with strawberries</div>
            <div>Grilled chicken with broccoli</div>
            <div>Black beans with garlic</div>
            <div>Walnuts</div>
            <div>Thursday</div>
            <div>Milk with whole-grain bread</div>
            <div>Tuna with carrots</div>
            <div>Salmon with boiled rice</div>
            <div>Cherries</div>
            <div>Friday</div>
            <div>Yogurt with mango</div>
            <div>Black beans with tomatoes</div>
            <div>Salmon with avocado and garlic</div>
            <div>Strawberries</div>
        </div>
    </section>
     <section class="section">
        <h2>Food Menu</h2>
        <p>Our heart disease-friendly menu includes low-sodium, nutrient-rich foods to support cardiovascular health and manage blood pressure levels.</p>
        <ul class="food-menu">
            <li>Black Beans</li>
            <li>Almonds</li>
            <li>Walnuts</li>
            <li>Cherries</li>
            <li>Carrots</li>
            <li>Tomatoes</li>
            <li>Salmon</li>
            <li>Tuna</li>
            <li>Lentils</li>
            <li>Nuts</li>
            <li>Milk</li>
            <li>Yogurt</li>
            <li>Bread</li>
            <li>Oranges</li>
            <li>Barley</li>
            <li>Avocado</li>
            <li>Broccoli</li>
            <li>Strawberries</li>
            <li>Garlic</li>
            <li>Mango</li>
            <li>Boiled Rice</li>
        </ul>
    </section>

    <section class="section">
        <h2>Kitchen Crew Members</h2>
        <p>Our dedicated kitchen crew ensures that all meals are prepared with care and delivered on time. They specialize in creating nutritious, heart disease-friendly meals.</p>
        <div class="crew-grid">
            <div class="crew-member">
                <img src="https://via.placeholder.com/100x100?text=Chef+Salma" alt="Chef">
                <h3>Salma Akter</h3>
                <p>Head Chef - Prepares main courses and oversees meal planning.</p>
            </div>
            <div class="crew-member">
                <img src="https://via.placeholder.com/100x100?text=Assistant+Kamal" alt="Assistant">
                <h3>Kamal Hossain</h3>
                <p>Assistant Chef - Handles snacks and dietary adjustments.</p>
            </div>
            <div class="crew-member">
                <img src="https://via.placeholder.com/100x100?text=Delivery+Nadia" alt="Delivery">
                <h3>Nadia Islam</h3>
                <p>Delivery Specialist - Ensures timely delivery to patient rooms.</p>
            </div>
        </div>
    </section>

   

    <section class="section">
        <p>Select your preferences from the Food-Taking Routines menu to customize your meal and send a notification to the crew.</p>
        <form class="preferences-form" id="preferencesForm">
            <h3>Meal Preferences</h3>
            <div class="checkbox-group">
                <label><input type="checkbox" name="salty" value="Salty"> Salty</label>
                <label><input type="checkbox" name="nonSalty" value="Non Salty"> Non Salty</label>
                <label><input type="checkbox" name="spicy" value="Spicy"> Spicy</label>
                <label><input type="checkbox" name="nonSpicy" value="Non Spicy"> Non Spicy</label>
                <label><input type="checkbox" name="sugar" value="Sugar"> Sugar</label>
                <label><input type="checkbox" name="nonSugar" value="Non Sugar"> Non Sugar</label>
                <label><input type="checkbox" name="normalSnacks" value="Normal Snacks"> Normal Snacks</label>
                <label><input type="checkbox" name="sugarFreeSnacks" value="Sugar-free Snacks"> Sugar-free Snacks</label>
                <label><input type="checkbox" name="normalTeas" value="Normal Teas"> Normal Teas</label>
                <label><input type="checkbox" name="herbalTeas" value="Herbal Teas"> Herbal Teas</label>
            </div>
            <button type="button" class="send-button" onclick="sendNotification()">Send Message to Crew Members</button>
        </form>
    </section>

    <!-- Success Modal -->
    <div id="notificationModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h3>ID 512: Your Message has Sent!</h3>
            <p>Please wait for the food!</p>
        </div>
    </div>

    <!-- Error Modal -->
    <div id="errorModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeErrorModal()">&times;</span>
            <h3>Request Limit Reached</h3>
            <p>You have already made 2 updated requests. You can't send message at this moment.</p>
        </div>
    </div>

    <section class="section">
        <h2>Crew Members' Contact Info</h2>
        <ul class="contact-list">
            <li>
                <div class="icon">S</div>
                <div class="contact-info">
                    <p><strong>Name:</strong> Salma Akter</p>
                    <p><strong>Email:</strong> <a href="mailto:salma@carelyconnect.com">salma@carelyconnect.com</a></p>
                    <p><strong>Phone:</strong> <a href="tel:+8801234567892">+880 1234567892</a></p>
                </div>
            </li>
            <li>
                <div class="icon">K</div>
                <div class="contact-info">
                    <p><strong>Name:</strong> Kamal Hossain</p>
                    <p><strong>Email:</strong> <a href="mailto:kamal@carelyconnect.com">kamal@carelyconnect.com</a></p>
                    <p><strong>Phone:</strong> <a href="tel:+8800987654323">+880 0987654323</a></p>
                </div>
            </li>
            <li>
                <div class="icon">N</div>
                <div class="contact-info">
                    <p><strong>Name:</strong> Nadia Islam</p>
                    <p><strong>Email:</strong> <a href="mailto:nadia@carelyconnect.com">nadia@carelyconnect.com</a></p>
                    <p><strong>Phone:</strong> <a href="tel:+8801122334457">+880 1122334457</a></p>
                </div>
            </li>
        </ul>
    </section>

    <footer>
        <div class="footer-left">
            <h3>Carely & Connect</h3>
            <p>Offers a supportive and welcoming environment for seniors with engaging activities and healthy meals. We're committed to making every resident feel comfortable, respected, and truly valued.</p>
            <div class="social-icons">
                <img src="https://via.placeholder.com/20x20?text=Facebook" alt="Facebook">
                <img src="https://via.placeholder.com/20x20?text=Twitter" alt="Twitter">
                <img src="https://via.placeholder.com/20x20?text=Instagram" alt="Instagram">
            </div>
        </div>
        <div class="footer-right">
            <h3>Contact Us</h3>
            <a href="tel:+8801891983888" class="contact-item">+880 1891983888</a>
            <a href="mailto:Team@CarelyConnect.Com" class="contact-item">Team@CarelyConnect.Com</a>
        </div>
        <div class="copyright">2025 Web Programming Software Solutions. All Rights Reserved.</div>
    </footer>

    <script>
        let clickCount = 0;

        function sendNotification() {
            clickCount++;
            if (clickCount <= 2) {
                // Show success modal
                const modal = document.getElementById('notificationModal');
                modal.style.display = 'block';
                setTimeout(() => {
                    closeModal();
                }, 3000); // Auto-close after 3 seconds
            } else {
                // Show error modal
                const errorModal = document.getElementById('errorModal');
                errorModal.style.display = 'block';
                setTimeout(() => {
                    closeErrorModal();
                }, 3000); // Auto-close after 3 seconds
            }
        }

        function closeModal() {
            const modal = document.getElementById('notificationModal');
            modal.style.display = 'none';
        }

        function closeErrorModal() {
            const errorModal = document.getElementById('errorModal');
            errorModal.style.display = 'none';
        }

        // Close modals when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('notificationModal');
            const errorModal = document.getElementById('errorModal');
            if (event.target == modal) {
                closeModal();
            } else if (event.target == errorModal) {
                closeErrorModal();
            }
        }
    </script>
</body>
</html>