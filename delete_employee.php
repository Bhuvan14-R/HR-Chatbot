<?php

include 'db.php';

if(isset($_POST['delete_employee'])){

    $id = $_POST['id'];

    mysqli_query($conn,

        "DELETE FROM employees
         WHERE id='$id'"
    );

    header("Location: admin.php");
}

?>