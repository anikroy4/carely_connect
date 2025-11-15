<?php
// donations.php - This file renders the Donations page for Carely Connect website
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donations - Carely Connect</title>
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
            height: 300px;
            overflow: hidden;
        }

        .banner img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .banner h1 {
            position: absolute;
            top: 50%;
            left: 20px;
            transform: translateY(-50%);
            color: #fff;
            font-size: 48px;
            margin: 0;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        /* Donations Section */
        .donations-section {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
        }

        .donations-section h2 {
            color: #333;
            font-size: 36px;
            margin-bottom: 20px;
        }

        /* Top Contributors */
        .top-contributors {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        .contributor {
            background-color: #fff;
            padding: 15px;
            border: 1px solid #90ee90;
            border-radius: 5px;
            width: 30%;
            text-align: left;
        }

        .contributor img {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            margin-bottom: 5px;
        }

        .contributor p {
            font-size: 14px;
            color: #666;
        }

        /* Donation Form */
        .donation-form {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #90ee90;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
            text-align: left;
            border-left: 5px solid #90ee90;
        }

        .donation-form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        .donation-form select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
        }

        .donation-form .radio-group {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
            flex-wrap: wrap;
        }

        .donation-form .radio-option {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .donation-form input[type="radio"] {
            margin-right: 5px;
            width: 18px;
            height: 18px;
        }

        .donation-form input[type="radio"]:checked {
            background-color: #007bff;
            border-color: #1d6e61ff;
        }

        .donation-form button {
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-size: 16px;
            margin-right: 10px;
            transition: transform 0.2s ease, box-shadow 0.2s ease, background-color 0.2s ease;
        }

        .donation-form .cancel-btn {
            background-color: #ccc;
            color: #333;
        }

        .donation-form .cancel-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2);
            background-color: #bbb;
        }

        .donation-form .cancel-btn:active {
            transform: scale(0.95);
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3);
        }

        .donation-form .checkout-btn {
            background-color: #007bff;
            color: #fff;
        }

        .donation-form .checkout-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2);
            background-color: #0056b3;
        }

        .donation-form .checkout-btn:active {
            transform: scale(0.95);
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3);
        }

        /* Insurance Section */
        .insurance-section {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
        }

        .insurance-section h3 {
            color: #007bff;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .insurance-section p {
            font-size: 14px;
            color: #666;
            max-width: 800px;
            margin: 0 auto;
        }

        /* Financial Assistance Section */
        .financial-assistance {
            background-color: #e2e4e7ff;
            padding: 20px;
            text-align: center;
            color: #fff;
            margin-top: 20px;
        }

        .financial-assistance h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .financial-assistance button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 20px;
            cursor: pointer;
            font-size: 16px;
            transition: transform 0.2s ease, box-shadow 0.2s ease, background-color 0.2s ease;
        }

        .financial-assistance button:hover {
            transform: scale(1.05);
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2);
            background-color: #0056b3;
        }

        .financial-assistance button:active {
            transform: scale(0.95);
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3);
        }

    
    .financial-assistance {
        padding: 40px 20px;
        text-align: center;
        max-width: 1200px;
        margin: 0 auto;
    }

    .financial-assistance h3 {
        font-size: 28px;
        font-weight: 600;
        color: #333;
        margin-bottom: 20px;
    }

    .get-in-touch-btn {
        display: inline-block;
        padding: 12px 25px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 25px;
        font-size: 16px;
        font-weight: 600;
        text-decoration: none;
        transition: background-color 0.3s ease, transform 0.3s ease;
        cursor: pointer;
    }

    .get-in-touch-btn:hover {
        background-color: #0056b3;
        transform: translateY(-2px);
    }

    .get-in-touch-btn:active {
        transform: translateY(0);
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
            /* margin-top: 150px; */
            margin: 40px auto;
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

        /* Responsive Design for Navigation */
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
                <li><a href="services.php">Services</a></li>
                <li><a href="events.php">Events</a></li>
                <li><a href="contact_us.php">Contact Us</a></li>
            </ul>
        </nav>
        <div class="header-buttons">
            <a href="signin.php" class="login">Login</a>
            <a href="signup.php" class="signup">Sign Up</a>
            <a href="donations.php"  class="donate active">Donate</a>
        </div>
    </header>

   
    <section class="donations-section">
        <h2>Top Contributors</h2>
        <div class="top-contributors">
            <div class="contributor">
                <img src="img/sh.jpeg" alt="Shihab Khan">
               <h3><p>Shihab Khan</p></h3> 
                <p>We are honored to support your care home. It brings us great joy to contribute to such a warm and nurturing environment. We admire the dedication you put into making this home a wonderful place for all residents.</p>
            </div>
            <div class="contributor">
                <img src="img/af.jpeg" alt="Afsana Islam">
                <h3><p>Afsana Islam</p></h3> 
                <p>We are honored to support your care home. It brings us great joy to contribute to such a warm and nurturing environment. We admire the dedication you put into making this home a wonderful place for all residents.</p>
            </div>
            <div class="contributor">
                <img src="img/nahid1.jpg" alt="Nahid Hassan">
                <h3><p>Nahid Hassan</p></h3> 
                <p>It is our pleasure to contribute to your wonderful care home. We are inspired by the dedication and compassion you show every day, and the donation helps to support our community.</p>
            </div>
        </div>

        <div class="donation-form">
            <label for="donation-type">Choose a donation type</label>
            <select id="donation-type">
                <option value="treatment">Cost of treatment</option>
            </select>
            <label>Choose a donation amount</label>
            <div class="radio-group">
                <div class="radio-option">
                    <input type="radio" name="amount" value="10000" id="10000" checked>
                    <label for="10000">10,000 Tk</label>
                </div>
                <div class="radio-option">
                    <input type="radio" name="amount" value="20000" id="20000">
                    <label for="20000">20,000 Tk</label>
                </div>
                <div class="radio-option">
                    <input type="radio" name="amount" value="40000" id="40000">
                    <label for="40000">40,000 Tk</label>
                </div>
            </div>
            <label>Frequency</label>
            <div class="radio-group">
                <div class="radio-option">
                    <input type="radio" name="frequency" value="monthly" id="monthly">
                    <label for="monthly">Monthly</label>
                </div>
                <div class="radio-option">
                    <input type="radio" name="frequency" value="one-time" id="one-time" checked>
                    <label for="one-time">One time</label>
                </div>
            </div>
            <button type="button" class="cancel-btn">Cancel</button>
            <button type="button" class="checkout-btn" onclick="window.location.href='donsys.php'">Go to checkout</button>
        </div>
    </section>

    <section class="insurance-section">
        <h3>Insurance and Medicare/Medicaid</h3>
        <p>Health insurance helps pay for residents' medical needs like doctor visits and medications. Medicare is very important for seniors, covering hospital stays (Part A) and medications (Part B). Medicare Advantage (Part C) also offers extra benefits like vision and dental care. Care ensures residents can access necessary treatments without worrying about high costs, enhancing their overall well-being and quality of life.</p>
    </section>

    <section class="financial-assistance">
    <h3>Financial Assistance Resources</h3>
    <a href="fin_as.php" class="get-in-touch-btn">Get in Touch</a>
</section>

    <footer>
        <div class="footer-left">
            <h3>Carely Connect</h3>
            <p>Offers a supportive and welcoming environment for seniors, with personalized care, kind-hearted staff, engaging activities, and healthy meals. We're committed to making every resident feel comfortable, respected, and truly valued.</p>
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
</body>
</html>