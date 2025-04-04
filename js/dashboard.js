function show_image() {
    const image_visualizer = document.getElementById('image_visualizer');
    const input_image = document.getElementById('stock_image');
    const file = input_image.files[0];

    const reader = new FileReader();

    reader.addEventListener('load', function (event) {
        const imageURL = event.target.result;
        const image = new Image();

        image.addEventListener('load', function () {
            image_visualizer.innerHTML = '';
            image_visualizer.appendChild(image);
        });

        image.src = imageURL;
        image.style.width = '15em';
        image.style.height = 'auto';
        image.style.maxHeight = '15em';
        image_visualizer.dataset.image = imageURL;
        image_visualizer.dataset.nom = image;
    });

    reader.readAsDataURL(file);

};

function showModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.style.display = "block";
    }
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.style.display = "none";
    }
}

document.addEventListener('DOMContentLoaded', function () {
    const modifyButtons = document.querySelectorAll('.list_modify_btn');
    modifyButtons.forEach(function (button) {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const listItem = this.closest('.list_item');
            document.getElementById('employee_id').value = listItem.getAttribute('data-id');
            document.getElementById('employee_nom').value = listItem.getAttribute('data-nom');
            document.getElementById('employee_prenom').value = listItem.getAttribute('data-prenom');
            document.getElementById('employee_identifiant').value = listItem.getAttribute('data-identifiant');
            document.getElementById('employee_mdp').value = "";
            document.getElementById('form_validation_employee').value = 'Modifier';
        });
    });
});