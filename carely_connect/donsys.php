<?php
// donsys.php - This file renders the Donation System page for Carely Connect website
session_start();

// Handle form submission for donation methods
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['donate_now'])) {
        $method = $_POST['payment_method'] ?? '';
        $card_number = $_POST['card_number'] ?? '';
        if ($method == 'credit_card' && !empty($card_number)) {
            $_SESSION['message'] = "Donation processed successfully with $method ending in $card_number!";
        } elseif ($method == 'mobile_banking') {
            $_SESSION['message'] = "Donation processed successfully via $method!";
        }
    } elseif (isset($_POST['add_card'])) {
        $_SESSION['message'] = "New card added successfully! (Placeholder functionality)";
    } elseif (isset($_POST['add_method'])) {
        $_SESSION['message'] = "New payment method added successfully! (Placeholder functionality)";
    }
    header("Location: donsys.php");
    exit();
}
$message = $_SESSION['message'] ?? '';
unset($_SESSION['message']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation System - Carely Connect</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            color: #333;
            line-height: 1.6;
            background-color: #f4f7fa;
        }

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
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .donation-form {
            max-width: 600px;
            margin: 40px auto;
            padding: 30px;
            border-radius: 15px;
            background: linear-gradient(135deg, #ffffff 0%, #e6f0fa 100%);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
        }

        .donation-form h2 {
            color: #007bff;
            text-align: center;
            margin-bottom: 30px;
            font-size: 28px;
            font-weight: bold;
        }

        .method-option, .card-option {
            display: flex;
            align-items: center;
            padding: 15px;
            margin: 15px 0;
            background-color: #fff;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 1px solid #e0e7ff;
        }

        .method-option:hover, .card-option:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            background-color: #f8fafc;
        }

        .method-option input[type="radio"], .card-option input[type="radio"] {
            margin: 0 15px 0 10px;
            cursor: pointer;
            accent-color: #007bff;
        }

        .method-option img, .card-option img {
            width: 40px;
            height: 25px;
            margin-right: 15px;
            border-radius: 4px;
        }

        .method-option label, .card-option label {
            flex-grow: 1;
            cursor: pointer;
            font-size: 16px;
            color: #333;
        }

        .add-button {
            display: block;
            width: 100%;
            padding: 12px;
            margin: 15px 0;
            background-color: #e9ecef;
            border: none;
            border-radius: 12px;
            text-align: center;
            cursor: pointer;
            font-weight: bold;
            font-size: 16px;
            color: #333;
            transition: all 0.3s ease;
        }

        .add-button:hover {
            background-color: #ced4da;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .add-button:active {
            transform: translateY(0);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        button[name="donate_now"] {
            width: 100%;
            max-width: 150px;
            padding: 15px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 102px;
            font-weight: bold;
            font-size: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        button[name="donate_now"]:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        button[name="donate_now"]:active {
            transform: translateY(0);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .message {
            text-align: center;
            color: #28a745;
            margin: 15px 0;
            font-size: 16px;
            font-weight: bold;
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
            <a href="donsys.php" class="donate active">Donate</a>
        </div>
    </header>


    <section class="donation-form">
        <h2>Donation Methods</h2>
        <?php if ($message): ?>
            <div class="message"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div>
                <div class="method-option">
                    <input type="radio" name="payment_method" value="mobile_banking" id="bKash" required>
                    <img src="https://via.placeholder.com/40x25?text=bKash" alt="bKash">
                    <label for="bKash">bKash</label>
                </div>
                <div class="method-option">
                    <input type="radio" name="payment_method" value="mobile_banking" id="Nagad" required>
                    <img src="https://via.placeholder.com/40x25?text=Nagad" alt="Nagad">
                    <label for="Nagad">Nagad</label>
                </div>
            </div>
            <div>
                <div class="card-option">
                    <input type="radio" name="payment_method" value="credit_card" id="Jamuna" required>
                    <img src="https://via.placeholder.com/40x25?text=Visa" alt="Visa">
                    <label for="Jamuna">Jamuna Bank xxxx1234</label>
                </div>
                <div class="card-option">
                    <input type="radio" name="payment_method" value="credit_card" id="City" required>
                    <img src="https://via.placeholder.com/40x25?text=MasterCard" alt="MasterCard">
                    <label for="City">City Bank xxxx5678</label>
                </div>
            </div>
            <button type="submit" name="add_card" class="add-button">+ Add New Card</button>
            <button type="submit" name="add_method" class="add-button">+ Add New Method</button>
            <button type="submit" name="donate_now">Donate Now</button>
        </form>
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
            <a href="tel:+880189198388" class="contact-item">+880 189198388</a>
            <a href="mailto:Team@CarelyConnect.Com" class="contact-item">Team@CarelyConnect.Com</a>
        </div>
        <div class="copyright">2025 Web Programming Software Solutions. All Rights Reserved.</div>
    </footer>
</body>
</html>