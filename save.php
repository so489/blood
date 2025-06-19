<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "blood_collection";

$con = mysqli_connect($server, $username, $password, $dbname);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = $_POST['name'] ?? '';
$Email = $_POST['email'] ?? '';
$Phone = $_POST['phone'] ?? '';
$BloodGroup = $_POST['bloodgroup'] ?? '';
$City = $_POST['city'] ?? '';
$lastdonationdate = $_POST['lastdonationdate'] ?? '';

if ($name && $Email && $Phone && $BloodGroup && $City && $lastdonationdate) {
    $sql = "INSERT INTO `test`(`Name`, `Email i'd`, `Phone`, `Blood Group`, `City`, `Last Donation Date`)
            VALUES ('$name', '$Email', '$Phone', '$BloodGroup', '$City', '$lastdonationdate')";
    
    $result = mysqli_query($con, $sql);

    if ($result) {
        // ✅ Redirect to thank you page
        header("Location: thankyou.html");
        exit();
    } else {
        echo "❌ Query failed: " . mysqli_error($con);
    }
} else {
    echo "❗ All fields are required!";
}

mysqli_close($con);
?>
