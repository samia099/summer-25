<link rel="stylesheet" href="../assets/style.css">

<?php
session_start();
include '../includes/config.php';

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $desc = $_POST['description'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $created_by = $_SESSION['admin'];

    $query = "INSERT INTO products (name, description, price, category_id, created_by) 
              VALUES ('$name', '$desc', '$price', '$category_id', '$created_by')";
    if (mysqli_query($con, $query)) {
        echo "Product added successfully. <a href='dashboard.php'>Go back</a>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>

<form method="POST">
    <input type="text" name="name" placeholder="Product Name" required><br>
    <textarea name="description" placeholder="Description" required></textarea><br>
    <input type="number" step="0.01" name="price" placeholder="Price" required><br>
    <select name="category_id" required>
        <option value="1">Computer Parts</option>
        <option value="2">Miscellaneous</option>
    </select><br>
    <button type="submit">Add Product</button>
</form>
