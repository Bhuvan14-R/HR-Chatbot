const inputField = document.getElementById("userInput");
const chatBox = document.getElementById("chatBox");

inputField.addEventListener("keypress", function (e) {

    if (e.key === "Enter") {
        sendMessage();
    }
});

function appendMessage(message, type) {

    const div = document.createElement("div");

    div.classList.add("message", type);

    div.innerHTML = `
    
        <div class="message-content">
            ${message}
        </div>
    
    `;

    chatBox.appendChild(div);

    chatBox.scrollTop = chatBox.scrollHeight;
}

function sendMessage() {

    const message = inputField.value.trim();

    if (message === "") return;

    appendMessage(message, "user");

    inputField.value = "";

    const typing = document.createElement("div");

    typing.classList.add("message", "bot");

    typing.id = "typing";

    typing.innerHTML = `
    
        <div class="message-content">
            Typing...
        </div>
    
    `;

    chatBox.appendChild(typing);

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