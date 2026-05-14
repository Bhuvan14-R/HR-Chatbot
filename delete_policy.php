<?php

include 'db.php';

if(isset($_POST['delete'])){

    $id = $_POST['id'];

    mysqli_query($conn,

        "DELETE FROM policies
         WHERE id='$id'"
    );

    header("Location: admin.php");
}

?>