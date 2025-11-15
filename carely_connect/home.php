<?php
// home.php - This file renders the Home page for Carely Connect website
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Carely Connect</title>
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
    height: 550px; /* adjust height if needed */
    overflow: hidden;
}

.banner img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: brightness(70%);
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

/* Text fade-in animation */
@keyframes fadeInUp {
    0% {
        opacity: 0;
        transform: translate(-50%, -40%);
    }
    100% {
        opacity: 1;
        transform: translate(-50%, -50%);
    }
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

        /* Hero Section */
        .hero {
            position: relative;
            height: 500px;
            background: url('https://via.placeholder.com/1920x500?text=Hands+Holding') no-repeat center center/cover;
            display: flex;
            align-items: center;
            justify-content: center;
             text-align: center;
            padding: 0 40px;
            color: #fff;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
        }

        .hero-content {
            max-width: 600px;
        }

        .hero h1 {
            font-size: 48px;
            margin: 0 0 10px;
            font-weight: 600;
            color: #01060cff; /* Changed to blue */
        }

        .hero p {
            font-size: 20px;
            margin: 0;
            color: #010b16ff; /* Changed to blue */
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

        .mission img {
            width: 50%;
            height: auto;
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(0, 123, 255, 0.1);
        }

        .mission-content {
            width: 50%;
            background: linear-gradient(135deg, #ffffff 0%, #e6f0fa 100%);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(0, 123, 255, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .mission-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(to right, #007bff, #0056b3);
            transition: all 0.3s ease;
        }

        .mission-content:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(0, 123, 255, 0.3);
        }

        .mission h2 {
            color: #003366;
            font-size: 34px;
            margin-bottom: 25px;
            text-align: left;
            position: relative;
            z-index: 1;
        }

        .mission p {
            font-size: 16px;
            color: #444;
            margin-bottom: 25px;
            line-height: 1.8;
        }

        .mission ul {
            list-style: none;
            padding: 0;
            margin: 0 0 25px;
        }

        .mission ul li {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            font-size: 15px;
            color: #333;
            background: #fff;
            padding: 15px 20px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 123, 255, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .mission ul li:hover {
            transform: translateX(8px);
            box-shadow: 0 8px 20px rgba(0, 123, 255, 0.2);
            background-color: #f8faff;
        }

        .mission ul li::before {
            content: '✔';
            display: inline-block;
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: #fff;
            border-radius: 50%;
            margin-right: 15px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            box-shadow: 0 2px 8px rgba(0, 123, 255, 0.3);
            transition: transform 0.3s ease;
        }

        .mission ul li:hover::before {
            transform: scale(1.1);
        }

        .mission .learn-more {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: #fff;
            padding: 12px 25px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-block;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0, 123, 255, 0.3);
        }

        .mission .learn-more:hover {
            background: linear-gradient(135deg, #0056b3, #003366);
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0, 123, 255, 0.4);
        }

        /* What We Offer Section */
        .offer {
            padding: 60px 40px;
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
        }

        .offer h2 {
            color: #007bff;
            font-size: 36px;
            margin-bottom: 40px;
        }

        .offer-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
        }

        .offer-item {
            background: linear-gradient(135deg, #ffffff 0%, #f8faff 100%);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 6px 20px rgba(0, 123, 255, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: left;
        }

        .offer-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 123, 255, 0.2);
        }

        .offer-item .icon {
            width: 50px;
            height: 50px;
            background-color: #add8e6;
            border-radius: 10px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: #003366;
        }

        .offer-item h3 {
            color: #007bff;
            font-size: 22px;
            margin: 0 0 10px;
        }

        .offer-item p {
            font-size: 15px;
            color: #555;
            margin: 0;
        }

        /* Reviews Section */
        .reviews {
            background-color: #e6f0fa;
            padding: 60px 40px;
            text-align: center;
        }

        .reviews h2 {
            color: #007bff;
            font-size: 36px;
            margin-bottom: 40px;
        }

        .review-item {
            max-width: 800px;
            margin: 0 auto 30px;
            background: #fff;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 6px 20px rgba(0, 123, 255, 0.1);
        }

        .review-item blockquote {
            font-size: 18px;
            color: #333;
            margin: 0 0 20px;
            font-style: italic;
        }

        .review-item .author {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
        }

        .review-item .author img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        .review-item .author span {
            font-size: 16px;
            font-weight: 600;
            color: #003366;
        }

        /* Best Care Section */
        .best-care {
            display: flex;
            align-items: center;
            padding: 60px 40px;
            max-width: 1200px;
            margin: 0 auto;
            gap: 40px;
        }

        .best-care-content {
            width: 50%;
        }

        .best-care h1 {
            color: #003366;
            font-size: 36px;
            margin-bottom: 20px;
        }

        .best-care .buttons {
            display: flex;
            gap: 20px;
        }

        .best-care a {
            padding: 10px 20px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .best-care .call-now {
            background-color: #003366;
            color: #fff;
        }

        .best-care .call-now:hover {
            background-color: #002244;
        }

        .best-care .financial {
            background-color: #add8e6;
            color: #003366;
        }

        .best-care .financial:hover {
            background-color: #87ceeb;
        }

        .best-care img {
            width: 50%;
            height: auto;
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(0, 123, 255, 0.1);
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

            .hero {
                height: 300px;
                padding: 0 20px;
                text-align: center;
                justify-content: center;
            }

            .hero h1 {
                font-size: 32px;
            }

            .hero p {
                font-size: 16px;
            }

            .mission {
                flex-direction: column;
                padding: 40px 20px;
            }

            .mission img,
            .mission-content {
                width: 100%;
            }

            .mission-content {
                padding: 20px;
            }

            .offer {
                padding: 40px 20px;
            }

            .offer-grid {
                grid-template-columns: 1fr;
            }

            .reviews {
                padding: 40px 20px;
            }

            .best-care {
                flex-direction: column;
                padding: 40px 20px;
            }

            .best-care-content,
            .best-care img {
                width: 100%;
            }

            .best-care .buttons {
                flex-direction: column;
                gap: 10px;
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
    </style>
</head>

    <header>
        <div class="logo">Carely Connect</div>
        <nav>
            <ul>
                <li><a href="home.php" class="active">Home</a></li>
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

<section class="banner">
    <img src="img/h11.jpg" alt="Events Banner - People celebrating with cake">
    <div class="banner-text">
        <h2><p>Where Comfort Meets Familiarity</p></h2
        <h2><p>We've created a friendly, calm space where our valued residents feel important and cared for</p></h2>

    </div>
</section>
           

    <section class="mission">
        <img src="img/h1.jpg" alt="Care image">
        <div class="mission-content">
            <h2>Behind the Mission</h2>
            <p>    Welcome to Carely Connect, where comfort and care come together in a space where feel respected, valued, and genuinely at home.</p>
            <ul>
                <li>Personalized Care: Tailored support for individual needs.</li>
                <li>Qualified Staff: Compassionate and trained caregivers.</li>
                <li>Comfortable Environment: A welcoming home-like atmosphere.</li>
                <li>Senior friendly nurturing and peaceful environment.</li>
            </ul>
            <a href="about.php" class="learn-more">Learn More</a>
        </div>
    </section>

    <section class="offer">
        <h2>What We Offer</h2>
        <div class="offer-grid">
            <div class="offer-item">
                <div class="icon">🏠</div>
                <h3>Residential Support</h3>
                <p>At Carely Connect, we’re here for you 24/7 offering a safe, compassionate home provides personal support, fun activities, healthy meals, and medical care.</p>
            </div>
            <div class="offer-item">
                <div class="icon">🍎</div>
                <h3>Nutrition Plans</h3>
                <p>We serve balanced, fresh meals made just for seniors. Every dish is tasty, healthy, and helps manage conditions like diabetes and high blood pressure helping our residents feel better every day.</p>
            </div>
            <div class="offer-item">
                <div class="icon">👨‍⚕️</div>
                <h3>Expert Care</h3>
                <p>Our nursing team is available 24/7 to provide expert medical care and support. We create personalized plans ensuring comfort, safety, peace of mind.</p>
            </div>
            <div class="offer-item">
                <div class="icon">👥</div>
                <h3>Caring Crews</h3>
                <p>Our residents receive kind, personal care in a comfortable environment. Our staff is committed to providing respectful and personalized care for every resident.</p>
            </div>
            <div class="offer-item">
                <div class="icon">📌</div>
                <h3>Lost & Found Board</h3>
                <p>A simple space where residents, staff, or family members can post about missing items and find them with the help of our easily report lost items and find with the help of our.</p>
            </div>
            <div class="offer-item">
                <div class="icon">📞</div>
                <h3>Call for "Help" Smart Alert</h3>
                <p>Our "Call for Help" system allows residents to notify staff in time, ensuring quick and reliable support. Tap for Help: Care is on the way.</p>
            </div>
        </div>
    </section>

    <section class="reviews">
        <h2>Client Reviews</h2>
        <div class="review-item">
            <blockquote>"My experience with Carely Connect has been outstanding. These crews are not just professional but genuinely caring. They make my father feel valued and respected, offering personalized care that suits his needs. Hands good for the peace of mind knowing he's in."</blockquote>
            <div class="author">
                <img src="img/sifat png.png" alt="Profile">
                <div>
                    <span>Shifatul Shishir 
                        <br> 
                    <small>web Developer</span></small>
                </div>
                <!-- <span> Shifatul Shishir <br> <small> Engineer</span></small> -->
            </div>
        </div>
    </section>

    <section class="best-care">
        <div class="best-care-content">
            <h1>The Best Elderly Care Center For You</h1>
            <div class="buttons">
                <a href="tel:+8801891983888" class="call-now">Call Now</a>
                
                <a href="fin_as.php" class="financial">Financial Assistance</a>
            </div>
        </div>
        <img src="img/care.png" alt="Elderly care image">
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