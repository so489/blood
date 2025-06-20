<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "hospital_db";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    if (password_verify($password, $row['password'])) {
        // Optionally: session_start(); $_SESSION['user'] = $row['fullname'];
        header("Location: index.html"); // 👈 Redirect to home page
        exit();
    } else {
        echo "Invalid password.";
    }
} else {
    echo "No account found with that email.";
}

mysqli_close($conn);
?>
