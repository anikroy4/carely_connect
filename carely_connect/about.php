<?php
// about.php - This file renders the About Us page for Carely Connect website
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Carely Connect</title>
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

        /* About Hero Section */
        .about-hero {
            position: relative;
            height: 500px;
            background: url('https://via.placeholder.com/1920x400?text=About+Us+Image') no-repeat center center/cover;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
        }

        .about-hero h1 {
            font-size: 48px;
            font-weight: 600;
        }

        /* Mission Section */
        .mission {
            display: flex;
            align-items: center;
            padding: 60px 40px;
            max-width: 1200px;
            margin: 0 auto;
            gap: 40px;
        }

        .mission-content {
            width: 50%;
        }

        .mission h2 {
            color: #007bff;
            font-size: 32px;
            margin-bottom: 20px;
        }

        .mission p {
            font-size: 16px;
            color: #555;
        }

        .mission img {
            width: 60%;
            height: auto;
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(0, 123, 255, 0.1);
        }

        /* FAQ Section */
        .faq {
            padding: 60px 40px;
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
            background-color: #fff;
        }

        .faq h2 {
            color: #007bff;
            font-size: 36px;
            margin-bottom: 40px;
        }

        .faq-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
            max-width: 800px;
            margin: 0 auto;
        }

        .faq-item {
            background: linear-gradient(135deg, #ffffff 0%, #f8faff 100%);
            border-radius: 15px;
            padding: 25px 30px;
            width: 100%;
            text-align: left;
            position: relative;
            box-shadow: 0 6px 20px rgba(0, 123, 255, 0.1);
            transition: all 0.3s ease;
            border-left: 5px solid #007bff;
            overflow: hidden;
        }

        .faq-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 123, 255, 0.2);
            background: linear-gradient(135deg, #f8faff 0%, #e6f0fa 100%);
        }

        .faq-item::before {
            content: attr(data-number);
            position: absolute;
            left: -25px;
            top: 25px;
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 16px;
            box-shadow: 0 2px 8px rgba(0, 123, 255, 0.3);
            transition: transform 0.3s ease;
        }

        .faq-item:hover::before {
            transform: scale(1.1);
        }

        .faq-item h3 {
            font-size: 20px;
            margin: 0 0 12px;
            color: #003366;
            font-weight: 600;
        }

        .faq-item p {
            font-size: 15px;
            color: #555;
            margin: 0;
            line-height: 1.7;
        }

        /* Team Section */
        .team {
            padding: 60px 40px;
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
        }

        .team h2 {
            color: #007bff;
            font-size: 36px;
            margin-bottom: 40px;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
        }

        .team-item {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(0, 123, 255, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .team-item:hover {
            transform: translateY(-5px);
        }

        .team-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .team-item h3 {
            font-size: 20px;
            color: #007bff;
            margin: 15px 0 5px;
            padding: 0 15px;
        }

        .team-item .role {
            font-size: 14px;
            color: #003366;
            margin: 0 0 10px;
            padding: 0 15px;
        }

        .team-item p {
            font-size: 14px;
            color: #555;
            padding: 0 15px 15px;
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

            .about-hero {
                height: 300px;
            }

            .about-hero h1 {
                font-size: 32px;
            }

            .mission {
                flex-direction: column;
                padding: 40px 20px;
            }

            .mission-content,
            .mission img {
                width: 100%;
            }

            .faq {
                padding: 40px 20px;
            }

            .team {
                padding: 40px 20px;
            }

            .team-grid {
                grid-template-columns: 1fr;
            }

            footer {
                flex-direction: column;
                text-align: center;
            }

            .footer-right {
                text-align: center;
                margin-top: 20px;
            }

            .footer-right .contact-items {
                align-items: center;
            }
        }

        @media (min-width: 769px) and (max-width: 1200px) {
            .team-grid {
                grid-template-columns: repeat(2, 1fr);
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
                <li><a href="about.php" class="active">About Us</a></li>
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

    

    <section class="mission">
        <div class="mission-content">
            <h2>Mission Statement</h2>
            <p>We're dedicated to creating a space where seniors feel respected, valued, and genuinely at home. Our facility is specially designed for elderly residents, providing a supportive environment for daily living, engaging activities, and nutritious meals.</p>
        </div>
        <img src="img/abt.png" alt="Miss">
    </section>

    <section class="faq">
        <h2>Frequently Asked Questions</h2>
        <div class="faq-container">
            <div class="faq-item" data-number="①">
                <h3>Is Carely Connect a safe place for seniors?</h3>
                <p>Carely Connect prioritizes safety 24/7, secure facilities, and emergency response plans in place.</p>
            </div>
            <div class="faq-item" data-number="②">
                <h3>Do residents have help with daily tasks?</h3>
                <p>Absolutely, our caring staff assist with daily tasks like bathing, dressing, and medication management.</p>
            </div>
            <div class="faq-item" data-number="③">
                <h3>Can family visit anytime?</h3>
                <p>Yes, family members are welcome to visit anytime, ensuring residents stay connected with their loved ones.</p>
            </div>
            <div class="faq-item" data-number="④">
                <h3>Are there doctors and nurses available if needed?</h3>
                <p>Yes, doctors and nurses are on call to provide medical care and monitor residents' health regularly.</p>
            </div>
        </div>
    </section>

    <section class="team">
        <h2>Meet Our Caring Team</h2>
        <div class="team-grid">
            <div class="team-item">
                <img src="img/mita.png" alt="Mila Surjan">
                <h3>Mila Khanam</h3>
                <div class="role">Senior Surgeon</div>
                <p>Mila is a dedicated caregiver at Carely Connect, specializing in elderly care. With years of experience, she provides compassionate and attentive care for seniors, catering to their needs.</p>
            </div>
            <div class="team-item">
                <img src="img/samia.png" alt="Samia Mahmud">
                <h3>Samia Mahmud</h3>
                <div class="role">Staff Nurse</div>
                <p>Samia has a gentle approach and is known for her patience, empathy, and caring nature. Samia goes above and beyond to make residents feel safe, heard, and genuinely cared for.</p>
            </div>
            <div class="team-item">
                <img src="img/remin.png" alt="Reni Chakima">
                <h3>Reni Chakima</h3>
                <div class="role">Staff Designation</div>
                <p>Reni's charismatic and compassionate approach makes her a favorite among residents. With her calm and kind-hearted demeanor, she takes the time to understand their unique needs, creating a comforting environment for all.</p>
            </div>
            <div class="team-item">
                <img src="img/rob.jpg" alt="Rabiul Khan">
                <h3>Rabiul Khan</h3>
                <div class="role">Senior Surgeon</div>
                <p>Known for his strong work ethic and positive attitude, Rabiul provides attentive and reliable care, ensuring residents' needs are met with a smile.</p>
            </div>
            <div class="team-item">
                <img src="img/zara.png" alt="Tasnim Zara">
                <h3>Tasnim Zara</h3>
                <div class="role">Staff Designation</div>
                <p>A dedicated caregiver at Carely Connect, Tasnim is known for her patience and positive attitude. She helps residents feel part of a great community.</p>
            </div>
            <div class="team-item">
                <img src="img/renesa.png" alt="Alef Afghan">
                <h3>Renesa Watson</h3>
                <div class="role">Senior  Surgeon</div>
                <p>Patient and attentive, Alef ensures residents feel safe and supported in the community.</p>
            </div>
            <div class="team-item">
                <img src="img/emma.png" alt="Emma De">
                <h3>Emma De</h3>
                <div class="role">Staff Designation</div>
                <p>Known for her gentle approach, Emma goes above and beyond to make residents feel safe, heard, and cared for.</p>
            </div>
            <div class="team-item">
                <img src="img/jaha.png" alt="Jahana Begum">
                <h3>Jahana Begum</h3>
                <div class="role">Staff Designation</div>
                <p>Dedicated caregiver known for her thoughtful, personalized care. Jahana focuses on building strong relationships with residents.</p>
            </div>
        </div>
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