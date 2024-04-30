<?php
if(isset($_POST['login'])){
    session_start();
    include('conn.php');

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM user WHERE user_email='$email' && user_password='$password'");

    if (mysqli_num_rows($query) == 0){
        $_SESSION['message'] = "Login Failed. User not Found!";
        header('Location: index.php');
    } else {
        $row = mysqli_fetch_array($query);

        if (isset($_POST['remember'])){
            // Set up cookie
            setcookie("user", $row['user_email'], time() + (86400 * 30)); 
            setcookie("pass", $row['user_password'], time() + (86400 * 30)); 
        }

        $_SESSION['id'] = $row['user_id'];
        header('Location: dashboard.php');
    }
} else {
    header('Location: index.php');
    $_SESSION['message'] = "Please Login!";
}
?>
