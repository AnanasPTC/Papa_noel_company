document.addEventListener('DOMContentLoaded', function () {
    const likeButton = document.getElementById('likeButton');

    if (likeButton) {
        likeButton.addEventListener('click', function (e) {
            e.preventDefault();

            const receiverId = likeButton.getAttribute('data-receiver-id');
            const icon = likeButton.querySelector('i');

            fetch('/like', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({ receiver_id: receiverId }),
            })
            .then(response => response.json())
            .then(data => {
                console.log('Réponse reçue:', data);
                if (data.liked) {
                    icon.outerHTML = '<i class="bi bi-heart-fill text-danger"></i>';
                } else {
                    icon.outerHTML = '<i class="bi bi-heart"></i>';
                }
            })
            .catch(error => console.error('Erreur:', error));
        });
    }
});

