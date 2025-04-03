function show_page(id) {
    [...document.querySelectorAll('.gestionnaire_btn')].forEach(btn => btn.classList.remove('active_gestionnnaire_btn'));
    [...document.querySelectorAll('.gestionnaire_form')].forEach(btn => btn.classList.remove('active_form'));
    [...document.querySelectorAll('.list_title')].forEach(btn => btn.classList.remove('active_list_title'));
    [...document.querySelectorAll('.list_main')].forEach(btn => btn.classList.remove('active_list'));
    let active_btn = document.getElementById(id);
    let active_form_id = 'gestionnaire_' + id;
    let active_list_title_id = 'list_title_' + id;
    let active_list_id = 'list_' + id;
    let active_form = document.getElementById(active_form_id);
    let active_list_title = document.getElementById(active_list_title_id);
    let active_list = document.getElementById(active_list_id);
    active_btn.classList.add('active_gestionnnaire_btn');
    active_form.classList.add('active_form');
    active_list_title.classList.add('active_list_title');
    active_list.classList.add('active_list');
}

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