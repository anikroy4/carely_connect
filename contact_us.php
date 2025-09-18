<?php
// contact_us.php - This file renders the Contact Us page for Carely Connect website
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Carely_Connect</title>
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

        /* Form Section */
        .form-section {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
        }

        .form-container {
            background-color: #fff;
            padding: 30px;
            border: 1px solid #90ee90;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 0 auto;
        }

        .form-container h2 {
            color: #007bff;
            margin-bottom: 20px;
        }

        .form-container input,
        .form-container textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-container textarea {
            height: 100px;
            resize: none;
        }

        .form-container button {
            background-color: #003366;
            color: #fff;
            border: none;
            padding: 12px 30px;
            border-radius: 20px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
            transition: transform 0.2s ease, box-shadow 0.2s ease, background-color 0.2s ease;
        }

        .form-container button:hover {
            transform: scale(1.05);
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2);
            background-color: #002244;
        }

        .form-container button:active {
            transform: scale(0.95);
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3);
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
    <script>
        // JavaScript for form submission popup
        document.querySelector('form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission for now
            if (this.checkValidity()) {
                alert('Message sent'); // Popup message
                this.reset(); // Clear form fields
            } else {
                event.stopPropagation(); // Ensure validation message appears
            }
            this.classList.add('was-validated'); // Trigger Bootstrap validation styles (if used)
        });
    </script>
</head>
<body>
    <header>
        <div class="logo">Carely Connect</div>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Services ▼</a></li>
                <li><a href="events.php">Events</a></li>
                <li><a href="#" class="active">Contact Us</a></li>
            </ul>
        </nav>
        <div class="header-buttons">
            <a href="signin.php" class="login">Login</a>
            <a href="signup.php" class="signup">Sign Up</a>
            <a href="#" class="donate">Donate</a>
        </div>
    </header>

    <section class="banner">
        <img src="/imag/cnus.jpg" alt="Contact Us Banner - Connect with us">
        <h1>Contact Us</h1>
    </section>

    <section class="form-section">
        <div class="form-container">
            <h2>Contact Us</h2>
            <form action="#" method="post" novalidate>
                <input type="text" placeholder="First name" required>
                <input type="text" placeholder="Last name" required>
                <input type="email" placeholder="Email address" required>
                <input type="tel" placeholder="Phone" required>
                <textarea placeholder="Enter Your Message&#10;Submit Your Opinion about us and you can also provide us suggestions to improve our quality of service" required></textarea>
                <button type="submit">Send Message</button>
            </form>
        </div>
    </section>

    <footer>
        <div class="footer-left">
            <h3>Carely Connect</h3>
            <p>Offers a supportive and welcoming environment for seniors, with personalized care, kind-hearted staff, engaging activities, and healthy meals. We're committed to making every resident feel comfortable, respected, and truly valued.</p>
            <div class="social-icons">
                <img src="path/to/facebook-icon.png" alt="Facebook">
                <img src="path/to/twitter-icon.png" alt="Twitter">
                <img src="path/to/instagram-icon.png" alt="Instagram">
            </div>
        </div>
        <div class="footer-right">
            <h3>Contact Us</h3>
            <a href="tel:+8801891983888" class="contact-item">+880 1891983888</a>
            <a href="mailto:Team@Carelyconnect.Com" class="contact-item">Team@Carelyconnect.Com</a>
        </div>
        <div class="copyright">2025 Web Programming Software Solutions. All Rights Reserved.</div>
    </footer>
</body>
</html>