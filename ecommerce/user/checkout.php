<link rel="stylesheet" href="../assets/style.css">

<?php
session_start();
include '../includes/config.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user'];
$result = mysqli_query($con, "SELECT products.price FROM cart JOIN products ON cart.product_id = products.id WHERE cart.user_id = $user_id");

$total = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $total += $row['price'];
}

mysqli_query($con, "INSERT INTO orders (user_id, total_amount) VALUES ($user_id, $total)");
mysqli_query($con, "DELETE FROM cart WHERE user_id = $user_id");

echo "Order placed successfully. Total: $" . $total;
?>
<a href="browse.php">Continue Shopping</a>
