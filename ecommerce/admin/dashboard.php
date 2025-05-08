<link rel="stylesheet" href="../assets/style.css">




<?php
session_start();
include '../includes/config.php';

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$query = "SELECT products.*, categories.name as category FROM products 
          JOIN categories ON products.category_id = categories.id";
$result = mysqli_query($con, $query);
?>

<h2>Admin Dashboard</h2>
<a href="add-product.php">Add New Product</a> | <a href="logout.php">Logout</a>
<table border="1">
    <tr>
        <th>ID</th><th>Name</th><th>Price</th><th>Category</th><th>Actions</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['name'] ?></td>
        <td>$<?= $row['price'] ?></td>
        <td><?= $row['category'] ?></td>
        <td>
            <a href="update-product.php?id=<?= $row['id'] ?>">Edit</a> | 
            <a href="delete-product.php?id=<?= $row['id'] ?>">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>
