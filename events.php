<?php
$imagePath="./images/events";
// events.php - This file renders the Events page for Carely Connect website
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events - Carely Connect</title>
    <style>
        /* Global styles */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            color: #333;
            line-height: 1.6;
        }

        /* Header */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #fff;
            border-bottom: 1px solid #eee;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #007bff;
        }

        nav ul {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            text-decoration: none;
            color: #003366;
            font-weight: bold;
            padding: 8px 15px;
            border-radius: 20px;
            transition: transform 0.2s ease, box-shadow 0.2s ease, color 0.2s ease, background-color 0.2s ease;
        }

        nav ul li a:hover {
            transform: scale(1.05);
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2);
            color: #fff;
            background-color: #007bff;
        }

        nav ul li a:active {
            transform: scale(0.95);
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3);
            color: #fff;
            background-color: #0056b3;
        }

        /* Highlight active/current page */
        nav ul li .active {
            color: #fff;
            background-color: #007bff;
            border-radius: 20px;
        }

        .header-buttons a {
            margin-left: 10px;
            padding: 8px 15px;
            border-radius: 20px;
            text-decoration: none;
            font-weight: bold;
            transition: transform 0.2s ease, box-shadow 0.2s ease, background-color 0.2s ease;
        }

        .header-buttons a:hover {
            transform: scale(1.05);
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2);
        }

        .header-buttons a:active {
            transform: scale(0.95);
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3);
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
            color: #007bff;
            font-size: 48px;
            margin: 0;
        }

        /* Activities Grid */
        .activities {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .activity {
            border: 1px solid #90ee90;
            border-radius: 5px;
            padding: 10px;
            background-color: #fff;
        }

        .activity img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .activity h3 {
            color: #007bff;
            margin: 10px 0 5px;
        }

        .activity p {
            font-size: 14px;
        }

        /* Recreational Activities */
        .recreational {
            padding: 20px;
            text-align: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .recreational h2 {
            color: #007bff;
            font-size: 36px;
            margin-bottom: 20px;
        }

        .recreational-images {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        .recreational-images img {
            width: 45%;
            height: auto;
            border-radius: 5px;
        }

        .recreational p {
            font-size: 14px;
            max-width: 800px;
            margin: 0 auto;
        }

        /* Footer */
        footer {
            background-color: #e9f7ef;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;
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
    </style>
</head>
<body>
    <header>
        <div class="logo">Carely Connect</div>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Services ▼</a></li>
                <li><a href="#" class="active">Events</a></li>
                <li><a href="contact_us.php">Contact Us</a></li>
            </ul>
        </nav>
        
<div class="header-buttons">
    <a href="signin.php" class="login">Login</a>
    <a href="signup.php" class="signup">Sign Up</a>
    <a href="#" class="donate">Donate</a>
</div>
        
    </header>

    <section class="banner">
     <img src="<?php echo $imagePath; ?>" alt="<?php echo $altText; ?>">
    <h1>Events</h1>
    </section>

    <section class="activities">
        <div class="activity">
            <img src="https://via.placeholder.com/300x200?text=Yoga" alt="Yoga session">
            <h3>Yoga</h3>
            <p>Yoga at our care home offers residents gentle exercises and well-being. It promotes physical health and inner peace in a supportive and calming environment.</p>
        </div>
        <div class="activity">
            <img src="https://via.placeholder.com/300x200?text=Indoor+Games" alt="Indoor games">
            <h3>Indoor Games</h3>
            <p>Indoor games at our care home offer residents enjoyable activities. Fun way to pass time and foster a sense of camaraderie among residents.</p>
        </div>
        <div class="activity">
            <img src="https://via.placeholder.com/300x200?text=Gardening" alt="Gardening">
            <h3>Gardening</h3>
            <p>Gardening at our care home allows residents to connect with nature, engage in therapeutic activities, and enjoy the satisfaction of nurturing plants. It provides a peaceful and meaningful way.</p>
        </div>
        <div class="activity">
            <img src="https://via.placeholder.com/300x200?text=Morning+Walk" alt="Morning walk">
            <h3>Morning Walk</h3>
            <p>Morning walks at our care home provide residents with a refreshing start to their day, promoting physical activity and enhancing overall enjoyment of nature in a safe environment.</p>
        </div>
    </section>

    <section class="recreational">
        <h2>Recreational Activities</h2>
        <div class="recreational-images">
            <img src="https://via.placeholder.com/300x200?text=Rec+Activity+1" alt="Recreational activity 1">
            <img src="https://via.placeholder.com/300x200?text=Rec+Activity+2" alt="Recreational activity 2">
        </div>
        <p>Recreational activities at our care home include a variety of engaging options like arts and crafts, music sessions, and group outings. These activities are designed to promote social interaction, stimulate creativity, and enhance overall well-being among residents.</p>
    </section>

    <footer>
        <div class="footer-left">
            <h3>Carely Connect</h3>
            <p>Offers a supportive and welcoming environment for seniors, with personalized care, kind-hearted staff, engaging activities, and healthy meals. We're committed to making every resident feel comfortable, respected, and truly valued.</p>
            <div class="social-icons">
                <img src="https://via.placeholder.com/20x20?text=Twitter" alt="Twitter">
                <img src="https://via.placeholder.com/20x20?text=Instagram" alt="Instagram">
            </div>
        </div>
        <div class="footer-right">
            <h3>Contact Us</h3>
            <a href="tel:+88019819898" class="contact-item">+880 19819898</a>
            <a href="mailto:Team@CarelyConnect.Com" class="contact-item">Team@CarelyConnect.Com</a>
        </div>
        <div class="copyright">2025 Web Programming Software Solutions. All Rights Reserved.</div>
    </footer>
</body>
</html>