function sendReview() {
    const form = document.getElementById('form');
    const formData = new FormData(form);

    fetch('sending.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        
        const responseDiv = document.getElementById('response');
        if (data.status === 'success') {
            window.location.reload();
            //responseDiv.innerHTML = '<p style="color:green;">' + data.message + '</p>';
        } else {
            responseDiv.innerHTML = '<p style="color:red;">' + data.message + '</p>';
        }
    })
    .catch(error => {
        const responseDiv = document.getElementById('response');
        responseDiv.innerHTML = '<p style="color:red;">An error occurred: ' + error.message + '</p>';
    });
}
