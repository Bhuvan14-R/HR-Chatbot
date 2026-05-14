<?php

session_start();

include 'db.php';

$error = "";

if(isset($_POST['login'])){

    $username = $_POST['username'];

    $password = $_POST['password'];

    $query = "SELECT * FROM admins
              WHERE username='$username'
              AND password='$password'";

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){

        $_SESSION['admin'] = $username;

        header("Location: admin.php");

    }else{

        $error = "Invalid Credentials";
    }
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Admin Login</title>

    <style>

        body{
            font-family:Arial;
            background:#eaf1ff;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }

        .login-box{

            background:white;
            padding:40px;
            border-radius:15px;
            width:350px;
            box-shadow:0 10px 25px rgba(0,0,0,0.1);
        }

        h2{
            margin-bottom:20px;
            text-align:center;
        }

        input{
            width:100%;
            padding:14px;
            margin-bottom:15px;
            border:1px solid #ccc;
            border-radius:10px;
        }

        button{
            width:100%;
            padding:14px;
            border:none;
            background:#2563eb;
            color:white;
            border-radius:10px;
            cursor:pointer;
        }

        .error{
            color:red;
            margin-bottom:10px;
            text-align:center;
        }

    </style>

</head>

<body>

<div class="login-box">

    <h2>Admin Login</h2>

    <?php if($error != ""){ ?>

        <div class="error">
            <?php echo $error; ?>
        </div>

    <?php } ?>

    <form method="POST">

        <input type="text"
               name="username"
               placeholder="Username"
               required>

        <input type="password"
               name="password"
               placeholder="Password"
               required>

        <button type="submit" name="login">
            Login
        </button>

    </form>

</div>

</body>
</html>