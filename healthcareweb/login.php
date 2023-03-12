<?php
session_start();

if (isset($_POST['Login'])) {

    include('connect.php');

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM  user WHERE BINARY username = '$username' AND BINARY password = '$password'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_array($result);
        $_SESSION['role'] = $row['role'];

        if ($_SESSION['role'] == 'admin') {
            header("Location: admin_page.php");
        }
    } else {
        echo "<script>" . "alert(\" Username หรือ Password ไม่ถูกต้อง\");" . "window.location.href='admin.php'" . "</script>";
    }
} else {
    header("Location: index.php");
}
