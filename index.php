<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cloud HR Policy Chatbot</title>

    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>

<body>

    <div class="chat-container">

        <div class="chat-header">
            <div>
                <h2>HR Policy Assistant</h2>
                <p>Cloud-Based Employee Support Chatbot</p>
            </div>
        </div>

        <div class="chat-box" id="chatBox">

            <div class="message bot">
                <div class="message-content">
                    Hello 👋<br>
                    I can help you with HR policies, leave rules, work timings, salary info and more.
                </div>
                <span class="time" id="initialTime"></span>
            </div>

        </div>

        <div class="input-area">
            <input type="text" id="userInput" placeholder="Ask something about company policies...">

            <button onclick="sendMessage()">
                Send
            </button>
        </div>

    </div>

    <script src="script.js"></script>

</body>
</html>