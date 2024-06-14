//function to send reviews to database
function sendReview() {

    fetch('php/sending.php', {
        method: 'POST',
    })
    .then(data => {
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
    .then(data => {
        if (data.status === 'success') {
            window.location.reload();
        } else {
            alert(data.message);
        }
    })
    .catch(error => alert(error.message));
}