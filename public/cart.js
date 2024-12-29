document.addEventListener('DOMContentLoaded', () => {
    // Select all buttons with class "add-cart"
    document.querySelectorAll('.add-cart').forEach(button => {
        button.addEventListener('click', () => {
            // Extract data attributes
            const productId = button.getAttribute('data-id');
            const name = button.getAttribute('data-name');
            const price = button.getAttribute('data-price');
            const image = button.getAttribute('data-image');

            // Call the addToCart function with the extracted values
            console.log("Hello")
            addToCart(productId, name, price, image);
        });
    });
});

// Existing addToCart function remains unchanged
function addToCart(productId, name, price, image) {
    fetch('/cart/add', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            product_id: parseInt(productId),
            name: name,
            price: parseFloat(price),
            image: image,
            quantity: 1,
        }),
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        updateCartCount();
    })
    .catch(error => console.error('Error:', error));
}


function updateCartCount() {
    fetch('/cart/count')
        .then(response => response.json())
        .then(data => {
            document.getElementById('cart-count').innerText = data.count;
        });
}


function removeFromCart(productId) {
    fetch('/cart/remove', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ product_id: productId }),
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        location.reload(); // Reload the cart page
    })
    .catch(error => console.error('Error:', error));
}

document.addEventListener('DOMContentLoaded', updateCartCount);
