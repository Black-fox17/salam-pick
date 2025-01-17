document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('productForm');
    const jsonPreview = document.getElementById('jsonPreview');
    const dropZone = document.getElementById('dropZone');
    const imagePreview = document.getElementById('imagePreview');
    const fileInput = document.getElementById('image');
    let products = [];

    // Load existing products if any
    const savedProducts = localStorage.getItem('products');
    if (savedProducts) {
        products = JSON.parse(savedProducts);
    }

    // Handle drag and drop
    dropZone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropZone.classList.add('dragover');
    });

    dropZone.addEventListener('dragleave', () => {
        dropZone.classList.remove('dragover');
    });

    dropZone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropZone.classList.remove('dragover');
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            handleImageUpload(files[0]);
        }
    });

    // Handle file input change
    fileInput.addEventListener('change', (e) => {
        if (e.target.files.length > 0) {
            handleImageUpload(e.target.files[0]);
        }
    });

    function handleImageUpload(file) {
        if (!file.type.startsWith('image/')) {
            alert('Please upload an image file');
            return;
        }

        const reader = new FileReader();
        reader.onload = (e) => {
            const img = document.createElement('img');
            img.src = e.target.result;
            imagePreview.innerHTML = '';
            imagePreview.appendChild(img);
            imagePreview.classList.add('active');
        };
        reader.readAsDataURL(file);
    }

    form.addEventListener('submit', (e) => {
        e.preventDefault();

        const imageFile = fileInput.files[0];
        if (!imageFile) {
            alert('Please select an image');
            return;
        }

        const reader = new FileReader();
        reader.onload = (e) => {
            const newProduct = {
                id: products.length + 1,
                section: document.getElementById('section').value,
                name: document.getElementById('name').value,
                description: document.getElementById('description').value,
                price: parseFloat(document.getElementById('price').value),
                why_want_product: document.getElementById('whyWantProduct').value,
                sold_by: document.getElementById('soldBy').value,
                color: document.getElementById('color').value,
                made_in: document.getElementById('madeIn').value,
                image: e.target.result
            };

            // Add new product to array
            products.push(newProduct);

            // Save to localStorage
            localStorage.setItem('products', JSON.stringify(products));

            // Update preview
            updatePreview();

            // Reset form and image preview
            form.reset();
            imagePreview.innerHTML = '';
            imagePreview.classList.remove('active');

            // Show success message
            alert('Product added successfully!');
        };

        reader.readAsDataURL(imageFile);
    });

    function updatePreview() {
        // Display the last added product
        const lastProduct = products[products.length - 1];
        if (lastProduct) {
            // Create a copy of the product without the full image data for preview
            const previewProduct = {...lastProduct};
            previewProduct.image = 'data:image/...'; // Truncate image data for preview
            jsonPreview.textContent = JSON.stringify(previewProduct, null, 2);
        }
    }

    // Initial preview update
    updatePreview();
});