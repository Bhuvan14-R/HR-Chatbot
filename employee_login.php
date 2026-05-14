<?php

session_start();

/* Destroy Admin Session */

if(isset($_SESSION['admin'])){

    unset($_SESSION['admin']);
}

include 'db.php';

$error = "";

if(isset($_POST['login'])){

    $email = $_POST['email'];

    $password = $_POST['password'];

    $query = "SELECT * FROM employees
              WHERE email='$email'
              AND password='$password'";

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){

        $employee = mysqli_fetch_assoc($result);

        $_SESSION['employee'] = $employee['name'];

        header("Location: chat.php");

    }else{

        $error = "Invalid Employee Credentials";
    }
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Employee Login</title>

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
}

input{
    width:100%;
    padding:14px;
    margin-bottom:15px;
}

button{
    width:100%;
    padding:14px;
    background:#16a34a;
    color:white;
    border:none;
}

.error{
    color:red;
    margin-bottom:10px;
}

</style>

</head>

<body>

<div class="login-box">

<h2>Employee Login</h2>

<div class="error">
<?php echo $error; ?>
</div>

<form method="POST">

<input type="email"
       name="email"
       placeholder="Email"
       required>

<input type="password"
       name="password"
       placeholder="Password"
       required>

<button type="submit"
        name="login">

Login

</button>

</form>

</div>

</body>
</html>