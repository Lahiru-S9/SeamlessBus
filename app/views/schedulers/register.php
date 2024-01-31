<?php require APPROOT . '/views/inc/header.php'; ?>
<<?php
// Your login 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $username = $_POST["TxtUserName"];
    $password = $_POST["TxtPassword"];



    if (!empty($username) && !empty($password)) {
       
        header("Location: dashboard.php");
        exit();
    } else {
        $error_message = "Invalid username or password";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/schedulers/register.css">
    <title>Scheduler Login</title>
</head>
<body>
<style>
    /* start style */
        body {
            margin: 0;
            padding: 0; 
            background-image: url('../../../public/img/bus_schedule3.avif'); 
            background-size: cover;
            background-position: center;
            height: 100vh; 
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff; 
            font-family: Arial, sans-serif; 
        }

       /* end style */
    </style>


    <div class="container">
        <div class="login-container">
            <h1 class="text-center">::: Scheduler Login :::</h1>

            <?php
            if (isset($error_message)) {
                echo '<div class="error-message">' . $error_message . '</div>';
            }
            ?>

            <form action="" method="post">
                <div class="form-group">
                    <label for="TxtUserName">User Name</label>
                    <input type="text" id="TxtUserName" name="TxtUserName" placeholder="Enter your username" required>
                </div>

                <div class="form-group">
                    <label for="TxtPassword">Password</label>
                    <input type="password" id="TxtPassword" name="TxtPassword" placeholder="Enter your password" required>
                </div>

                <div class="form-group">
                    <button type="submit" id="btnLogin">Login</button>
                </div>
            </form>

            <hr class="separator">
            <p class="text-center">Enter your username and password</p>
        </div>
    </div>

</body>
</html>
<?php require APPROOT . '/views/inc/footer.php'; ?>