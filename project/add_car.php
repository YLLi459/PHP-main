<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.html');
    exit;
}

// Database connection
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
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $image = trim($_POST['image']);
    $rating = trim($_POST['rating']);
    $price = trim($_POST['price']);
    $engine = trim($_POST['engine']);
    $top_speed = trim($_POST['top_speed']);

    $stmt = $pdo->prepare("INSERT INTO cars (name, description, image, rating, price, engine, top_speed) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$name, $description, $image, $rating, $price, $engine, $top_speed]);
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Car</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        form { max-width: 400px; margin: auto; }
        input, textarea { width: 100%; padding: 10px; margin: 10px 0; }
        button { padding: 10px; background: #007bff; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Add New Car</h1>
    <form method="POST">
        <input type="text" name="name" placeholder="Car Name" required>
        <textarea name="description" placeholder="Description" required></textarea>
        <input type="text" name="image" placeholder="Image Path (e.g., car.jpg)" required>
        <input type="text" name="rating" placeholder="Rating (e.g., ★★★★★)" required>
        <input type="text" name="price" placeholder="Price" required>
        <input type="text" name="engine" placeholder="Engine" required>
        <input type="text" name="top_speed" placeholder="Top Speed" required>
        <button type="submit">Add Car</button>
    </form>
    <a href="index.php">Back to Showcase</a>
</body>
</html>