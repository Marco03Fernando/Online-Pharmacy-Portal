document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('whatsappButton1').addEventListener('click', function(){
        window.open('https://wa.me/1234567890?text=Hello,%20I%20would%20like%20to%20inquire%20about%20your%20services.', '_blank');
    });
    document.getElementById('whatsappButton2').addEventListener('click', function(){
        window.open('https://wa.me/1234567890?text=Hello,%20I%20would%20like%20to%20inquire%20about%20your%20services.', '_blank');
    });
});
function sendMessage() {
        const messageInput = document.getElementById('messageInput');
        const chatBox = document.getElementById('chatBox');
        const userMessage = messageInput.value;

        if (userMessage.trim() !== "") {
            
            const userMsgElem = document.createElement('div');
            userMsgElem.className = 'receiver';
            userMsgElem.innerHTML = `<p>${userMessage}</p>`;
            chatBox.appendChild(userMsgElem);

            
            messageInput.value = '';

            
            chatBox.scrollTop = chatBox.scrollHeight;

            
            setTimeout(function() {
                const botMsgElem = document.createElement('div');
                botMsgElem.className = 'sender';
                botMsgElem.innerHTML = `<p>Hello!<br>How can we help you?</p>`;
                chatBox.appendChild(botMsgElem);

                
                chatBox.scrollTop = chatBox.scrollHeight;
            }, 1000);
        }
    }