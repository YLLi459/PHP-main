<?php

header('Content-Type: text/html'); 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_showcase";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
    exit;
}


$sql = "SELECT * FROM cars";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
        echo '<div class="car-card" data-name="' . htmlspecialchars($row["name"]) . '">';
        echo '<img src="' . htmlspecialchars($row["image"]) . '" alt="' . htmlspecialchars($row["name"]) . '">';
        echo '<h3>' . htmlspecialchars($row["name"]) . '</h3>';
        echo '<p>' . htmlspecialchars($row["description"]) . '</p>';
        echo '<div class="rating">Rating: ' . htmlspecialchars($row["rating"]) . '</div>';
        echo '<div class="specs" style="display:none;">';
        echo '<ul>';
        echo '<li>Price: ' . htmlspecialchars($row["price"]) . '</li>';
        echo '<li>Engine: ' . htmlspecialchars($row["engine"]) . '</li>';
        echo '<li>Top Speed: ' . htmlspecialchars($row["top_speed"]) . '</li>';
        echo '</ul>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "No cars found.";
}

$conn->close();
?>