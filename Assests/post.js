document.addEventListener('DOMContentLoaded', function () {
    const postForm = document.getElementById('postForm');

    postForm.addEventListener('submit', function (event) {
        event.preventDefault();

        const formData = new FormData(postForm);

        // Send the data to the server using AJAX
        fetch('../views/post.php', {
            method: 'POST',
            body: formData,
        })
        .then(response => {
            if (response.ok) {
                return response.json();
            } else {
                return response.text().then(text => {
                    throw new Error(text);
                });
            }
        })
        .then(data => {
            if (data.success) {
                const user_id = data.user_id;
                alert('Status posted successfully for user ID: ' + user_id);
                // You can redirect the user or update the UI as needed
            } else {
                alert('Error posting status: ' + data.error);
            }
        })
        .catch(error => {
            console.error('Error posting status:', error);
        
            // Log the response text for further inspection
            error.text().then(text => {
                console.error('Response text:', text);
            });
        });
        
    });
});
