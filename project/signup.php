<?php

$host = 'localhost';
$dbname = 'login_db';
$username = 'root';
$password = ''; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = trim($_POST['username']);
    $pass = $_POST['password'];
    $confirmPass = $_POST['confirm_password'];

    if (strlen($user) < 3 || strlen($pass) < 6) {
        echo "<script>alert('Username must be at least 3 chars, password at least 6.'); window.location='signup.html';</script>";
        exit;
    }
    if ($pass !== $confirmPass) {
        echo "<script>alert('Passwords do not match.'); window.location='signup.html';</script>";
        exit;
    }


    $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->execute([$user]);
    if ($stmt->fetch()) {
        echo "<script>alert('Username already exists.'); window.location='signup.html';</script>";
        exit;
    }

   
    $hashedPass = password_hash($pass, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    if ($stmt->execute([$user, $hashedPass])) {
   
        header('Location: index.php');
        exit;
    } else {
        echo "<script>alert('Error creating account.'); window.location='signup.html';</script>";
    }
}
?>