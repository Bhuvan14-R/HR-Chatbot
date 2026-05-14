<?php

include 'db.php';

if(isset($_POST['add_employee'])){

    $name =
    mysqli_real_escape_string(
        $conn,
        $_POST['name']
    );

    $email =
    mysqli_real_escape_string(
        $conn,
        $_POST['email']
    );

    $password =
    mysqli_real_escape_string(
        $conn,
        $_POST['password']
    );

    mysqli_query($conn,

        "INSERT INTO employees
        (name,email,password)

        VALUES

        ('$name','$email','$password')"
    );

    header("Location: admin.php");
}

?>