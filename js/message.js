document.getElementById('inputForm').addEventListener(
    'submit', async (event) => {
    event.preventDefault();

    try {
        const formData = new FormData(event.target);
        const response = await fetch('http://feedback/Main/AddMessage', {
            method: 'POST',
            body: formData
        });

        if (!response.ok) {
            throw new Error('Network response was not ok');
        }

        const data = await response.json();
        appendMessageToTable(data);
    } catch (error) {
        console.error('Error: ', error);
    }
});

function appendMessageToTable(data) {
    const messagesTable = document.getElementById('messages');

    const newMessageRow = document.createElement('tr');
    newMessageRow.className = 'message';
    newMessageRow.innerHTML = `
        <td>${data.fullName}</td>
        <td>${data.email}</td>
        <td>${data.message}</td>
    `;

    messagesTable.prepend(newMessageRow);
}
