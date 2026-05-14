<?php

session_start();

include 'db.php';

$message = strtolower(trim($_POST['message']));

$response = "";

$bestMatch = "";
$highestScore = 0;

$query = "SELECT * FROM policies";

$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {

    $keyword = strtolower($row['keyword_name']);

    similar_text($message, $keyword, $percent);

    if($percent > $highestScore){

        $highestScore = $percent;

        $bestMatch = $row;
    }
}
if ($highestScore >= 40) {

    $response = $bestMatch['response_text'];

} else {

    $response = "Sorry, I couldn't understand that question.";

    mysqli_query($conn,
    
        "INSERT INTO unanswered_questions(question)
         VALUES('$message')"
    );
}

/* Store Chat Logs */

$userMessage = mysqli_real_escape_string($conn, $message);

$botResponse = mysqli_real_escape_string($conn, $response);

mysqli_query($conn,

    "INSERT INTO chat_logs(user_message, bot_response)
     VALUES('$userMessage', '$botResponse')"
);

echo $response;

?>