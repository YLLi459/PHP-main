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

// Fetch all cars
$stmt = $pdo->query("SELECT * FROM cars");
$cars = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced Car Showcase</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Enhanced Car Showcase</h1>
        <p>Explore amazing cars with details, search, and more! Add your own images below.</p>
        <p>Welcome, you are logged in! <a href="logout.php">Logout</a> | <a href="add_car.php">Add New Car</a></p>
    </header>
    <div class="container">
        <div id="car-grid" class="car-grid">
            <?php foreach ($cars as $car): ?>
                <div class="car-card" data-name="<?= htmlspecialchars($car['name']) ?>">
                    <img src="<?= htmlspecialchars($car['image']) ?>" alt="<?= htmlspecialchars($car['name']) ?>">
                    <h3><?= htmlspecialchars($car['name']) ?></h3>
                    <p><?= htmlspecialchars($car['description']) ?></p>
                    <div class="rating">Rating: <?= htmlspecialchars($car['rating']) ?></div>
                    <div class="specs" style="display:none;">
                        <ul>
                            <li>Price: <?= htmlspecialchars($car['price']) ?></li>
                            <li>Engine: <?= htmlspecialchars($car['engine']) ?></li>
                            <li>Top Speed: <?= htmlspecialchars($car['top_speed']) ?></li>
                        </ul>
                    </div>
                    <div class="actions">
                        <a href="edit_car.php?id=<?= $car['id'] ?>" class="edit-btn">Edit</a>
                        <a href="delete_car.php?id=<?= $car['id'] ?>" class="delete-btn" onclick="return confirm('Are you sure?')">Delete</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <div id="modal" class="modal">
            <div class="modal-content">
                <span id="close-modal" class="close">&times;</span>
                <img id="modal-image" src="" alt="Car Image">
                <h2 id="modal-name"></h2>
                <p id="modal-description"></p>
                <ul id="modal-specs"></ul>
                <div class="rating">
                    <span>Rating: </span>
                    <span id="modal-rating"></span>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <p>&copy; 2026 Car Showcase. Built with HTML, CSS, JS and PHP.</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>