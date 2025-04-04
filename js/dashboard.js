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
