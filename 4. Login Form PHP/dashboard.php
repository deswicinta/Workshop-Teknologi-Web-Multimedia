<?php
session_start();

// Redirect to index.php if session ID is not set or empty
if (!isset($_SESSION['id']) || trim($_SESSION['id']) == '') {
    header('Location: index.php');
    exit();
}

include('conn.php');

// Retrieve user information
$query = mysqli_query($conn, "SELECT * FROM user WHERE user_id = '".$_SESSION['id']."'");
$row = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Success</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url("bridgerton.jpeg"); 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; 
            
        }
        .card {
            width: 1090px; 
            
            border: none;
            background-color: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            padding: 20px;
        }

        .card-title {
            color: black; /* Set text color */
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card text-center">
                    <div class="card-body">
                        <h2 class="card-title">Welcome to Dashboard, <?php echo $row['user_email']; ?></h2>
                        <a href="logout.php" class="btn btn-danger">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
