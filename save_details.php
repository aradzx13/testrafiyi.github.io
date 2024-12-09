<?php
$servername = "localhost";
$username = "root";
$password = ""; // رمز عبور دیتابیس
$dbname = "my_database"; // نام دیتابیس خود را اینجا وارد کنید

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone = $_POST['phone'];
    $time = $_POST['time'];

    $sql = "INSERT INTO details (first_name, last_name, phone, time) VALUES ('$first_name', '$last_name', '$phone', '$time')";
    if ($conn->query($sql) === TRUE) {
        echo "جزئیات با موفقیت ذخیره شد.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
