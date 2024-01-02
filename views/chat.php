<?php
include_once("../models/userModel.php");


$conn = getConnection();

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$usersQuery = mysqli_query($conn, "SELECT * FROM reg_info");
$users = mysqli_fetch_all($usersQuery, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real-time Chat</title>
</head>
<body>
    <!-- Chat Bar -->
    <div>
        <h2>Chat Bar</h2>
        <ul>
            <?php foreach ($users as $user): ?>
                <li>
                    <?php echo $user['name']; ?>
                    <button onclick="openChat(<?php echo $user['id']; ?>)">Chat</button>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- Chat Box -->
    <div id="chat-box" style="display: none;">
        <h2>Chat Box</h2>
        <div id="messages-container"></div>
        <input type="text" id="message-input" placeholder="Type your message">
        <button onclick="sendMessage()">Send</button>
    </div>

    <script>
    var currentReceiverId;

    function openChat(receiverId) {
        document.getElementById('chat-box').style.display = 'block';
        currentReceiverId = receiverId;
        loadMessages(receiverId);
    }

    function loadMessages(receiverId) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('messages-container').innerHTML = xhr.responseText;
        }
    };

    // Correct the order of parameters
    xhr.open('GET', 'get_messages.php?sender_id=' + currentReceiverId + '&receiver_id=' + receiverId, true);
    xhr.send();
}


function sendMessage() {
    var message = document.getElementById('message-input').value;

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            loadMessages(currentReceiverId);
            document.getElementById('message-input').value = '';
        }
    };

    // Correct the order of parameters
    xhr.open('GET', 'send_message.php?sender_id=' + <?php echo $_SESSION['user']['id']; ?> + '&receiver_id=' + currentReceiverId + '&message=' + encodeURIComponent(message), true);
    xhr.send();
}
</script>

</body>
</html>
