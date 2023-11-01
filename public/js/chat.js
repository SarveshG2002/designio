 // JavaScript to automatically scroll to the newest message
 const messageContainer = document.getElementById("message-container");
 function scrollToBottom() {
     messageContainer.scrollTop = messageContainer.scrollHeight;
 }

 // Example: Add a new message and then scroll to it
 // const newMessage = document.createElement("div");
 // newMessage.textContent = "This is a new message.";
 // newMessage.className = "message left";
 // messageContainer.appendChild(newMessage);
 scrollToBottom();

 document.getElementById("my-input-msg").addEventListener("keyup", (event) => {
     if (event.key === "Enter") {
         sendMessage();
     }
 });

 document.getElementById('send_my_mesg').addEventListener('click', () => {
     sendMessage();
 });

 function sendMessage() {
    let myMsg = document.getElementById("my-input-msg").value;

    if (myMsg) {
        // Create a new message container
        const newMessage = document.createElement("div");
        newMessage.className = "message my-text";

        // Create a div for the message content
        const messageContent = document.createElement("div");
        messageContent.className = "amsg";
        messageContent.textContent = myMsg;

        // Create a div for the message status
        const messageStatus = document.createElement("div");
        messageStatus.className = "msgstatus";
        
        // Add an icon or text to represent the status (e.g., 'Sending...')
        const statusIcon = document.createElement("span");
        statusIcon.className = "material-symbols-outlined my-text";
        statusIcon.textContent = "schedule"; // You can change the icon or text
        
        // Append the message content and status to the new message container
        messageStatus.appendChild(statusIcon);
        newMessage.appendChild(messageContent);
        newMessage.appendChild(messageStatus);

        // Append the new message container to the message container
        messageContainer.appendChild(newMessage);

        scrollToBottom(); // Scroll to the newest message

        // Clear the input field after sending
        document.getElementById("my-input-msg").value = "";

        // Send the message via AJAX
        $.ajax({
            type: 'post',
            url: '/api/chat/my-chat',
            data:{'userid':document.getElementById('userid').value},
            // dataType: 'json',
            headers: {
                // Set the Authorization header with the bearer token
                Authorization: 'Bearer ' + document.getElementById('tok').value,
            },
            success: function (data) {
                // Request was successful
                data=JSON.parse(data)
                if (data.message === "sent") {
                    // Message sent successfully, remove the status div
                    newMessage.removeChild(messageStatus);
                } else if (data.message === "failed") {
                    // Handle the case where the message failed to send
                }
            },
            error: function (xhr, textStatus, errorThrown) {
                // Request failed
                console.error("Can't send msg");
            },
        });
    }
}

