function sendReview() {
    const form = document.getElementById('form');
    const formData = new FormData(form);

    fetch('sending.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        window.location.href='index.php';
        const responseDiv = document.getElementById('response');
        if (data.status === 'success') {
            responseDiv.innerHTML = '<p style="color:green;">' + data.message + '</p>';

        } else {
            responseDiv.innerHTML = '<p style="color:red;">' + data.message + '</p>';
        }
    })
    .catch(error => {
        const responseDiv = document.getElementById('response');
        responseDiv.innerHTML = '<p style="color:red;">An error occurred: ' + error.message + '</p>';
    });
}

function deleteReview(id){
    fetch(`delete_review.php?id=${id}`, {
        method: 'GET',
    })
    .then(response => response.json())
    .then(data => {
        console.log(data.message);
        if (data.status === 'success') {
            const row = document.getElementById(`row-${id}`);
            row.parentNode.removeChild(row);
        } else {
            console.error('Error: ', data.message);
        }
    })
    .catch(error => console.error('Error: ', error));
}
