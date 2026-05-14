<?php

include 'db.php';

if(isset($_POST['add'])){

    $question = strtolower(trim($_POST['question']));

    $response = trim($_POST['response']);

    /* Insert New Policy */

    mysqli_query($conn,

        "INSERT INTO policies
        (keyword_name, response_text)

        VALUES

        ('$question', '$response')"
    );

    /* Remove From Unanswered */

    mysqli_query($conn,

        "DELETE FROM unanswered_questions
         WHERE question='$question'"
    );

    header("Location: admin.php");
}

?>