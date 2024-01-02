document.addEventListener("DOMContentLoaded", function () {
    var likeButtons = document.querySelectorAll('.like-btn');
    var commentButtons = document.querySelectorAll('.comment-btn');

    likeButtons.forEach(function (button) {
        button.addEventListener('click', handleLike);
    });

    commentButtons.forEach(function (button) {
        button.addEventListener('click', handleComment);
    });

    function handleLike() {
        var statusId = this.getAttribute('data-id');
    
        // Send an AJAX request to the server to handle the like action
        sendAjaxRequest('POST', 'like.php', { id: statusId }, function (response) {
            alert('Liked!');
            // You can update the UI here if needed
        });
    }

    function handleComment() {
        var statusId = this.getAttribute('data-id');

        // Send an AJAX request to the server to handle the comment action
        sendAjaxRequest('POST', 'comment.php', { id: statusId }, function (response) {
            alert('Commented!');
            // You can update the UI here if needed
        });
    }

    function sendAjaxRequest(method, url, data, callback) {
        var xhr = new XMLHttpRequest();
        xhr.open(method, url, true);
        xhr.setRequestHeader('Content-Type', 'application/json');
    
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                console.log(xhr.responseText); // Log the response to the console
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    callback(response);
                } else {
                    console.error('Error during AJAX request:', xhr.statusText);
                }
            }
        };
    
        xhr.send(JSON.stringify(data));
    }
    
});
