<?php
// financial_assistance.php - This file renders the Financial Assistance page for Carely Connect website
session_start();

// MySQL Database Connection
$servername = "localhost";
$username = "root";  // Replace with your DB username
$password = "";      // Replace with your DB password
$dbname = "carely_connect";  // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
$successMessage = '';
$errorMessage = '';
$showSuccessPopup = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $age = intval($_POST['age'] ?? 0);
    $gender = $_POST['gender'] ?? '';
    $qualification = $_POST['qualification'] ?? '';
    $contact = $_POST['contact'] ?? '';
    $yearlySalary = floatval($_POST['yearly_salary'] ?? 0);
    $presentAddress = $_POST['present_address'] ?? '';
    $permanentAddress = $_POST['permanent_address'] ?? '';
    $opinion = $_POST['opinion'] ?? '';

    // Basic validation
    if (!empty($name) && $age > 0 && !empty($gender) && !empty($qualification) && !empty($contact) && $yearlySalary >= 0 && !empty($presentAddress) && !empty($permanentAddress) && !empty($opinion)) {
        // Use prepared statement for security
        $stmt = $conn->prepare("INSERT INTO financial_assistance (name, age, gender, qualification, contact, yearly_salary, present_address, permanent_address, opinion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sisssdsss", $name, $age, $gender, $qualification, $contact, $yearlySalary, $presentAddress, $permanentAddress, $opinion);
        
        if ($stmt->execute()) {
            $successMessage = "You applied successfully, we will connect you shortly!";
            $showSuccessPopup = true;
            // Clear form data after success
            $_POST = array();
        } else {
            $errorMessage = "Error submitting your application. Please try again.";
        }
        $stmt->close();
    } else {
        $errorMessage = "Please fill in all fields correctly.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Assistance - Carely Connect</title>
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
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        /* Form Section */
        .form-section {
            padding: 40px 20px;
            max-width: 600px;
            margin: 0 auto;
            text-align: center;
        }

        .form-section h2 {
            font-size: 28px;
            font-weight: 600;
            color: #333;
            margin-bottom: 30px;
        }

        .form-container {
            border: 2px dashed #a020f0;
            border-radius: 15px;
            padding: 30px;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(230, 240, 250, 0.9));
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(5px);
            animation: scaleUp 0.5s ease-out;
            transition: transform 0.3s ease;
        }

        @keyframes scaleUp {
            from { transform: scale(0.95); }
            to { transform: scale(1); }
        }

        .form-container:hover {
            transform: scale(1.02);
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid rgba(173, 216, 230, 0.5);
            border-radius: 8px;
            font-size: 16px;
            background: rgba(255, 255, 255, 0.7);
            transition: all 0.3s ease;
            box-sizing: border-box;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #007bff;
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.2);
            transform: translateY(-2px);
        }

        .form-group input:hover,
        .form-group textarea:hover {
            border-color: #a020f0;
        }

        .form-group .gender-box {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.8), rgba(160, 32, 240, 0.1));
            border: 1px solid #a020f0;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 4px 12px rgba(160, 32, 240, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .form-group .gender-box:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(160, 32, 240, 0.2);
        }

        .form-group .radio-group {
            display: flex;
            gap: 25px;
            justify-content: center;
            align-items: center;
        }

        .form-group .radio-group label {
            display: flex;
            align-items: center;
            color: #a020f0;
            font-weight: 500;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .form-group .radio-group label:hover {
            color: #007bff;
        }

        .form-group .radio-group input[type="radio"] {
            display: none;
        }

        .form-group .radio-group .radio-custom {
            width: 18px;
            height: 18px;
            border: 2px solid #a020f0;
            border-radius: 50%;
            margin-right: 8px;
            position: relative;
            transition: border-color 0.3s ease, background-color 0.3s ease;
        }

        .form-group .radio-group input[type="radio"]:checked + .radio-custom {
            border-color: #007bff;
            background-color: #007bff;
        }

        .form-group .radio-group input[type="radio"]:checked + .radio-custom::after {
            content: '';
            width: 10px;
            height: 10px;
            background: #fff;
            border-radius: 50%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .form-group textarea {
            height: 100px;
            resize: vertical;
        }

        .submit-btn {
            width: 200px;
            padding: 12px;
            background: linear-gradient(135deg, #007bff 0%, #a020f0 100%);
            color: #fff;
            border: none;
            border-radius: 30px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            margin: 20px auto 0;
            display: block;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0, 123, 255, 0.3);
        }

        .submit-btn:active {
            transform: translateY(0);
            box-shadow: 0 2px 6px rgba(0, 123, 255, 0.2);
        }

        /* Success Popup Styles (animated) */
        .success-popup {
            display: none;
            position: fixed;
            z-index: 2500;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background-color: #d4edda;
            color: #155724;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #c3e6cb;
            text-align: center;
            animation: bounceIn 0.5s ease;
            max-width: 400px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        @keyframes bounceIn {
            0% { 
                transform: translate(-50%, -50%) scale(0.3); 
                opacity: 0; 
            }
            50% { 
                transform: translate(-50%, -50%) scale(1.05); 
            }
            70% { 
                transform: translate(-50%, -50%) scale(0.9); 
            }
            100% { 
                transform: translate(-50%, -50%) scale(1); 
                opacity: 1; 
            }
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

            .form-section {
                padding: 20px;
            }

            .form-container {
                padding: 20px;
            }

            .form-group .radio-group {
                flex-direction: column;
                gap: 15px;
            }

            .success-popup {
                max-width: 90%;
                padding: 15px;
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
            <a href="donations.php" class="donate">Donate</a>
        </div>
    </header>

   

    <section class="form-section">
        <h2>Add as a Financial Assistance</h2>
        <div class="form-container">
            <form id="financial-assistance-form" action="" method="post">
                <div class="form-group">
                    <input type="text" name="name" placeholder="Enter Name" value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>" required>
                </div>
                <div class="form-group">
                    <input type="number" name="age" placeholder="Enter Age" value="<?php echo htmlspecialchars($_POST['age'] ?? ''); ?>" required>
                </div>
                <div class="form-group">
                    <div class="gender-box">
                        <div class="radio-group">
                            <label>
                                <input type="radio" name="gender" value="male" <?php echo (($_POST['gender'] ?? 'male') === 'male' ? 'checked' : ''); ?> required>
                                <span class="radio-custom"></span>
                                Male
                            </label>
                            <label>
                                <input type="radio" name="gender" value="female" <?php echo (($_POST['gender'] ?? '') === 'female' ? 'checked' : ''); ?>>
                                <span class="radio-custom"></span>
                                Female
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" name="qualification" placeholder="Enter Qualification" value="<?php echo htmlspecialchars($_POST['qualification'] ?? ''); ?>" required>
                </div>
                <div class="form-group">
                    <input type="tel" name="contact" placeholder="Enter Contact" value="<?php echo htmlspecialchars($_POST['contact'] ?? ''); ?>" required>
                </div>
                <div class="form-group">
                    <input type="number" name="yearly_salary" placeholder="Enter Yearly Salary" value="<?php echo htmlspecialchars($_POST['yearly_salary'] ?? ''); ?>" step="0.01" required>
                </div>
                <div class="form-group">
                    <input type="text" name="present_address" placeholder="Enter Present Address" value="<?php echo htmlspecialchars($_POST['present_address'] ?? ''); ?>" required>
                </div>
                <div class="form-group">
                    <input type="text" name="permanent_address" placeholder="Enter Permanent Address" value="<?php echo htmlspecialchars($_POST['permanent_address'] ?? ''); ?>" required>
                </div>
                <div class="form-group">
                    <textarea name="opinion" placeholder="Enter Opinion" required><?php echo htmlspecialchars($_POST['opinion'] ?? ''); ?></textarea>
                </div>
                <button type="submit" class="submit-btn">Apply Now</button>
            </form>
        </div>
    </section>

    <!-- Success Popup -->
    <div id="successPopup" class="success-popup">
        <p id="successText"><?php echo htmlspecialchars($successMessage); ?></p>
    </div>

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

    <script>
        // Client-side validation enhancement (optional, complements HTML5 required)
        document.getElementById('financial-assistance-form').addEventListener('submit', function(event) {
            if (!this.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
                alert('Please fill in all fields correctly.');
            }
            this.classList.add('was-validated');
        });

        // Show animated success popup if submission was successful
        <?php if ($showSuccessPopup): ?>
        setTimeout(() => {
            const popup = document.getElementById('successPopup');
            popup.style.display = 'block';
            setTimeout(() => {
                popup.style.display = 'none';
            }, 4000); // Auto-hide after 4 seconds
        }, 500); // Delay for smooth appearance
        <?php endif; ?>

        // Handle errors with simple alert
        <?php if (!empty($errorMessage)): ?>
            alert('<?php echo $errorMessage; ?>');
        <?php endif; ?>
    </script>

<?php
// Close connection
$conn->close();
?>
</body>
</html>