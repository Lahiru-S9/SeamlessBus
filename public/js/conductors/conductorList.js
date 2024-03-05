// public/js/owners/conductorList

document.addEventListener('DOMContentLoaded', function () {
    const selectButtons = document.querySelectorAll('.select-btn');

    selectButtons.forEach(button => {
        button.addEventListener('click', function () {
            const conductorId = this.getAttribute('data-conductor-id');

            // Implement logic to handle the selection, e.g., send to the server
            console.log('Selected conductor ID:', conductorId);
        });
    });
});
