<?php

include 'db.php';

if(isset($_POST['update'])){

    $id = $_POST['id'];

    $updatedResponse =
    mysqli_real_escape_string(
        $conn,
        $_POST['updated_response']
    );

    mysqli_query($conn,

        "UPDATE policies

         SET response_text='$updatedResponse'

         WHERE id='$id'"
    );

    header("Location: admin.php");
}

?>