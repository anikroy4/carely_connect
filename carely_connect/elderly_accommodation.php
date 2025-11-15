<?php
// elderly_accommodation.php - This file renders the Elderly Accommodation page for Carely Connect website
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elderly Accommodation - Carely Connect</title>
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

        .main-content p {
            font-size: 16px;
            color: #555;
            margin-bottom: 40px;
        }

        /* Accommodation Grid */
        .accommodation-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 40px;
        }

        .accommodation-box {
            background: linear-gradient(135deg, #ffffff 0%, #f0f4f8 100%);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            text-align: left;
            transition: all 0.3s ease;
        }

        .accommodation-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .accommodation-box img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .accommodation-box h3 {
            color: #006400;
            font-size: 20px;
            margin: 10px 0;
            transition: color 0.3s ease;
        }

        .accommodation-box:hover h3 {
            color: #004d00;
        }

        .accommodation-box p {
            font-size: 14px;
            color: #666;
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

            .accommodation-grid {
                grid-template-columns: 1fr;
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



    <div class="main-content">
        <h1>Elderly Accommodation</h1>
        <p>We provide comfortable and safe living spaces tailored to the needs of our elderly residents and their families. We ensure a home-like environment, promoting independence and well-being.</p>

        <h2>Indoor</h2>
        <div class="accommodation-grid">
            <div class="accommodation-box">
                <img src="img/pr.png" alt="Private Rooms">
                <h3>Private Rooms</h3>
                <p>Our private rooms provide spacious, comfortable living and climate control. Residents can personalize their rooms and create a homely and welcoming environment.</p>
            </div>
            <div class="accommodation-box">
                <img src="img/sr.png" alt="Shared Rooms">
                <h3>Shared Rooms</h3>
                <p>Shared rooms are designed with living space where residents can enjoy a sense of community and support, fostering a homely, relaxing environment.</p>
            </div>
        </div>

        <h2>Outdoor</h2>
        <div class="accommodation-grid">
            <div class="accommodation-box">
                <img src="img/os.png" alt="Outdoor Spaces">
                <h3>Outdoor Spaces</h3>
                <p>Our beautifully landscaped outdoor spaces offer residents a serene environment for relaxation and recreation, with opportunities for fresh air, gentle exercise, and social interaction in a safe and pleasant setting.</p>
            </div>
            <div class="accommodation-box">
                <img src="img/gr.png" alt="Gardens">
                <h3>Gardens</h3>
                <p>Our well-maintained gardens offer a peaceful retreat where residents can connect with nature, with fresh paths, relaxation, light exercise, and friendly conversation.</p>
            </div>
        </div>

        <h2>Common Areas</h2>
        <div class="accommodation-grid">
            <div class="accommodation-box">
                <img src="img/cr.png" alt="Common Room">
                <h3>Common Room</h3>
                <p>Residents have access to beautifully furnished common areas, including living rooms, encouraging socialization and recreational activities.</p>
            </div>
            <div class="accommodation-box">
                <img src="img/fg.png" alt="Family Gathers">
                <h3>Family Gathers</h3>
                <p>Residents have access to beautifully furnished common areas, including lounges, dining rooms, and gardens, encouraging socialization and recreational activities.</p>
            </div>
        </div>
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

</body>
</html>