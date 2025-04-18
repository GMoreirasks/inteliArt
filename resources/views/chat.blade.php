<!-- resources/views/chat.blade.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat com Agente Virtual</title>
</head>
<body>
    <h1>Olá! Eu sou o agente virtual. Como posso ajudar você?</h1>

    <!-- Área de mensagens -->
    <div id="chatbox">
        <!-- Mensagens do chat aparecerão aqui -->
    </div>

    <!-- Formulário para enviar mensagens -->
    <form id="chatForm">
        <input type="text" id="userMessage" placeholder="Digite sua mensagem..." required>
        <button type="submit">Enviar</button>
    </form>

    <script>
        // Aqui, vamos usar JavaScript para capturar a mensagem e enviar para o backend
        document.getElementById('chatForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            const message = document.getElementById('userMessage').value;
            
            // Enviar a mensagem para o backend (onde o Laravel vai fazer a chamada à OpenAI)
            const response = await fetch('/chat/receive', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ message }),
            });
            const data = await response.json();

            // Exibir a resposta do agente
            const chatbox = document.getElementById('chatbox');
            chatbox.innerHTML += `<div>${data.response}</div>`;
            document.getElementById('userMessage').value = '';
        });
    </script>
</body>
</html>
