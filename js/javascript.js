//function to send reviews to database
function sendReview() {
    const form = document.getElementById('form');
    const formData = new FormData(form);

    fetch('php/sending.php', {
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

//function to delete reviews
function deleteReview(id){
    fetch(`../php/delete_records.php?id=${id}`, {
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