const formContainer = document.getElementById('filters-container');
const form = document.getElementById('filters-form');

document.getElementById('toggle-filters').addEventListener('click', () => {
    formContainer.classList.toggle('hidden')
});

document.getElementById('reset-filters').addEventListener('click', () => {
    form.reset();
});

document.querySelectorAll('.form-check-input').forEach(checkbox => {
    checkbox.addEventListener('change', function () {
        const input = this.parentElement.nextElementSibling.querySelector('input');
        this.checked ? input.style.display = 'block' : input.style.display = 'none';
    });
});

form.addEventListener('submit', (event) => {
    event.preventDefault();
    applyFilters();
})

function applyFilters() {
    const formData = new FormData(form);

    const params = {};

    for (let [key, value] of formData.entries()) {
        const checkbox = document.getElementById(key + '-checkbox');
        if (checkbox.checked && value) {
            params[key] = value;
        }
    }

    window.location.search = Object.keys(params)
        .map(key => `${encodeURIComponent(key)}=${encodeURIComponent(params[key])}`)
        .join("&");
}
