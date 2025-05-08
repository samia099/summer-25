<link rel="stylesheet" href="../assets/style.css">
<?php
include '../includes/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$password', 'admin')";
    if (mysqli_query($con, $query)) {
        echo "Admin registered successfully. <a href='login.php'>Login here</a>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Register</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<h2>Admin Registration</h2>
<form method="POST">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Register</button>
</form>

<p>Already have an account? <a href="login.php">Login here</a>.</p>

</body>
</html>

