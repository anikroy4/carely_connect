<?php
// msg.php - This file renders the Messages page for Carely Connect website
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages - Carely Connect</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
            text-decoration: none;
        }

        .logo:hover {
            color: #0056b3;
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

        .header-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-profile {
            font-size: 24px;
            color: #003366;
            cursor: pointer;
        }

        .logout-btn {
            background-color: #dc3545;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .logout-btn:hover {
            background-color: #c82333;
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

        .message-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .message-box {
            background: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: left;
            transition: transform 0.3s ease;
        }

        .message-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .message-box h3 {
            color: #007bff;
            margin: 0 0 10px;
        }

        .message-box p {
            margin: 5px 0;
            color: #666;
        }

        .message-box .buttons {
            margin-top: 10px;
        }

        .message-box button {
            padding: 8px 15px;
            margin-right: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .message-box .delete-btn {
            background-color: #dc3545;
            color: white;
        }

        .message-box .delete-btn:hover {
            background-color: #c82333;
        }

        .message-box .contact-btn {
            background-color: #007bff;
            color: white;
        }

        .message-box .contact-btn:hover {
            background-color: #0056b3;
        }

        /* Footer */
        footer {
            background-color: #e9f7ef;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;
            margin-top: 40px;
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

            .header-right {
                margin-top: 10px;
            }

            .message-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-btn');
            const contactButtons = document.querySelectorAll('.contact-btn');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    if (confirm('Are you sure you want to delete this message?')) {
                        this.closest('.message-box').remove();
                    }
                });
            });

            contactButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const email = this.getAttribute('data-email');
                    window.location.href = `mailto:${email}`;
                });
            });
        });
    </script>
</head>
<body>
    <header>
        <a href="home.php" class="logo">Carely Connect</a>
        <nav>
            <ul>
                <li><a href="dashad.php">Home</a></li>
                <li><a href="memadd.php">Members</a></li>
                <li><a href="addstaf.php">Staffs</a></li>
                <li><a href="add_event.php">Events</a></li>
                <li><a href="msg.php" class="active">Messages</a></li>
                <li><a href="budget.php">Budget</a></li>
            </ul>
        </nav>
        <div class="header-right">
            <div class="user-profile">&#128100;</div>
            <a href="signin.php" class="logout-btn">Logout</a>
        </div>
    </header>

    <div class="main-content">
        <h1>Messages</h1>
        <div class="message-container">
            <div class="message-box">
                <h3>User Id:101</h3>
                <p>Name: samira</p>
                <p>E-mail:xyz@.com</p>
                <p>Could you please provide me with detailed information about these services?</p>
                <div class="buttons">
                    <button class="delete-btn">Delete message</button>
                    <button class="contact-btn" data-email="xyz@.com">Contact via Email</button>
                </div>
            </div>
            <div class="message-box">
                <h3>User Id:201</h3>
                <p>Name: Harry</p>
                <p>E-mail:harry@.com</p>
                <p>Could you please provide me with detailed information about care and support services?</p>
                <div class="buttons">
                    <button class="delete-btn">Delete message</button>
                    <button class="contact-btn" data-email="harry@.com">Contact via Email</button>
                </div>
            </div>
            <div class="message-box">
                <h3>User Id:400</h3>
                <p>Name: Ron</p>
                <p>E-mail:xyz@.com</p>
                <p>Could you please provide detailed information on the medical care and support?</p>
                <div class="buttons">
                    <button class="delete-btn">Delete message</button>
                    <button class="contact-btn" data-email="xyz@.com">Contact via Email</button>
                </div>
            </div>
            <div class="message-box">
                <h3>User Id:700</h3>
                <p>Name: John</p>
                <p>E-mail:xyz@.com</p>
                <p>Could you please provide detailed information on the medical care and support?</p>
                <div class="buttons">
                    <button class="delete-btn">Delete message</button>
                    <button class="contact-btn" data-email="xyz@.com">Contact via Email</button>
                </div>
            </div>
            <div class="message-box">
                <h3>User Id:500</h3>
                <p>Name: Hermione</p>
                <p>E-mail:xyz@.com</p>
                <p>Could you please provide me with detailed information about these services?</p>
                <div class="buttons">
                    <button class="delete-btn">Delete message</button>
                    <button class="contact-btn" data-email="xyz@.com">Contact via Email</button>
                </div>
            </div>
            <div class="message-box">
                <h3>User Id:201</h3>
                <p>Name: Harry</p>
                <p>E-mail:harry@.com</p>
                <p>Could you please provide me with detailed information about care and support services?</p>
                <div class="buttons">
                    <button class="delete-btn">Delete message</button>
                    <button class="contact-btn" data-email="harry@.com">Contact via Email</button>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="footer-left">
            <h3>Carely Connect</h3>
            <p>Supportive and welcoming environment for seniors. We provide personalized care, kind staff, engaging activities, healthy meals, making every resident feel respected and valued.</p>
            <div class="social-icons">
                <img src="https://via.placeholder.com/20x20?text=Twitter" alt="Twitter">
                <img src="https://via.placeholder.com/20x20?text=Instagram" alt="Instagram">
                <img src="https://via.placeholder.com/20x20?text=Facebook" alt="Facebook">
            </div>
        </div>
        <div class="footer-right">
            <h3>Contact Us</h3>
            <div class="contact-items">
                <a href="tel:+8801891983888" class="contact-item">+880 1891983888</a>
                <a href="mailto:Team@CarelyConnect.Com" class="contact-item">team@carelyConnect.Com</a>
            </div>
        </div>
        <div class="copyright">2025 Web Programming Software Solutions. All Rights Reserved.</div>
    </footer>
</body>
</html>