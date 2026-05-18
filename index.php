<?php

error_reporting(E_ALL);

ini_set('display_errors', 1);

?>

<!DOCTYPE html>
<html>

<head>

    <title>HR Management Portal</title>

    <style>

        body{
            font-family:Arial;
            background:#eaf1ff;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }

        .container{

            background:white;
            padding:50px;
            border-radius:20px;
            width:450px;
            text-align:center;
            box-shadow:0 10px 30px rgba(0,0,0,0.1);
        }

        h1{
            margin-bottom:20px;
        }

        p{
            color:#555;
            margin-bottom:40px;
        }

        a{

            display:block;
            margin-bottom:20px;
            padding:16px;
            border-radius:12px;
            text-decoration:none;
            color:white;
            font-size:18px;
        }

        .admin{
            background:#2563eb;
        }

        .employee{
            background:#16a34a;
        }

    </style>

</head>

<body>

<div class="container">

    <h1>HR Management Portal</h1>

    <p>Select Login Type</p>

    <a href="admin_login.php"
       class="admin">

       Admin Login

    </a>

    <a href="employee_login.php"
       class="employee">

       Employee Login

    </a>

</div>

</body>
</html>