<?php
// process_signup.php - Handles user signup processing for Carely Connect
// Validates input, checks for existing email, hashes password, and inserts into database.
// Redirects with success/error messages via session.
// Assumes MySQL database: 'carely_connect' with 'users' table.
// Table structure: id (INT AUTO_INCREMENT PRIMARY KEY), first_name (VARCHAR(50)), last_name (VARCHAR(50)), email (VARCHAR(100) UNIQUE), password (VARCHAR(255)), created_at (TIMESTAMP DEFAULT CURRENT_TIMESTAMP)
// Update DB credentials as needed.

session_start();

// Database connection (replace with your config)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carely_connect";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $_SESSION['error'] = "Database connection failed: " . $e->getMessage();
    header("Location: signup.php");
    exit();
}

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['error'] = "Invalid request method.";
    header("Location: signup.php");
    exit();
}

// Sanitize and validate input
$firstName = trim($_POST['firstName'] ?? '');
$lastName = trim($_POST['lastName'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$terms = isset($_POST['terms']) ? true : false;

// Validation
$errors = [];
if (empty($firstName) || strlen($firstName) < 2) {
    $errors[] = "First name is required and must be at least 2 characters.";
}
if (empty($lastName) || strlen($lastName) < 2) {
    $errors[] = "Last name is required and must be at least 2 characters.";
}
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Valid email is required.";
}
if (empty($password) || strlen($password) < 8) {
    $errors[] = "Password must be at least 8 characters.";
}
if (!$terms) {
    $errors[] = "You must agree to the terms and privacy policy.";
}

if (!empty($errors)) {
    $_SESSION['error'] = implode(' ', $errors);
    header("Location: signup.php");
    exit();
}

// Check if email already exists
try {
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->rowCount() > 0) {
        $_SESSION['error'] = "Email already exists. Please use a different email or login.";
        header("Location: signup.php");
        exit();
    }
} catch (PDOException $e) {
    $_SESSION['error'] = "Database query failed: " . $e->getMessage();
    header("Location: signup.php");
    exit();
}

// Hash password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insert new user
try {
    $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
    $stmt->execute([$firstName, $lastName, $email, $hashedPassword]);
    
    // Set session for logged-in user (optional: require email verification for full login)
    $_SESSION['user_id'] = $pdo->lastInsertId();
    $_SESSION['user_email'] = $email;
    $_SESSION['success'] = "Account created successfully! Welcome to Carely Connect.";
    
    header("Location: home.php"); // Redirect to home or a dashboard
    exit();
} catch (PDOException $e) {
    $_SESSION['error'] = "Signup failed: " . $e->getMessage();
    header("Location: signup.php");
    exit();
}
?>