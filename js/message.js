document.getElementById('inputForm').addEventListener('sibmit', function (event){
    event.preventDefault();

    const formData = new FormData(event.target);
    fetch(
        'http://feedback2/main/action_index_insert', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            let messages = document.getElementById('messages');

            let message = document.createElement('table');
            message.className = 'message';
            message.innerHTML = 
                `<tr>
                    <td>${data.fullName}</td>
                    <td>${data.email}</td>
                    <td>${data.message}</td>
                </tr>
                `;
            messages.prepend(message);
        })
        .catch(error => console.error('Error: ', error));
});