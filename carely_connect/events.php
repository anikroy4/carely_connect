<?php
// events.php - This file renders the Events page for Carely Connect website
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events - Carely Connect</title>
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

        /* Activities Grid */
        .activities {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
            padding: 40px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .activity {
            background: linear-gradient(135deg, #ffffff 0%, #f8faff 100%);
            border: none;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 6px 20px rgba(0, 123, 255, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
        }

        .activity:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 123, 255, 0.2);
        }

        .activity img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 15px;
            transition: transform 0.3s ease;
        }

        .activity:hover img {
            transform: scale(1.05);
        }

        .activity h3 {
            color: #007bff;
            font-size: 24px;
            font-weight: 600;
            margin: 0 0 10px;
            text-transform: capitalize;
        }

        .activity p {
            font-size: 15px;
            color: #555;
            line-height: 1.8;
            margin: 0;
        }

        /* Recreational Activities */
        .recreational {
            padding: 40px 20px;
            text-align: center;
            max-width: 1200px;
            margin: 0 auto;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(230, 240, 250, 0.9));
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
        }

        .recreational h2 {
            color: #007bff;
            font-size: 36px;
            font-weight: 600;
            margin-bottom: 30px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .recreational-images {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 25px;
        }

        .recreational-images img {
            width: 45%;
            height: 250px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .recreational-images img:hover {
            transform: scale(1.03);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }

        .recreational p {
            font-size: 16px;
            color: #555;
            line-height: 1.8;
            max-width: 800px;
            margin: 0 auto;
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

            .activities {
                grid-template-columns: 1fr;
                padding: 20px;
            }

            .recreational-images {
                flex-direction: column;
                align-items: center;
            }

            .recreational-images img {
                width: 100%;
                max-width: 400px;
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
                <li><a href="events.php"  class="active" >Events</a></li>
                <li><a href="contact_us.php">Contact Us</a></li>
            </ul>
        </nav>
        <div class="header-buttons">
            <a href="signin.php" class="login">Login</a>
            <a href="signup.php" class="signup">Sign Up</a> 
            <a href="donations.php" class="donate">Donate</a>
            
        </div>
    </header>

    <section class="activities">
        <div class="activity">
            <img src="img/yoga.png" alt="Yoga session">
            <h3>Yoga</h3>
            <p>Yoga at our care home offers residents gentle exercises and well-being. It promotes physical health and inner peace in a supportive and calming environment.</p>
        </div>
        <div class="activity">
            <img src="img/indo.png" alt="Indoor games">
            <h3>Indoor Games</h3>
            <p>Indoor games at our care home offer residents enjoyable activities. Fun way to pass time and foster a sense of camaraderie among residents.</p>
        </div>
        <div class="activity">
            <img src="img/gar.png" alt="Gardening">
            <h3>Gardening</h3>
            <p>Gardening at our care home allows residents to connect with nature, engage in therapeutic activities, and enjoy the satisfaction of nurturing plants. It provides a peaceful and meaningful way.</p>
        </div>
        <div class="activity">
            <img src="img/walk1.jpg" alt="Morning walk">
            <h3>Morning Walk</h3>
            <p>Morning walks at our care home provide residents with a refreshing start to their day, promoting physical activity and enhancing overall enjoyment of nature in a safe environment.</p>
        </div>
    </section>

    <section class="recreational">
        <h2>Recreational Activities</h2>
        <div class="recreational-images">
            <img src="img/r1.png" alt="Recreational activity 1">
            <img src="img/r2.png" alt="Recreational activity 2">
        </div>
        <p>Recreational activities at our care home include a variety of engaging options like arts and crafts, music sessions, and group outings. These activities are designed to promote social interaction, stimulate creativity, and enhance overall well-being among residents.</p>
    </section>

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