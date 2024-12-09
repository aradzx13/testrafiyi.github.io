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
    $username = $_POST['username'];
    $password = $_POST['password'];
    $action = $_POST['action'];

    if ($action === 'signup') {
        // کد ثبت‌نام
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
        if ($conn->query($sql) === TRUE) {
            header("Location: welcome.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif ($action === 'login') {
        // کد ورود
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                header("Location: details.php");
            } else {
                echo "نام کاربری یا گذرواژه نادرست است.";
            }
        } else {
            echo "نام کاربری یا گذرواژه نادرست است.";
        }
    }
}

$conn->close();
?>
