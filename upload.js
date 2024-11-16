document.getElementById('upload-form').addEventListener('submit', function(event) {
    event.preventDefault();

    const formData = new FormData(this);

    fetch('C:/Users/rober/Documents/Coding/First website/upload.php/', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById('message').innerText = data;
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('message').innerText = 'An error occured during the upload.';
    })
})