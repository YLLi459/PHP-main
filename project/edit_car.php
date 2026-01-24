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

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: index.php');
    exit;
}

// Fetch car
$stmt = $pdo->prepare("SELECT * FROM cars WHERE id = ?");
$stmt->execute([$id]);
$car = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$car) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $image = trim($_POST['image']);
    $rating = trim($_POST['rating']);
    $price = trim($_POST['price']);
    $engine = trim($_POST['engine']);
    $top_speed = trim($_POST['top_speed']);

    $stmt = $pdo->prepare("UPDATE cars SET name = ?, description = ?, image = ?, rating = ?, price = ?, engine = ?, top_speed = ? WHERE id = ?");
    $stmt->execute([$name, $description, $image, $rating, $price, $engine, $top_speed, $id]);
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Car</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        form { max-width: 400px; margin: auto; }
        input, textarea { width: 100%; padding: 10px; margin: 10px 0; }
        button { padding: 10px; background: #28a745; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Edit Car</h1>
    <form method="POST">
        <input type="text" name="name" value="<?= htmlspecialchars($car['name']) ?>" required>
        <textarea name="description" required><?= htmlspecialchars($car['description']) ?></textarea>
        <input type="text" name="image" value="<?= htmlspecialchars($car['image']) ?>" required>
        <input type="text" name="rating" value="<?= htmlspecialchars($car['rating']) ?>" required>
        <input type="text" name="price" value="<?= htmlspecialchars($car['price']) ?>" required>
        <input type="text" name="engine" value="<?= htmlspecialchars($car['engine']) ?>" required>
        <input type="text" name="top_speed" value="<?= htmlspecialchars($car['top_speed']) ?>" required>
        <button type="submit">Update Car</button>
    </form>
    <a href="index.php">Back to Showcase</a>
</body>
</html>