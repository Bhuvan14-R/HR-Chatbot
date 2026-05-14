<?php

session_start();

if(!isset($_SESSION['employee'])){

    header("Location: employee_login.php");

    exit();
}

$employeeName = $_SESSION['employee'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Smart HR Assistant</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="chat-wrapper">

    <div class="chat-container">

        <!-- HEADER -->

        <div class="chat-header">

            <div class="chat-title">

                <h2>Smart HR Assistant</h2>

                <p>
                    Cloud Based HR Management Chatbot
                </p>

            </div>

            <div class="chat-actions">

                <a href="employee_login.php"
                   class="admin-btn">

                   Employee

                </a>

                <a href="admin_login.php"
                   class="admin-btn">

                   Admin

                </a>

                <a href="logout.php"
                   class="logout-btn">

                   Logout

                </a>

            </div>

        </div>

        <!-- CHAT AREA -->

        <div class="chat-box" id="chatBox">

            <div class="message bot">

                <div class="message-content">

                    Hello <?php echo $employeeName; ?> 👋<br><br>

                    Ask me about:
                    <br>
                    • Leave policies
                    <br>
                    • Attendance
                    <br>
                    • Work from home
                    <br>
                    • Insurance
                    <br>
                    • Salary details

                </div>

            </div>

        </div>

        <!-- INPUT AREA -->

        <div class="input-area">

            <input type="text"
                   id="userInput"
                   placeholder="Ask something about HR policies...">

            <button onclick="sendMessage()">

                Send

            </button>

        </div>

    </div>

</div>

<script src="script.js"></script>

</body>
</html>