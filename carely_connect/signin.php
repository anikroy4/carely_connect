<?php
// login.php - Carely Connect Login Page (Landscape Orientation)
// This PHP file serves the login page with embedded HTML, CSS, and JS for animations.
// Designed to match the provided image: left illustration, right form.
// Landscape layout with wide container.
// Buttons/form functional: submits to process_login.php (placeholder).
// Placeholders for logo/icon/illustration; replace src as needed.
// Animations: fade-in, floating illustration, input focus effects.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Carely Connect</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fff;
            color: #333;
            line-height: 1.5;
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

        .login.active {
            background-color: #007bff;
            font-weight: 600;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.3);
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

        /* Login Container */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 80px); /* Adjust for header */
            padding: 20px;
        }

        .login-container {
            display: flex;
            max-width: 1100px;
            width: 100%;
            height: 625px;
            background: #fff;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            overflow: hidden;
            animation: fadeIn 1s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }

        .illustration {
            flex: 1.2;
            background: linear-gradient(135deg, #f0f8ff 0%, #e6f3ff 100%);
            padding: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .illustration::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
        }

        .illustration img {
            max-width: 100%;
            height: auto;
            z-index: 1;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-15px) rotate(1deg); }
        }

        .form-section {
            flex: 1;
            padding: 50px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: #fff;
        }

        .form-section .logo {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 10px;
            font-size: 28px;
            font-weight: 700;
            color: #0066cc;
        }

        .form-section .logo .icon {
            width: 32px;
            height: 32px;
            background: #0066cc;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
        }

        .title {
            font-size: 36px;
            font-weight: 800;
            color: #333;
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        .subtitle {
            color: #999;
            font-size: 16px;
            margin-bottom: 32px;
            font-weight: 400;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            color: #666;
            font-size: 14px;
            font-weight: 500;
        }

        .form-group input {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: #fafafa;
        }

        .form-group input:focus {
            outline: none;
            border-color: #0066cc;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(0, 102, 204, 0.1);
            transform: translateY(-1px);
            animation: inputPulse 0.6s ease;
        }

        @keyframes inputPulse {
            0% { box-shadow: 0 0 0 0 rgba(0, 102, 204, 0.3); }
            50% { box-shadow: 0 0 0 8px rgba(0, 102, 204, 0); }
            100% { box-shadow: 0 0 0 0 rgba(0, 102, 204, 0); }
        }

        .checkbox-group {
            display: flex;
            align-items: flex-start;
            margin-bottom: 16px;
            font-size: 14px;
            color: #666;
            cursor: pointer;
        }

        .checkbox-group input[type="checkbox"] {
            margin-top: 2px;
            margin-right: 10px;
            accent-color: #0066cc;
            transform: scale(1.1);
        }

        .checkbox-group label {
            margin: 0;
            line-height: 1.4;
            cursor: pointer;
        }

        .forgot-password {
            display: block;
            text-align: right;
            color: #0066cc;
            text-decoration: none;
            font-size: 14px;
            margin-bottom: 24px;
            transition: color 0.3s ease;
        }

        .forgot-password:hover {
            color: #004499;
            text-decoration: underline;
        }

        .btn {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #0066cc 0%, #004499 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 102, 204, 0.3);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 102, 204, 0.4);
            background: linear-gradient(135deg, #004499 0%, #003366 100%);
        }

        .btn:active {
            transform: translateY(0);
        }

        .signup-link {
            text-align: center;
            margin-top: 20px;
            color: #0066cc;
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .signup-link:hover {
            color: #004499;
            text-decoration: underline;
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
        
        /* Responsive for smaller screens */
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

            .login-container {
                flex-direction: column;
                height: auto;
                max-width: 100%;
            }

            .illustration {
                flex: none;
                height: 300px;
                padding: 20px;
            }

            .form-section {
                flex: none;
                padding: 30px 20px;
            }

            .title {
                font-size: 28px;
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
            <a href="signin.php" class="login active">Login</a>
            <a href="signup.php" class="signup">Sign Up</a>
            <a href="donations.php" class="donate">Donate</a>
        </div>
    </header>

    <div class="container">
        <div class="login-container">
            <div class="illustration">
                <!-- Placeholder for illustration; replace with actual SVG/PNG URL -->
                <img src="img/log1.png" alt="Care team illustration">
            </div>
            <div class="form-section">
                <div class="logo">
                    <div class="icon">👥</div>
                    <span>Carely</span><span style="color: #0066cc;">Connect</span>
                </div>
                <h1 class="title">Login</h1>
                <p class="subtitle">Login your account in a seconds</p>
                
                <form id="loginForm" action="dashad.php" method="POST">
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="checkbox-group">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Keep me logged in</label>
                    </div>
                    <a href="forgot_password.php" class="forgot-password">Forget password?</a>
                    <button type="submit" class="btn">Log in</button>
                </form>
                
                <a href="signup.php" class="signup-link">Don't have an account? Sign up</a>
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

    <script>
        // Form submission handling (placeholder; enhance with validation/AJAX)
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            // e.preventDefault(); // Uncomment for client-side validation
            // Add real processing here for next updates
            console.log('Form submitted to process_login.php');
        });

        // Staggered animation for form elements on load
        window.addEventListener('load', function() {
            const elements = document.querySelectorAll('.form-group, .btn, .checkbox-group, .forgot-password');
            elements.forEach((el, index) => {
                el.style.opacity = '0';
                el.style.transform = 'translateX(20px)';
                setTimeout(() => {
                    el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                    el.style.opacity = '1';
                    el.style.transform = 'translateX(0)';
                }, index * 150);
            });
        });
    </script>
</body>
</html>