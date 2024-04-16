document.getElementById('inputForm').addEventListener('submit', (event) => {
    event.preventDefault();

    const formData = new FormData(event.target);
    fetch(
        'http://feedback2/main/index_insert', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        let messages = document.getElementById('messages');

        let message = document.createElement('tr');
        message.className = 'message';
        message.innerHTML = `
            <td>${data.fullName}</td>
            <td>${data.email}</td>
            <td>${data.message}</td>
        `;
        messages.prepend(message);
    })
    .catch(error => console.error('Error: ', error));
});