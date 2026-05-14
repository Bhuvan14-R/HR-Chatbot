const inputField = document.getElementById("userInput");
const chatBox = document.getElementById("chatBox");

document.getElementById("initialTime").innerText = getTime();

inputField.addEventListener("keypress", function (e) {

    if (e.key === "Enter") {
        sendMessage();
    }
});

function getTime() {

    const now = new Date();

    return now.toLocaleTimeString([], {
        hour: '2-digit',
        minute: '2-digit'
    });
}

function appendMessage(message, type) {

    const msgDiv = document.createElement("div");

    msgDiv.classList.add("message", type);

    msgDiv.innerHTML = `
        <div class="message-content">${message}</div>
        <span class="time">${getTime()}</span>
    `;

    chatBox.appendChild(msgDiv);

    chatBox.scrollTop = chatBox.scrollHeight;
}

function sendMessage() {

    const message = inputField.value.trim();

    if (message === "") return;

    appendMessage(message, "user");

    inputField.value = "";

    // Typing animation
    const typingDiv = document.createElement("div");

    typingDiv.classList.add("message", "bot");

    typingDiv.id = "typing";

    typingDiv.innerHTML = `
        <div class="message-content typing">
            Typing...
        </div>
    `;

    chatBox.appendChild(typingDiv);

    chatBox.scrollTop = chatBox.scrollHeight;

    fetch("chatbot.php", {

        method: "POST",

        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },

        body: "message=" + encodeURIComponent(message)
    })

        .then(response => response.text())

        .then(data => {

            document.getElementById("typing").remove();

            appendMessage(data, "bot");
        });
}