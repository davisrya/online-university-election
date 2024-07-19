document.addEventListener('DOMContentLoaded', function () {
    function closeModal() {
        document.getElementById('voteModal').style.display = 'none';
    }

    // Show the modal with the provided message
    function showModal(message) {
        document.getElementById('modalMessage').innerText = message;
        document.getElementById('voteModal').style.display = 'block';
    }

    document.getElementById('closeButton').addEventListener('click', closeModal);
    document.getElementById('doneButton').addEventListener('click', closeModal);

    // Example function to handle form submission and show modal
    document.getElementById('voteForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(event.target);
        fetch('submit_vote.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            if (data.includes('success')) {
                showModal('Vote submitted successfully!');
            } else {
                showModal('An error occurred: ' + data);
            }
        })
        .catch(error => {
            showModal('An error occurred: ' + error.message);
        });
    });
});
