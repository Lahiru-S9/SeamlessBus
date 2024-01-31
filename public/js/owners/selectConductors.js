// public/js/Owners/selectConductor.js

document.addEventListener('DOMContentLoaded', function () {
    const conductorSearch = document.getElementById('conductor-search');
    const conductorItems = document.querySelectorAll('.conductor-item');

    conductorSearch.addEventListener('input', function () {
        const searchTerm = conductorSearch.value.toLowerCase();

        conductorItems.forEach(item => {
            const conductorName = item.querySelector('h2').innerText.toLowerCase();
            const isVisible = conductorName.includes(searchTerm);

            if (isVisible) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });
});
