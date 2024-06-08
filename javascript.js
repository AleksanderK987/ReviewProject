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
        } else {
            alert(data.message);
        }
    })
    .catch(error => {
        alert(error.message);
    });
}

function deleteReview(id){
    fetch(`delete_records.php?id=${id}`, {
        method: 'POST',
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            window.location.reload();
        } else {
            alert(data.message);
        }
    })
    .catch(error => alert(error.message));
}