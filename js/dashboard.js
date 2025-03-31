function show_form(id) {
    [...document.querySelectorAll('.gestionnaire_btn')].forEach(btn => btn.classList.remove('active_gestionnaire_btn'));
    [...document.querySelectorAll('.gestionnaire_form')].forEach(btn => btn.classList.remove('active_form'));
    let active_btn = document.getElementById(id);
    let active_form_id = 'gestionnaire_' + id;
    let active_form = document.getElementById(active_form_id);
    active_btn.classList.add('active_gestionnaire_btn');
    active_form.classList.add('active_form');
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
    });

    reader.readAsDataURL(file);

};
